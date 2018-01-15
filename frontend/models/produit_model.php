<?php
class Produit_model extends CI_Model{
	var $table = "produit";
	var $key = "idproduit";
	public function get($id = null){
		$this->db->join("cat_produit","idcat_produit = categorie_idcategorie");
		$this->db->order_by("idcat_produit ASC, nom_produit ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getId($nom_produit){
		$q = $this->db->get_where($this->table,array("LOWER(nom_produit)"=>strtolower($nom_produit)));
		if (!$q->num_rows()) return null;;
		$r = $q->row_array();
		return $r["idproduit"];
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

