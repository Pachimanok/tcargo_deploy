@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      @if(isset($shipping_company) && ($shipping_company->drivers->count() == 0 || $shipping_company->vehicles->count() == 0))
        @include('includes.void_alerts')
      <hr> 
      @endif
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.create')}} {{__('transit.transit')}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/transits/index/'.$shipping_company->id, __('transit.index')),
          Breadcrumbs::item(url()->current(), __('nav.create'), true),
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <!--begin::Form-->
  <form enctype="multipart/form-data" action="{{url('/transits/store')}}" method="post" class="m-form m-form--label-align-right" onsubmit="return validateForm();">
    {{csrf_field()}}
    <input type="hidden" name="shipping_company_id" value="{{$shipping_company->id}}">
    @if(strstr(request()->headers->get('referer'), 'transits/select'))
    <input type="hidden" name="redirect_to" value="{{request()->headers->get('referer')}}">
    @endif    
    <div class="row">
      <div class="col-md-12">
        @if($order->id)
        @include('packages.order')
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">


        <!--begin::Portlet-->
        <div class="m-portlet">
          

          <div class="map" id="map" style="background:#ccc; height:400px; "></div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group row">
              <div class="col-lg-6 ">
                <label>
                  {{__('transit.vehicle')}}
                </label>
                {{ Form::select('vehicle_id', $vehicles, old('vehicle_id'), ['class'=>'form-control']) }}
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
                {{ Form::select('driver_id', $drivers, old('driver_id'), ['class'=>'form-control']) }}
                @if ($errors->has('driver_id'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('driver_id') }}
                    </div>
                @endif

              </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 my-0">
                      <label class="m-checkbox m-checkbox--solid ml-3 my-auto">
                        <input type="checkbox" name="all_negatives" value="1" @if(old('all_negatives')) checked @endif >
                        {{__('transit.all_negatives')}}
                        <span></span>
                      </label>
                  </div>
                </div>
          </div>
        </div>
        <!--end::Portlet-->


      </div>

      <!-- SECOND COLUMN - INFO -->
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
              <div class="alert alert-info">{{__('transit.empty_checkpoints_alert')}}</div>
            </div>
            
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
                <a href="{{url('transits/index/'.$shipping_company->id)}}" class="btn btn-secondary">
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
  function initMap() {

    var mapCenter = {lat: -31.41871102576649, lng: -64.18982349336147};
    window.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: mapCenter
    });

    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(window.map);
    directionsDisplay.setOptions({
      preserveViewport: true,
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
        //Adds to list
        $('#transit_master_points').append('<div class="transit_master_point" lat="'+this.getPosition().lat()+'" lng="'+this.getPosition().lng()+'"><a class="pull-right text-danger" href="javascript:void(0);" onclick="$(this).parent().remove(); updateRoute(); "><i class="fa fa-close"></i></a> <i class="fa fa-bars"></i> <strong>'+this.title+'</strong> '+this.address+'<input type="hidden" name="transit_master_points[]" value="'+this.mp_id+'"/></div>');
        updateRoute();
        //Sets icon
        //this.setIcon('http://maps.google.com/mapfiles/kml/pal3/icon'+marker_number+'.png')
        //this.setLabel(marker_number.toString());
      }); 
    @endforeach

  }

  function validateForm(){
    points = $('.transit_master_point');
    if(points.length<2){
      swal(
        '{{__('messages.error')}}',
        '{{__('transit.less_than_two_masterpoints')}}',
        'error'
      )
      return false;  
    }
    
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

