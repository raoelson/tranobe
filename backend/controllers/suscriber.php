<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suscriber extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("suscriber_model");
	}
	public function index()
	{
		$data["active"] = "user";
		$data["user"] = $this->session->userdata("user");
		$data["div_title"] = "Abonnés";
		$data["suscribers"] = $this->suscriber_model->get();
		$this->template->add_js("assets/backend/js/sites/user/suscriber.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'user/vwSuscriber', $data);
		$this->template->render();
	}
	public function get($id=null) {
		$suscriber = $this->suscriber_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('suscriber' => $suscriber)));
	}
	function add($idsuscriber = -1) {
		$data['suscriber'] = $this->suscriber_model->get($idsuscriber);
		$this->template->write_view('content', 'vw_addsuscriber', $data);
		$this->template->render();
	}

	function save() {
		$message = "";
		$posts = $this->input->post();
		if (!empty($posts["mail"])) :
			if (!valid_email($posts["mail"])) $message = "Vérifier votre adresse email!";
			if ($this->verify(array("mail"=>$posts["mail"]))) $message = "Email déjà dans la liste de diffusion!";
			if ($message)
			{
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array("message"=>$message)));
				return;
			} 
		endif;
		if ($posts["idsuscriber"] == "null") $posts["idsuscriber"] = $this->suscriber_model->add($posts);
		else $this->suscriber_model->update($posts,$posts["idsuscriber"]);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("suscriber"=>$posts)));
	}
	function remove($idsuscriber) {
		$this->suscriber_model->delete($idsuscriber);
		redirect(base_url() ."index.php/suscriber");
	}
	function verify($array){
		$q = $this->suscriber_model->getWhere($array);
		if (count($q)) return true;
		else return false;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */