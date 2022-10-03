@extends('layouts.app')

@section('content')


<!-- BEGIN: Subheader -->
<div class="m-subheader">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('order.create')}}
      </h3>
      {{Breadcrumbs::make([
        Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
        Breadcrumbs::item('/orders/my', __('order.my_orders')),
        Breadcrumbs::item('/orders/create', __('order.create'), true)
      ])}}      
    </div>
  </div>
</div>
<!-- END: Subheader -->


<div class="m-content">

  @if ($errors->any())
    <div class="alert alert-danger">
      {{__('messages.correct_errors_below')}}
    </div>
  @endif


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
                  @if($checkpoint->exists)
                    {{__('order.based_in_negative_load')}}
                    <input type="hidden" name="checkpoint_id" value="{{$checkpoint->id}}">
                  @else
                    <input type="hidden" name="checkpoint_id" value="">
                  @endif                  
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
                  <input type="text" name="description" value="{{old('description')}}" class="form-control m-input" placeholder="{{__('order.package_description')}}">
                  @if ($errors->has('description'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('description') }}
                      </div>
                  @endif
                  <span class="m-form__help">
                    {{__('order.package_description_help')}}
                  </span>
                </div>
              </div>

              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                  <label class="">
                    {{__('order.package_type')}}
                  </label>
                  {{ Form::select('package_type', $packageTypes, old('package_type'), array('class'=>'form-control m-input package_type')) }}
                </div>

                <div class="col-lg-6">
                  <label class="">
                    {{__('order.load_type')}}
                  </label>
                  <select class="form-control m-input load_type" name="load_type">
                  </select>
                  <script>
                     window.selected_load_type = '<?=old('load_type');?>';
                     window.load_types = <?=json_encode($loadTypes);?>                    
                  </script>
                </div>
              </div>

              <div class="form-group m-form__group row ">                
                <div class="col-lg-3">
                  <label class="">
                    {{__('order.weight')}}
                  </label>
                  <input type="number" step="0.1" min="0" class="form-control" value="{{old('weight')}}" name="weight" />
                  @if ($errors->has('weight'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('weight') }}
                      </div>
                  @endif
                  <span class="m-form__help">
                    {{__('order.optional_help')}}
                  </span>                                    
                </div>
                <div class="col-lg-3">
                  <label class="">
                    {{__('order.height')}}
                  </label>
                  <input type="number" step="0.1" min="0"  class="form-control" value="{{old('height')}}" name="height" />
                  @if ($errors->has('height'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('height') }}
                      </div>
                  @endif
                  <span class="m-form__help">
                    {{__('order.optional_help')}}
                  </span>                  
                </div>      
                <div class="col-lg-3">
                  <label class="">
                    {{__('order.width')}}
                  </label>
                  <input type="number" step="0.1" min="0"  class="form-control" value="{{old('width')}}" name="width" />
                  @if ($errors->has('width'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('width') }}
                      </div>
                  @endif
                  <span class="m-form__help">
                    {{__('order.optional_help')}}
                  </span>                                    
                </div>
                <div class="col-lg-3">
                  <label class="">
                    {{__('order.length')}}
                  </label>
                  <input type="number" step="0.1" min="0"  class="form-control" value="{{old('length')}}" name="length" />  
                  @if ($errors->has('length'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('length') }}
                      </div>
                  @endif
                  <span class="m-form__help">
                    {{__('order.optional_help')}}
                  </span>                                    
                </div>
              </div>

              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                  <label>
                     {{__('order.load_options')}}
                  </label>
                  <div class="m-radio-inline">
                    @foreach($load_classes as $load_class)
                    <label class="m-checkbox m-checkbox--solid">
                      <input type="checkbox" name="load_classes[{{$load_class->id}}]" value="{{$load_class->id}}" @if(old('load_classes.'.$load_class->id)) checked @endif >
                       {{$load_class->name}}
                       <span></span>
                    </label>
                    @endforeach

                  </div>
                  <span class="m-form__help">
                       {{__('order.load_options_help')}}
                  </span>
                  @if($checkpoint->exists)
                  <div class="mt-3">
                    <b>{{__('order.checkpoint_recommends')}}:</b>
                    <p>
                        <? $vehicle_load_classes = explode('|', trim($checkpoint->transit->vehicle->vehicle_load_classes, '|'));        ?>
                        @foreach($load_classes as $load_class)
                              {{$load_class->name}}:
                              <b>
                              @if(in_array($load_class->id, $vehicle_load_classes)) 
                              {{__('messages.yes')}} 
                              @else 
                              {{__('messages.no')}} 
                              @endif
                              </b>
                              &nbsp;&nbsp;&nbsp;
                        @endforeach                  
                    </p>
                  </div>
                  @endif
                </div>
                
              </div>
              <div class="form-group m-form__group row">
                <div class="col-lg-6">
                      <label class="m-checkbox m-checkbox--solid ml-3 my-auto">
                        <input type="checkbox" name="insurance" value="1" @if(old('insurance')) checked @endif >
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
                  {{__('order.load_origin')}}
                  @if($checkpoint->exists)
                  <small>{{__('order.checkpoint_recommends')}}: <b>{{$checkpoint->master_point->name}}</b></small>
                  @endif
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body shipping_data">
            <div class="form-group m-form__group row ">
              
              <div class="col-lg-8">

                <label class="">
                  {{__('order.load_origin_coords')}}
                </label>

                <div id="origin_map" style="height: 420px;"></div>
                <input id="origin_search" class="map_search_controls" type="text" placeholder="{{__('order.map_search_control')}}">
                <input style="display:none;" id="origin_coords" name="origin_coords" value="{{old('origin_coords', $origin_checkpoint_coords)}}" />
                <input style="display:none;" id="origin_master_point_id" name="origin_master_point_id" value="{{old('origin_master_point_id')}}" />
                <p class="mt-2"><input class="form-control-sm form-control" disabled="disabled" name="origin_master_point_label" value="{{old('origin_master_point_label')}}" id="origin_master_point_label"/></p>


              </div>

              <div class="col">

                <label class="">
                  {{__('order.load_origin_address')}}
                </label>
                <div class="mt-0 mb-0 m-alert m-alert--icon alert alert-info" role="alert" id="origin_alert">
                  <div class="m-alert__icon">
                    <i class="flaticon-danger"></i>
                  </div>
                  <div class="m-alert__text">
                    {{__('order.create_alert')}}
                  </div>    
                </div>

                <textarea type='text' class="form-control" id="origin" name="origin" rows="3">{{old('origin')}}</textarea>

                @if ($errors->has('origin'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('origin') }}
                    </div>
                @endif

                <div class="mt-4">
                  <label class="dates">
                    {{__('order.origin_period_start')}} <br>
                      @if($checkpoint->exists AND $checkpoint->negative_start)<small>{{__('order.checkpoint_recommends')}}: {{date('d/m/Y H:i', strtotime($checkpoint->negative_start))}}</small> @endif
                  </label>
                  <input type="text" value="{{(old('origin_period_start'))}}" class="form-control order_datetime_picker" readonly name="origin_period_start" placeholder="{{__('order.origin_period_start')}}"/>
                </div>

                <div class="mt-4">
                  <label class="dates">
                    {{__('order.origin_period_end')}} <br>
                     @if($checkpoint->exists AND $checkpoint->negative_end)<small>{{__('order.checkpoint_recommends')}}: {{date('d/m/Y H:i', strtotime($checkpoint->negative_end))}}</small> @endif
                  </label>
                  <input type="text" value="{{(old('origin_period_end'))}}" class="form-control order_datetime_picker" readonly name="origin_period_end" placeholder="{{__('order.origin_period_end')}}"/>
                </div>
                @if ($errors->has('origin_period_end'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('origin_period_end') }}
                    </div>
                @endif                

                <div class="mt-4">
                  <label class="m-checkbox m-checkbox--solid">
                    <input type="checkbox" name="origin_period_night" value="1" @if(old('origin_period_night')) checked @endif >
                     {{__('order.origin_period_night')}}
                    <span></span>
                  </label>
                </div>

                <div class="mt-4">
                  <label class="">
                    {{__('order.origin_notes')}}
                  </label>
                  <textarea type='text' class="form-control" id="origin_notes"  name="origin_notes" rows="3">{{old('origin_notes')}}</textarea>
                </div>

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
                  <i class="la la-download"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('order.load_destination')}}
                    @if($checkpoint->exists)
                    <small>
                      {{__('order.checkpoint_recommends')}}:
                      <?$start=0;?> 
                      @foreach($checkpoint->transit->checkpoints as $transit_checkpoint)
                        <?if($transit_checkpoint->negative){$start=1;}?>
                        @if($start AND !$transit_checkpoint->negative)
                            &nbsp;&nbsp;
                            <a href="javascript:void(0);" class="set_marker" lat="{{$transit_checkpoint->master_point->latitude}}" lng="{{$transit_checkpoint->master_point->longitude}}">{{$transit_checkpoint->master_point->name}}</a>
                            
                        @endif
                      @endforeach
                    </small>
                    @endif

                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body shipping_data">
            <div class="form-group m-form__group row ">
              
              <div class="col-lg-8">
                <label class="">
                  {{__('order.destination_coords')}}
                </label>
                
                <div id="destination_map" style="height: 440px;"></div>
                <input id="destination_search" class="map_search_controls" type="text" placeholder="{{__('order.map_search_control')}}">
                <input style="display:none;" id="destination_coords" name="destination_coords" value="{{ old('destination_coords') }}"/>
                <input style="display:none;" id="destination_master_point_id" name="destination_master_point_id" value="{{old('destination_master_point_id')}}" />
                <p class="mt-2"><input class="form-control-sm form-control" disabled="disabled" name="destination_master_point_label" value="{{old('destination_master_point_label')}}" id="destination_master_point_label"/></p>                
              </div>


              <div class="col">
                <label class="">
                  {{__('order.load_destination_address')}}
                </label>
                <div class="mt-0 mb-0 m-alert m-alert--icon alert alert-info" role="alert" id="destination_alert">
                  <div class="m-alert__icon">
                    <i class="flaticon-danger"></i>
                  </div>
                  <div class="m-alert__text">
                    {{__('order.create_alert')}}
                  </div>    
                </div>
                <textarea type='text' style="display: ;" class="form-control" id="destination" name="destination" rows="3">{{ old('destination') }}</textarea>

                @if ($errors->has('destination'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('destination') }}
                    </div>
                @endif                    

                <div class="mt-4">
                  <label class="">
                    {{__('order.destination_period_start')}}
                  </label>
                  <input type="text" value="{{(old('destination_period_start'))}}" class="form-control order_datetime_picker" readonly name="destination_period_start" placeholder="{{__('order.destination_period_start')}}"/>
                </div>
                @if ($errors->has('destination_period_start'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('destination_period_start') }}
                    </div>
                @endif                

                <div class="mt-4">
                  <label class="">
                    {{__('order.destination_period_end')}}
                  </label>
                  <input type="text" value="{{(old('destination_period_end'))}}" class="form-control order_datetime_picker" readonly name="destination_period_end" placeholder="{{__('order.destination_period_end')}}"/>
                </div>
                @if ($errors->has('destination_period_end'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('destination_period_end') }}
                    </div>
                @endif                


                <div class="mt-4">
                  <label class="m-checkbox m-checkbox--solid">
                    <input type="checkbox" name="destination_period_night" value="1" @if(old('destination_period_night')) checked @endif >
                     {{__('order.destination_period_night')}}
                    <span></span>
                  </label>
                </div>

                <div class="mt-4">
                  <label class="">
                    {{__('order.destination_notes')}}
                  </label>
                  <textarea type='text' class="form-control" id="destination_notes"  name="destination_notes" rows="3">{{old('destination_notes')}}</textarea>
                </div>

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

                  <div class="m-input-icon m-input-icon--left">

                    <input type='text' class="form-control m-input form-control-lg money_validation" name="amount" placeholder="{{__('order.order_amount')}}" value="{{old('amount')}}"/>

                    <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="fa fa-dollar"></i></span></span>

                  </div>

                  @if ($errors->has('amount'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('amount') }}
                      </div>
                  @endif

                  <div class="m-form__help">
                    {{__('order.order_amount_help')}}
                  </div>   
              </div>   

              <div class="col-lg-6">
                <label class="">
                  {{__('order.user_notes')}}
                </label>

                <textarea type='text' class="form-control" name="user_notes" rows="3">{{old('user_notes')}}</textarea>

              </div>   

            </div>
          </div>
    

          
          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
              <div class="row">

                <div class="col-lg-6 ">
                  <a href="{{route('dashboard')}}" class="btn btn-secondary">
                    {{__('nav.cancel')}}
                  </a>
                </div>

                <div class="col-lg-6 m--align-right">
                  <button type="submit" class="btn btn-primary">
                    {{__('order.submit_create_order')}}
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

<style>
  .map_search_controls {
    margin-top: 10px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 29px;
    outline: none;
    padding-left:6px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    width:67%;
  }
  .dates small {
    color: #afb2c1;
  }
</style>

<script>

function findClosestMasterPoint(element_id, latitude, longitude){

    $.post( "{{url('master_points/find_closest')}}", { 
      _token: '{{ Session::token() }}',
      latitude: latitude,
      longitude: longitude
    })
    .done(function( data ) {
      $('#'+element_id+'_master_point_id').val(data.id);
      $('#'+element_id+'_master_point_label').val(data.name);
      //console.log(data);
    });
}
</script>
@endsection
