<?php
class Article_model extends CI_Model{
	var $table = "article";
	var $key = "idarticle";
	public function get($id = null){
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		if (!empty($id)) {
			$query = $this->db->get_where($this->table,array($this->key=>$id));
			return $query->row_array();
		}		
		$query = $this->db->get($this->table);		
		return $query->result_array();
	}
	public function getLimit($array,$val,$nb_per_page = NB_PER_PAGE){
		$this->db->order_by($this->key,"DESC");
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("district","user.code_district = district.code_district");
		$this->db->join("region","idregion = district.region_idregion");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->limit($nb_per_page,($val-1) * $nb_per_page);
		$query = $this->db->get_where($this->table,$array);
		return $query->result_array();
	}
	public function getWhere($array){
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		$query = $this->db->get_where($this->table,$array);
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
}

