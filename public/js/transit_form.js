$(document).ready(function(){
	initMap();
	updateRoute();

  var list = document.getElementById("transit_master_points");
  Sortable.create(list, {
    draggable: '.transit_master_point',
    onUpdate: function (evt){
      //If updating, saves sorting.
      if($('#transit_id').length>0){
        checkpoint_sort();
      }
      updateRoute()
    }
  });
});


function calculateAndDisplayRoute(directionsService, directionsDisplay, coords_origin, coords_destination, waypts) {
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


function updateRoute(){
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
  	calculateAndDisplayRoute(directionsService, directionsDisplay, origin_coords, destination_coords, waypts);          
  }else{
  	directionsDisplay.set('directions', null);
  	if(points.length==0){
  		$('#transit_master_points .alert').show();	
  	}else{
  		$('#transit_master_points .alert').hide();	
  	}
  }
}



