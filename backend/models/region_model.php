<?php
class Region_model extends CI_Model{
	var $table = "region";
	var $key = "idregion";
	public function get($id = null){
		$this->db->order_by("nom_region","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result();
	}
	public function getBy($champ,$value){
		return $q = $this->db->get_where($this->table,array($champ => $value));
	}
	public function getWhere($array){
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getId($nom_region){
		$q = $this->db->get_where($this->table,array("nom_region"=>$nom_region));
		if (!$q->num_rows()) return null;
		$r = $q->row_array();
		return $r["idregion"];
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

