<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


		/*
		 * ROUTAGE DE PAGE
		 * **/

$route["presentation/tranobe-ny-tantsaha/(:any)"] = "presentation/tt/$1";
$route["annuaires/(:any)"] = "page/single/annuaire/$1";
$route["partenaires/(:any)"] = "page/single/partenaires/$1";
$route["organisation-paysane-faitiere/(:any)"] = "page/single/opf/$1";
$route["chambre-d-agriculture/(:any)"] = "page/single/chambre-d-agriculture/$1";
$route["csa/(:any)"] = "page/single/csa/$1";
$route["apropos/(:any)"] = "page/single/apropos/$1";
$route["actualites-regionales/(:any)"] = "article/single/2/$1";
$route["actualites/(:any)"] = "article/single/1/$1";
$route["default_controller"] = "article";

		/*
		 * ROUTAGE DES REGIONS
		 */

$route["alaotra-mangoro"] = "article/getBy/idregion/16";
$route["alaotra-mangoro/(:num)"] = "article/getBy/idregion/16/$1";
$route["amoroni-mania"] = "article/getBy/idregion/7";
$route["amoroni-mania/(:num)"] = "article/getBy/idregion/7/$1";
$route["analamanga"] = "article/getBy/idregion/1";
$route["analamanga/(:num)"] = "article/getBy/idregion/1/$1";
$route["analanjirofo"] = "article/getBy/idregion/18";
$route["analanjirofo/(:num)"] = "article/getBy/idregion/18/$1";
$route["androy"] = "article/getBy/idregion/22";
$route["androy/(:num)"] = "article/getBy/idregion/22/$1";
$route["anosy"] = "article/getBy/idregion/19";
$route["anosy/(:num)"] = "article/getBy/idregion/19/$1";
$route["atsimo-andrefana"] = "article/getBy/idregion/20";
$route["atsimo-andrefana/(:num)"] = "article/getBy/idregion/20/$1";
$route["atsimo-atsinanana"] = "article/getBy/idregion/11";
$route["atsimo-atsinanana/(:num)"] = "article/getBy/idregion/11/$1";
$route["atsinanana"] = "article/getBy/idregion/17";
$route["atsinanana/(:num)"] = "article/getBy/idregion/17/$1";
$route["betsiboka"] = "article/getBy/idregion/15";
$route["betsiboka/(:num)"] = "article/getBy/idregion/15/$1";
$route["boeny"] = "article/getBy/idregion/12";
$route["boeny/(:num)"] = "article/getBy/idregion/12/$1";
$route["bongolava"] = "article/getBy/idregion/2";
$route["bongolava/(:num)"] = "article/getBy/idregion/2/$1";
$route["diana"] = "article/getBy/idregion/5";
$route["diana/(:num)"] = "article/getBy/idregion/5/$1";
$route["haute-matsiatra"] = "article/getBy/idregion/8";
$route["haute-matsiatra/(:num)"] = "article/getBy/idregion/8/$1";
$route["ihorombe"] = "article/getBy/idregion/9";
$route["ihorombe/(:num)"] = "article/getBy/idregion/9/$1";
$route["itasy"] = "article/getBy/idregion/4";
$route["itasy/(:num)"] = "article/getBy/idregion/4/$1";
$route["melaky"] = "article/getBy/idregion/13";
$route["melaky/(:num)"] = "article/getBy/idregion/13/$1";
$route["menabe"] = "article/getBy/idregion/21";
$route["menabe/(:num)"] = "article/getBy/idregion/21/$1";
$route["sava"] = "article/getBy/idregion/6";
$route["sava/(:num)"] = "article/getBy/idregion/6/$1";
$route["sofia"] = "article/getBy/idregion/14";
$route["sofia/(:num)"] = "article/getBy/idregion/14/$1";
$route["vakinankaratra"] = "article/getBy/idregion/3";
$route["vakinankaratra/(:num)"] = "article/getBy/idregion/3/$1";
$route["vatovavy-fitovinany"] = "article/getBy/idregion/10";
$route["vatovavy-fitovinany/(:num)"] = "article/getBy/idregion/10/$1";
/* End of file routes.php ; Location: ./application/config/routes.php */