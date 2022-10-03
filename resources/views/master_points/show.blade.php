@extends('layouts.modal')

@section('content')

  
  <div class="col-sm-12">
      <h3 class="m-widget1__title">
          <span>{{$master_point->address}}</span>
      </h3>
    <p>
      {{$master_point->description}}
    </p> 
  </div>

  <div class="col-12 mb-3">
      <div id="masterPointMap" class="map" style="height:300px;"></div>
  </div>
  
<script>
    var center_coords = {lat: {{$master_point->latitude}}, lng: {{$master_point->longitude}} };
    var map = new google.maps.Map(document.getElementById('masterPointMap'), {
      zoom: 7,
      center: center_coords
    });
    var markers = [];
    var marker = new google.maps.Marker({
      position: center_coords,
      map: map
    });

</script>


@endsection

