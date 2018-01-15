<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
	}
	public function get($id=null) {
		$user = $this->user_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($user));
	}
	public function find($nom_district) {
		$user = $this->user_model->getWhere(array("nom_district"=>$nom_district));
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($user));
	}
	public function verify_exist(){
		$username = $_POST['username'];
		$user = $this->user_model->getWhere(array("login"=>$username));
		if (!count($user)) echo "No Such User Found"; 
 		else  echo "User Found"; 
	}
	public function verify(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = $this->user_model->getWhere(array("login"=>$username,"password"=>md5($password)));
		if (!count($user)) echo "No Such User Found"; 
 		else  echo "User Found"; 
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */