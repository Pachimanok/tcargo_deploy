@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.update')}} {{$transit->name}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/transits/index/'.$transit->shipping_company->id, __('transit.index')),
          Breadcrumbs::item(url()->current(), __('nav.update'), true),
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <!--begin::Form-->
  <form enctype="multipart/form-data" action="{{url('/transits/store/'.$transit->id)}}" method="post" class="m-form m-form--label-align-right">
    {{csrf_field()}}
    <input type="hidden" id="transit_id" value="{{$transit->id}}">
    @if(strstr(request()->headers->get('referer'), 'transits/select'))
    <input type="hidden" name="redirect_to" value="{{request()->headers->get('referer')}}">
    @endif

    <div class="row">
      <div class="col-md-8">


        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('transit.transit')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="map" id="map" style="background:#ccc; height:400px; "></div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group row">
              <div class="col-lg-6 ">
                <label>
                  {{__('transit.vehicle')}}
                </label>
                {{ Form::select('vehicle_id', $vehicles, old('vehicle_id', $transit->vehicle_id), ['class'=>'form-control']) }}
                @if ($errors->has('vehicle_id'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('vehicle_id') }}
                    </div>
                @endif
              </div>
              <div class="col-lg-6 ">

                <label>
                  {{__('transit.driver')}}
                </label>
                {{ Form::select('driver_id', $drivers, old('driver_id', $transit->driver_id), ['class'=>'form-control']) }}
                @if ($errors->has('driver_id'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('driver_id') }}
                    </div>
                @endif

              </div>
            </div>

          </div>

        </div>
        <!--end::Portlet-->
      </div>

      <!-- SECOND COLUMN - TRAILER INFO -->
      <!-- ---------------------------- -->
      <div class="col-md-4">

        <!--begin::Portlet-->
        <div class="m-portlet">
          
         <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-map-marker"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('transit.checkpoints')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div id="transit_master_points">

            </div>

            <p class="mb-3 text-center"><a href="{{url('transits/manage/'.$transit->id)}}">{{__('transit.manage')}}</a></p>
          </div>        



        </div>
        <!--end::Portlet-->



      </div>
    </div>

    <div class="row">
      <div class="col-md-12">          
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions--solid">
            <div class="row">

              <div class="col-lg-6 ">
                <a href="{{url('transits/index/'.$transit->shipping_company->id)}}" class="btn btn-secondary">
                  {{__('nav.cancel')}}
                </a>
              </div>

              <div class="col-lg-6 m--align-right">
                <button type="submit" class="btn btn-primary">
                  {{__('nav.submit')}}
                  <i class="fa fa-chevron-right"></i>
                </button>
              </div>

            </div>
          </div>
        </div>
        <!--end::Portlet-->

      </form>
      <!--end::Form-->

    </div>
  </div>
</div>
<script>
  function checkpoint_sort(){
    checkpoints_array = [];
    $query_string_array = "?";
    $.each($('.transit_master_point'), function( index, value ) {     
        checkpoints_array.push($(value).attr('checkpoint_id'));
        $query_string_array += "checkpoints[]="+$(value).attr('checkpoint_id')+"&";
    });
    //console.log($query_string_array);
    $.get( '/transits/checkpoints/'+$('#transit_id').val()+'/sort/'+$query_string_array).done(function(data){
      
      if(data==1){

        swal(
          '{{__('messages.success')}}',
          '{{__('transit.order_changed')}}',
          'success'
        );
      }else{
          swal(
            '{{__('messages.error')}}',
            data,
            'error'
          );      
      }
      //console.log(data);
      fetchTransitCheckpoints($('#transit_id').val());      
    });     

  }

  function checkpoint_remove(checkpoint_id){
      $.get( '/transits/checkpoints/'+checkpoint_id+'/remove/', function( data ) {
        if(data==1){
          checkpoint_sort();
          swal(
            '{{__('messages.success')}}',
            '{{__('transit.checkpoint_removed')}}',
            'success'
          );
        }else{
          swal(
            '{{__('messages.error')}}',
            '{{__('transit.cant_remove_checkpoint')}}',
            'error'
          );          
        }

        fetchTransitCheckpoints($('#transit_id').val());
      });     
  }

  function checkpoint_add(master_point){
      $.get( '/transits/checkpoints/'+$('#transit_id').val()+'/add/'+master_point.mp_id, function( data ) {
        if(data==1){
          swal(
          '{{__('messages.success')}}',
          '{{__('transit.checkpoint_added')}}',
          'success'
        );
        }
      fetchTransitCheckpoints($('#transit_id').val());
      });     
  }

  function initMap() {
    var mapCenter = {lat: -31.41871102576649, lng: -64.18982349336147};
    window.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: mapCenter
    });

    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(window.map);
    directionsDisplay.setOptions({
      suppressMarkers: true
    });

    @foreach($master_points as $master_point)
  
    var myLatLng = {lat: {{$master_point->latitude}}, lng: {{$master_point->longitude}}};
    var marker{{$master_point->id}} = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: '{{$master_point->name}}',
      address: '{{$master_point->address}}',
      mp_id: '{{$master_point->id}}',
      //icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    });

    google.maps.event.addListener(marker{{$master_point->id}}, 'click', function () {
      checkpoint_add(this);
      //If it adds OK, just reload

    }); 
    @endforeach


  }

</script>
<style>
.transit_master_point{
  padding:3px 0 3px 0;
  margin: 3px 0 30px 0;
}
.transit_master_point .fa-bars{
  cursor: move;
}
</style>
@endsection

