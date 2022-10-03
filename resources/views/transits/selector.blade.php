@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('package.select_transit')}}
      </h3> 
      @if($order->shipping_company_id)
      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('', $shipping_company->company_name, true),
          Breadcrumbs::item('/orders/shipping_company/'.$shipping_company->id, __('order.index')),
          Breadcrumbs::item("javascript:showOrder('".url("orders/show", ['id'=>$order->id])."');", __('order.order').' #'.$order->id),
          Breadcrumbs::item("/packages/index/".$order->id , __('package.index')),
          Breadcrumbs::item('/packages', __('transit.add_to_transit'), true)
      ])}}
      @else
      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('', $shipping_company->company_name, true),
          Breadcrumbs::item('/orders/all/'.$shipping_company->id, __('order.opportunities')),
          Breadcrumbs::item("javascript:showOrder('".url("orders/show", ['id'=>$order->id])."');", __('order.order').' #'.$order->id),
          Breadcrumbs::item('/packages', __('transit.add_to_transit'), true)
      ])}}      
      @endif
    </div>
  </div>
</div>

<!-- END: Subheader -->

<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      @include('packages.order')

      <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">


          <div class=" table-responsive">

            <table class="table m-table mb-4 table-hover">
              <thead class="">
              <tr>
                <th>{{__('transit.transit')}} #</th>
                <th>{{__('driver.driver')}}</th>
                <th>{{__('vehicle.vehicle')}}</th>
                <th>{{__('package.checkpoints')}}</th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($transits as $transit)
                  <tr >

                    <td>
                       <a href="javascript:transitshow('{{url("transits/show/".$transit->id)}}', '{{$transit->id}}');">{{__('transit.transit')}} #{{$transit->id}}</a>  
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

                    <td style="vertical-align:middle">
                      <form action="{{url('packages/create/'.$order->id.'/'.$transit->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="row m-0">
                          <div class="col">
                          <p><b>{{__('package.origin_checkpoint')}}</b></p>
                          @foreach($transit->checkpoints as $checkpoint)
                            <div class="mb-2">
                              {{$checkpoint->sort}} - 
                              @if($checkpoint->master_point->id == $order->origin_master_point_id)
                                <label class="mb-0">
                                  <input type="radio" name="origin_checkpoint_id" value="{{$checkpoint->id}}" >
                                  <b>{{$checkpoint->master_point->name}}</b>
                                </label>
                              @else
                                {{$checkpoint->master_point->name}}
                              @endif                            
                            </div>
                          @endforeach
                        </div>
                        <div class="col">
                          <p><b>{{__('package.destination_checkpoint')}}</b></p>
                          @foreach($transit->checkpoints as $checkpoint)
                            <div class="mb-2">
                              {{$checkpoint->sort}} - 
                              @if($checkpoint->master_point->id == $order->destination_master_point_id)
                                <label class="mb-0">
                                  <input type="radio" name="destination_checkpoint_id" value="{{$checkpoint->id}}" >
                                  <b>{{$checkpoint->master_point->name}}</b>
                                </label>
                              @else
                                {{$checkpoint->master_point->name}}
                              @endif                          
                            </div>
                          @endforeach
                        </div>
                        <div class="col">
                          <? 
                            $valid_transit = 0;
                            foreach($transit->checkpoints as $checkpoint){
                              if($checkpoint->master_point->id == $order->origin_master_point_id  AND $valid_transit!='2'){$valid_transit=1;}
                              if($checkpoint->master_point->id == $order->destination_master_point_id AND $valid_transit=='1'){$valid_transit=2;}
                            }

                            //Checks if order required classes are present in driver and in vehicle
                            $classes_clear = true;
                            $order_load_classes = array_filter($order->load_classes);
                            $driver_load_classes = array_filter(explode("|", $transit->driver->driver_load_classes));
                            $vehicle_load_classes = array_filter(explode("|", $transit->vehicle->vehicle_load_classes));
                            foreach($order_load_classes as $required_class){
                                if(!in_array($required_class, $driver_load_classes) OR !in_array($required_class, $vehicle_load_classes)){
                                    $classes_clear = false;
                                }
                            }

                          ?>
                          @if(!$classes_clear)
                            {{__('package.classes_must_match')}}
                          @elseif($valid_transit=='2')
                            <div class="show-on-hover">
                              <textarea name="information" class="form-control" rows="3" placeholder="{{__('package.information_palceholder')}}" ></textarea>
                              <button type="submit" class="btn-block btn m-btn btn-primary mt-2">
                                {{__('package.add_package_to_transit')}}
                              </button>
                            </div>
                          @else
                            {{__('package.unavailable_transit')}}
                          @endif
                        </div>                        
                      </form>

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
  
  function transitshow(url, id){
    $( "#general_modal .modal-content" ).load( url, function(){   
      $('#general_modal').modal();
    } );
  }  

</script>

<style>
.show-on-hover {
    visibility: hidden;
}
tr:hover > td > form > div > div > .show-on-hover {
    visibility: visible;
}

</style>
@endsection

