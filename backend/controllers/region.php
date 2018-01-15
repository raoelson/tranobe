<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("region_model");
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
	}
	public function index()
	{
		$data["active"] = "divers";
		$data["user"] = $this->session->userdata("user");
		$data["regions"] = $this->region_model->get();
		$this->template->add_js("assets/backend/js/sites/region.js");
		$this->template->add_js("assets/backend/js/sites/district.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'vwRegion', $data);
		$this->template->render();
	}
	public function get($id = NULL){
		$region = $this->region_model->get($id);
		$user = $this->session->userdata("user");
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('region' => $region,'idgroup'=>$user["idgroup"])));
	}
	public function save(){
		$posts =  $this->input->post();
		$posts["nom_region"] = ucwords(strtolower($posts["nom_region"]));
		$success = 1;
		if ($posts["idregion"] == "null"){
			if (!$this->check($posts["nom_region"])) $success = $this->region_model->add($posts);
			else $success = 0;
		}
		else {
			$this->region_model->update($posts,$posts["idregion"]);
			$success = $posts["idregion"];
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('success' => $success)));
	}
	public function check($key){
		$q = $this->region_model->getBy("nom_region",$key);
		return $q->num_rows();
	}
	public function region_route(){
		$regions = $this->region_model->get();
		foreach ($regions as $region){
			echo "route['".human_url($region->nom_region)."'] = 'article/getBy/region/".$region->idregion."';<br>";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */