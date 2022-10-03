

function showOrder(url){

	$( "#general_modal .modal-content" ).load( url, function(){		
		$(".map").each(function(index, value){
			var origin_coords = $(this).attr('origin_coords');		
			var destination_coords = $(this).attr('destination_coords');		
			//console.log(destination_coords);
			var element_id = $(this).attr('id');
			loadMap(element_id, origin_coords, destination_coords);
		});
	} );
	$('#general_modal').modal();
}

function loadMap(element_id, origin_coords, destination_coords) {
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer;

	var map = new google.maps.Map(document.getElementById(element_id), {});
	directionsDisplay.setMap(map);
	calculateAndDisplayRoute(directionsService, directionsDisplay, origin_coords, destination_coords);

	var service = new google.maps.DistanceMatrixService;
	service.getDistanceMatrix({
		origins: [origin_coords],
		destinations: [destination_coords],
		travelMode: 'DRIVING',
		unitSystem: google.maps.UnitSystem.METRIC,
		avoidHighways: false,
		avoidTolls: false
	}, function(response, status) {
		if (response.rows[0].elements[0].distance) {
			$('#route_length').html(response.rows[0].elements[0].distance.text);
		}
		//$('#tot_distance_duration').html(response.rows[0].elements[0].duration.text);
	});
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, coords_origin, coords_destination) {
	directionsService.route({
		origin: coords_origin,
		destination: coords_destination,
		travelMode: 'DRIVING'
	}, function(response, status) {
		if (status === 'OK') {
		  directionsDisplay.setDirections(response);
		} else {
		  //window.alert('Directions request failed due to ' + status);
		  $('#show_route_map_sc').remove();
		}
	});
}