@extends('layouts.app')

@section('content')


<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('order.confirm')}}
      </h3>
      
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/orders/my', __('order.my_orders')),
          Breadcrumbs::item('/orders/create', __('order.create'), true),
          Breadcrumbs::item('/orders/create', __('order.confirm'), true)
      ])}}            


    </div>
    
  </div>
</div>
<!-- END: Subheader -->


<div class="m-content">


  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
      

    <div class="row">
      <div class="col-lg-12">


    <!--begin::Form-->
    <form action="{{url('/orders/store')}}" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
      {{csrf_field()}}
      <input name="store" type="hidden" value="1">
      @foreach($order as $key=>$value)
      <?php if ( $key == 'amount') { $value = str_replace(',', '.', str_replace('.', '', $value));}?>
       <input type="hidden" name="{{$key}}" value="{{$value}}">  
      @endforeach

          <!--begin::Portlet-->
          <div class="m-portlet">
            
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon ">
                    <i class="la la-cube"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                    {{__('order.load')}}
                  </h3>
                </div>
              </div>
            </div>

              <div class="m-portlet__body">



                <div class="form-group m-form__group row">

                  <div class="col-lg-12 ">
                    <label>
                      {{__('order.package_description')}}
                    </label>

                    <p class="form-control-lg form-control-static">{{$order['description']}}</p>
                        
                  </div>
                  
                </div>

                <div class="form-group m-form__group row">

                  <div class="col-lg-6">

                    <label class="">
                      {{__('order.package_type')}}
                    </label>

                    <p class="form-control-static">{{__('order.'.$order['package_type'])}}</p>

                  </div>

                  <div class="col-lg-6">

                    <label class="">
                      {{__('order.load_type')}}
                    </label>

                    <p class="form-control-static">{{__('order.'.$order['load_type'])}}</p>
                    

                  </div>

                </div>



                <div class="form-group m-form__group row ">
                  
                  <div class="col-lg-3">
                    <label class="">
                      {{__('order.weight')}}
                    </label>
                    <p class="form-control-static">@if($order['weight']) {{$order['weight']}} kg @else {{__('messages.undefined')}} @endif</p>
                    
                  </div>

                  <div class="col-lg-3">
                    <label class="">
                      {{__('order.height')}}
                    </label>
                    <p class="form-control-static">@if($order['height']) {{$order['height']}} m @else {{__('messages.undefined')}} @endif</p>
                  </div>      

                  <div class="col-lg-3">
                    <label class="">
                      {{__('order.width')}}
                    </label>
                    <p class="form-control-static">@if($order['width']) {{$order['width']}} m @else {{__('messages.undefined')}} @endif</p>
                  </div>

                  <div class="col-lg-3">
                    <label class="">
                      {{__('order.length')}}
                    </label>
                    <p class="form-control-static">@if($order['length']) {{$order['length']}} m @else {{__('messages.undefined')}} @endif</p>
                  </div>
                             
                </div>


                <div class="form-group m-form__group row">
                  <div class="col-lg-12">
                    <label>
                       {{__('order.load_options')}}
                    </label>


                    <div class="m-radio-inline">
                      @foreach($load_classes as $load_class)
                      <label class="m-checkbox  m-checkbox--disabled">
                        <input disabled type="checkbox" value="{{$load_class->id}}" @if(isset(request('load_classes')[$load_class->id])) checked @endif >
                        {{$load_class->name}}
                         <span></span>
                      </label>
                      @endforeach                      
                    </div>

                  </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-12">
                      <label class="m-checkbox m-checkbox--disabled">
                        <input type="checkbox" disabled name="insurance" value="1" @if($order['insurance']) checked @endif >
                         {{__('order.insurance')}}
                        <span></span>
                      </label>
                    </div>
                  </div>
              </div>


          </div>
          <!--end::Portlet-->


          <!--begin::Portlet-->
          <div class="m-portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon">
                    <i class="la la-upload"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                    {{__('order.load_origin_and_destination')}}
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body shipping_data">
              <div class="form-group m-form__group row ">
                
                <div class="col-6">

                  <label class="">
                    {{__('order.load_origin_address')}}
                  </label>
                  <p class="form-control-static">{{$order['origin']}}</p>


                  <div class="mt-4">
                    <label class="">
                      {{__('order.origin_period_start')}}
                    </label>
                    <p class="form-control-static">
                      @if($order['origin_period_start']) 
                        {{date("d/m/Y H:i", strtotime($order['origin_period_start']))}} 
                      @else 
                        {{__('nav.no_preferences')}}
                      @endif
                    </p>

                  </div>

                  <div class="mt-4">
                    <label class="">
                      {{__('order.origin_period_end')}}
                    </label>
                    <p class="form-control-static">
                      @if($order['origin_period_end']) 
                        {{date("d/m/Y H:i", strtotime($order['origin_period_end']))}} 
                      @else 
                        {{__('nav.no_preferences')}}
                      @endif
                    </p>
                  </div>

                  <div class="mt-4">
                    <label class="m-checkbox m-checkbox--disabled">
                      <input type="checkbox" disabled name="origin_period_night" value="1" @if($order['origin_period_night']) checked @endif >
                       {{__('order.origin_period_night')}}
                      <span></span>
                    </label>
                  </div>

                  <div class="mt-4">
                    <label class="">
                      {{__('order.origin_notes')}}
                    </label>
                    <p class="form-control-static">{{$order['origin_notes']}}</p>
                  </div>

                </div> 

                <div class="col-6">
                  <label class="">
                    {{__('order.load_destination_address')}}
                  </label>
                  <p class="form-control-static">{{$order['destination']}}</p>
                  
                  <div class="mt-4">
                    <label class="">
                      {{__('order.destination_period_start')}}
                    </label>
                    <p class="form-control-static">
                      @if($order['destination_period_start']) 
                        {{date("d/m/Y H:i", strtotime($order['destination_period_start']))}} 
                      @else 
                        {{__('nav.no_preferences')}}
                      @endif                      
                    </p>

                  </div>

                  <div class="mt-4">
                    <label class="">
                      {{__('order.destination_period_end')}}
                    </label>
                    <p class="form-control-static">
                      @if($order['destination_period_end']) 
                        {{date("d/m/Y H:i", strtotime($order['destination_period_end']))}} 
                      @else 
                        {{__('nav.no_preferences')}}
                      @endif
                    </p>

                  </div>

                  <div class="mt-4">
                    <label class="m-checkbox m-checkbox--disabled">
                      <input type="checkbox" disabled name="destination_period_night" value="1" @if($order['destination_period_night']) checked @endif >
                       {{__('order.destination_period_night')}}
                      <span></span>
                    </label>
                  </div>

                  <div class="mt-4">
                    <label class="">
                      {{__('order.destination_notes')}}
                    </label>
                    <p class="form-control-static">{{$order['destination_notes']}}</p>
                  </div>

                </div>    


              </div>

              <div class="form-group m-form__group row" id="show_route_map">


                <div class="col-12">
                    <div id="route_map" class="mb-3" style="height: 380px;"></div>
                </div>

                <div class="col-12">
                  <label class="">
                    {{__('order.route_length')}}
                  </label>
                  <p class="form-control-static"><span id="route_length"></span></p>
                </div>

                
              </div>


            </div>


          </div>
          <!--end::Portlet-->

          <!--begin::Portlet-->
          <div class="m-portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon">
                    <i class="la la-money"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                    {{__('order.order_amount')}}
                  </h3>
                </div>
              </div>
            </div>


            <div class="m-portlet__body shipping_data">
              <div class="form-group m-form__group row ">

                <div class="col-lg-6">
                  <label class="">
                    {{__('order.order_amount_label')}}
                  </label>
                  <p class="form-control-lg form-control-static">$ {{$order['amount']}}</p>

                </div>   

                <div class="col-lg-6">
                  <label class="">
                    {{__('order.user_notes')}}
                  </label>

                  <p class="form-control-static">{{$order['user_notes']}}</p>
                  
                </div>   

              </div>
            </div>

            
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
              <div class="m-form__actions m-form__actions--solid">
                <div class="row">

                  <div class="col-lg-6 ">
                    <a href="javascript:history.back(-1);" class="btn btn-secondary">
                      {{__('nav.back')}}
                    </a>
                  </div>

                  <div class="col-lg-6 m--align-right">
                    <button type="submit" class="btn btn-primary">
                      {{__('nav.confirm')}}
                      <i class="fa fa-chevron-right"></i>
                    </button>
                  </div>

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

@endsection
