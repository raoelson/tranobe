<?php
class Prix_model extends CI_Model{
	var $table = "prix";
	var $key = "idprix";
	public function get($id = null){
		$this->db->join("produit","produit_idproduit = idproduit");
		$this->db->join("district","district.code_district = prix.code_district");
		$this->db->order_by("nom_district","ASC");
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function getWhere($array = null ){
		$this->db->join("produit","produit_idproduit = idproduit");
		$this->db->join("district","district.code_district = prix.code_district");
		$this->db->join("region","region.idregion = region_idregion");
		$this->db->order_by("date","ASC");
		if ($array)	$query = $this->db->get_where($this->table,$array);
		else $query = $this->db->get($this->table);
		//echo $this->db->last_query();
		return $query->result_array();
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
	public function updateWhere($posts,$array){
		$this->db->update($this->table,$posts,$array);
	}
}

