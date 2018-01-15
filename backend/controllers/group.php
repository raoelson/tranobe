<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {
	public function Group() {
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model('group_model');
		$this->load->model('keywords_model');
	}
	public function index()
	{
		$data["active"] = "user";
		$data["user"] = $this->session->userdata("user");
		$data['groups'] = $this->group_model->get();
		$data['keywords'] = $this->keywords_model->get();
		$this->template->add_js("assets/backend/js/sites/group.js?".mktime());
		$this->template->add_js("assets/backend/js/sites/keywords.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'vwGroup', $data);
		$this->template->render();
	}
	
	public function get($id = NULL) {
		$group = $this->group_model->get($id);
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('group' => $group)));
	}
	
	public function remove($id){
		$this->group_model->remove($id);
		redirect(base_url()."admin.php/group");
	}
	public function getByKeyword($idkeyword){
		$group = $this->group_model->getWhere(array("keyword_idkeyword"=>$idkeyword));
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('group' => $group)));
	}
	
	public function save() {
		$posts = $this->input->post();
		$success = 1;
		if ($posts["idgroup"] =="null"){
			if (!$this->check($posts["groupname"])) $success = $this->group_model->add($posts);
			else $success = 0;
			}
			else{
				$this->group_model->update($posts,$posts["idgroup"]);
				$success = $posts["idgroup"];
				}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('success' => $success)));
	}
	
	public function check($key) {
	$q =  $this->group_model->getBy("groupname",$key);
	return $q->num_rows();
	}
}
