// JavaScript Document
$(document).ready(function() {
			$('#da-slider').cslider({
				autoplay : true,
				bgincrement : 450
			});
			$('.map').append('<div class="overlay">').append('<div class="tooltip">Salut</tooltip>');
			// On passe sur une région
			$('.map area').mouseover(
					function() {
						// On recupère le href de la région
						nom_region = $(this).attr("href").split("/")[1];
						// On le met le premier caractère au majuscule
						nom_region = nom_region.charAt(0).toUpperCase()+ nom_region.slice(1);
						var index = $(this).index();
						var left = -index * 250 - 250;
                        $('.map .overlay').css({
                           backgroundPosition :left+"px 0px"
                        });
						$(this).attr("title",nom_region);
					});
			// On sort de la map
			$('.map').mouseout(function() {
				$('.map .overlay').css({
					backgroundPosition : "250px 0px"
				});
				$('.map .xtooltip').stop().fadeTo(500, 0);
			});
			$.postJSON = function(url, data, callback) {
				$.post(url, data, callback, "json");
			};
			$('.map area').tooltip();
			/*
			 * Tabs
			 */
			$('#myTab a').click(function (e) {
				  e.preventDefault();
				  $(this).tab('show');
			});
			$(".article a").attr("target","_blank");
});
function dateMysql2Fr(date){
	date = date.split(" ")[0];
	date = date.split("-");
	return date[2]+"/"+date[1]+"/"+date[0];
}
function dateFr2Mysql(date){
	date = date.split(" ")[0];
	date = date.split("/");
	return date[2]+"-"+date[1]+"-"+date[0];
}
function now() {
	var date = new Date();
	var month = date.getMonth() + 1;
	return date.getFullYear() + "-" + month + "-" + date.getDate() + " "
			+ date.getHours() + ":" + date.getMinutes() + ":"
			+ date.getSeconds();
}
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 