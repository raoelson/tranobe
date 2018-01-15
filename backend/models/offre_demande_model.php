<?php
class Offre_demande_model extends CI_Model{
	var $table = "offre_demande";
	var $key = "idoffre_demande";
	public function get($id = null){
		$this->db->order_by($this->key,"ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getLimit($array,$val){
		$this->db->join("district","district.code_district = offre_demande.code_district","LEFT");
		$this->db->join("produit","idproduit = produit_idproduit");
		$this->db->order_by($this->key,"DESC");
		$this->db->limit(NB_PER_PAGE,($val-1) * NB_PER_PAGE);
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere($array){
		$query = $this->db->get_where($this->table,$array);
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
}

