<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actualite extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("actualite_model");
		$this->load->model("district_model",'district');
		$this->load->model("user_model",'user');
	}
	public function index(){
		$actus = $this->actualite_model->getWhere(array("actualite.is_publish"=>1));
		$this->output
		->set_content_type('application/json')
	     ->set_output(json_encode($actus));
		
	}
	public function add(){
		$district=$_POST['district'];
	  	$user=$_POST['user'];
	  	$actu["body"]=$_POST['description'];
		
		$actu["code_district"] = $this->district->getId($district);
		$user = $this->user->get_user_by_login($user);
		$actu['user_iduser'] = $user["iduser"];
		$this->actualite_model->add($actu);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($actu));
	}
	public function find($date_deb,$date_fin){
		$where = array("DATE(`date_actu`) <="=>$date_fin,"DATE(`date_actu`) >="=>$date_deb); 
		$actus = $this->actualite_model->getWhere($where);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($actus));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */