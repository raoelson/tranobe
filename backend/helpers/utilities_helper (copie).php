<?php
/*
 * DATE
 */
function dateMysql2Fr($date){
	$date = explode(" ",$date);
	$date = $date[0];
	$date = explode("-",$date);
	return $date[2]."/".$date[1]."/".$date[0];
}
function dateFr2Mysql($date){
	if (!$date) return "0000-00-00";
	if (strpos($date, "-")!== false) return $date;
	$date = explode("/",$date);
	if (count($date) == 1) return $date[0]."-"."01-01";
	return $date[2]."-".$date[1]."-".$date[0];
}
function simpledate($date){
	$date = explode(" ",$date);
	return $date[0];
}
function date_debut($date) {
	$date = explode("-", $date);
	$year = $date[0]; $month = $date[1];$day = $date[2];
	$num_day      = date('w', mktime(0,0,0,$month,$day,$year));
	$premier_jour = mktime(0,0,0, $month,$day-(!$num_day?7:$num_day)+1,$year);
	$datedeb      = date('Y-m-d', $premier_jour);
	return $datedeb;
}

function date_fin($date) {
	$date = explode("-", $date);
	$year = $date[0]; $month = $date[1];$day = $date[2];
	$num_day      = date('w', mktime(0,0,0,$month,$day,$year));
	$dernier_jour = mktime(0,0,0, $month,7-(!$num_day?7:$num_day)+$day,$year);
	$datedeb      = date('Y-m-d', $dernier_jour);
	return $datedeb;
}
function tomorrow($date){
	$date = explode("-", $date);
	$year = $date[0]; $month = $date[1];$day = $date[2];
	$tomorrow = mktime(0, 0, 0, $month, $day+1, $year);
	return date("Y-m-d", $tomorrow); 
}
/*
 * URL
 */
function human_url($url){
	return url_title(convert_accented_characters(strtolower($url)));
}

/**
 *@descript: trouver le mot clé dans une chaîne
 *@param: string
 *@return: string
 **/
function find_keyword($chaine){
	$chaine=trim($chaine);
	$first_blank = strpos($chaine," ");
	if ($first_blank === false) return "";
	else $key = substr($chaine,0,$first_blank);
	/** On vérifie que le mot clé existe dans la bdd **/
	$ci = &get_instance();
	$ci->load->model("keywords_model");
	$q = $ci->keywords_model->getBy("UPPER(keyword)",strtoupper($key));
	/** Si le mot clé existe, on le retourne **/
	if ($q->num_rows()) return strtoupper($key);
	return "";
}

/*
 * MAIL
 */
function mailaka($email_from,$nom,$email_to,$subject ,$msg){
	$ci = &get_instance();
	$ci->load->library("email");
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = 'smtp.blueline.mg';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = "html";
	$ci->email->initialize($config);
	$ci->email->from($email_from,$nom);
	$ci->email->to($email_to);
	$ci->email->cc($email_from);
	$ci->email->subject($subject);
	$ci->email->message($msg);
	$ci->email->send();
	$ci->email->print_debugger();
}

/* Descript: Envoi de mail 
 * @uses: MEL adresse_email_destinataire message
 * @param string $message
* @param array $unread
* */
function sms2mail($message,$unread){
	//print_r($unread);
	/* Vérifier si le numéro télephone est bien enregistrer sur le serveur */
	if (!check_user(array("numtel"=>$unread["number"]))) {
		send_message($unread["number"], "Tsy afaka mandefa mailaka amin'ny serveur io nimerao io.");
		return;
	}
	$ci = &get_instance();
	$first_blank = strpos($message," ");
	if ($first_blank === false) {
		send_message($unread["number"], "Hamarino ny message nalefanao azafady.");
		return ;
	}
	else $email_dest = substr($message,0,$first_blank);
	echo $email_dest;
	if (!valid_email($email_dest)) {
		send_message($unread["number"], "Hamarino ny adresy mailaka nalefanao azafady.");
		return ;
	}
	/* on recupère le message ***/
	$message = substr($message,strlen($email_dest) + 1 ,strlen($message));
	$message.="<br><br>Cordialement, <br>".$unread["username"];
	$message.= SIGNATURE_MAIL;
	mailaka($unread["email"], $unread["username"], $email_dest, "Message from ".$unread["username"], $message);
	return;
}
/* Envoi de mail à l'ODR: @uses: MSIM message
 * @param string $message
* @param array $unread
* */
function mail_odr($message,$unread){
	//print_r($unread);
	/* Vérifier si le numéro télephone est bien enregistrer sur le serveur */
	if (!check_user(array("numtel"=>$unread["number"]))) {
		send_message($unread["number"], "Tsy afaka mandefa mailaka amin'ny serveur io nimerao io.");
		return;
	}
	/* on recupère le message ***/
	$message.="<br><br>Cordialement, <br>".$unread["username"];
	$message.= SIGNATURE_MAIL;
	mailaka($unread["email"], $unread["username"], "sim.padrodr@blueline.mg", "Message from ".$unread["username"], $message);
	return;
}

/** SQL **/
function execSQL($sql){
	$ci = &get_instance();
	$q = $ci->db->query($sql);
	return $q->result_array();
}

/**
 * @descript: compter les enregistrement dans une table
 * @param: nom_table, string
 */
function record_count($table,$array=null) {
	$ci = &get_instance();
	$ci->db->select("count(*) as nb");
	if ($array) $ci->db->where($array);
	$r = $ci->db->get($table)->row_array();
	return $r["nb"];
}



/**
 *  PRICE 
 */
 
 /* Ajout de prix: @uses: ADP code_district prix1 prix2 prix3 prix4 
 * @param unknown_type $message
 * @param unknown_type $unread
 * */

function add_price($message,$unread){
	/* Vérifier si le numéro télephone est bien enregistrer sur le serveur */
	if (!check_user(array("numtel"=>$unread["number"]))) {
		send_message($unread["number"], "Tsy afaka mandefa vidy amin'ny serveur io nimerao io ianao.");
		return;
	}
	$prices = explode(" ",$message);
	/* Vérifier si code_district est correct */
	$code_district = $prices[0];
	unset($prices[0]);
	if (!check_district(array("code_district"=>$code_district))){
		//send_message($unread["number"], "Hamarino ny code_district nalefanao azafady.");
		return ;
	}
	$prices = array_filter($prices);
	if (count($prices)<>4){
		//send_message($unread["number"], "Hamarino ireo vidy nalefanao azafady.");
		return ;
	}
	$ci = &get_instance();
	$ci->load->model("prix_model");
	if (is_odr($unread["number"])) $idproduit=1;
	else $idproduit = 5;
	$reponse ="";
	foreach($prices as $prix) {
		if (!is_int($prix)) {
			send_message($unread["number"], "Hamarino ireo vidy nalefanao azafady.");
			return;	
		}
		$data["date"] = simpledate($unread["insertdate"]);
		$data["code_district"] = $code_district;
		$data["produit_idproduit"] = $idproduit;
		$data["prix_conso"] = $prix;
		$reponse.="";
		$array = array("date <="=>date_fin($data["date"]),"date >="=>$data["date"],"prix.code_district"=>$data["code_district"],"produit_idproduit"=>$idproduit);
		if (check_price($array)) $ci->prix_model->updateWhere($data,$array);
		else $ci->prix_model->add($data);
		$idproduit++;
	}
	$pos = strpos($unread["number"],"+26134");
	if ( $pos !==  false ) {
		send_message($unread["number"], "Voaray ny vidy ho an'ny distrikan'i ".getDistrict($code_district)->nom_district.".".SIGNATURE);
	}
	
	return;
}
/*
 * Demande de prix: PRIX nom_produit code_district ou VIDY nom_produit code_district
 * exemple: PRIX VARY 104 pour demander le prix du riz dans le district d'Ankazobe 
 * @uses: 
 */
function get_price($message,$unread){
	/* Vérifier si le numéro télephone est bien enregistrer sur le serveur */
	if (!check_user(array("numtel"=>$unread["number"]))) {
		//send_message($unread["number"], "Tsy afaka mandefa vidy amin'ny serveur io nimerao io ianao.");
		return;
	}
	$prices = explode(" ",$message);
	if (count($prices)<>2){
		send_message($unread["number"], "Hamarino ny code_district nalefanao azafady.".SIGNATURE);
		return ;
	}
	/* Vérifier si code_district est correct */
	$produit = strtoupper($prices[0]);
	$code_district = $prices[1];
	
	if (!check_district(array("code_district"=>$code_district))){
		send_message($unread["number"], "Hamarino ny code_district nalefanao azafady.".SIGNATURE);
		return ;
	}
	switch($produit){
		case "VAR":case "VARY": case "RIZ": $where = "produit_idproduit IN (1,2,3,4)";break;
		default: $where= "produit_idproduit IN (5,6,7,8)";break;
	}
	$ci = &get_instance();
	$ci->load->model("prix_model");
	
	$sql = "SELECT code_produit, prix_conso,date FROM `prix` 
			JOIN produit ON produit_idproduit = idproduit
			WHERE date<= NOW() AND code_district='".$code_district."' AND ".$where." 
			ORDER BY date DESC LIMIT 4";
	$prices = execSQL($sql);
	$reponses = '';
	foreach ($prices as $prix){
		$date = $prix["date"];
		$reponses.=$prix["code_produit"].":";
		if ($prix["prix_conso"]) $reponses.=$prix["prix_conso"].", ";
		else $reponses.="ND|PV, ";
	}
	if ($reponses) send_message($unread["number"], getDistrict($code_district)->nom_district." ".$produit."(Ar) ".$reponses.SIGNATURE);
	else send_message($unread["number"], "Mbola tsy misy vidy ho an'io distrika io");
	
	return;
}

function check_price($array){
	$ci = &get_instance();
	$ci->load->model("prix_model");
	$q = $ci->prix_model->getWhere($array);
	return count($q);
}



/** USER and SUSCRIBER **/

/** Inscription au liste des utilisateurs
 * L'inscription doit être validée par l'administrateur
 * Descript: @uses: USER nom_groupe code_district nom adresse_mail
 * @param String $message
 * @param array $unread
 */
function add_user($message,$unread){
	$array = array("numtel"=>$unread["number"]);
	if (check_user($array)){
		send_message($unread["number"], "Efa tafiditra ho mpampiasa ny tambazotra io nimerao io.".SIGNATURE);
		return;
	}
	$user["numtel"] = $unread["number"];
	$message = explode(" ", $message);
	if (count($message)<>4){
		send_message($unread["number"], "Hamarino ny message nalefanao fa misy diso azafady.".SIGNATURE);
		return;
	}
	$groupname = strtoupper($message[0]);
	$group = getGroup(array("groupname"=>$groupname));
	if (!count($group)){
		send_message($unread["number"], "Tsy misy io groupe nalefanao io azafady. Alefaso ny teny hoe 'groupe' raha hahafantatra izany;".SIGNATURE);
		return;
	}
	$code_district = $message[1];
	if (!check_district(array("code_district"=>$code_district))){
		send_message($unread["number"], "Hamarino ny code_district nalefanao azafady.");
		return ;
	}
	$user["login"] = $message[2];
	$user["username"] = $message[2];
	$user["email"] = $message[3];
	$user["password"] = md5($user["login"]);
	$user["code_district"] = $code_district;

	$ci = &get_instance();
	$ci->load->model("user_model");
	$ci->load->model("userhasgroup_model");

	$iduser = $ci->user_model->add($user);

	$line["user_iduser"] = $iduser;
	$line["group_idgroup"] = $group["idgroup"];
	$ci->userhasgroup_model->add($line);

	send_message($unread["number"], "Tafiditra soa aman-tsara ao amin'ny groupe ".$groupname." ianao.".SIGNATURE);
	return ;

}
/** Inscription au liste des abonnés
 * Descript: @uses: IN code_district nom
 * @param String $message
 * @param array $unread
 */
function add_suscriber($message,$unread){
	$array = array("numtel"=>$unread["number"]);
	if (check_suscriber($array)){
		send_message($unread["number"], "Efa tafiditra ao anatin'ny lisitra io nimerao io.".SIGNATURE);
		return;
	}
	$ci = &get_instance();
	$ci->load->model("suscriber_model");
	$user["numtel"] = $unread["number"];
	$message = explode(" ",$message);
	if (!check_district(array("code_district"=>$message[0]))){
		send_message($unread["number"], "Hamarino ny code_district nalefanao azafady.".SIGNATURE);
		return ;
	}
	$user["code_district"] = $message[0];
	unset($message[0]);
	$suscribername = "";
	foreach($message as $m) $suscribername.=$m."_";
	$user["suscribername"] = substr($suscribername,0,strlen($suscribername)-1);
	$ci->suscriber_model->add($user);
	send_message($unread["number"], "Tafiditra ao amin'ny listra ny nimeraonao.".SIGNATURE);

}
function check_suscriber($array){
	$ci = &get_instance();
	$ci->load->model("suscriber_model");
	$q = $ci->suscriber_model->getWhere($array);
	return count($q);
}
function check_user($array){
	$ci = &get_instance();
	$ci->load->model("user_model");
	$q = $ci->user_model->getWhere($array);
	return count($q);
}

/**
 * GROUP
 */
function getGroup($array){
	$ci = &get_instance();
	$ci->load->model("group_model");
	$q = $ci->group_model->getWhere($array);
	return $q;
}
/**
 * Détermine si le numéro appartient au groupe CSA
 * @param $numtel
 */
function is_csa($numtel){
	$ci = &get_instance();
	$ci->load->model("userhasgroup_model","usergroup");
	$array = array("numtel"=>$numtel,"idgroup"=>3);
	$q = $ci->usergroup->getWhere($array);
	return count($q); 
}
function is_odr($numtel){
	$ci = &get_instance();
	$ci->load->model("userhasgroup_model","usergroup");
	$array = array("numtel"=>$numtel);
	$ci->db->where_in("idgroup",array("2","6"));
	$q = $ci->usergroup->getWhere($array);
	return count($q); 
}

/***DISTRICT **/
function check_district($array){
	$ci = &get_instance();
	$ci->load->model("district_model");
	$q = $ci->district_model->getWhere($array);
	return count($q);
}
function getDistrict($code){
	$ci = &get_instance();
	$ci->load->model("district_model");
	$q = $ci->district_model->getWhere(array("code_district"=>$code));
	return $q[0];
}

/** SENDING MESSAGE **/

/** Envoi de message en groupe
 * Descript: @uses: nom_groupe message
 * Exemple: CSA Mirongatra ny valala aty amin'ny districtn'Ihosy
 * @param String $message
 * @param array $unread
 */

function send_message_group($key, $message,$from = NULL){
	if ($from) $message.=" DE: ".$from;
	$ci = &get_instance();
	$ci->load->model("user_model");
	$ci->load->model("outbox_model");
	$Users_dest = $ci->user_model->getWhere(array("keyword" => $key));
	foreach($Users_dest as $dest):
	$outbox["number"] = $dest["numtel"];
	$outbox["text"] = convert_accented_characters($message);
	$ci->outbox_model->add($outbox);
	endforeach;
}
function send_message($to, $message){
	$ci = &get_instance();
	$ci->load->model("outbox_model");
	$outbox["number"] = $to;
	$outbox["text"] = convert_accented_characters($message);
	$ci->outbox_model->add($outbox);
}

/**
 * OFFRE ET DEMANDE 
 **/
/**
* Descript: Ajout offre
* @uses: OFF Message 
* Exemple: OFF code_district code_produit qte prix qlté texte
* ou DMD code_district  
* @param String $message
* @param array $unread*/
function add_offre_demande($keyword,$message,$unread){
	$message = explode(" ",$message);
	
	if (count($message)<6) {
		send_message($unread["number"], "Hamarino ny message nalefanao azafady.".SIGNATURE);
		return ;
	}
	
	$code_district = $message[0];
	if (!check_district(array("code_district"=>$code_district))){
		send_message($unread["number"], "Hamarino ny code_district nalefanao azafady.".SIGNATURE);
		return;
	}
	/* on recupère le message ***/
	$data["code_district"] = $code_district;
	$data["produit_idproduit"] = $message[1];
	$data["qte"] = $message[2];
	$data["prix"] = $message[3];
	$data["qualite"] = $message[4];
	$text = "";
	for ($i =5; $i<count($message);$i++) $text.=$message[$i]." ";
	$data["text"] = trim($text);
	$data["type"] = $keyword;
	$data["numtel"] = $unread["number"];
	$ci = &get_instance();
	$ci->load->model("offre_demande_model");
	$ci->offre_demande_model->add($data);
	send_message($unread["number"], "Voaray ny tolotra nalefanao.".SIGNATURE);
	return;
}


/** NEW **/
/**
 *Descript: Ajout d'actualité sur le réseau
 *@uses: NEW code_district Message 
* @param String $message
* @param array $unread **/
function add_new($message, $unread){
	
}

/** OUTBOX **/


/** INBOX **/


/*
 * Compteur de visite
 */
function increment_count(){
	$ci = &get_instance();
	$ip=$ci->input->ip_address(); 
	if (!$ip || $ip == "127.0.0.1") return;
	$ci->load->library('user_agent');
	$ci->db->set("ip",$ci->input->ip_address());
	$ci->db->set("browser",$ci->agent->browser());
	$ci->db->set("mobile",$ci->agent->mobile());
	$ci->db->set("platform",$ci->agent->platform());
	$ci->db->set("agent_string",$ci->agent->agent_string());
	$ci->db->insert("visite");
	$ci->session->set_userdata("ip",$ci->input->ip_address());
}
