@extends('layouts.modal')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h3>
          {{__('transit.transit')}}
          <a class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" href="{{url('transits/update/'.$transit->id)}}"><i class="fa fa-edit"></i></a>                        
          <a class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" href="{{url('transits/manage/'.$transit->id)}}"><i class="fa fa-map-marker"></i></a>                      
      </h3>       
    </div>
  </div>

  <div class="row">
    <div class="col-3">
      <p>
        <b>{{__('transit.driver')}}</b>
        <br>{{$transit->driver->name}}
      </p>
    </div>
    <div class="col-3">
      <p>
        <b>{{__('transit.vehicle')}}</b>
        <br>{{$transit->vehicle->brand}}
        - {{$transit->vehicle->model}}
        - {{$transit->vehicle->plate}}
      </p>      
    </div>
    <div class="col-3">
      <p>
        <b>{{__('messages.created_at')}}</b>
        <br>{{\Carbon\Carbon::parse($transit->created_at)->format('d/m/Y')}}
      </p>  
    </div>
    <div class="col-3">
      <p>
        <b>{{__('messages.updated_at')}}</b>
        <br>{{\Carbon\Carbon::parse($transit->updated_at)->format('d/m/Y')}}
      </p>  
    </div>
  </div>

  <div class="row">
    <div class="col-12">
        <div class="map" id="map_{{$transit->id}}" style="background:#ccc; height:400px; "></div>
    </div>
  </div>
  
  <div class="row mt-3">
    <div class="col-12"><h3>{{__('transit.checkpoints')}}</h3></div>
    @foreach($transit->checkpoints as $checkpoint)  
    <div id="<?=$checkpoint->id?>" class="mt-3 col-12 transit_master_point" lat="<?=$checkpoint->master_point->latitude?>" lng="<?=$checkpoint->master_point->longitude?>" >
      <h4>
        <?=$checkpoint->sort?> - <?=$checkpoint->master_point->name?>
        @if($checkpoint->arrival_date) <i class="fa fa-check text-success" title="{{date('d/m/Y H:i:s', strtotime($checkpoint->arrival_date))}}"></i> @endif
      </h4> 
      <p><?=$checkpoint->master_point->address?></p>
      <div class="row">
        <div class="col-6">
          @foreach($checkpoint->loads as $load)  
            <p>
              <i class="fa fa-arrow-up"></i> 
              @if($load->load_date) <i class="fa fa-check text-success" title="{{date('d/m/Y H:i:s', strtotime($load->load_date))}}"></i> @endif
              {{__('package.package_load')}} #{{$load->id}} ({{__('order.order')}} #{{$load->order_id}})
              <br>@if($load->information) {{$load->information}} @else {{__('package.no_information')}} @endif
            </p>
          @endforeach
        </div>
        <div class="col-6">
          @foreach($checkpoint->unloads as $unload)  
            <p>
              <i class="fa fa-arrow-down"></i> 
              @if($unload->unload_date) <i class="fa fa-check text-success" title="{{date('d/m/Y H:i:s', strtotime($unload->unload_date))}}"></i> @endif
              {{__('package.package_unload')}} #{{$unload->id}} ({{__('order.order')}} #{{$unload->order_id}})
              <br>@if($unload->information) {{$unload->information}} @else {{__('package.no_information')}} @endif
            </p>
          @endforeach
        </div>
      </div>




    </div>
    @endforeach

  </div>
<script>

  function initMap(id) {

    var mapCenter = {lat: -31.41871102576649, lng: -64.18982349336147};
    window.map = new google.maps.Map(document.getElementById('map_'+id), {
      zoom: 8,
      center: mapCenter
    });

    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(window.map);
    directionsDisplay.setOptions({
      suppressMarkers: true
    });
   
    <?$i=0;?>
    @foreach($transit->checkpoints as $checkpoint)
    <?$i++;?>
    var myLatLng = {lat: {{$checkpoint->master_point->latitude}}, lng: {{$checkpoint->master_point->longitude}}};
    var marker{{$checkpoint->id}} = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: '{{$checkpoint->master_point->name}}',
      address: '{{$checkpoint->master_point->address}}',
      cp_id: '{{$checkpoint->id}}',
      label: '{{$i}}',
      //icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    });
    @endforeach

    //updateRoute();

  }

$(document).ready(function(){
    initMap({{$transit->id}});
})
  



</script>

@endsection

