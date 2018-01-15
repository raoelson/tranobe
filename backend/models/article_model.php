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
	public function getLimit($array,$val){
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		$this->db->limit(NB_PER_PAGE,($val-1) * NB_PER_PAGE);
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
	public function getLast($limit = 3){
		$this->db->select("body,title,idarticle,alias_categorie, date_publish");
		$this->db->join("user","user_iduser = iduser");
		$this->db->join("categorie","categorie_idcategorie = idcategorie");
		$this->db->order_by($this->key,"DESC");
		$this->db->limit($limit,0);
		$query = $this->db->get_where($this->table,array("is_publish"=>1));
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
		$this->db->set("is_publish", 1);
		$this->db->where_in($this->key, $array);
		$this->db->update($this->table);
	}
	public function inactive_all($array){
		$this->db->set("is_publish", 0);
		$this->db->where_in($this->key, $array);
		$this->db->update($this->table);
	}
	public function delete_all($array){
		$this->db->where_in($this->key, $array);
		$this->db->delete($this->table);
	}
}

