<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->lang->load("fr");
		$this->load->model("categorie_model","categories");
		$this->load->model("page_model","pages");
		$this->load->model("article_model","articles");
		$this->load->model("district_model","districts");
		$this->load->model("region_model","regions");
	}
	public function index($data = null)
	{
		if (empty($data)){
			$array = array("is_publish"=>1);
			$data["actus"] = $this->articles->getLimit($array,1);
			$data["title"] =  "Réseau des producteurs, offre, demande, producteur, madagascar";
			$this->template->write_view('slider', 'partials/slider', $data);
			$config['base_url'] = base_url()."article/page";
			$config['total_rows'] = record_count("article",array("is_publish"=>1));
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			$data["pages"] = $this->pagination->create_links();
		}
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$this->template->write('title',$data["title"]);
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('content', 'articles/vwHome', $data);
		$this->template->write_view('sidebar', 'partials/sidebar', $data);
		$this->template->write_view('footer','partials/footer',$data);
		$this->template->render();
	}
	public function page($page = 1){
		$array = array("is_publish"=>1);
		$data["actus"] = $this->articles->getLimit($array,$page);
		$data["title"] =  "Réseau des producteurs, offre, demande, producteur, madagascar";
		$this->template->write_view('slider', 'partials/slider', $data);
		$config['base_url'] = base_url()."article/page";
		$config['total_rows'] = record_count("article",array("is_publish"=>1));
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data["pages"] = $this->pagination->create_links();
		$this->index($data);
	}
	public function single($idcategorie,$idarticle){
		$article = $this->articles->get($idarticle);
		if (!$article){
			redirect("/");
			return;
		}
		/*Breadcrumb*/
		$niveau1 = $niveau2 = array();
		$niveau1["text"] = $article["alias_categorie"];
		$niveau1["link"] = base_url().$article["nom_categorie"];
		$niveau2["text"] = $article["title"];
		$data["niveau1"] = $niveau1;
		$data["niveau2"] = $niveau2;

		$this->template->write('title',$article["title"]." | Seraseran'ny tantsaha");
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$data["article"] = $article;
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('content', 'articles/vwSingle', $data);
		$this->template->write_view('sidebar', 'partials/sidebar', $data);
		$this->template->write_view('footer','partials/footer',$data);
		$this->template->render();
	}
	/*
	 * Article par région
	 */
	public function getBy($item,$val,$page = 1){
		$data["by_region"] = 1;
		$array = array("is_publish"=>1, $item=>$val);
		$data["actus"] = $this->articles->getLimit($array,$page,NB_PER_PAGE);
		/*
		 * On récupère la dernière requete pour compter le nombre total des lignes 
		 */
		$sql = explode("LIMIT",$this->db->last_query());
		$sql = $sql[0];
		$sql = str_replace("SELECT *", "SELECT count(*) nb ", $sql);
		$config['total_rows'] = record_count_sql($sql);
		
		$nom_region = getBy("region", "nom_region", $item, $val);
		$data["title"] =  "Actualité de la Région : ".$nom_region." | Seraseran'ny Tantsaha";
		//echo current_url(); echo uri_string();
		$config['base_url'] = base_url().url_title(strtolower($nom_region))."/";
		$this->pagination->initialize($config);
		$data["pages"] = $this->pagination->create_links();
		
		/*Breadcrumb*/
		$niveau1 = array();
		$niveau1["text"] = $nom_region;
		$data["nom_region"] = $nom_region;
		$niveau1["link"] = "#";
		$data["niveau1"] = $niveau1;
		$this->index($data);
	}
	public function changelang($lang){
		$this->session->set_userdata("lang",$lang);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function img(){
		$art = new Article_model();
		$articles = $art->get();
		foreach ($articles as $article){
			if ($article["img"]) {
				$img = explode(base_url(), $article["img"]);
				if (!empty($img[1])){
					$post["img"] = $img[1];
					$art->update($post, $article["idarticle"]); 
				} 	
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */