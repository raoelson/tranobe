<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
	}
	public function index()
	{
		$data["active"] = "media";
		$user = $this->session->userdata("user");
		$data["user"] = $user;
		$data["div_title"] = "m&eacute;dia";
		$this->template->add_js("assets/backend/js/sites/media.js?".mktime());
		$this->template->add_js("admin.php/media/get/".$user["iduser"]."?".mktime());
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/vwMedia', $data);
		$this->template->render();
	}
	public function get($id=null) {
		$output = ''; // Here we buffer the JavaScript code we want to send to the browser.
		$delimiter = "\n"; // for eye candy... code gets new lines
		$output .= 'var tinyMCEImageList = new Array('; // 33 caractères au depart
		$abspath = preg_replace('~^/?(.*)/[^/]+$~', '/$1', $_SERVER['SCRIPT_NAME']);
		$directory = FCPATH.'/assets/medias/'.$id;
		$rep = "/assets/medias"."/".$id;
		/** SI LE REP N'EXISTE PAS ENCORE, ON LE CREE**/
		if (!is_dir($directory)) @mkdir($directory);
		$direc = opendir($directory);
		while ($file = readdir($direc)) {
			if (!preg_match('~^\.~', $file)) { // no hidden files / directories here...
				 if (is_file("$directory/$file") && getimagesize("$directory/$file") != FALSE) {
					// We got ourselves a file! Make an array entry:
					$filename = explode(".",$file);
					 $output .= $delimiter. '["'. utf8_encode(basename($filename[0])). '", "'. utf8_encode(base_url()."$rep/$file"). '"],';
				}
			}			
		}
		if (strlen($output)>33) $output = substr($output, 0, -1); // supprimer le dernier virgule, si outpout à été modifier
		$output .= $delimiter;
		closedir($direc);
		$output .= ');';
		$this->output
		->set_content_type('text/javascript')
		->set_output($output);
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}
	public function edit($id = null){
		$data["active"] = "media";
		$data["user"] = $this->session->userdata("user");
		$this->template->add_css("assets/backend/js/lib/plupload/css/jquery.plupload.queue.css");
		$this->template->add_css("assets/backend/js/lib/plupload/css/jquery.ui.plupload.css");
		$this->template->add_css("assets/backend/js/lib/plupload/css/style.css");
		$this->template->add_js("assets/backend/js/lib/plupload/browserplus-min.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.gears.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.silverlight.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.flash.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.browserplus.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.html4.js");
		$this->template->add_js("assets/backend/js/lib/plupload/plupload.html5.js");
		$this->template->add_js("assets/backend/js/lib/plupload/jquery.plupload.queue.js");
		$this->template->add_js("assets/backend/js/sites/plupload.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/editMedia', $data);
		$this->template->render();
	}
	
	function save() {
		$tmp = $_FILES['file']['tmp_name'];
		if (filesize($tmp)>5000000) {
			die('{"error": true, "message": "Image trop grand"}');
		}
		$user = $this->session->userdata("user");
		$REP_MEDIA = FCPATH.'/assets/medias/'.$user["iduser"]."/";
		/** SI LE REP N'EXISTE PAS ENCORE, ON LE CREE**/
		if (!is_dir($REP_MEDIA)) @mkdir($REP_MEDIA);
		$imgname = $REP_MEDIA.$_FILES['file']['name'];
		$imgname = str_replace(" ","_",$imgname);
		move_uploaded_file($_FILES['file']['tmp_name'],$imgname);
		if (strpos($imgname, "pdf")!=null){
			$this->userfile = basename($imgname);
			$type = "pdf";
		}
		else {
			list($width, $height, $type, $attr) = getimagesize($imgname);
			$this->userfile = basename($imgname);
			$this->width = $width;
			$this->height = $height;
			$type="image";
		}
		/* ON AFFICHE L'IMAGE SI TOUT PASSE BIEN */
		die('{"error": false,"type":"'.$type.'" ,"file": "'.$this->userfile.'"}');
	}

	function delete() {
		$posts = $this->input->post();
		foreach ($posts["ids"] as $fic) {
			$fic = str_replace(base_url(), "", $fic);
			@unlink(FCPATH.$fic);
		}
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('success' => 1)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */