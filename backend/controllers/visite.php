<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visite extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("visite_model","visites");
	}
	public function get(){
		$date = date("Y-m-d");
		$debut = date_debut($date);
		$fin = date_fin($date);
		$visitors = $dates = array();
		$totalSemaine = 0;
		for ($d = $debut;$d<=$fin;$d = tomorrow($d)){
			$nb = $this->visites->getCount($d);
			$visitors[] = $nb;
			$dates[] = $d;
			$totalSemaine+=$nb;
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('visitors' => $visitors,'dates'=>$dates, 'total'=>record_count("visite"),'totalSemaine'=>$totalSemaine)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */