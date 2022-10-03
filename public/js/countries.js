$(document).ready(function(){
	if ($(".city_selector")){
	    city_id_field = $(".city_selector");
	    loadCountriesSelector(city_id_field.val());
	}	
});

function loadCountriesSelector(city_id=false){
	if(city_id > 0){
	  loadCity(city_id);
	}else{
	  loadCountriesOptions();
	}
	//Load onchange triggers
	$('.country_selector').on('change', function(){
	  loadStatesOptions($('.country_selector').val());
	});
	$('.state_selector').on('change', function(){
	  loadCitiesOptions($('.state_selector').val());
	});
}

function loadCity(city_id){
    $.ajax({
      url: '/countries/get_city/'+city_id,
      type:"GET",
      dataType:"json",
      success:function(data) {
          loadCountriesOptions(data.country_id, data.state_id, data.city_id);
      }
    });
}
function loadCountriesOptions(select_country_id, select_state_id, select_city_id){
    //console.log('working I"ll start by loading countries');
    $('.country_selector').empty();
    $.ajax({
      url: '/countries/get_countries',
      type:"GET",
      dataType:"json",
      success:function(data) {
          $('.country_selector').empty();
          $.each(data, function(key, value){
              $('.country_selector').append('<option value="'+ key +'">' + value + '</option>');
          });
      },
      complete:function(){
        if(select_country_id){
          $('.country_selector option[value="'+select_country_id+'"]').attr('selected', true);  
        }
        if(select_state_id){
          loadStatesOptions($('.country_selector').val(), select_state_id, select_city_id);
        }
      }
    });
}

function loadStatesOptions(country_id, select_state_id, select_city_id){
  loadCitiesOptions();
  $('.state_selector').empty();
  $.ajax({
    url: '/countries/get_states/'+country_id,
    type:"GET",
    dataType:"json",
    success:function(data) {
        $.each(data, function(key, value){
            $('.state_selector').append('<option value="'+ key +'">' + value + '</option>');
        });
    },
    complete:function(){
      if(select_state_id){
        $('.state_selector option[value="'+select_state_id+'"]').attr('selected', true);  
      }
      if(select_city_id){
        loadCitiesOptions($('.state_selector').val(), select_city_id);
      }                            
    }
  }); 
}

function loadCitiesOptions(state_id, select_city_id){
  $('.city_selector').empty();
  $.ajax({
    url: '/countries/get_cities/'+state_id,
    type:"GET",
    dataType:"json",
    success:function(data) {
        $.each(data, function(key, value){
            $('.city_selector').append('<option value="'+ key +'">' + value + '</option>');
        });
    },
    complete:function(){
      if(select_city_id){
        $('.city_selector option[value="'+select_city_id+'"]').attr('selected', true);  
      }
    }
  });  
}                                        
