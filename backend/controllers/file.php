<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
	}
	public function index()
	{
		$data["active"] = "file";
		$data["user"] = $this->session->userdata("user");
		$this->template->add_css("assets/backend/js/lib/elfinder/css/elfinder.min.css");
		$this->template->add_css("assets/backend/js/lib/elfinder/css/theme.css");
		$this->template->add_js("assets/backend/js/lib/elfinder/js/elfinder.min.js");
		$this->template->add_js("assets/backend/js/lib/elfinder/js/i18n/elfinder.fr.js");
		$this->template->add_js("assets/backend/js/sites/file.js");
		$this->template->write('title', "File manager - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'filemanager', $data);
		$this->template->render();
	}
	public function connector(){
		$user = $this->session->userdata("user");
		$this->load->helper('path');
		$opts = array('locale' => '',
		'roots'  => array(
		array(
            'driver' => 'LocalFileSystem',
            'path'   => set_realpath('assets/medias/'),
            'URL'    => base_url().'assets/medias/'
            )
          )
        );
        $this->load->library("elfinder_lib",$opts,"elf");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */