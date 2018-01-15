<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edl extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("district_model");
		$this->load->model("edl_model","edl");
		$data["user"] = $this->session->userdata("user");
	}
	public function index($data = null)
	{
		$user = $this->session->userdata("user");
		$this->template->add_js("admin.php/media/get/".$user["iduser"]."?".mktime());
		$data["active"] = "article";
		$data["user"] = $user;
		$where = array("idcategorie >"=>2);
		$data["districts"] = $this->district_model->get();
		$this->template->add_js("assets/backend/js/sites/article_page/edl.js?".mktime());
		$this->template->add_js("assets/backend/js/lib/tiny_mce/jquery.tinymce.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/vw_edl', $data);
		$this->template->render();
	}
	public function get() {
		$posts = $this->input->post();
		$array = array("annee"=>$posts["annee"],"edl_code_district"=>$posts["edl_code_district"]);
		$edl = $this->edl->getWhere($array);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('edl' => $edl)));
	}
	
	function save() {
		$posts = $this->input->post();
		$array = array("annee"=>$posts["annee"],"edl_code_district"=>$posts["edl_code_district"]);
		if(count($this->edl->getWhere($array))) {
			$this->edl->update($posts,$array);
		}else {
			$this->edl->add($posts);
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("edl"=>$posts)));
	}

	function delete() {
		$post = $this->input->post();
		$success = $this->edl->delete($post);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("success"=>$success,"edl"=>array())));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */