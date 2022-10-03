function populateLoadTypes(){

	selected_package_type = $( ".package_type" ).val();

	$('.load_type').find('option').remove();

	$(window.load_types[selected_package_type]).each(function( index ) {

		$('.load_type').append($('<option>', {
		    value: this.value,
		    text: this.text
		}));

	});

}

$(document).ready(function(){

	$( ".package_type" ).on('change', function(){
		populateLoadTypes();
	})	

	populateLoadTypes();
    
    // minimal setup
    $('.order_datetime_picker').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'dd-mm-yyyy hh:ii',
        minuteStep: 15
    });

	loadMaps();

});


function loadMaps(){

	var default_origin_coords = '-31.418304451002175, -64.18804250657558'; //Córdoba
	var default_destination_coords = '-34.62478138399514, -58.39899390935898'; //Buenos aires

	//verifica os valores nos campos de coordenadas, se não tiver, carrega defaults
	if( !$("#origin_coords").val() ){
		$("#origin_coords").val(default_origin_coords)
	}

	if( !$("#destination_coords").val() ){
		$("#destination_coords").val(default_destination_coords);
	}
	
	initMap('origin');
	initMap('destination');

}

function initMap(element_id) {
	if ($('#'+element_id).val()) {
	  $('#'+element_id+'_alert').hide();
	} else {
	  $('#'+element_id).hide();
	}

	var map_coords_element_id = element_id+'_coords';

	//Se ja tiver valor no campo de coordenadas do mapa, substitui os valores de center.
	if( $('#'+map_coords_element_id).val() ){
		coords = $('#'+map_coords_element_id).val().split(',');    
		center_lat = parseFloat(coords[0].trim());
		center_lng = parseFloat(coords[1].trim());
	}


	var center_coords = {lat: center_lat, lng: center_lng};

	var map_element_id = element_id+'_map';

	var map = new google.maps.Map(document.getElementById(map_element_id), {
	  zoom: 9,
	  center: center_coords
	});

	window.map_window = map;

	//Barra de busca no mapa ****************************/

	// Create the search box and link it to the UI element.
	var input = document.getElementById(element_id+'_search');
	var searchBox = new google.maps.places.SearchBox(input);
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	// Bias the SearchBox results towards current map's viewport.
	map.addListener('bounds_changed', function() {
	  searchBox.setBounds(map.getBounds());
	});


    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {

		/*		
		// Clear out the old markers.
		markers.forEach(function(marker) {
			marker.setMap(null);
		});
		markers = [];
		*/

		var places = searchBox.getPlaces();

		if (places.length == 0) {
			return;
		}

		/*
		//Seta o endereço retornado no campo de endereçamento e ajusta os campos de coordenadas.
		//console.log(places[0]);
		$('#'+element_id).val(places[0].formatted_address);
		$('#'+element_id+'_coords').val(places[0].geometry.location.lat()+', '+places[0].geometry.location.lng());
		$('#'+element_id).click();
		*/

		// For each place, get name and location.
		var bounds = new google.maps.LatLngBounds();
		places.forEach(function(place) {

			if (!place.geometry) {
			  console.log("Returned place contains no geometry");
			  return;
			}
			/*
			// Create a marker for each place.
			markers.push(new google.maps.Marker({
			  map: map,
			  title: place.name,
			  position: place.geometry.location
			}));
			*/

			if (place.geometry.viewport) {
			  // Only geocodes have viewport.
			  bounds.union(place.geometry.viewport);
			} else {
			  bounds.extend(place.geometry.location);
			}

		});

		map.fitBounds(bounds);

    });

	/*****************/

	var marker = new google.maps.Marker({
	position: center_coords,
	map: map
	});
	         
	var geocoder = new google.maps.Geocoder;

	if(element_id == 'destination'){
		$('.set_marker').on('click', function(){

			//Clear markers
			markers.forEach(function(marker) {
				marker.setMap(null);
			});
			//console.log( $(this).attr('lat') );
			lat_lng = {lat: Number($(this).attr('lat')), lng: Number($(this).attr('lng'))};
			//Set Marker
			marker.setPosition(lat_lng);
	        map.setCenter(lat_lng); // setCenter takes a LatLng object

			
			var latitude = Number($(this).attr('lat'));
			var longitude = Number($(this).attr('lng'));
			geocoder.geocode({
			  'latLng': lat_lng
			}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
			    if (results[0]) {
			        $('#'+element_id).val(results[0].formatted_address);
			        $('#'+element_id+'_coords').val(latitude+', '+longitude);
			        $('#'+element_id).click();
			        if (results[0].formatted_address) {
			        	$('#'+element_id+'_alert').hide();
			        	$('#'+element_id).show();
			        }

			        //Find closes MPoint (function must be in the view file) and fill in the readonly "[element_id]_closest_master_point_id" field;
			        findClosestMasterPoint(element_id, latitude, longitude);

			    }
			  }
			});
		})

	}


	map.addListener('click', function(e) {

		//Clear markers
		markers.forEach(function(marker) {
			marker.setMap(null);
		});

		//Set Marker
		marker.setPosition(e.latLng);
		var latitude = e.latLng.lat();
		var longitude = e.latLng.lng();

		//console.log(latitude+ " " +longitude);

		//Fill textarea
		geocoder.geocode({
		  'latLng': e.latLng
		}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
		    if (results[0]) {
		        $('#'+element_id).val(results[0].formatted_address);
		        $('#'+element_id+'_coords').val(latitude+', '+longitude);
		        $('#'+element_id).click();
		        if (results[0].formatted_address) {
		        	$('#'+element_id+'_alert').hide();
		        	$('#'+element_id).show();
		        }

		        //Find closes MPoint (function must be in the view file) and fill in the readonly "[element_id]_closest_master_point_id" field;
		        findClosestMasterPoint(element_id, latitude, longitude);
		    }
		  }
		});

	});
	
} 