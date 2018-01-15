var suscriber = {};

suscriber.save = function(){
	if (!validateEmail($("#email_adress").val())) {
		alert("Vérifier votre adresse email!");
		return;
	}
	$.postJSON(BASE_URL + "admin.php/suscriber/save/", {
		"idsuscriber": "null",
		"mail" : $("#email_adress").val()
	}, suscriber.saveCallBack);
};
suscriber.saveCallBack = function(json){
	if (json.message){
		alert(json.message);
		return;
	}
	$("#idsuscriber").val(json.suscriber.idsuscriber);
	$('#modal_suscriber').modal();
}
suscriber.confirm = function(){
	if (!$("#suscribername").val()) {
		alert("Veuillez compléter le formulaire!");
		return;
	} 
	$.postJSON(BASE_URL + "admin.php/suscriber/save/", {
		"idsuscriber": $("#idsuscriber").val(),
		"suscribername" : $("#suscribername").val(),
		"numtel": $("#numtel").val(),
		"organisme_profession": $("#organisme_profession").val()
	}, suscriber.confirmCallBack);
}
suscriber.confirmCallBack = function(){
	$('#modal_suscriber').modal('hide');
	$("#success_message").fadeIn(1000);
	$("#success_message").fadeOut(10000, "linear");
}