<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class District extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("district_model");
	}
	public function index()
	{
		$data["districts"] = $this->district_model->get();
		$data["user"] = $this->session->userdata("user");
		$this->template->add_js("assets/backend/js/sites/district.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'vwDistrict', $data);
		$this->template->render();
	}
	public function get($id = NULL){
		$user = $this->session->userdata("user");
		$district = $this->district_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('district' => $district,'idgroup'=>$user["idgroup"])));
	}
	public function getByRegion($idregion){
		$district = $this->district_model->getWhere(array("region_idregion"=>$idregion));
		$user = $this->session->userdata("user");
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('district' => $district,'idgroup'=>$user["idgroup"])));
	}
	public function save(){
		$posts =  $this->input->post();
		$posts["nom_district"] = ucwords(strtolower($posts["nom_district"]));
		$success = 1;
		if ($posts["iddistrict"] == "null"){
			if (!$this->check($posts["nom_district"]) && (!$this->check_code($posts["code_district"]))) $success = $this->district_model->add($posts);
			else $success = 0;
		}
		else {
			$this->district_model->update($posts,$posts["iddistrict"]);
			$success = $posts["code_district"];
		}
		$posts["success"] = $success;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('district' => $posts)));
	}
	public function check($key){
		$q = $this->district_model->getBy("nom_district",$key);
		return $q->num_rows();
	}
	public function check_code($key){
		$q = $this->district_model->getBy("code_district",$key);
		return $q->num_rows();
	}
	public function delete($id) {
		$this->district_model->delete($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("success"=>$id)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */