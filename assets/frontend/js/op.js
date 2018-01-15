op = {};
var specialisation = new Array("Non définie","Fournisseur d'intrant","Producteur de semences","Collecteur & Transporteur","Conditionnement & Transformation","Commercialisation");
$(document).ready(function() {
	op.init();
	$("#nb_per_page").change(function() {
		$("#pagination_select").val(1)
		op.init();
	});
});

var current_id;
var current_page = 1;
var total_page;
var is_find = 0;

op.init = function() {
	if (is_find) {
		op.find($("#pagination_select").val());
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
	$.postJSON(BASE_URL + "op/get_all/", {
		"key" : key,
		"val" : val,
		"nb_per_page" : $("#nb_per_page").val()
	}, op.initCallBack);
	$("#main-table").tablesorter({
		headers : {
			0 : {
				// disable it by setting the property sorter to false
				sorter : false
			}
		}
	});
};
op.page = function(num_page, exception) {
	if (is_find) {
		op.find(num_page);
		return;
	}
	$("#loading-table").show();
	$("#main-table tbody").html("");
	current_page = num_page;
	$.postJSON(BASE_URL + "op/get_all/", {
		"key" : "limit",
		"val" : num_page,
		"nb_per_page" : $("#nb_per_page").val()
	}, op.initCallBack);
};
op.initCallBack = function(json) {
	var ops = json.op;
	total_page = json.total_page;
	var tbody = "";
	i = 0;
	$
			.each(
					ops,
					function(i, elt) {
						check = "";
						if (elt.is_active == 1)
							check = "checked";
						tbody += "<tr id='tr_" + elt.idop + "'>";
						tbody += "<td>" + elt.nom_region + "</td>";
						tbody += "<td>" + elt.nom_district + "</td>";
						tbody += "<td>" + elt.commune + "</td>";
						tbody += "<td>" + elt.fokontany + "</td>";
						tbody += "<td>" + elt.nom_op + "</td>";
						tbody += "<td>" + elt.filiere1 + "</td>";
						tbody += '<td>';
						tbody += '<a href="javascript: op.viewInfo('
								+ elt.idop
								+ ')" title="Fiche de l\'OP" class="btn btn-small"><i class="btn-icon-only icon-file-alt"></i> </a>';
						tbody += '</td></tr>';
						++i;
					});
	/** PAGINATION * */
	if (total_page) {
		var i;
		pagination = '<div class="control-group">';
		pagination += '<label for="pagination_select">Page :</label><div class="control"><select id="pagination_select" class="span1" onchange="op.page($(this).val())">';
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
 * RECHERCHE SUR LES OP
 */
op.find = function(num_page) {
	if (!$("#region_idregion").val()) {
		$("#error-region").modal();
		return;
	}
	;
	is_find = 1;
	current_page = num_page;
	$("#loading-table").show();
	$("#main-table tbody").html("");
	$.postJSON(BASE_URL + "op/find/", {
		"region_idregion" : $("#region_idregion").val(),
		"code_district" : $("#code_district").val(),
		"commune" : $("#commune").val(),
		"fokontany" : $("#fokontany").val(),
		"nom_op" : $("#nom_op").val(),
		"date_creation" : $("#date_creation").val(),
		"filiere1" : $("#filiere_prioritaire").val(),
		"filiere2" : $("#filiere_secondaire").val(),
		"filiere3" : $("#filiere_tertiaire").val(),
		"is_formel" : $("#is_formel").attr("checked") ? 1 : 0,
		"intrant" : $("#intrant").attr("checked") ? 1 : 0,
		"semence" : $("#semence").attr("checked") ? 2 : 0,
		"transformation" : $("#transformation").attr("checked") ? 3 : 0,
		"collecte" : $("#collecte").attr("checked") ? 4 : 0,
		"commerce" : $("#commerce").attr("checked") ? 5 : 0,
		"nb_per_page" : $("#nb_per_page").val(),
		"num_page" : num_page
	}, op.initCallBack);
}

op.viewInfo = function(idop) {
	$.getJSON(BASE_URL + "op/get/" + idop, op.viewCallBack);
}
op.viewCallBack = function(json) {
	ops = json.op;
	$("#nom_OP").html(ops.nom_op);
	$("#info_region").html(ops.nom_region);
	$("#info_district").html(ops.nom_district);
	$("#info_commune").html(ops.commune);
	$("#info_fokontany").html(ops.fokontany);
	$("#info_nom_op").html(ops.nom_op);
	$("#info_date_creation").html(ops.date_creation);
	$("#info_nom_president").html(ops.nom_president);
	$("#info_numtel").html(ops.numtel);
	$("#info_nb_homme").html(ops.nb_homme);
	$("#info_nb_femme").html(ops.nb_femme);
	$("#info_total").html(parseInt(ops.nb_homme)+parseInt(ops.nb_femme));
	$("#info_nb_femme_bureau").html(ops.nb_femme_bureau);
	$("#info_is_formel").html(ops.is_formel?"Oui":"Non");
	$("#info_filiere1").html(ops.filiere1);
	$("#info_spec_filiere1").html(specialisation[ops.spec_filiere1]);
	$("#info_filiere2").html(ops.filiere2?ops.filiere2:"Néant");
	$("#info_spec_filiere2").html(specialisation[ops.spec_filiere2]);
	$("#info_filiere3").html(ops.filiere3?ops.filiere3:"Néant");
	$("#info_spec_filiere3").html(specialisation[ops.spec_filiere3]);
	$("#op_dialog").modal();
}
