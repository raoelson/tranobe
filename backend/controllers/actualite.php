<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Actualite extends CI_Controller {
	public function actualite() {
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model('actualite_model','actus');
	}
	public function index()
	{
		$data["active"] = "user";
		$data["user"] = $this->session->userdata("user");
		$data['actualites'] = $this->actus->get();
		$this->template->add_js("assets/backend/js/sites/actualite.js?".mktime());
		$this->template->write('title', "Actualite - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'vwActualite', $data);
		$this->template->render();
	}
	
	public function get($id = NULL) {
		$actualite = $this->actus->get($id);
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('actualite' => $actualite)));
	}
	
	public function get_all() {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$date = $posts["date"];
		$array = array("DATE(date_actu)"=>$date);
		if ($key == "limit") $actualite = $this->actus->getLimit($array, $val);
		else $actualite = $this->actus->getWhere(array($key=>$val));
		$count =  record_count("actualite",$array);
		$total_page = intval($count/NB_PER_PAGE);
		if ($total_page<$count/NB_PER_PAGE) $total_page++;
	
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('actualite' => $actualite, "total_page"=>$total_page)));
	}
	public function remove($id){
		$this->actus->remove($id);
		redirect(base_url()."admin.php/actualite");
	}
	
	public function save() {
		$posts = $this->input->post();
		$success = 1;
		if ($posts["idactu"] =="null"){
			$success = $this->actus->add($posts);
		}
		else{
			$this->actus->update($posts,$posts["idactu"]);
			$success = $posts["idactu"];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('success' => $success)));
	}	
}
