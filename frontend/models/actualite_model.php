<?php
class Actualite_model extends CI_Model{
	var $table = "actualite";
	var $key = "idactu";
	public function get($id = null){
		$this->db->order_by($this->key,"DESC");
		$this->db->join("district","district.code_district = actualite.code_district");
		$this->db->join("user","user.iduser = actualite.user_iduser","LEFT");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->order_by($this->key,"DESC");
		$this->db->join("district","district.code_district = actualite.code_district");
		$this->db->join("user","user.iduser = actualite.user_iduser","LEFT");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);	
		return $this->db->insert_id();
	}
}

