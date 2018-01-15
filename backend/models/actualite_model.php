<?php
class Actualite_model extends CI_Model{
	var $table = "actualite";
	var $key = "idactu";
	public function get($id = null){
		$this->db->join("user","iduser = user_iduser ");
		$this->db->join("district","district.code_district = actualite.code_district ");
		$this->db->order_by($this->key,"DESC");
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
	public function getLimit($array,$val){
		$this->db->join("user","iduser = user_iduser ");
		$this->db->join("district","district.code_district = actualite.code_district ");
		$this->db->order_by($this->key,"DESC");
		$this->db->limit(NB_PER_PAGE,($val-1) * NB_PER_PAGE);
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->join("user","iduser = user_iduser ");
		$this->db->join("district","district.code_district = actualite.code_district ");
		$this->db->order_by($this->key,"DESC");
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

