$(document).ready(function(){
	$('.phone_area_validation').mask('009');
});
$(document).ready(function(){
	$('.phone_number_validation').mask('0000-00009');
});
$(document).ready(function(){
	$('.address_number_validation').mask('099999');
});
$(document).ready(function(){
	$('.zip_code_validation').mask('AAAAA-AAA');
});
$(document).ready(function(){
	$('.money_validation').mask('#.##0,00', {reverse: true});
});
$(document).ready(function(){
    $(".syncInput").keyup(function(){
        $(".syncInput").val($(this).val());
    });
});
$(document).ready(function(){
	$('#origin_search').on('keydown', function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}	
	});
	$('#destination_search').on('keydown', function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}	
	});
});