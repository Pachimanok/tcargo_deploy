$(document).ready(function(){
	initMap('master_point_map');
});

function initMap(element_id) {
	//Córdoba
	center_lat = -31.418304451002175;
	center_lng = -64.18804250657558;

	//verifica os valores nos campos de coordenadas, se não tiver, carrega defaults.
	if( $("#latitude").val() != '' ){
		center_lat = parseFloat($("#latitude").val());
		center_lng = parseFloat($("#longitude").val());
	}
	var center_coords = {lat: center_lat, lng: center_lng};

	var map = new google.maps.Map(document.getElementById(element_id), {
	  zoom: 9,
	  center: center_coords
	});

    var markers = [];
	var marker = new google.maps.Marker({
		position: center_coords,
		map: map
	});
	         
	var geocoder = new google.maps.Geocoder;

	map.addListener('click', function(e) {
		//Clear markers
		markers.forEach(function(marker) {
			marker.setMap(null);
		});
		//Set Marker
		marker.setPosition(e.latLng);
		var latitude = e.latLng.lat();
		var longitude = e.latLng.lng();

		//Fill textarea
		geocoder.geocode({
		  'latLng': e.latLng
		}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
		    if (results[0]) {
		        $('#address').val(results[0].formatted_address);
		        $('#latitude').val(latitude);
		        $('#longitude').val(longitude);
		        $('#'+element_id).click();
		    }
		  }
		});

	});

}     

