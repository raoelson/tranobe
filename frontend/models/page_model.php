<?php
class Page_model extends CI_Model{
	var $table = "page";
	var $key = "idpage";
	public function get($id = null){
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getBy($array){
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		$query = $this->db->get_where($this->table,$array);
		return $query->row_array();
	}
	public function getWhere($array){
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		$query = $this->db->get_where($this->table,$array);
		if ($query->num_rows == 1) return $query->row_array();
		return $query->result_array();
	}
	public function delete($id){
		return $this->db->delete($this->table,array($this->key=>$id));	
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);	
	}
	public function update($posts,$id){
		$this->db->update($this->table,$posts,array($this->key=>$id));	
	}
}

