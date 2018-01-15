<?php
class Op_model extends CI_Model{
	var $table = "op";
	var $key = "idop";
	public function get($id = null){
		$this->db->order_by("idop","DESC");
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
	public function getLimit($val){
		$this->db->order_by($this->key,"DESC");
		$this->db->join("region","region_idregion = idregion");
		$this->db->join("district","district.code_district = op.code_district");
		$this->db->limit(NB_PER_PAGE,($val-1) * NB_PER_PAGE);
		$query = $this->db->get($this->table);
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

