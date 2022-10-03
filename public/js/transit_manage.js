$(document).ready(function(){
	initTransitMap();
	updateTransitRoute();
});


function calculateAndDisplayTransitRoute(directionsService, directionsDisplay, coords_origin, coords_destination, waypts) {
	directionsService.route({
		origin: coords_origin,
		waypoints: waypts,
		destination: coords_destination,
		travelMode: 'DRIVING'
	}, function(response, status) {
		if (status === 'OK') {
		  directionsDisplay.set('directions', null);
		  directionsDisplay.setDirections(response);
		} else {
		  window.alert('Directions request failed due to ' + status);
		}
	});
}


function updateTransitRoute(){
  points = $('.transit_master_point');
  //Gets a new route
  if(points.length>1){

    first_point = $('.transit_master_point').first();
    origin_coords = first_point.attr('lat')+','+first_point.attr('lng');
    last_point = $('.transit_master_point').last();
    destination_coords = last_point.attr('lat')+','+last_point.attr('lng');
    
    waypts = [];
    if(points.length>2){
      for (i = 1; i < points.length-1; i++) { 
          waypts.push({
            location: new google.maps.LatLng($(points[i]).attr('lat'), $(points[i]).attr('lng')),
            stopover: true
          });              
      }
    }
  	calculateAndDisplayTransitRoute(directionsService, directionsDisplay, origin_coords, destination_coords, waypts);          
  }else{
  	directionsDisplay.set('directions', null);
  	if(points.length==0){
  		$('#transit_master_points .alert').show();	
  	}else{
  		$('#transit_master_points .alert').hide();	
  	}
  }
}



function showOrder(url){

  $( "#general_modal .modal-content" ).load( url, function(){   
    $(".map").each(function(index, value){
      var origin_coords = $(this).attr('origin_coords');    
      var destination_coords = $(this).attr('destination_coords');    
      //console.log(destination_coords);
      var element_id = $(this).attr('id');
      //loadMap(element_id, origin_coords, destination_coords);
    });
  } );
  $('#general_modal').modal();
}