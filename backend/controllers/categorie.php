<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("categorie_model");
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
	}
	public function index()
	{
		$data["active"] = "article";
		$data["user"] = $this->session->userdata("user");
		$data["categories"] = $this->categorie_model->get();
		$this->template->add_js("assets/backend/js/sites/article_page/categorie.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/vwCategorie', $data);
		$this->template->render();
	}
	public function get($id = NULL){
		$categorie = $this->categorie_model->get($id);
		$user = $this->session->userdata("user");
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('categorie' => $categorie,'idgroup'=>$user["idgroup"])));
	}
	public function save(){
		$posts =  $this->input->post();
		$posts["nom_categorie"] = strtolower($posts["nom_categorie"]);
		$success = 1;
		if ($posts["idcategorie"] == "null"){
			if (!$this->check($posts["nom_categorie"])) $success = $this->categorie_model->add($posts);
			else $success = 0;
		}
		else {
			$this->categorie_model->update($posts,$posts["idcategorie"]);
			$success = $posts["idcategorie"];
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('success' => $success)));
	}
	public function check($key){
		$q = $this->categorie_model->getBy("nom_categorie",$key);
		return $q->num_rows();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */