<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("user_model");
		$this->load->model("district_model");
		$this->load->model("group_model");
		$this->load->model("userhasgroup_model");
	}
	public function index($data = null)
	{
		$data["active"] = "user";
		$data["user"] = $this->session->userdata("user");
		$data["groups"] = $this->group_model->get();
		$data['count'] = record_count("user");
		if (empty($data["div_title"])) $data["div_title"]= "utilisateurs";
		$data["districts"] = $this->district_model->get();
		$this->template->add_js("assets/backend/js/sites/user/user.js?".mktime());
		$this->template->write('title', "Gestion des utilisateurs - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'user/vwUser', $data);
		$this->template->render();
	}

	public function to_validate(){
		$data["div_title"] = "Nouvelles inscriptions à valider";
		$data["where"] = array("is_active"=>0);
		$this->index($data);
	}
	public function get($id=null) {
		$user = $this->user_model->get($id);
		$usergroups = $this->userhasgroup_model->get(array("user_iduser"=>$id));
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('user' => $user,'usergroups'=>$usergroups)));
	}

	public function get_all($key=null,$val=null) {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$total_page = 0;
		if ($key == "limit") {
			$user = $this->user_model->getLimit($val);
			$count =  record_count("user");
			$total_page = intval($count/NB_PER_PAGE);
			if ($total_page<$count/NB_PER_PAGE) $total_page++;
		}
		else $user = $this->user_model->getWhere(array($key=>$val));

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('user' => $user, "total_page"=>$total_page,"key"=>$key)));
	}

	function add($iduser = -1) {
		$data['user'] = $this->user_model->get($iduser);
		$this->template->write_view('content', 'vw_adduser', $data);
		$this->template->render();
	}
	/**
	 *  Enregistrement des utilisateurs
	 */
	function save() {
		$posts = $this->input->post();
		//print_r($posts);
		if (isset($posts["password"])){
			if ($posts["password"]<>"") $posts["password"] = md5($posts["password"]);
			if ($posts["password"] == "") unset($posts["password"]);
			unset($posts["password-confirm"]);
			$groups = $posts["groups"];
			unset( $posts["groups"]);
			if (($posts["iduser"]=="null") && check_user(array("numtel"=>$posts["numtel"])))  {
				$posts["success"] = 0;
				$posts["erreur"] = "Numéro déjà sur la liste";
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array("user"=>$posts)));
				return;
			}
		}
		if($posts["iduser"] <> "null") {
			$this->user_model->update($posts,$posts["iduser"]);
		}else {
			$posts["iduser"] = $this->user_model->add($posts);
		}

		/*MODIFICATION DE L'APPARTENANCE AU GROUPE */
		if (isset($groups)){
			$this->userhasgroup_model->remove(array("user_iduser"=>$posts["iduser"]));
			foreach($groups as $group){
				$line["user_iduser"] = $posts["iduser"];
				$line["group_idgroup"] = $group;
				$this->userhasgroup_model->add($line);
			}
		}

		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("user"=>$posts)));
	}
	/***
	 * Actions groupés sur un ensemble d'user
	 */
	public function action(){
		$posts = $this->input->post();
		switch ($posts['action']){
			case "active":$this->user_model->active_all($posts['ids']);break;
			case "inactive":$this->user_model->inactive_all($posts['ids']);break;
			case "delete":$this->user_model->delete_all($posts['ids']);break;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
	/****
	 * Gestion des profiles 
	 */
	public function profile(){
		$data["active"] = "user";
		$data["user"] = $this->session->userdata("user");
		$data["groups"] = $this->group_model->get();
		$data['count'] = record_count("user");
		if (empty($data["div_title"])) $data["div_title"]= "utilisateurs";
		$data["districts"] = $this->district_model->get();
		$this->template->add_js("assets/backend/js/sites/user/profile.js?".mktime());
		$this->template->write('title', "Gestion des utilisateurs - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'user/vwProfile', $data);
		$this->template->render();
	}
	function profile_save() {
		$posts = $this->input->post();
		//print_r($posts);
		if (isset($posts["password"])){
			if ($posts["password"]<>"") $posts["password"] = md5($posts["password"]);
			if ($posts["password"] == "") unset($posts["password"]);
			unset($posts["password-confirm"]);
		}
		$this->user_model->update($posts,$posts["iduser"]);
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("user"=>$posts)));
	}
	public function delete($iduser) {
		$success = $this->user_model->delete($iduser);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("success"=>$success,"iduser"=>$iduser)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */