$(document)
		.ready(
				function() {
					function initialize() {
						  var mapOptions = {
						    zoom: 8,
						    center: new google.maps.LatLng(-18.382333, 47.292389),
						    mapTypeId: google.maps.MapTypeId.ROADMAP
						  };
						  var map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
						  setMarkers(map, districts);
						}
						/**
						 * Data for the markers consisting of a name, a LatLng and a zIndex for
						 * the order in which these markers should display on top of each
						 * other.
						 */
					var markers = [];
					var infowindow = new google.maps.InfoWindow({
			    	      content: "TEST ICI"
					});
						function setMarkers(map, locations) {
						  for (var i = 0; i < locations.length; i++) {
						    var district = locations[i];
						    var myLatLng = new google.maps.LatLng(district[1], district[2]);
						    var marker = new google.maps.Marker({
						        position: myLatLng,
						        map: map,
						        title: district[0],
						        zIndex: district[3]
						    });
						    markers.push(marker);
						  }
						}; 
						console.log(markers);
						google.maps.event.addListener(markers, 'click', function() {
							
					    	/*$.postJSON(BASE_URL+"prix/get",
					    			{"nom_district": marker.title, 
					    			 "date": now()	
					    			}
					    			, 
					    			sendCallBack(marker)); */
							
					    });
					    sendCallBack = function(marker){
							infowindow.open(map,marker);
						};
						
					initialize();
				});