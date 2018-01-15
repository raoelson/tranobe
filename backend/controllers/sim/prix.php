<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prix extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("prix_model");
		$this->load->model("produit_model");
		$this->load->model("district_model");
	}
	public function index($data = null)
	{
		if ($data == null) $data["prod"] = "riz";
		$data["active"] = "sim";
		$data["user"] = $this->session->userdata("user");
		$data["div_title"] = "prix";		
		$data["districts"] = $this->district_model->get();
		$data["produits"] = $this->produit_model->get();
		$this->template->add_js("assets/backend/js/sites/sim/prix.js?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'sim/vwPrix', $data);
		$this->template->render();
	}
	public function prod($prod){
		$data["prod"] = $prod;
		$this->index($data);
	}
    public function get() {
		$posts = $this->input->post();
		$prix = $this->prix_model->getWhere(array("date"=>$posts["date"],"nom_district"=>$posts["nom_district"]));
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("prix" => $prix)));
	}
	public function get_all() {
		$all_results = array();
		$tbody = "";
		$date = $this->input->post("date");
		$prod = $this->input->post("prod");
		switch (strtoupper($prod)){
			case "AUTRE" : $where_prod = array("idproduit >="=>5,"idproduit <="=>8); break;
			case "RIZ" : $where_prod = array("idproduit >="=>1,"idproduit <"=>5); break;
		}
		
		$produits = $this->produit_model->getWhere($where_prod);
		$where = array("date  >="=>date_debut($date), "date <="=>date_fin($date));
		$where = array_merge($where,$where_prod);
		$prices = $this->prix_model->getWhere($where);
		$districts = $this->district_model->get();
		foreach ($prices as $prix){
			$all_results[$prix["nom_district"]." [".$prix["code_district"]."]"][$prix["nom_produit"]] = $prix["prix_conso"];
		}
		$i = 1;
		foreach($all_results as $key=>$result){
			$tbody.="<tr>";
			$tbody.="<td>".($i++)."</td>";
			$tbody.="<td>".dateMysql2Fr($date)."</td>";
			$tbody.="<td>".ucwords(strtolower($key))."</td>";
			foreach($produits as $produit):
				$tbody.='<td style="text-align: right;">'.(isset($result[$produit["nom_produit"]])?$result[$produit["nom_produit"]]:"ND|PV").'</td>';
			endforeach;
			
			$tbody.='<td class="action">';
			$chaine = "'".$key."','".$date."'";
			$tbody .='<a href="#ancre2" onclick="prix.edit('.$chaine.')" class="btn btn-small btn-warning"><i class="btn-icon-only icon-pencil"></i> </a>&nbsp;';
			$tbody .='<a href="javascript:;" class="btn btn-small"> <i class="btn-icon-only icon-remove"></i></a>';
			$tbody.="</td></tr>";
		}
		
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("tbody" => $tbody,"produits"=>$produits, "date_debut"=>date_debut($date), "date_fin"=>date_fin($date))));		
	}

	function add($idprix = -1) {
		$data['prix'] = $this->prix_model->get($idprix);
		$this->template->write_view('content', 'vw_addprix', $data);
		$this->template->render();
	}

	function save() {
		$posts = $this->input->post();
		$prices = $posts["prices"];
		$idproduits = $posts["idproduits"];
		$i = 0;
		foreach($prices as $prix) {
			$data["date"] = $posts["date"];
			$data["code_district"] = $posts["code_district"];
			$data["produit_idproduit"] = $idproduits[$i];
			$data["prix_conso"] = $prix;
			$array = array("date <="=>date_fin($posts["date"]),"date >="=>date_debut($posts["date"]),"prix.code_district"=>$posts["code_district"],"produit_idproduit"=>$idproduits[$i]);
			if ($this->check($array)) $this->prix_model->updateWhere($data,$array);
			else $this->prix_model->add($data);
			$i++;
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('prix' => $posts)));
	}
	function delete($idprix) {
		$this->prix_model->delete($idprix);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('idprix' => $idprix)));
	}
	function check($array){
		$q = $this->prix_model->getWhere($array);
		return count($q);
	}
	function insertval(){
		for($i=101;$i<800; $i++){
			for ($idproduit =1; $idproduit<5; $idproduit++){
				$data["prix_conso"] = rand(800, 1800);
				$data["date"] = date("2013-04-04");
				$data["produit_idproduit"] = $idproduit;
				$data["code_district"] = $i;
				$this->prix_model->add($data);
			}
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */