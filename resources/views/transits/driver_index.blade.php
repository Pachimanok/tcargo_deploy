@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('transit.my_transits')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/drivers/transits', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/transits', __('transit.my_transits'), true)
      ])}}
    </div>
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <div class="row">
    <div class="col-lg-12">

      <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
          <!--begin: Search Form -->
          <form method="GET">
            <div class="row">
              <div class="col">
                <div class="form-group m-form__group row align-items-center">

                  <div class="col-9 col-sm-3">
                    <div class="m-input-icon m-input-icon--left">
                      <input type="text" name="search" class="form-control m-input" placeholder="{{__('nav.search')}}" value="{{request()->search}}">
                      <span class="m-input-icon__icon m-input-icon__icon--left">
                        <span><i class="la la-search"></i></span>
                      </span>
                    </div>
                    <div class="d-md-none m--margin-bottom-10"></div>
                  </div>

                  <div class="col-3 col-sm-6">
                    <button type="submit" class="btn btn-default">{{__('nav.filter')}}</button>
                  </div>

                </div>
              </div>
              
              <div class="ml-auto">
              </div>
            </div>
          </form>
          <!--end: Search Form -->
          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{__('shipping_company.shipping_company')}}</th>
                <th>{{__('driver.driver')}}</th>
                <th>{{__('vehicle.vehicle')}}</th>
                <th>{{__('transit.checkpoints')}}</th>          
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($transits as $transit)
                  <tr>

                    <td>
                      {{$transit->shipping_company->company_name}}
                    </td>

                    <td>
                      {{$transit->driver->name}}
                      <br>{{$transit->driver->phone_number_area_code}} {{$transit->driver->phone_number}}
                      <?
                        $driver_load_classes = explode("|", $transit->driver->driver_load_classes);
                      ?>
                      @foreach($driver_load_classes as $load_class)
                        @if($load_class = $load_classes->find($load_class))
                          <li>{{$load_class->name}}</li>
                        @endif
                      @endforeach
                    </td>

                    <td>
                      {{$transit->vehicle->model}}
                      <br>{{$transit->vehicle->plate}}
                      <?
                        $vehicle_load_classes = explode("|", $transit->vehicle->vehicle_load_classes);
                      ?>
                      @foreach($vehicle_load_classes as $load_class)
                        @if($load_class = $load_classes->find($load_class))
                          <li>{{$load_class->name}}</li>
                        @endif
                      @endforeach
                    </td>

                    <td>
                      @foreach($transit->checkpoints as $checkpoint)
                        <div>{{$checkpoint->sort}} -  
                          @if($checkpoint->arrival_date) <i class="fa fa-check"></i> @endif  {{$checkpoint->master_point->name}}
                          @foreach($checkpoint->loads as $load)  
                            <i class="fa fa-arrow-up @if($load->load_date) text-success @else text-muted @endif" title="{{__('package.package_load')}} #{{$load->id}} ({{__('order.order')}} #{{$load->order_id}})"></i> 
                          @endforeach                        
                          @foreach($checkpoint->unloads as $unload)  
                            <i class="fa fa-arrow-down  @if($unload->unload_date) text-success @else text-muted @endif" title="{{__('package.package_unload')}} #{{$unload->id}} ({{__('order.order')}} #{{$unload->order_id}})"></i> 
                          @endforeach
                          @if($checkpoint->negative) <i class="fa fa-truck" title="{{__('transit.negative_load')}}"></i> @endif                                     
                        </div>
                      @endforeach
                    </td>

                    <td>
                      <div class="dropdown d-flex justify-content-end">             

                        <!--<a class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:transitshow('{{url("transits/show/".$transit->id."/1")}}', '{{$transit->id}}');"><i class="fa fa-eye"></i></a>
                        &nbsp;&nbsp;-->
                        <a class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" href="{{url('transits/manage/'.$transit->id.'/1')}}"><i class="fa fa-map-marker"></i></a>                          

                      </div>
                    </td>

                  </tr>

                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>


<script>

  function calculateAndDisplayRoute(directionsService, directionsDisplay, coords_origin, coords_destination) {

    directionsService.route({
      origin: coords_origin,
      destination: coords_destination,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
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
    }
  }

  

  function transitshow(url, id){
    $( "#general_modal .modal-content" ).load( url, function(){   
      $('#general_modal').modal();
    } );
  }  

</script>

@endsection

