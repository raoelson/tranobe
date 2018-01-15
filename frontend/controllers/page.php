<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->lang->load("fr");
		$this->load->model("categorie_model","categories");
		$this->load->model("page_model","pages");
		$this->load->model("article_model","articles");
		$this->load->model("district_model","districts");
		$this->load->model("region_model","regions");
	}
	public function single($nom_categorie,$idpage){
		if (is_int($idpage))
		$page = $this->pages->get($idpage);
		else 
		$page = $this->pages->getBy(array("alias"=>$idpage));
		if (!$page){
			redirect("/");
			return;
		}
		/*Breadcrumb*/
		$niveau1 = $niveau2 = array();
		$niveau1["text"] = $page["alias_categorie"];
		$niveau1["link"] = base_url().$page["nom_categorie"];
		$niveau2["text"] = $page["title"];
		$data["niveau1"] = $niveau1;
		$data["niveau2"] = $niveau2;
		
		$this->template->write('title',$page["title"]." | Seraseran'ny tantsaha");
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$data["page"] = $page;
		$data["is_page"] = 1;
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('content', 'pages/vwPage', $data);
		$this->template->write_view('footer', 'partials/footer', $data);
		$this->template->write_view('sidebar', 'partials/sidebar', $data);
		
		$this->template->render();
	}
	public function changelang($lang){
		$this->session->set_userdata("lang",$lang);
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */