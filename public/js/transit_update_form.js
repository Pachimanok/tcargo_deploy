$(document).ready(function(){
  var list = document.getElementById("transit_master_points");
 });

function fetchTransitCheckpoints(transit_id){
	$('#transit_master_points').html('');
  //Gets the checkpoints
  	$.get( '/transits/checkpoints/'+transit_id, function( data ) {
  		//Creates the elements in the list
	    $.each(data, function( index, value ) {  		
	  		//console.log(value);
	  		$('#transit_master_points').append('<div checkpoint_id="'+value.id+'" class="transit_master_point" lat="'+value.master_point.latitude+'" lng="'+value.master_point.longitude+'" ><a class="pull-right text-danger" href="javascript:void(0);" onclick="checkpoint_remove('+value.id+')"><i class="fa fa-close"></i></a> <i class="fa fa-bars"></i> <strong>'+value.master_point.name+'</strong> '+value.master_point.address+'<input type="hidden" name="transit_master_points[]" value="'+value.master_point.id+'"/></div>');
		});
		//Render the route in the screen
		 updateRoute();
  	});  	
}

//When it initializes, starts with this
fetchTransitCheckpoints($('#transit_id').val());