<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Cette classe gère les messages entrant
	*@author: samsol	
	*/
class Outbox extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("user_model");
		$this->load->model("outbox_model");
	}
	/*
	* Cette fonction affiche les messages dans outbox
	*@param: none
	*@return: none 
	*/
	public function index()
	{
		$data["active"] = "sms";
		$data["user"] = $this->session->userdata("user");
		$this->template->write('title', "Boîte d'envoi");
		$this->template->add_js("assets/backend/js/sites/outbox.js?".mktime());
		$this->template->write_view('content', 'vwOutbox', $data);
		$this->template->render();
	}
	public function message(){
		$this->load->model("user_model");
		$data["user"] = $this->session->userdata("user");
		$data["users"] = $this->user_model->get();
		$data["active"] = "sms";
		$this->template->write('title', "Boîte d'envoi");
		$this->template->add_css("assets/backend/js/lib/select2/select2.css");
		$this->template->add_js("assets/backend/js/lib/select2/select2.js");
		$this->template->add_js("assets/backend/js/lib/select2/select2_locale_fr.js");
		$this->template->add_js("assets/backend/js/sites/message.js?".mktime());
		$this->template->write_view('content', 'vwNewMessage', $data);
		$this->template->render();
	}
	public function send_message(){
		$posts = $this->input->post();
		foreach($posts["dest"] as $dest){
			$outbox["number"] = $dest;
			$outbox["text"] = convert_accented_characters($posts["text"])."<www.sera2tantsaha.mg>";
			$this->outbox_model->add($outbox);
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
	public function message_group(){
		$data["user"] = $this->session->userdata("user");
		$this->load->model("group_model");
		$data["groups"] = $this->group_model->get();
		$data["active"] = "sms";
		$this->template->write('title', "Boîte d'envoi");
		$this->template->add_js("assets/backend/js/bootstrap-multiselect.js");
		$this->template->add_js("assets/backend/js/sites/message_group.js?".mktime());
		$this->template->write_view('content', 'vwGroupMessage', $data);
		$this->template->render();
	}
	public function send_message_group(){
		$posts = $this->input->post();
	    foreach($posts["dest"] as $dest) send_message_group($dest, $posts["text"]."<www.sera2tantsaha.mg>");
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
	public function action(){
		$posts = $this->input->post();
		switch ($posts['action']){
			case "active":$this->outbox_model->active_all($posts['ids']);break;
			case "inactive":$this->outbox_model->inactive_all($posts['ids']);break;
			case "delete":$this->outbox_model->delete_all($posts['ids']);break;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
	
	public function get($id = NULL){
		$outbox = $this->outbox_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('outbox' => $outbox)));
	}
	public function get_all() {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$date = $posts["date"];
		$array = array("DATE(insertdate)"=>$date);		
		if ($key == "limit") $outbox = $this->outbox_model->getLimit($array, $val);
		else $outbox = $this->outbox_model->getWhere(array($key=>$val));
		$count =  record_count("outbox",$array);
		$total_page = intval($count/NB_PER_PAGE);
		if ($total_page<$count/NB_PER_PAGE) $total_page++;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('outbox' => $outbox, "total_page"=>$total_page)));
	}
	public function remove($id){
		$this->outbox_model->remove($id);
		redirect(base_url()."admin.php/outbox");
	}
}