<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("produit_model");
		$this->load->model("cat_produit_model","categorie");
	}
	public function index()
	{
		$data["active"] = "sim";
		$data["user"] = $this->session->userdata("user");
		$data["div_title"] = "Produit";
		$data["cat_produits"] = $this->categorie->get();
		$this->template->add_js("assets/backend/js/sites/sim/produit.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'sim/vwProduit', $data);
		$this->template->render();
	}
	public function get($id=null) {
		$produit = $this->produit_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('produit' => $produit)));
	}

	public function get_all() {
		$produit = $this->produit_model->get();
		$user = $this->session->userdata("user");
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('produit' => $produit,"idgroup"=>$user["idgroup"])));
	}

	function add($idproduit = -1) {
		$data['produit'] = $this->produit_model->get($idproduit);
		$this->template->write_view('content', 'vw_addproduit', $data);
		$this->template->render();
	}

	function save() {
		$posts = $this->input->post();
		if($posts["idproduit"] <> "null") {
			$this->produit_model->update($posts,$posts["idproduit"]);
		}else {
			$this->produit_model->add($posts);
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("produit"=>$posts)));
	}

	function delete($idproduit) {
		$this->produit_model->delete($idproduit);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('idproduit' => $idproduit)));
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */