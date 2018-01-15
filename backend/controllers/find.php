<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
	}
	public function index()
	{
		$cond = "";
		$user = $this->session->userdata("user");
		$posts = $this->input->post();
		$controller = $posts["controller"];
		$fields = $this->db->list_fields($controller);
		foreach ($fields as $field)
		{
			if (strpos($field, "id")=== FALSE)
			if (strpos($field, "is")=== FALSE)
			$cond.= " ".$field." LIKE '%".$posts["s"]."%' OR";
		}
		if ($cond) $cond = substr($cond,0,strlen($cond) - 3);
		$sql = "SELECT * FROM $controller WHERE ".$cond;
		$query = $this->db->query($sql);
		$results = $query->result_array();
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("results" => $results,"idgroup"=>$user["idgroup"],"count"=>count($results),"controller"=>$controller,"query"=>$posts["s"],"fields"=>$fields)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */