<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Cette classe gère les messages entrant
	*@author: samsol	
	*/
class Inbox extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("inbox_model");
		$this->load->model("user_model");
	}
	/*
	* Cette fonction affiche les messages dans inbox
	*@param: none
	*@return: none 
	*/
	public function index()
	{
		$data["active"] = "sms";
		$data["user"] = $this->session->userdata("user");
		$data["inboxs"] = $this->inbox_model->get();
		$data['count'] = record_count("inbox");
		$this->template->write('title', 'Boîte de réception ');
		$this->template->add_js("assets/backend/js/sites/inbox.js");
		$this->template->write_view('content', 'vwInbox', $data);
		$this->template->render();
	}
	public function action(){
		$posts = $this->input->post();
		switch ($posts['action']){
			case "active":$this->inbox_model->active_all($posts['ids']);break;
			case "inactive":$this->inbox_model->inactive_all($posts['ids']);break;
			case "delete":$this->inbox_model->delete_all($posts['ids']);break;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
	
	public function get($id = NULL){
		$inbox = $this->inbox_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('inbox' => $inbox)));
	}
	public function get_all() {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$date = $posts["date"];
		$array = array("DATE(insertdate)"=>$date);		
		if ($key == "limit") $inbox = $this->inbox_model->getLimit($array, $val);
		else $inbox = $this->inbox_model->getWhere(array($key=>$val));
		$count =  record_count("inbox",$array);
		$total_page = intval($count/NB_PER_PAGE);
		if ($total_page<$count/NB_PER_PAGE) $total_page++;
		
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('inbox' => $inbox, "total_page"=>$total_page)));
	}
	public function remove($id){
		$this->inbox_model->remove($id);
		redirect(base_url()."admin.php/inbox");
	}
}