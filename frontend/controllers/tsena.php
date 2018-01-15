<?php
class Tsena extends CI_Controller{
	const NUM_ROW_TRAITEMENT = 70;

	public function __construct(){
		parent::__construct();
		$this->load->model("produit_model","produits");
		$this->load->model("region_model","regions");
		$this->load->model("district_model","districts");
		$this->load->model("offre_demande_model","offre_demandes");
	}
	public function index(){
		//$this->load->view("offre_demande/index");
		$data["produits"] = $this->produits->get();
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$this->template->add_js("assets/backend/js/lib/jquery.tablesorter.min.js");
		$this->template->add_js("assets/frontend/js/offre_demande.js?".mktime());
		$this->template->write('title',"Tsenan'ny tantsaha");
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('content', 'offre_demande/index_offre_demande', $data);
		$this->template->render();
	}
	public function get_all($key=null,$val=null) {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$nb_per_page = $posts["nb_per_page"];
		$total_page = 0;
		if ($key == "limit") {
			$offre_demande = $this->offre_demandes->getLimit($val,$nb_per_page);
			$count =  record_count("offre_demande");
		}
		else{
			$offre_demande = $this->offre_demandes->getWhere(array($key=>$val));
			$count = count($offre_demande);
		}
		$total_page = intval($count/$nb_per_page);
		if ($total_page<$count/$nb_per_page) $total_page++;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('offre_demande' => $offre_demande, "total_page"=>$total_page, "nb_total"=>$count,"key"=>$key)));
	}
	public function get($id=null) {
		$offre_demande = $this->offre_demandes->get($id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('offre_demande' => $offre_demande)));
	}
	public function find(){
		$posts = $this->input->post();
		$nb_per_page = $posts["nb_per_page"];
		$num_page = $posts["num_page"];
		$search = $this->formulate($posts);
		$total_page = 0; $count = 0;
		$offre_demande = array();
		if ($search) {
			$sql = "SELECT * FROM offre_demande
					LEFT JOIN district ON district.code_district = offre_demande.code_district
					LEFT JOIN region ON region.idregion = district.region_idregion
					LEFT JOIN produit ON produit.idproduit = offre_demande.produit_idproduit
					WHERE ".$search;
			$sql2 = "SELECT count(*) nb FROM offre_demande
					LEFT JOIN district ON district.code_district = offre_demande.code_district
					LEFT JOIN region ON region.idregion = district.region_idregion
					LEFT JOIN produit ON produit.idproduit = offre_demande.produit_idproduit
					WHERE ".$search;
			$offre_demande = $this->offre_demandes->getFind($sql,$nb_per_page,$num_page);
			$count =  record_count_sql($sql2);
			$total_page = intval($count/$nb_per_page);
			if ($total_page<$count/$nb_per_page) $total_page++;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('offre_demande' => $offre_demande, "total_page"=>$total_page,"nb_total"=>$count)));
	}
	private function formulate($posts){
		$cond = "";
		if ($posts["region_idregion"]) $cond.=" region_idregion =".$posts["region_idregion"]." AND";
		if ($posts["code_district"]) $cond.=" district.code_district =".$posts["code_district"]." AND";
		if ($posts["produit_idproduit"]) $cond.=" produit_idproduit =".$posts["produit_idproduit"]." AND";
		if ($posts["type"]) $cond.=" type ='".$posts["type"]."' AND";
		if ($posts["prix_min"]) $cond.=" prix >=".$posts["prix_min"]." AND";
		if ($posts["prix_max"]) $cond.=" prix <=".$posts["prix_max"]." AND";
		if ($cond) $cond = substr($cond,0,strlen($cond) - 3);
		return $cond;
	}
}