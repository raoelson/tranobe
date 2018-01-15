<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Route extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("route_model","routes");
	}
	public function index()
	{
		$data["user"] = $this->session->userdata("user");
		$data["active"] = "options";
		$data["div_title"] = "route";
		$this->template->add_js("assets/backend/js/sites/options/route.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'options/vwRoute', $data);
		$this->template->render();
	}
	public function get($id=null) {
		$route = $this->routes->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('route' => $route)));
	}

	public function get_all() {
		$route = $this->routes->get();
		$user = $this->session->userdata("user");
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('route' => $route,"idgroup"=>$user["idgroup"])));
	}

	function add($idroute = -1) {
		$data['route'] = $this->routes->get($idroute);
		$this->template->write_view('content', 'vw_addroute', $data);
		$this->template->render();
	}

	function save() {
		$posts = $this->input->post();
		if($posts["idroute"] <> "null") {
			$this->routes->update($posts,$posts["idroute"]);
		}else {
			$this->routes->add($posts);
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("route"=>$posts)));
	}

	function delete($idroute) {
		$this->routes->delete($idroute);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('idroute' => $idroute)));

	}
	public function rewrite(){
		$this->load->helper('file');
		$this->load->model('region_model','regions');
		$data = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n";
		$data.="
		/*
		 * ROUTAGE DE PAGE
		 * **/\n\n";
		$routes = $this->routes->get();
		$route_file = FCPATH."/frontend/config/routes.php";
		foreach($routes as $route) $data.='$route["'.$route["url_src"].'"] = "'.$route["url_dst"].'";'."\n";
		unset($routes);
		$data.="
		/*
		 * ROUTAGE DES REGIONS
		 */\n\n";
		$regions = $this->regions->get();
		foreach ($regions as $region){
			$data.='$route["'.url_title(strtolower($region->nom_region)).'"] = "article/getBy/idregion/'.$region->idregion.'";'."\n";
			$data.='$route["'.url_title(strtolower($region->nom_region)).'/(:num)"] = "article/getBy/idregion/'.$region->idregion.'/$1";'."\n";
		} 
		$data.="/* End of file routes.php ; Location: ./application/config/routes.php */";
		if (!write_file($route_file, $data,"w")){
			echo "Unable to write the file";
		}
		else redirect(site_url("options/route"));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */