@extends('layouts.modal')

@section('content')

  <div class="col-sm-12">
      <h3 class="m-widget1__title">
          {{$order->description}}
      </h3>

      <span class="m-widget1__desc">
          <div class="row">
            <div class="col-4">
              <strong>{{__('order.id')}}</strong> 
              <br>{{$order->id}}
            </div>
            <div class="col-4">
              <strong>{{__('order.package_type')}}</strong>
              <br>{{__("order.".$order->package_type)}}
            </div>
            <div class="col-4">          
              <strong>{{__('order.load_type')}}</strong>
              <br>{{__("order.".$order->load_type)}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3">
              <strong>{{__('order.weight')}}</strong>
              <br>@if($order->weight) {{$order->weight}} kg @else {{__('messages.undefined')}} @endif
            </div>
            <div class="col-3">
              <strong>{{__('order.width')}}</strong>
              <br>@if($order->width) {{$order->width}} m @else {{__('messages.undefined')}} @endif
            </div>
            <div class="col-3">          
              <strong>{{__('order.height')}}</strong>
              <br>@if($order->height) {{$order->height}} m @else {{__('messages.undefined')}} @endif
            </div>
            <div class="col-3">          
              <strong>{{__('order.length')}}</strong>
              <br>@if($order->length) {{$order->length}} m @else {{__('messages.undefined')}} @endif
            </div>
          </div>          
          <hr> <!-- LOAD CLASSES -->
          <div class="row">
            <div class="col-sm-12">
              <h4>
                  {{__('order.load_classes')}}
              </h4>       
            </div>
          </div>
          <div class="row">
            @foreach($load_classes as $load_class)
              <div class="col-3">
                <p>
                  <b>{{$load_class->name}}</b>
                  <br>
                  @if(in_array($load_class->id, $order->load_classes)) 
                  {{__('messages.yes')}} 
                  @else 
                  {{__('messages.no')}} 
                  @endif
                </p>
              </div>    
            @endforeach

          </div>
           <div class="row">
              <div class="col-3">
                <p><i class="fa fa-info-circle"></i> @if($order->insurance) {{__('order.insurance')}} @else {{__('order.no_insurance')}} @endif </p> 
              </div>
            </div>  
          <hr>
          <div class="row">
            <div class="col-12 mb-3">
                <!--<div id="map_{{$order->id}}" class="map" origin_coords="{{$order->origin_coords}}" destination_coords="{{$order->destination_coords}}" style="height:255px;"></div>-->
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <h4>
                  {{__('messages.from')}}
                  <a class="btn btn-secondary btn-sm pull-right" href="https://www.google.com/maps/?q={{$order->origin_coords}}" target="_new"><i class="fa fa-map-marker"></i> {{__('order.see_in_map')}}</a>
              </h4>                
              <h5>
                {{$order->origin}} 
              </h5>



              <p>
                <strong>{{__('order.origin_period_start')}}</strong><br>
                @if($order->origin_period_start) 
                  {{date("d/m/Y H:i", strtotime($order->origin_period_start))}} 
                @else 
                  {{__('messages.no_preferences')}}
                @endif
              </p>
              <p>
               <strong>{{__('order.origin_period_end')}}</strong><br>
                @if($order->origin_period_end) 
                  {{date("d/m/Y H:i", strtotime($order->origin_period_end))}} 
                @else 
                  {{__('messages.no_preferences')}}
                @endif
              </p>

              @if($order->origin_period_night) <p><i class="fa fa-info-circle"></i> {{__('order.origin_period_night')}}</p> @endif
              @if($order->origin_notes) <hr><b>{{__('order.origin_notes')}}</b><br> {{$order->origin_notes}} @endif
            </div>

            <div class="col-6">
              <h4>
                <i class="fa fa-map-marker"></i> {{__('messages.to')}}
                <a class="btn btn-secondary btn-sm pull-right" href="https://www.google.com/maps/?q={{$order->destination_coords}}" target="_new"><i class="fa fa-map-marker"></i> {{__('order.see_in_map')}}</a>
              </h4>
              <h5>
                {{$order->destination}}

              </h5>
              <p>  
                <strong>{{__('order.destination_period_start')}}</strong><br>
                @if($order->destination_period_start) 
                  {{date("d/m/Y H:i", strtotime($order->destination_period_start))}} 
                @else 
                  {{__('messages.no_preferences')}}
                @endif
              </p>
              <p>
                <strong>{{__('order.destination_period_end')}}</strong><br>
                @if($order->destination_period_end) 
                  {{date("d/m/Y H:i", strtotime($order->destination_period_end))}} 
                @else 
                  {{__('messages.no_preferences')}}
                @endif
              </p>
              @if($order->destination_period_night) <p><i class="fa fa-info-circle"></i> {{__('order.destination_period_night')}}</p> @endif
              @if($order->destination_notes) <hr><b>{{__('order.destination_notes')}}</b><br> {{$order->destination_notes}} @endif
            </div>
          </div>
          <hr>
          <h3 class="text-center">
            <small>{{__('order.order_amount')}}<br></small> $ {{ number_format($order->amount, 2, ",", ".")}}
          </h3>
          <hr>
          @if($order->user_notes) <p><b>{{__('order.user_notes')}}</b><br> {{$order->user_notes}}</p><hr> @endif
          <div class="row">
            <div class="col">
                <strong>{{__('user.name')}}</strong> <br>
                {{$order->user->name}}
            </div>
            <div class="col">
                <strong>{{__('user.email')}}</strong> <br>
                {{$order->user->email}}
            </div>
            <div class="col">
                <strong>{{__('user.phone_number')}}</strong><br>
                {{$order->user->phone_number_area_code}} {{$order->user->phone_number}}
            </div>
            <div class="col">
                <strong>{{__('order.created_at')}}</strong><br>
                {{date("d/m/Y",strtotime($order->created_at))}}
            </div>
          </div>
      </span>
  </div>
<hr>
  <div class="row">
    <div class="col">
      @if($order->packages->count()>0)
          <h3 class="mb-4">{{ucfirst(trans_choice('package.packages', $order->packages->count()))}}</h3>

          @foreach($order->packages as $package)
            <div class="row mb-3 mt-2">
              <div class="col-2">
                <strong>{{__('package.package')}}</strong>
                <br> #{{$package->id}}
              </div>              
              <div class="col">
                <strong>{{__('order.load_origin')}}</strong>
                <br>{{$package->origin_checkpoint->master_point->name}}
                @if($package->load_date) <br><b class="text-success">{{__('transit.package_loaded')}}</b> @endif
              </div>
              <div class="col">
                <?$last_checkpoint = __('messages.no_data');?>
                @foreach($package->transit->checkpoints as $checkpoint)
                  @if($checkpoint->arrival_date)
                    <?$last_checkpoint = $checkpoint->master_point->name;?>
                  @endif
                @endforeach
                <strong>{{__('transit.last_checkpoint')}}</strong>
                <br>{{$last_checkpoint}}
              </div>              
              <div class="col">
                <strong>{{__('order.load_destination')}}</strong>
                <br>{{$package->destination_checkpoint->master_point->name}}
                @if($package->unload_date) <br><b class="text-success">{{__('transit.package_delivered')}}</b> @endif
              </div>
              <div class="col">
                <strong>{{__('package.information')}}</strong>
                <br>@if($package->information) {{$package->information}} @else {{__('package.no_information')}} @endif

              </div>

            </div>
          @endforeach

      @else
        <div class="alert alert-primary">
          {{__('order.not_distributed')}}
        </div>
      @endif
      </div>
  </div>
  

@endsection

