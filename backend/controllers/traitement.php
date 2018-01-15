<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Cette classe gère les traitements des messages entrant
	*@author: samsol	
	*/
class Traitement extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("inbox_model");
		$this->load->model("user_model");
		$this->load->model("outbox_model");
	}
	/**
	* @descript: Traitement des messages non encore lus 
	*@param: none
	*@return: none 
	*/
	public function treat_unread(){
		$Unreads = $this->inbox_model->get_unread();
		if (!count($Unreads)) die();
		foreach($Unreads as $unread):
			/** On extrait le mot clé **/
			$keyword = find_keyword($unread["text"]);
			
			/*** Si le numéro n'est pas un numéro telma ou appellable ex: TELMA, 369, 700 ***/
			$pos = strpos($unread["number"],"+261");
			if ( $pos ===  false ) {
				$inbox["processed"] = 1;
				$this->inbox_model->update($inbox,$unread["id"]);
				continue;
			}
			if (!$keyword){ 
				send_message($unread["number"], "Hamarino ny code_message nalefanao azafady."); 
				$inbox["processed"] = 1;
				$this->inbox_model->update($inbox,$unread["id"]);
				continue;
			}
			/* on recupère le message ***/
			$message = convert_accented_characters(substr($unread["text"],strlen($keyword) + 1 ,strlen($unread["text"])));
			/**On supprime les espaces */
			$message = trim($message);
			if ($unread["username"]) $from = $unread["username"];
			else $from = $unread["number"];
			switch($keyword){
				case "ADP": add_price($message,$unread);break; 
				case "DMD": case "OFF": add_offre_demande($keyword,$message, $unread); break;
				case "IN" : add_suscriber($message,$unread);break;
				case "MEL": sms2mail($message,$unread);break;
				case "MODR": mail_odr($message,$unread);break;
				case "NEW": /*** Nouvelle à partager **/; break;
				case "VIDY": case "PRIX": 	get_price($message,$unread);break;
				case "USER": add_user($message,$unread);break;
				default : send_message_group($keyword,$message,$from);break;
			}
			/* Marquer que le message est déjà traité */
			$inbox["processed"] = 1;
			$this->inbox_model->update($inbox,$unread["id"]);
		endforeach;
	}
}