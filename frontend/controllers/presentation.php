<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presentation extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->lang->load("fr");
		$this->load->model("categorie_model","categories");
		$this->load->model("page_model","pages");
		$this->load->model("article_model","articles");
		$this->load->model("district_model","districts");
		$this->load->model("region_model","regions");
	}
	public function index()
	{
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$this->template->write('title',"");
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('sidebar', 'partials/sidebar', $data);
		$this->template->write_view('footer','partials/footer',$data);
		$this->template->write_view('content', 'articles/vwHome', $data);
		$this->template->render();
	}
	public function csa($link_district)
	{
		if (strpos($link_district,"-") === false) redirect(base_url()); 
		$pos = strpos($link_district,"-");
		$iddistrict = substr($link_district,0,$pos);
		$nom_district = substr($link_district,$pos+1,strlen($link_district));
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$page = $this->pages->getWhere(array("page_code_district"=>$iddistrict,"categorie_idcategorie"=>4));
		if (!count($page)) redirect(base_url());
		$data["page"] = $page;
		$this->template->write('title',"Présentation :: ".$page["title"]);
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('sidebar', 'partials/sidebar', $data);
		$this->template->write_view('footer','partials/footer',$data);
		$this->template->write_view('content', 'presentations/vwCsa', $data);
		$this->template->render();
	}
	public function tt($link_region){
		if ($link_region == "8-tanobe-ny-tantsaha-nationale"){
			$nom_region = "Tranoben'ny Tantsaha Nationale";
			$page = $this->pages->get(8);	
		}
		else {
			$link_region = urldecode($link_region);
			if (strpos($link_region,"-") === false) redirect(base_url()); 
			$pos = strpos($link_region,"-");
			$idregion = substr($link_region,0,$pos);
			$nom_region = substr($link_region,$pos+1,strlen($link_region));
			$page = $this->pages->getWhere(array("page_region_idregion"=>$idregion,"categorie_idcategorie"=>5));
		}
		if (!count($page)) redirect(base_url());
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$data["page"] = $page;
		$data["title"] = $nom_region;
		$data["keywords"] = $page["keywords"];
		$this->template->write('title',"Présentation :: ".$nom_region);
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('sidebar', 'partials/sidebar', $data);
		$this->template->write_view('footer','partials/footer',$data);
		$this->template->write_view('content', 'presentations/vwTt', $data);
		$this->template->render();
	}
}

/* End of file presentation.php */
/* Location: ./application/controllers/presentation.php */