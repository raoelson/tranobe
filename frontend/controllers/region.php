<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("region_model","regions");
		$this->load->model("district_model","districts");
	}
	public function get($id = NULL){
		$regions = $this->regions->getOp($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('regions' => $regions)));
	}
	public function getList(){
		$regions = $this->regions->get();
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($regions));
	}
	public function get_offre($id = NULL){
		$regions = $this->regions->get_offre($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('regions' => $regions)));
	}
	public function get_district($idregion,$table="op"){
		if ($table == "op")
		$districts = $this->districts->getWhere(array("district.region_idregion"=>$idregion));
		else
		$districts = $this->districts->getWhere_offre(array("district.region_idregion"=>$idregion));
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('districts' => $districts)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */