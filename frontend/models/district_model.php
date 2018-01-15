<?php
class District_model extends CI_Model{
	var $table = "district";
	var $key = "iddistrict";
	public function get($id = null){
		$this->db->join("region","idregion = region_idregion");
		$this->db->order_by("nom_district","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result();
	}
	public function getOp($id = null){
		$this->db->select("iddistrict,district.code_district,nom_district,COUNT(nom_op) nb_op");
		$this->db->join("op","district.code_district = op.code_district","LEFT");
		$this->db->group_by("op.code_district");
		$this->db->join("region","idregion = region_idregion");
		$this->db->order_by("nom_district","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result();
	}
	public function getPage($id = null){
		$this->db->join("region","idregion = region_idregion");
		$this->db->join("edl","edl_code_district = code_district");
		$this->db->order_by("nom_region","ASC");
		$this->db->or_where("iddistrict <",112);
		$this->db->or_where("iddistrict >",117);
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get_where($this->table);
		return $query->result();
	}
	
	public function getId($nom_district){
		$q = $this->db->get_where($this->table,array("LOWER(nom_district)"=>strtolower($nom_district)));
		if (!$q->num_rows()) return null;;
		$r = $q->row_array();
		return $r["code_district"];
	}
	public function getBy($champ,$value){
		return $q = $this->db->get_where($this->table,array($champ => $value));
	}
	public function getPrice($array){
		$this->db->join("prix","district.code_district = prix.code_district","LEFT");
		$this->db->order_by("nom_district","ASC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->select("iddistrict,district.code_district,nom_district,COUNT(nom_op) nb_op");
		$this->db->join("op","district.code_district = op.code_district","LEFT");
		$this->db->group_by("district.code_district");
		$this->db->join("region","region.idregion = district.region_idregion");
		$this->db->order_by("nom_district","ASC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere_offre($array){
		$this->db->select("iddistrict,district.code_district,nom_district,COUNT(idoffre_demande) nb_offre_demande");
		$this->db->join("offre_demande","offre_demande.code_district = district.code_district","LEFT");
		$this->db->group_by("district.code_district");
		$this->db->join("region","region.idregion = district.region_idregion");
		$this->db->order_by("nom_district","ASC");
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
}

