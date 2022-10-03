<div class="m-portlet m-portlet--mobile">
  <div class="m-portlet__body">
    <div class="row mb-3">
      <div class="col">
        <h4>
         {{__('order.order')}} #{{$order->id}}
        </h4>
        <strong>{{__('order.description')}}</strong>
        <br>{{$order->description}}
        <br><br>
        <strong>{{__('order.load_type')}}</strong>
        <br>{{__("order.".$order->load_type)}}
        <br><br>
        <strong>{{__('order.package_type')}}</strong>
        <br>{{__("order.".$order->package_type)}}
        
        <br><br>
        <strong>{{__('order.load_classes')}}</strong>
        @foreach($load_classes as $load_class)
          @if(in_array($load_class->id, $order->load_classes)) 
          <li>{{$load_class->name}}</li>
          @endif
        @endforeach                
        
      </div>                          
      <div class="col">
        <h4>
         {{__('package.origin_checkpoint')}}
        </h4>              
        <strong>{{__('nav.address')}}</strong>
        <p>{{$order->origin}}</p>
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
        <strong>{{__('master_point.master_point')}}</strong>
        <br>{{$order->origin_master_point->name}}
      </div>
      <div class="col">
        <h4>
         {{__('package.destination_checkpoint')}}
        </h4>                            
        <strong>{{__('nav.address')}}</strong>
        <p>{{$order->destination}}</p>
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
        <strong>{{__('master_point.master_point')}}</strong>
        <br>{{$order->destination_master_point->name}}
      </div>

      <div class="col-12 text-right ml-auto">
        <br>

        <a href="javascript:showOrder('{{url("orders/show", ['id'=>$order->id])}}');"  class="btn btn-secondary m-btn m-btn--icon m-btn--pill">
          <span>
            <i class="la la-eye"></i>
            <span>{{__('nav.show')}} {{__('order.order')}}</span>
          </span>
        </a>

        @if(Request::is('transits/select/*'))
          <a class="btn btn btn-secondary m-btn m-btn--icon m-btn--pill" href="{{url('transits/create/'.$shipping_company->id.'/'.$order->id )}}">    
            <span>
              <i class="la la-plus"></i>
              <span>{{__('transit.create_transit_for_package')}}</span>
            </span>
          </a>
        @elseif(!Request::is('transits/create/*'))
          <a href="/transits/select/{{$order->id}}/{{$shipping_company->id}}"  class="btn btn-secondary m-btn m-btn--icon m-btn--pill">
            <span>
              <i class="la la-plus"></i>
              <span>{{__('package.create')}}</span>
            </span>
          </a>
        @endif


      </div>

    </div>
  </div>
</div>