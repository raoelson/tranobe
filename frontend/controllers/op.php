<?php
class Op extends CI_Controller{
	const NUM_ROW_TRAITEMENT = 70;

	public function __construct(){
		parent::__construct();
		$this->load->model("region_model","regions");
		$this->load->model("district_model","districts");
		$this->load->model("op_model","ops");
	}
	public function index(){
		//$this->load->view("OP/index");
		$data["districts"] = $this->districts->getPage();
		$data["regions"] = $this->regions->getPage();
		$this->template->add_js("assets/backend/js/lib/jquery.tablesorter.min.js");
		$this->template->add_js("assets/frontend/js/op.js?".mktime());
		$this->template->add_js("assets/frontend/js/region.js?".mktime());
		$this->template->write('title',"Base de données des OP");
		$this->template->write_view('header', 'partials/header', $data);
		$this->template->write_view('content', 'op/index_op', $data);
		$this->template->render();
	}
	public function get_all($key=null,$val=null) {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$nb_per_page = $posts["nb_per_page"];
		$total_page = 0;
		if ($key == "limit") {
			$op = $this->ops->getLimit($val,$nb_per_page);
			$count =  record_count("op");
		}
		else{
			$op = $this->ops->getWhere(array($key=>$val));
			$count = count($op);
		}
		$total_page = intval($count/$nb_per_page);
		if ($total_page<$count/$nb_per_page) $total_page++;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('op' => $op, "total_page"=>$total_page, "nb_total"=>$count,"key"=>$key)));
	}
	public function get($id=null) {
		$op = $this->ops->get($id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('op' => $op)));
	}
	public function find(){
		$posts = $this->input->post();
		$nb_per_page = $posts["nb_per_page"];
		$num_page = $posts["num_page"];
		$search = $this->formulate($posts);
		$total_page = 0; $count = 0;
		$op = array();
		if ($search) {
			$sql = "SELECT * FROM op
					LEFT JOIN region ON region.idregion = op.region_idregion
					LEFT JOIN district ON district.code_district = op.code_district
					WHERE ".$search;
			$sql2 = "SELECT count(*) nb FROM op
					LEFT JOIN region ON region.idregion = op.region_idregion
					LEFT JOIN district ON district.code_district = op.code_district
					WHERE ".$search;
			$op = $this->ops->getFind($sql,$nb_per_page,$num_page);
			$count =  record_count_sql($sql2);
			$total_page = intval($count/$nb_per_page);
			if ($total_page<$count/$nb_per_page) $total_page++;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('op' => $op, "total_page"=>$total_page,"nb_total"=>$count)));
	}
	private function formulate($posts){
		$cond = "";
		if ($posts["region_idregion"]) $cond.=" op.region_idregion =".$posts["region_idregion"]." AND";
		if ($posts["code_district"]) $cond.=" district.code_district =".$posts["code_district"]." AND";
		if ($posts["commune"]) $cond.=" commune LIKE '%".$posts["commune"]."%'  AND";
		if ($posts["fokontany"]) $cond.=" fokontany LIKE '%".$posts["commune"]."%' AND";
		if ($posts["nom_op"]) $cond.=" nom_op LIKE '%".$posts["nom_op"]."%' AND";
		if ($posts["date_creation"]) $cond.=" date_creation LIKE '%".$posts["date_creation"]."%' AND";
		if ($posts["filiere1"]) $cond.=" filiere1 LIKE '%".$posts["filiere1"]."%' AND";
		if ($posts["filiere2"]) $cond.=" filiere2 LIKE '%".$posts["filiere2"]."%' AND";
		if ($posts["filiere3"]) $cond.=" filiere2 LIKE '%".$posts["filiere3"]."%' AND";
		if ($posts["is_formel"]) $cond.=" is_formel=1 AND";
		if ($posts["intrant"]) $cond.=" (spec_filiere1=".$posts["intrant"]." OR spec_filiere2=".$posts["intrant"]." OR spec_filiere3=".$posts["intrant"].") AND";
		if ($posts["semence"]) $cond.=" (spec_filiere1=".$posts["semence"]." OR spec_filiere2=".$posts["semence"]." OR spec_filiere3=".$posts["semence"].") AND";
		if ($posts["transformation"]) $cond.=" (spec_filiere1=".$posts["transformation"]." OR spec_filiere2=".$posts["transformation"]." OR spec_filiere3=".$posts["transformation"].") AND";
		if ($posts["collecte"]) $cond.=" (spec_filiere1=".$posts["collecte"]." OR spec_filiere2=".$posts["collecte"]." OR spec_filiere3=".$posts["collecte"].") AND";
		if ($posts["commerce"]) $cond.=" (spec_filiere1=".$posts["commerce"]." OR spec_filiere2=".$posts["commerce"]." OR spec_filiere3=".$posts["commerce"].") AND";
		if ($cond) $cond = substr($cond,0,strlen($cond) - 3);
		return $cond;
	}
}