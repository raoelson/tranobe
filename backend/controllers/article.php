<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->cic_auth->is_logged_in()){
			redirect("/auth/login");
		}
		$this->load->model("article_model");
		$this->load->model("categorie_model");
		$data["user"] = $this->session->userdata("user");
	}
	public function index($data = null)
	{
		$data["active"] = "article";
		$data["user"] = $this->session->userdata("user");
		if (empty($data["div_title"])) $data["div_title"] = $data["user"]["idgroup"] == 1 ?"Gestion des articles":"Mes articles";
		$this->template->add_js("assets/backend/js/sites/article_page/article.js?".mktime());
		$this->template->write('title', "Gestion des articles - Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/vwArticle', $data);
		$this->template->render();
	}
	public function to_publish(){
		$user = $this->session->userdata("user");
		if ($user["idgroup"]<>1) redirect(base_url()."admin.php/article");
		$data["div_title"] = "Article à publier";
		$data["where"] = array("is_publish"=>0);
		$this->index($data);
	}
	public function get($id = null) {
		$article = $this->article_model->get($id);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('article' => $article)));
	}
	public function get_all() {
		$user = $this->session->userdata("user");
		$posts = $this->input->post();
		$key = $posts["key"];
		$val = $posts["val"];
		if ($user["idgroup"] <>1) $array = array("user_iduser"=>$user["user_iduser"]);
		else $array = null;
		if ($key == "limit") $article = $this->article_model->getLimit($array, $val);
		else $article = $this->article_model->getWhere(array($key=>$val));
		$count =  record_count("article",$array);
		$total_page = intval($count/NB_PER_PAGE);
		if ($total_page<$count/NB_PER_PAGE) $total_page++;

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('article' => $article, "total_page"=>$total_page,"idgroup"=>$user["idgroup"])));
	}
	public function getWhere($key=null,$val=null) {
		if(!empty($key)) $article = $this->article_model->getWhere(array($key=>$val));
		else $article = $this->article_model->get();
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('article' => $article)));
	}
	public function edit($id = null){
		$user = $this->session->userdata("user");
		if ($id) {
			$article = $this->article_model->get($id);
			$this->template->add_js("admin.php/media/get/".$article["user_iduser"]."?".mktime());
		}
		else $this->template->add_js("admin.php/media/get/".$user["iduser"]."?".mktime());
		$data["active"] = "article";
		$data["idarticle"] = $id;

		$data["user"] = $user;
		$data["categories"] = $this->categorie_model->getWhere(array("idcategorie <="=>2));
		$this->template->add_js("assets/backend/js/sites/article_page/editarticle.js?".mktime());
		$this->template->add_js("assets/backend/js/lib/tiny_mce/jquery.tinymce.js");
		$this->template->write('title', "Dashboard -Seraseran'ny Tantsaha");
		$this->template->write_view('content', 'articles/editArticle', $data);
		$this->template->render();
	}

	function add($idarticle = -1) {
		$data['article'] = $this->article_model->get($idarticle);
		$this->template->write_view('content', 'vw_addarticle', $data);
		$this->template->render();
	}

	function save() {
		$posts = $this->input->post();
		$idartcle = $posts["idarticle"];
		if ($posts["img"]) {
			$img = explode(base_url(), $posts["img"]);
			$posts["img"] = $img[1];
		}
		if($idartcle <> "null") {
			$this->article_model->update($posts,$posts["idarticle"]);
		}else {
			$posts["idarticle"] = $this->article_model->add($posts);
		}
		$posts["success"] = 1;
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("article"=>$posts)));
	}
	function send_notif(){
		$posts = $this->input->post();
		$idarticle = $posts["idarticle"];
		$article = $this->article_model->get($idarticle);
		if (!count($article)) return;
		if ($article["is_notif_send"]) return;
		$message = "Image :<a href='".base_url().$article["img"]."'>".base_url().$article["img"]."</a><br>";
		$message.="Lien vers l'article :<a href='".base_url()."article/single/".$article["categorie_idcategorie"]."/".$article["idarticle"]."'>".base_url()."article/single/".$article["categorie_idcategorie"]."/".$article["idarticle"]."</a>";
		$message.=$article["body"]."<br>";
		$message.="Auteur :".$article["username"]."<br>";
		$message.="Date :".$article["date_write"]."<br>";
		mailaka("sera2tantsaha@sera2tantsaha.mg", "serveur TTN", "infocom@tranobenytantsaha.mg, sicr@tranobenytantsaha.mg", "ARTICLE A PUBLIER :".$article["title"], $message);
		$data["is_notif_send"] = 1;
		$this->article_model->update($data,$idarticle);
		return;
	}
	function delete($idarticle) {
		$success = $this->article_model->delete($idarticle);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("success"=>$success,"idarticle"=>$idarticle)));
	}
	public function action(){
		$posts = $this->input->post();
		switch ($posts['action']){
			case "active":$this->article_model->active_all($posts['ids']);break;
			case "inactive":$this->article_model->inactive_all($posts['ids']);break;
			case "delete":$this->article_model->delete_all($posts['ids']);break;
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array("posts"=>$posts)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */