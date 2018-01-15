<?php
class Group_model extends CI_Model{
	var $table = "group";
	var $key = "idgroup";
	public function get($id = null){
		$this->db->join("keyword","idkeyword = keyword_idkeyword");
		$this->db->order_by("keyword_idkeyword","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result();
	}
	public function getId($groupname){
		$q = $this->db->get_where($this->table,array("LOWER(groupname)"=>strtolower($groupname)));
		if (!$q->num_rows()) return null;;
		$r = $q->row_array();
		return $r["idgroup"];
	}
	public function getBy($champ,$value){
		return $q = $this->db->get_where($this->table,array($champ => $value));
	}
	public function getWhere($array){
		$this->db->join("keyword","idkeyword = keyword_idkeyword");
		$this->db->order_by("description","ASC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function remove($id){
		$this->db->delete($this->table,array($this->key=>$id));	
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);	
		return $this->db->insert_id();
	}
	public function update($posts,$id){
		$this->db->update($this->table,$posts,array($this->key=>$id));	
	}
}

