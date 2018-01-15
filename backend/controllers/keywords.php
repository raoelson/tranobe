<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Cette classe gère la page d'accueil
 *@author: miarandr
*/
class Keywords extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("keywords_model");
	}
	/*
	 * Cette fonction affiche la page de démarrage
	*@param: none
	*@return: none
	*/
	public function index()
	{
		
	}
	public function get($id=NULL){
		$keywords = $this->keywords_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('keywords' => $keywords)));
	}
	public function save(){
		$posts =  $this->input->post();
		$posts["keyword"] = strtoupper($posts["keyword"]);
		$success = 1;
		if ($posts["idkeyword"] == "null"){
			if (!$this->check_keyword($posts["keyword"])) $success = $this->keywords_model->add($posts);
			else $success = 0;
		}
		else {
			$this->keywords_model->update($posts,$posts["idkeyword"]);
			$success = $posts["idkeyword"];
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('success' => $success)));
	}
	public function check_keyword($key){
		$q = $this->keywords_model->getBy("keyword",$key);
		return $q->num_rows();
	}
	public function remove($id){
		$this->keywords_model->remove($id);
		redirect(base_url()."admin.php/group/");
	}
}

/* End of file keywords.php */
/* Location: ./application/controllers/keywords.php */
