<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("page_model");
		$this->load->model("categorie_model");
		$this->load->model("district_model");
		$this->load->model("region_model");
		$data["user"] = $this->session->userdata("user");
	}
	public function index($data = null)
	{
		$data["active"] = "article";
		$data["user"] = $this->session->userdata("user");
		if (empty($data["div_title"])) $data["div_title"] = $data["user"]["idgroup"] == 1 ?"Gestion des pages":"Mes pages";
		$this->template->add_js("assets/backend/js/sites/article_page/page.js?".mktime());
		$this->template->write('title', "Gestion des pages - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/vwPage', $data);
		$this->template->render();
	}
	public function to_publish(){
		$user = $this->session->userdata("user");
		if ($user["idgroup"]<>1) redirect(base_url()."admin.php/page");
		$data["div_title"] = "page à publier";
		$data["where"] = array("is_publish"=>0);
		$this->index($data);
	}
	public function get($id = null) {
		$page = $this->page_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('page' => $page)));
	}
	public function get_all() {
		$user = $this->session->userdata("user");
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		if ($user["idgroup"] <>1) $array = array("user_iduser"=>$user["user_iduser"]);
		else $array = null;
		if ($key == "limit") $page = $this->page_model->getLimit($array, $val);
		else $page = $this->page_model->getWhere(array($key=>$val));
		$count =  record_count("page",$array);
		$total_page = intval($count/NB_PER_PAGE);
		if ($total_page<$count/NB_PER_PAGE) $total_page++;

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('page' => $page, "total_page"=>$total_page,"idgroup"=>$user["idgroup"])));
	}
	public function getWhere($key=null,$val=null) {
		if(!empty($key)) $page = $this->page_model->getWhere(array($key=>$val));
		else $page = $this->page_model->get();
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('page' => $page)));
	}

	public function edit($id = null){
		$user = $this->session->userdata("user");
		if ($id) {
			$page = $this->page_model->get($id);
			$this->template->add_js("admin.php/media/get/".$page["user_iduser"]."?".mktime());
		}
		else $this->template->add_js("admin.php/media/get/".$user["iduser"]."?".mktime());
		$data["active"] = "article";
		$data["idpage"] = $id;
		
		$data["user"] = $user;
		$where = array("idcategorie >"=>2);
		$data["categories"] = $this->categorie_model->getWhere($where);
		$data["districts"] = $this->district_model->get();
		$data["regions"] = $this->region_model->get();
		$this->template->add_js("assets/backend/js/sites/article_page/editpage.js?".mktime());
		$this->template->add_js("assets/backend/js/lib/tiny_mce/jquery.tinymce.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/editPage', $data);
		$this->template->render();
	}
	function save() {
		$posts = $this->input->post();
		$idpage = $posts["idpage"];
		if($idpage <> "null") {
			$this->page_model->update($posts,$posts["idpage"]);
		}else {
			$posts["idpage"] = $this->page_model->add($posts);
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
	public function action(){
		$posts = $this->input->post();
		switch ($posts['action']){
			case "active":$this->page_model->active_all($posts['ids']);break;
			case "inactive":$this->page_model->inactive_all($posts['ids']);break;
			case "delete":$this->page_model->delete_all($posts['ids']);break;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */