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
	if (!$date) return null;
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
function getBy($table,$index ,$item, $val){
	$ci = &get_instance();
	$q = $ci->db->get_where($table,array($item=>$val));
	$r = $q->row_array();
	return $r[$index];
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
function record_count_sql($sql){
	$ci = &get_instance();
	$q = $ci->db->query($sql);
	$r = $q->row_array();
	return $r["nb"];
}
function execSQL($sql){
	$ci = &get_instance();
	$q = $ci->db->query($sql);
	return $q->result_array();
}

/*
 * Compteur de visite
 */
function increment_count(){
	$ci = &get_instance();
	$ip=$ci->input->ip_address();
	$ci->load->library('user_agent');
	$ban_ip = array("0.0.0.0","127.0.0.1","66.249.75.34"); 
	if (in_array($ip,$ban_ip) || $ci->agent->agent_string() === NULL ) {
		return;
	} 
	$ci->db->set("ip",$ci->input->ip_address());
	$ci->db->set("browser",$ci->agent->browser());
	$ci->db->set("mobile",$ci->agent->mobile());
	$ci->db->set("platform",$ci->agent->platform());
	$ci->db->set("agent_string",$ci->agent->agent_string());
	$ci->db->insert("visite");
	$ci->session->set_userdata("ip",$ci->input->ip_address());
}
