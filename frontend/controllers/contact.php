<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$data = null;
		$this->template->write('title', "Tranoben'ny tantsaha | Nous contacter");
		$this->template->add_js("assets/js/keywords.js");
		$this->template->write_view('content', 'vwContact', $data);
		$this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */