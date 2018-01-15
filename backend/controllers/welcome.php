<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("article_model","articles");
	}
	public function index()
	{
		$data["active"] = "home";
		$data["articles"] = $this->articles->getLast(3);
		$data["user"] = $this->session->userdata("user");
		$this->template->add_js("assets/backend/js/sites/dashboard.js");
		$this->template->add_js("assets/backend/js/jquery.flot.js");
		$this->template->add_js("assets/backend/js/jquery.flot.pie.js");
		$this->template->add_js("assets/backend/js/jquery.flot.orderBars.js");
		$this->template->add_js("assets/backend/js/jquery.flot.resize.js");
		$this->template->add_js("assets/backend/js/excanvas.min.js");
		$this->template->add_js("assets/backend/js/charts/area.js");
		$this->template->add_js("assets/backend/js/charts/donut.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'dashboard', $data);
		$this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */