$(document).ready(function() {
	region.init();
	$("#region_idregion").change(function(){
		$("#code_district").html("").addClass("disabled").attr("disabled","disabled");
		id = $(this).val();
		
		if (!id) {
			return;
		}
		$.getJSON(BASE_URL + "region/get_district/"+id, region.getDistrictCallBack);
	});	
});

region = {};

var current_id;

region.init = function(){
	$("#region_idregion").html("");
	$.getJSON(BASE_URL + "region/get/", region.initCallBack);
}
region.initCallBack = function(json){
	var regions = json.regions;
	var options = "<option></option>";
	$.each(regions,function(i,elt){
 		options +="<option value='"+elt.idregion+"'>"+elt.nom_region.toUpperCase()+" ["+elt.nb_op+"]</option>";
	});
	$("#region_idregion").append(options);
}
region.getDistrictCallBack = function(json) {
	var districts = json.districts;
	$("#code_district").html("");
	var options = "<option></option>";
	$.each(districts,function(i,elt){
		if (elt.iddistrict<112 || elt.iddistrict>117)
 		options +="<option value='"+elt.code_district+"'>"+elt.nom_district.toUpperCase()+" ["+elt.nb_op+"]</option>";
	});
	$("#code_district").append(options).removeClass("disabled").removeAttr("disabled");
};
