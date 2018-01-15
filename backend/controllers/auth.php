<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("userhasgroup_model");
		$this->load->model("group_model","group");
	}
	public function login()
	{
		$this->load->view("auth/vwLogin");	
	}
	function signup(){
		$this->load->model("district_model");
		$data["groups"] = $this->group->getWhere(array("idgroup >"=>1));
		$data["districts"] = $this->district_model->get();
		$this->load->view("auth/vwSignup",$data);
	}
	public function verify(){
		$posts = $this->input->post();
		$message = $this->cic_auth->login($posts["login"],$posts["password"]);
		if (isset($posts["from-front"])) redirect(base_url()."admin.php");
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('message' => $message)));
	}
	public function create(){
		$erreurs = array();
		$posts = $this->input->post();
		if ($posts["password"]<>$posts["confirm_password"]) $erreurs[] = "Mot de passe ne correspond pas!";
		unset($posts["confirm_password"]);
		if ($this->exist("login", $posts["login"])) $erreurs[] = "Login déjà existant essayer un autre!";
		if ($this->exist("email", $posts["email"])) $erreurs[] = "Email déjà enregistré sur le site!";
		if ($this->exist("numtel", $posts["numtel"])) $erreurs[] = "Le numéro télephone est déjà utilisé!";
		
		if ($erreurs){
			$data["erreurs"] = $erreurs;
			$this->load->view("auth/vwSignup",$data);
			return;
		}
		$posts["username"] = $posts["login"];
		$posts["password"] = md5($posts["password"]);
		$group_idgroup = $posts["group_idgroup"];
		unset($posts["group_idgroup"]); 
		$posts["iduser"] = $this->user_model->add($posts);
		
		/*MODIFICATION DE L'APPARTENANCE AU GROUPE */
		$line["user_iduser"] = $posts["iduser"];
		$line["group_idgroup"] = $group_idgroup;
		$this->userhasgroup_model->add($line);
		$data["success"] = 1;
		$this->load->view("auth/vwSignup",$data);
	}
	public function create_androide(){
		$this->load->model("district_model");
		$erreurs = array();
		$posts = $this->input->post();
	    
		if ($this->exist("login", $posts["login"])) $erreurs[] = "Login déjà existant essayer un autre!";
		if ($this->exist("email", $posts["email"])) $erreurs[] = "Email déjà enregistré sur le site!";
		if ($this->exist("numtel", $posts["numtel"])) $erreurs[] = "Le numéro télephone est déjà utilisé!";
		
		if ($erreurs){
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($erreur));
			return;
		}
		$posts["code_district"] = $this->district_model->getId($posts["district"]);
		unset($posts["district"]);
		$posts["username"] = $posts["login"];
		$posts["password"] = md5($posts["password"]);
		
		$group_idgroup = $this->group->getId($posts["groupe"]);
		unset($posts["groupe"]); 
		$posts["iduser"] = $this->user_model->add($posts);
		
		/*MODIFICATION DE L'APPARTENANCE AU GROUPE */
		$line["user_iduser"] = $posts["iduser"];
		$line["group_idgroup"] = $group_idgroup;
		$this->userhasgroup_model->add($line);
		$data["success"] = 1;
		
	}
	public function exist($item,$value){
		$line[$item] = $value;
		$user = $this->user_model->getWhere($line);
		return count($user);
	}
	public function logout(){
		$this->cic_auth->logout();
		redirect("/auth/login");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */