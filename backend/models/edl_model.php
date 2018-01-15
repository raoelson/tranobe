<?php
class Edl_model extends CI_Model{
	var $table = "edl";
	var $key = "idedl";
	public function get($id = null){
		$this->db->order_by($this->key,"DESC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->order_by($this->key,"DESC");
		$query = $this->db->get_where($this->table,$array);
		if ($query->num_rows()>1) return $query->result_array();
		return $query->row_array();
	}
	public function delete($array){
		return $this->db->delete($this->table,$array);	
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);	
		return $this->db->insert_id();
	}
	public function update($posts,$array){
		$this->db->update($this->table,$posts,$array);	
	}
}

