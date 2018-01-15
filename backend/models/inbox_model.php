<?php
class Inbox_model extends CI_Model{
	var $table = "inbox";
	var $key = "id";
	public function get($id = null){
		$this->db->join("user","numtel = number","LEFT");
		$this->db->order_by($this->key,"DESC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result();
	}
	public function getWhere($array){
		$this->db->join("user","numtel = number","LEFT");
		$this->db->order_by($this->key,"DESC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getLimit($array,$val){
		$this->db->order_by($this->key,"DESC");
		$this->db->join("user","numtel = number","LEFT");
		$this->db->limit(NB_PER_PAGE,($val-1) * NB_PER_PAGE);
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function get_unread(){
		$this->db->join("user","numtel = number","LEFT");
		$this->db->order_by($this->key,"DESC");
		$query = $this->db->get_where($this->table,array("processed" => 0));
		return $query->result_array();
	}
	public function remove($id){
		$this->db->delete($this->table,array($this->key=>$id));	
	}
	public function add($posts,$id){
		$this->db->insert($this->table,$posts,array($this->key=>$id));	
	}
	public function update($posts,$id){
		$this->db->update($this->table,$posts,array($this->key=>$id));	
	}
	public function active_all($array){
		$this->db->set("processed", 1);
		$this->db->where_in($this->key, $array);
		$this->db->update($this->table);
	}
	public function inactive_all($array){
		$this->db->set("processed", 0);
		$this->db->where_in($this->key, $array);
		$this->db->update($this->table);
	}
	public function delete_all($array){
		$this->db->where_in($this->key, $array);
		$this->db->delete($this->table);
	}
}

