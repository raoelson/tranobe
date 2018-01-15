<?php
class Userhasgroup_model extends CI_Model{
	var $table = "user_has_group";
	public function get($array){
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->join("user","iduser = user_iduser");
		$this->db->join("group","idgroup = group_idgroup");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function remove($where){
		$this->db->delete($this->table,$where);	
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);	
	}
	public function update($posts,$array){
		$this->db->update($this->table,$posts,$array);	
	}
}

