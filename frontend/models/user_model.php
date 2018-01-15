<?php
class User_model extends CI_Model{
	var $table = "user";
	var $key = "iduser";
	public function get($id = null){
		$this->db->order_by($this->key,"ASC");
		$this->db->join("district","district.code_district = user.code_district");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->order_by($this->key,"ASC");
		$this->db->join("district","district.code_district = user.code_district");
		$this->db->join("user_has_group","user_iduser = iduser","LEFT");
		$this->db->join("group","group_idgroup = idgroup","LEFT");
		$this->db->join("keyword","keyword_idkeyword = idkeyword","LEFT");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	/**
	 * Obtenir un user par son login ou email
	 * */
	public function get_user_by_login($login){
		$this->db->where(array("login"=>$login));
		$this->db->or_where(array("email"=>$login));
		//$this->db->join("district","district.code_district = user.code_district");
		$this->db->join("user_has_group","user_iduser = iduser","LEFT");
		$this->db->join("group","group_idgroup = idgroup","LEFT");
		$query = $this->db->get_where($this->table);
		return $query->row_array();
	}
	public function getLimit($val){
		$this->db->order_by($this->key,"ASC");
		$this->db->join("district","district.code_district = user.code_district");
		$this->db->limit(NB_PER_PAGE,($val-1) * NB_PER_PAGE);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function delete($id){
		return $this->db->delete($this->table,array($this->key=>$id));	
	}
	public function add($posts){
		$this->db->insert($this->table,$posts);
		return $this->db->insert_id();	
	}
	public function update($posts,$id){
		$this->db->update($this->table,$posts,array($this->key=>$id));	
	}
	public function active_all($array){
		$this->db->set("is_active", 1);
		$this->db->where_in('iduser', $array);
		$this->db->update($this->table);
	}
	public function inactive_all($array){
		$this->db->set("is_active", 0);
		$this->db->where_in('iduser', $array);
		$this->db->update($this->table);
	}
	public function delete_all($array){
		$this->db->where_in('iduser', $array);
		$this->db->delete($this->table);
	}
}

