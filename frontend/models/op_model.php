<?php
class Op_model extends CI_Model{
	var $table = "op";
	var $key = "idop";
	public function get($id = null){
		$this->db->order_by("idop","DESC");
		$this->db->join("region","region_idregion = idregion");
		$this->db->join("district","district.code_district = op.code_district");
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
		$this->db->order_by($this->key,"DESC");
		$this->db->join("region","op.region_idregion = region.idregion");
		$this->db->join("district","district.code_district = op.code_district");
		$query = $this->db->get_where($this->table,$array);
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function getFind($sql,$nb_per_page = NB_PER_PAGE, $num_page=1){
		$query = $this->db->query("
			$sql
			LIMIT ".(($num_page-1)*$nb_per_page).",$nb_per_page	
		");
		return $query->result_array();
	}
	public function getLimit($val,$nb_per_page = NB_PER_PAGE){
		$this->db->order_by($this->key,"DESC");
		$this->db->join("region","region_idregion = idregion");
		$this->db->join("district","district.code_district = op.code_district");
		$this->db->limit($nb_per_page,($val-1) * $nb_per_page);
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

