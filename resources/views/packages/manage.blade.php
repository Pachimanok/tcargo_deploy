@extends('layouts.app')

@section('content')
<div class="row mt-5">
  <div class="col-sm-8 m-auto col-md-8 col-lg-6">
    <div class="row">
      <div class="col-sm-12">
        <h2>
            {{__('transit.manage')}}
        </h2>       
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

    <div class="map" id="map_transit" style="background:#ccc; height:400px; "></div>

    
    <div class="row mt-3">
      <div class="col-12"><h3>{{__('transit.checkpoints')}}</h3></div>
      @foreach($transit->checkpoints as $checkpoint)  
        <div id="<?=$checkpoint->id?>" class="mt-3 mb-3 col-12 transit_master_point" lat="<?=$checkpoint->master_point->latitude?>" lng="<?=$checkpoint->master_point->longitude?>" style="border-bottom: 1px solid #cecece;">
          <h4><?=$checkpoint->sort?> - <?=$checkpoint->master_point->name?>  
          
          @if($checkpoint->negative)
          <a href="{{url('transits/negative/'.$checkpoint->id.'/1')}}" class="small">{{__('transit.remove_from_negatives')}}</a>
          @else
            <a href="javascript:void(0);" onclick="$('#wait_period_block_{{$checkpoint->id}}').toggle();" class="small">{{__('transit.add_to_negatives')}}</a>
            <form method="POST" action="{{url('transits/negative/'.$checkpoint->id)}}" style="display: none;" id="wait_period_block_{{$checkpoint->id}}">
              {{csrf_field()}}
              <span style="display: block;">
                <span class="my-1" style="display: inline-block;">
                  <input type="text" value="{{(old('wait_period_start'))}}" class="form-control transit_datetime_picker" readonly name="negative_start" placeholder="{{__('order.origin_period_start')}}"/>
                </span>
                <span class="my-1" style="display: inline-block;">
                  <input type="text" value="{{(old('wait_period_end'))}}" class="form-control transit_datetime_picker" readonly name="negative_end" placeholder="{{__('order.origin_period_end')}}"/>
                </span>
                <button type="submit" class="btn btn-info">{{__('nav.create')}}</button>
              </span>
            </form>
            
          @endif 

          @if($checkpoint->arrival_date)
            <small>
              <i class="fa fa-check"></i> {{\Carbon\Carbon::parse($checkpoint->arrival_date)->format('d/m/Y H:i')}}
              <a class="text-muted small" href="{{url('transits/check/'.$checkpoint->id.'/1')}}">{{__('nav.undo')}}</a>
            </small>
          @else
            <a class="btn btn-sm btn-success pull-right" href="{{url('transits/check/'.$checkpoint->id)}}">{{__('transit.checkpoint_reached')}}</a>
          @endif 
          </h4>
          @if($checkpoint->negative_start OR $checkpoint->negative_end)
            @if($checkpoint->negative_start)<p><i class="fa fa-truck"></i> {{date('d/m/Y H:i', strtotime($checkpoint->negative_start))}}@endif
            @if($checkpoint->negative_end)- <i class="fa fa-truck"></i> {{date('d/m/Y H:i', strtotime($checkpoint->negative_end))}}</p>@endif
          @endif
        <p><?=$checkpoint->master_point->address?></p>
        <div class="row" style="background:#eeeeee;">
          @if(count($checkpoint->loads)==0 AND count($checkpoint->unloads)==0)
            <div class="col-12 pt-3">
              <div class="alert" style="background-color: #ffffff77;">{{__('transit.no_tasks')}}</div>
            </div>
          @else
            <div class="col-sm-6 p-4">
              <h5>{{__('transit.loads')}}</h5>
              @foreach($checkpoint->loads as $load)  
                <p>
                  <i class="fa fa-arrow-up"></i> {{__('package.package_load')}} #{{$load->id}} 
                  <a href="javascript:void(0);" onclick="showOrder('{{url("orders/show", ['id'=>$load->order_id])}}');">
                    ({{__('order.order')}} #{{$load->order_id}})
                  </a>
                  <br>@if($load->information) {{$load->information}} @else {{__('package.no_information')}} @endif
                  <br>
                  @if($load->load_date)
                    <small>
                      <i class="fa fa-check"></i> {{\Carbon\Carbon::parse($load->load_date)->format('d/m/Y H:i')}}
                      <a class="text-muted" href="{{url('packages/load/'.$load->id.'/1')}}">{{__('nav.undo')}}</a>
                    </small>                 
                  @else
                    <a class="btn btn-sm btn-success" href="{{url('packages/load/'.$load->id)}}">{{__('transit.package_loaded')}}</a>
                  @endif
                </p>
              @endforeach
            </div>
            <div class="col-sm-6 p-4">
              <h5>{{__('transit.unloads')}}</h5>
              @foreach($checkpoint->unloads as $unload)  
                <p>
                  <i class="fa fa-arrow-down"></i> {{__('package.package_unload')}} #{{$unload->id}} 
                  <a href="javascript:void(0);" onclick="showOrder('{{url("orders/show", ['id'=>$unload->order_id])}}');">
                    ({{__('order.order')}} #{{$unload->order_id}})
                  </a>
                  <br>@if($unload->information) {{$unload->information}} @else {{__('package.no_information')}} @endif
                  <br>
                  @if($unload->unload_date)
                    <small>
                      <i class="fa fa-check"></i> {{\Carbon\Carbon::parse($unload->unload_date)->format('d/m/Y H:i')}}
                      <a class="text-muted" href="{{url('packages/unload/'.$unload->id.'/1')}}">{{__('nav.undo')}}</a>
                    </small>                 
                  @else
                    <a class="btn btn-sm btn-success" href="{{url('packages/unload/'.$unload->id)}}">{{__('transit.package_delivered')}}</a>
                  @endif

                </p>
              @endforeach
            </div>
          @endif
        </div>




      </div>

      @endforeach

    </div>
  </div>
</div>

<script>

  function initTransitMap() {
    $('.transit_datetime_picker').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'dd-mm-yyyy hh:ii',
        minuteStep: 15
    });
    var mapCenter = {lat: -31.41871102576649, lng: -64.18982349336147};
    window.map = new google.maps.Map(document.getElementById('map_transit'), {
      zoom: 4,
      center: mapCenter
    });

    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(window.map);
    directionsDisplay.setOptions({
      suppressMarkers: true
    });

    <? $i=0; ?>

    @foreach($transit->checkpoints as $checkpoint)
  
    <? $i++; ?>

    var myLatLng = {lat: {{$checkpoint->master_point->latitude}}, lng: {{$checkpoint->master_point->longitude}}};
    var marker{{$checkpoint->master_point->id}} = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: '{{$checkpoint->master_point->name}}',
      address: '{{$checkpoint->master_point->address}}',
      mp_id: '{{$checkpoint->master_point->id}}',
      icon:  @if($checkpoint->arrival_date) 'http://maps.google.com/mapfiles/ms/icons/green-dot.png' @elseif($i==1) 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' @else 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' @endif,
    });


    @endforeach


  }

</script>

@endsection

