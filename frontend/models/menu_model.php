<?php
class Menu_model extends CI_Model{
	var $table = "page";
	var $key = "idpage";
	public function getPrincipal(){
		$this->db->order_by("idcategorie", "asc");
		$this->db->order_by("title", "asc"); 
		$where = array("niveau"=>1,"is_publish"=>1);
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$q = $this->db->get_where($this->table,$where);
		return $q->result_array();		
	}
}