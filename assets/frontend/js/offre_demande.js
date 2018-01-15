offre_demande = {};
region = {};

function tab_qualite(i){
	var tab = new Array("","Bonne","Moyenne","Faible");
	return tab[i];
}
$(document).ready(function() {
	$("#span-search").hide();
	offre_demande.init();
	region.init();
	$("#nb_per_page").change(function() {
		$("#pagination_select").val(1)
		offre_demande.init();
	});
	$("#region_idregion").change(function(){
		$("#code_district").html("").addClass("disabled").attr("disabled","disabled");
		id = $(this).val();
		
		if (!id) {
			return;
		}
		$.getJSON(BASE_URL + "region/get_district/"+id+"/offre", region.getDistrictCallBack);
	});	
	$("#main-table").tablesorter();
});


var current_id;
var current_page = 1;
var total_page;
var is_find = 0;

offre_demande.init = function() {
	if (is_find) {
		offre_demande.find($("#pagination_select").val());
		return;
	}
	$("#loading-table").show();
	$("#main-table tbody").html("");

	var key = "limit";
	var val = 1;
	if (where != "") {
		key = where[0];
		val = where[1];
	}
	$.postJSON(BASE_URL + "tsena/get_all/", {
		"key" : key,
		"val" : val,
		"nb_per_page" : $("#nb_per_page").val()
	}, offre_demande.initCallBack);
};
offre_demande.page = function(num_page, exception) {
	if (is_find) {
		offre_demande.find(num_page);
		return;
	}
	$("#loading-table").show();
	$("#main-table tbody").html("");
	current_page = num_page;
	$.postJSON(BASE_URL + "tsena/get_all/", {
		"key" : "limit",
		"val" : num_page,
		"nb_per_page" : $("#nb_per_page").val()
	}, offre_demande.initCallBack);
};
offre_demande.initCallBack = function(json) {
	var offre_demandes = json.offre_demande;
	total_page = json.total_page;
	var tbody = "";
	i = 0;
	$.each(offre_demandes,
					function(i, elt) {
						tbody += "<tr id='tr_"+elt.idoffre_demande+"'>";
						tbody += "<td>" + elt.type + "</td>";
						tbody += "<td>" + dateMysql2Fr(elt.date) + "</td>";
						tbody += "<td>" + elt.nom_district + "</td>";
						tbody += "<td>" + elt.nom_produit + "</td>";
						tbody += "<td>" + elt.qte+" ["+elt.unite+"]"+ "</td>";
						tbody += "<td>" + elt.prix + "</td>";
						//tbody += "<td>" + tab_qualite(elt.qualite) + "</td>";
						//tbody += "<td>" + elt.text + "</td>";
						tbody += "<td>" + elt.numtel + "</td>";
						//tbody += "<td>" + elt.type + "</td>";
						tbody += '<td><a href="javascript: offre_demande.viewInfo('
								+ elt.idoffre_demande
								+ ')" title="Voir cet annonce" class="btn btn-small"><i class="btn-icon-only icon-file-alt"></i> </a>';
						tbody += '</td></tr>';
						++i;
					});
	/** PAGINATION * */
	if (total_page) {
		var i;
		pagination = '<div class="control-group">';
		pagination += '<label for="pagination_select">Page :</label><div class="control"><select id="pagination_select" class="span1" onchange="offre_demande.page($(this).val())">';
		for (i = 1; i <= total_page; i++) {
			pagination += '<option value="' + i + '">' + i + '</li>';
		}
		pagination += '</select></div></div>';
		$(".pagination").html("").append(pagination);
		$("#pagination_select").val(current_page);
	}
	;
	$("#nb_total").html(json.nb_total);
	$("#main-table tbody").append(tbody);
	$("#main-table").trigger("update");
	$("#loading-table").hide();
};
/**
 * RECHERCHE SUR LES offre_demande
 */
offre_demande.find = function(num_page) {
	is_find = 1;
	current_page = num_page;
	$("#loading-table").show();
	$("#main-table tbody").html("");
	$.postJSON(BASE_URL + "tsena/find/", {
		"region_idregion" : $("#region_idregion").val(),
		"code_district" : $("#code_district").val(),
		"produit_idproduit" : $("#produit_idproduit").val(),
		"type" : $("#type").val(),
		"prix_min" : $("#prix_min").val(),
		"prix_max" : $("#prix_max").val(),
		"nb_per_page" : $("#nb_per_page").val(),
		"num_page" : num_page
	}, offre_demande.initCallBack);
}

offre_demande.viewInfo = function(idoffre_demande) {
	$.getJSON(BASE_URL + "tsena/get/" + idoffre_demande, offre_demande.viewCallBack);
}
offre_demande.viewCallBack = function(json) {
	offre_demandes = json.offre_demande;
	console.log(offre_demandes);
	$("#title_offre").html((offre_demandes.type=="OFF"?"OFFRE":"DEMANDE")+" DU "+dateMysql2Fr(offre_demandes.date))
	$("#info_region").html(offre_demandes.nom_region);
	$("#info_district").html(offre_demandes.nom_district);
	$("#info_produit").html(offre_demandes.nom_produit);
	$("#info_qte").html(offre_demandes.qte);
	$("#info_pu").html(offre_demandes.prix);
	$("#info_qlte").html(tab_qualite(offre_demandes.qualite));
	$("#info_annonce").html(offre_demandes.text);
	$("#info_numtel").html(offre_demandes.numtel);
	$("#info_type").html((offre_demandes.type=="OFF"?"OFFRE":"DEMANDE"));
	$("#offre_demande_dialog").modal();
};
/*
 * REGION
 * */

region.init = function(){
	$("#region_idregion").html("");
	$.getJSON(BASE_URL + "region/get_offre/", region.initCallBack);
};
region.initCallBack = function(json){
	var regions = json.regions;
	var options = "<option></option>";
	$.each(regions,function(i,elt){
 		options +="<option value='"+elt.idregion+"'>"+elt.nom_region.toUpperCase()+" ["+elt.nb_offre_demande+"]</option>";
	});
	$("#region_idregion").append(options);
};
region.getDistrictCallBack = function(json) {
	var districts = json.districts;
	$("#code_district").html("");
	var options = "<option></option>";
	$.each(districts,function(i,elt){
		if (elt.iddistrict<112 || elt.iddistrict>117)
 		options +="<option value='"+elt.code_district+"'>"+elt.nom_district.toUpperCase()+" ["+elt.nb_offre_demande+"]</option>";
	});
	$("#code_district").append(options).removeClass("disabled").removeAttr("disabled");
};
