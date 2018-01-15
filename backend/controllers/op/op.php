<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Op extends CI_Controller {
	const NUM_ROW_TRAITEMENT = 70;
	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("region_model","regions");
		$this->load->model("district_model","districts");
		$this->load->model("op_model","ops");
	}
	public function index($data = null)
	{
		$data["active"] = "op";
		$data["user"] = $this->session->userdata("user");
		$data["regions"] = $this->regions->get();
		$data['count'] = record_count("op");
		if (empty($data["div_title"])) $data["div_title"]= "Organisations Paysannes";
		$this->template->add_js("assets/backend/js/sites/op.js?".mktime());
		$this->template->write('title', "Gestion des OP - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'op/vwOp', $data);
		$this->template->render();
	}
	public function get_all($key=null,$val=null) {
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		$total_page = 0;
		if ($key == "limit") {
			$op = $this->ops->getLimit($val);
			$count =  record_count("op");
			$total_page = intval($count/NB_PER_PAGE);
			if ($total_page<$count/NB_PER_PAGE) $total_page++;
		}
		else $op = $this->ops->getWhere(array($key=>$val));

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('op' => $op, "total_page"=>$total_page,"key"=>$key)));
	}
	/***
	 * Actions groupés sur un ensemble d'op
	 */
	public function action(){
		$posts = $this->input->post();
		switch ($posts['action']){
			case "active":$this->op_model->active_all($posts['ids']);break;
			case "inactive":$this->op_model->inactive_all($posts['ids']);break;
			case "delete":$this->op_model->delete_all($posts['ids']);break;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
	public function delete($idop) {
		$success = $this->op_model->delete($idop);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("success"=>$success,"idop"=>$idop)));
	}
	
	/**
	 * Gestion Importation
	 */
	public function import(){
		$data["active"] = "op";
		$data["user"] = $this->session->userdata("user");
		$this->template->write('title', "Gestion des OP - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'op/import_op', $data);
		$this->template->render();
	}
	
	/**
	 *
	 * Importer un fichier excel
	 */
	
	public function doimport() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xls|xlsx';
		$this->load->library('upload', $config);
		$this->template->write('title', "Gestion des OP - Seraseran'ny Tantsaha");
		if (!$this->upload->do_upload()){
			$errors = array('error' => $this->upload->display_errors());
			$data["user"] = $this->session->userdata("user");
			$data['errors'] = $errors;
			$data["active"] = "op";
			$this->template->write_view('header', 'partials/header', $data);
			$this->template->write_view('content', '/op/doimport', $data);
			$this->template->render();
		}
		else {
			$dataUpload = $this->upload->data();
			$sheetData = $this->processFile($dataUpload['full_path']);
			$data = $this->xls2op($sheetData);
			$data["user"] = $this->session->userdata("user");
			$data["active"] = "op";
			$this->template->write_view('header', 'partials/header', $data);
			$this->template->write_view('content', '/op/doimport', $data);
			$this->template->render();
		}
	}
	/**
	 *
	 * Process xls file
	 * @param $filename
	 */
	public function processFile($filename) {
		$this->load->library("phpexcel");
		$objPHPExcel = PHPExcel_IOFactory::load($filename);
		@unlink($dataUpload['full_path']);
		$rows = $objPHPExcel->getActiveSheet()->getHighestRow();
		$cell = "B" . self::NUM_ROW_TRAITEMENT . ":" . "B" . $rows;
		$objPHPExcel->getActiveSheet()->getStyle($cell)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		return $sheetData;
	}
	
	/**
	 *
	 * Preparation des donnees
	 * @param unknown_type $dataExcel
	 */
	private function xls2op($dataExcel) {
		$total = count($dataExcel);
		$nb_insert = 0;
		for ($i = 2; $i <= $total; $i++){
			if (!$dataExcel[$i]["A"]) continue;
			$op["region_idregion"] = $this->regions->getId($dataExcel[$i]["A"]);
			if (!$op["region_idregion"]) die(" Erreur Région :".$dataExcel[$i]["A"]." LIGNE:".$i);
			$op["code_district"] = $this->districts->getId($dataExcel[$i]["B"]);
			if (!$op["code_district"]) die(" Erreur District: ".$dataExcel[$i]["B"]." LIGNE:".$i);
			$op["commune"] = $dataExcel[$i]["C"];
			$op["fokontany"] = $dataExcel[$i]["D"];
			$op["nom_op"] = $dataExcel[$i]["E"];
			$op["date_creation"] = trim($dataExcel[$i]["F"]);
			$op["nom_president"] = $dataExcel[$i]["G"];
			$op["numtel"] = $dataExcel[$i]["H"];
			$op["nb_homme"] = intval($dataExcel[$i]["I"]);
			$op["nb_femme"] = intval($dataExcel[$i]["J"]);
			$op["nb_femme_bureau"] = intval($dataExcel[$i]["L"]);
			$op["is_formel"] = ($dataExcel[$i]["M"]=="Formelle")?1:0;
			$op["filiere1"] = $dataExcel[$i]["N"];
			$op["spec_filiere1"] = intval($dataExcel[$i]["O"]);
			$op["filiere2"] = $dataExcel[$i]["P"];
			$op["spec_filiere2"] = intval($dataExcel[$i]["Q"]);
			$op["filiere3"] = $dataExcel[$i]["R"];
			$op["spec_filiere3"] = intval($dataExcel[$i]["S"]);
			if (count($this->ops->getWhere($op))) continue;
			else {
				//var_dump($op);
				$this->ops->add($op);
				$nb_insert++; 
			}
		}
		$data["total_import"] = $total-1;
		$data["nb_insert"] = $nb_insert;
		return $data;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */