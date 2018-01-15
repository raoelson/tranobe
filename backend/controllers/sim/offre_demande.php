<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offre_demande extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("offre_demande_model","offre_demande");
	}
	public function index()
	{
		$data["active"] = "sim";
		$data["user"] = $this->session->userdata("user");
		$data["div_title"] = "Offre et demande";
		$this->template->add_js("assets/backend/js/sites/sim/offre_demande.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'sim/vwOffre_demande', $data);
		$this->template->render();
	}
	public function get($id=null) {
		$offre_demande= $this->offre_demande->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('offre_demande' => $offre_demande)));
	}

	public function get_all() {
		$user = $this->session->userdata("user");
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		if ($key == "limit") $offre_demande = $this->offre_demande->getLimit(null,$val);
		else $offre_demande = $this->offre_demande->getWhere(array($key=>$val));
		$count =  record_count("offre_demande");
		$total_page = intval($count/NB_PER_PAGE);
		if ($total_page<$count/NB_PER_PAGE) $total_page++;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('offre_demande' => $offre_demande, "total_page"=>$total_page,"idgroup"=>$user["idgroup"])));
	}

	function add($idoffre_demande= -1) {
		$data['offre_demande'] = $this->offre_demande->get($idoffre_demande);
		$this->template->write_view('content', 'vw_Addoffre_demande', $data);
		$this->template->render();
	}

	function save() {
		$posts = $this->input->post();
		if($posts["idoffre_demande"] <> "null") {
			$this->offre_demande->update($posts,$posts["idoffre_demande"]);
		}else {
			$this->offre_demande->add($posts);
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("offre_demande"=>$posts)));
	}

	function remove($idoffre_demande) {
		$this->offre_demande->delete($idoffre_demande);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('idoffre_demande' => $idoffre_demande)));

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */