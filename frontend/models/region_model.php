<?php
class Region_model extends CI_Model{
	var $table = "region";
	var $key = "idregion";
	public function get($id = null){
		$this->db->order_by("nom_region","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getOp($id = null){
		$this->db->select("idregion,nom_region,COUNT(nom_op) nb_op");
		$this->db->join("op","region.idregion = op.region_idregion","LEFT");
		$this->db->group_by("idregion");
		$this->db->order_by("nom_region","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getPage(){
		$this->db->select("idregion,nom_region");
		$this->db->join("page","idregion = page_region_idregion");
		$this->db->group_by("nom_region");
		$this->db->order_by("nom_region","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}
		$query = $this->db->get_where($this->table,array("is_publish"=>1));
		return $query->result_array();
	}
	public function get_offre($id = null){
		$this->db->select("idregion,nom_region,COUNT(idoffre_demande) nb_offre_demande");
		$this->db->join("district","district.region_idregion = region.idregion","LEFT");
		$this->db->join("offre_demande","offre_demande.code_district = district.code_district","LEFT");
		$this->db->group_by("idregion");
		$this->db->order_by("nom_region","ASC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getId($nom_region){
		$q = $this->db->get_where($this->table,array("nom_region"=>$nom_region));
		if (!$q->num_rows()) return null;
		$r = $q->row_array();
		return $r["idregion"];
	}
	public function getBy($champ,$value){
		return $q = $this->db->get_where($this->table,array($champ => $value));
	}
	public function getWhere($array){
		$query = $this->db->get_where($this->table,$array);
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

