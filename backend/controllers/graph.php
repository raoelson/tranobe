<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graph extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("prix_model");
		$this->load->model("produit_model");
	}
	public function index($data = null){
		$data["active"] = "graph";
		$data["user"] = $this->session->userdata("user");
		$this->template->add_js("assets/backend/js/sites/graph/graph.js?".mktime());
		$this->template->add_js("assets/backend/js/lib/highcharts/js/highcharts.js");
		$this->template->add_js("assets/backend/js/lib/highcharts/js/modules/exporting.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'graph/vwGraph', $data);
		$this->template->render();
	}
	public function graph_price($data = null){
		$data["active"] = "graph";
		$data["user"] = $this->session->userdata("user");
		$this->template->add_js("assets/backend/js/sites/graph/graph_prix.js?".mktime());
		$this->template->add_js("assets/backend/js/lib/highcharts/js/highcharts.js");
		$this->template->add_js("assets/backend/js/lib/highcharts/js/modules/exporting.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'graph/vwGraph_price', $data);
		$this->template->render();
	}
	public function get(){
		$results = array();
		$sqls = $this->input->post("sqls");
		foreach($sqls as $sql) $results[] = execSQL($sql);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('results' => $results,'count' => count($results))));
	}
	public function get_price(){
		$results = array();
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
		$districts = array();
		foreach($prices as $prix){
			$all_results[$prix["nom_district"]][$prix["nom_produit"]] = $prix["prix_conso"];
			if (!in_array($prix["nom_district"], $districts)) $districts[] = $prix["nom_district"];
		}
		$P = array();
		foreach ($districts as $district){
			foreach ($produits as $produit){
				$P[$produit["nom_produit"]][] = intval($all_results[$district][$produit["nom_produit"]]);
			} 
		}
		//print_r($P);
		$i = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('results' => $P, "districts"=>$districts, "produits"=>$produits, "date_debut"=>date_debut($date),"date_fin"=>date_fin($date))));
	}
	public function user(){
		$sql = array();
		$xAxis = array();$yAxis = array();
		$xAxis["type"] = "'datetime'";
		$xAxis["labels"] = "{
                    rotation: -90,
                    align: 'right',
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }";
		$xAxis["dateTimeLabelFormats"]= "{	month: '%e. %b', year: '%b'}";
		$yAxis["title"] = "{text: 'Nombre'}";
        $yAxis["min"] = 0;
		$graph_series = array();
		$data["graph_title"] = "Statistiques des inscriptions sur le site";
		$data["graph_subtitle"] = "Nombre des utilisateurs";
		$sql[] = 'SELECT date_inscription x, COUNT(*) y FROM user GROUP BY DATE(date_inscription)  ORDER BY date_inscription ASC';
		$graph_series[]= "{name : 'utilisateurs'}";
		$data["sqls"] = $sql;
		$data["xAxis"] = $xAxis;
		$data["yAxis"] = $yAxis;
		$data["graph_series"] = $graph_series;
		$this->index($data);
	}
	public function message(){
		$sql = array();
		$graph_series = array();
		$xAxis = array(); $yAxis = array();
		$xAxis["type"] = "'datetime'";
		$xAxis["labels"] = "{
                    rotation: -90,
                    align: 'right',
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }";
		$xAxis["dateTimeLabelFormats"] = "{	month: '%e. %b', year: '%b'}";
		$yAxis["title"] = "{text: 'Nombre'}";
        $yAxis["min"] = 0;
		$data["graph_title"] = "Courbes des messages traités sur le serveur";
		$data["graph_subtitle"] = "total des messages";
		$sql[] = 'SELECT smsdate x, COUNT(*) y FROM inbox GROUP BY DATE(smsdate)';
		$graph_series[]= "{name : 'reçus'}";
		$sql[] = 'SELECT processed_date x, COUNT(*) y FROM outbox GROUP BY DATE(processed_date) ORDER BY processed_date ASC';
		$graph_series[] = "{name : 'envoyés'}";
		$data["sqls"] = $sql;
		$data["xAxis"] = $xAxis;
		$data["yAxis"] = $yAxis;
		$data["graph_series"] = $graph_series;
		$this->index($data);
	}
	public function prix($prod = "riz"){
		$sql = array();
		$date = "2013-03-21";
		$xAxis = array(); $yAxis = array();
		$graph_series = array();
		$xAxis["labels"] = "{
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '9px',
                        fontFamily: 'Verdana, sans-serif'
                    }
        }";
		$data["graph_title"] = "Prix des produits par district";
		$data["graph_subtitle"] = "Période ";
		switch (strtoupper($prod)){
			case "AUTRE" : $where_prod = array("idproduit >="=>5,"idproduit <="=>8); break;
			case "RIZ" : $where_prod = array("idproduit >="=>1,"idproduit <"=>5); break;
		}
		$produits = $this->produit_model->getWhere($where_prod);
		
		$yAxis["title"] = "{text: 'Ariary'}";
		foreach($produits as $produit){
			$graph_series[] = "{name : '".$produit["nom_produit"]."'}";
		}
		$data["xAxis"] = $xAxis;
		$data["yAxis"] = $yAxis;
		$data["prod"] = $prod;
		$data["graph_series"] = $graph_series;
		$this->graph_price($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */