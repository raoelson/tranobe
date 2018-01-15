<?php
class District_model extends CI_Model{
	var $table = "district";
	var $key = "iddistrict";
	public function get($id = null){
		$this->db->join("region","idregion = region_idregion");
		$this->db->order_by("idregion","ASC");
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
	public function getId($nom_district){
		$q = $this->db->get_where($this->table,array("LOWER(nom_district)"=>strtolower($nom_district)));
		if (!$q->num_rows()) return null;;
		$r = $q->row_array();
		return $r["code_district"];
	}
	public function getPrice($array){
		$this->db->join("prix","district.code_district = prix.code_district","LEFT");
		$this->db->order_by("nom_district","ASC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->join("region","idregion = region_idregion");
		$this->db->order_by("code_district","ASC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result();
	}
	public function delete($id){
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

