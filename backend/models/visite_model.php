<?php
class Visite_model extends CI_Model{
	var $table = "visite";
	var $key = "idviste";
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
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getCount($d){
		$query = $this->db->query("
			SELECT count(*) as nb FROM visite
			WHERE DATE(date) = '$d'
		");
		$row = $query->row_array();
		return $row["nb"];
	}
	public function delete($id){
		$this->db->delete($this->table,array($this->key=>$id));	
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);	
	}
	public function update($posts,$id){
		$this->db->update($this->table,$posts,array($this->key=>$id));	
	}
}


