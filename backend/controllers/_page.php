<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("page_model");
		$this->load->model("categorie_model");
		$data["user"] = $this->session->userdata("user");
	}
	public function index($data = null)
	{
		$data["active"] = "article";
		$data["user"] = $this->session->userdata("user");
		$this->template->add_js("assets/backend/js/sites/article_page/page.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/vwPage', $data);
		$this->template->render();
	}
	public function to_publish(){
		$data["div_title"] = "Page à publier";
		$data["where"] = array("is_publish"=>0);
		$this->index($data);
	}
	public function get($id = null) {
		$page = $this->page_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('page' => $page)));
	}
	public function getWhere($key=null,$val=null) {
		if(!empty($key)) $page = $this->page_model->getWhere(array($key=>$val));
		else $page = $this->page_model->get();
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('page' => $page)));
	}
	
	public function edit($id = null){
		$data["active"] = "article";
		$data["idpage"] = $id;
		$user = $this->session->userdata("user");
		$data["user"] = $user;
		$where = array("idcategorie >"=>2);
		$data["categories"] = $this->categorie_model->getWhere($where);
		$this->template->add_js("assets/backend/js/sites/article_page/editpage.js?".mktime());
		$this->template->add_js("admin.php/media/get/".$user["iduser"]."?".mktime());
		$this->template->add_js("assets/backend/js/lib/tiny_mce/jquery.tinymce.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/editPage', $data);
		$this->template->render();
	}
	public function get_all() {
		$page = $this->page_model->get();
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('page' => $page)));
	}

	function add($idpage = -1) {
		$data['page'] = $this->page_model->get($idpage);
		$this->template->write_view('content', 'vw_addpage', $data);
		$this->template->render();
	}

	function save() {
		$posts = $this->input->post();
		$idartcle = $posts["idpage"];
		// Lors d'un ajout, l'éditeur est l'utilisateur courant.
		if ($idartcle == "null") $posts["user_iduser"] = 1;
		if($idartcle <> "null") {
			$this->page_model->update($posts,$posts["idpage"]);
		}else {
			$this->page_model->add($posts);
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("page"=>$posts)));
	}

	function delete($idpage) {
		$success = $this->page_model->delete($idpage);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("success"=>$success,"idpage"=>$idpage)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */