@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.create')}} {{__('vehicle.vehicle')}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/vehicles/index/'.$shipping_company->id, __('vehicle.index')),
          Breadcrumbs::item(url()->current(), __('nav.create'), true),
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <!--begin::Form-->
  <form enctype="multipart/form-data" action="{{url('/vehicles/store')}}" method="post" class="m-form m-form--label-align-right">
    {{csrf_field()}}
    <input type="hidden" name="shipping_company_id" value="{{$shipping_company->id}}">

    <div class="row">
      <div class="col-md-6">


        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.vehicle_info')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">
              <label>
                {{__('vehicle.brand')}}
              </label>
              <input type="text" name="brand" value="{{old('brand')}}" class="form-control m-input" placeholder="{{__('vehicle.brand')}}">
              @if ($errors->has('brand'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('brand') }}
                  </div>
              @endif
            </div>
            <div class="form-group m-form__group">
              <label>
                {{__('vehicle.model')}}
              </label>
              <input type="text" name="model" value="{{old('model')}}" class="form-control m-input" placeholder="{{__('vehicle.model')}}">
              @if ($errors->has('model'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('model') }}
                  </div>
              @endif
            </div>
            <div class="form-group m-form__group">
              <label>
                {{__('vehicle.type')}}
              </label>
              {{ Form::select('type', $vehicle_types, old('type'), ['class'=>'form-control m-input']) }}
              @if ($errors->has('type'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('type') }}
                  </div>
              @endif
            </div>
            <div class="form-group m-form__group">
              <label>
                {{__('vehicle.plate')}}
              </label>
              <input type="text" name="plate" value="{{old('plate')}}" class="form-control m-input" placeholder="{{__('vehicle.plate')}}">
              @if ($errors->has('plate'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('plate') }}
                  </div>
              @endif
            </div>
            <div class="form-group m-form__group">
              <div class="m-radio-inline">
                <label class="m-checkbox m-checkbox--solid">
                  <input type="checkbox" name="satellite_tracking" value="1" @if(old('satellite_tracking')) checked @endif >
                   {{__('vehicle.satellite_tracking')}}
                   <span></span>
                </label>
                @if ($errors->has('satellite_tracking'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('satellite_tracking') }}
                    </div>
                @endif
              </div>
            </div>            

            <div class="form-group m-form__group">
              <label>
                {{__('vehicle.vehicle_load_classes')}}
              </label>              
              <div class="m-radio-inline">
                @foreach($load_classes as $load_class)
                <label class="m-checkbox m-checkbox--solid mt-1">
                  <input type="checkbox" name="load_classes[{{$load_class->id}}]" value="{{$load_class->id}}" @if(old('load_classes.'.$load_class->id)) checked @endif >
                   {{$load_class->name}}
                   <span></span>
                </label>
                @endforeach
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
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.plate_slip')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <input type="file" name="plate_slip_image_path" value="" class="form-control m-input">
            </div>  
          </div>
        </div>
        <!--end::Portlet-->


        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.registration')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <input type="file" name="registration_image_path" value="" class="form-control m-input">

              <label class="mt-3">
                {{__('vehicle.expiration_date')}}
              </label>
              <input type="date" name="registration_expiration_date" value="{{old('registration_expiration_date')}}" class="form-control m-input" placeholder="{{__('vehicle.expiration_date')}}">
              @if ($errors->has('registration_expiration_date'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('registration_expiration_date') }}
                  </div>
              @endif
            </div>  

          </div>
        </div>
        <!--end::Portlet-->


        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.insurance')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <input type="file" name="insurance_image_path" value="" class="form-control m-input">
             
              <label class="mt-3">
                {{__('vehicle.expiration_date')}}
              </label>
              <input type="date" name="insurance_expiration_date" value="{{old('insurance_expiration_date')}}" class="form-control m-input" placeholder="{{__('vehicle.expiration_date')}}">
              @if ($errors->has('insurance_expiration_date'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('insurance_expiration_date') }}
                  </div>
              @endif
            </div>  

          </div>
        </div>
        <!--end::Portlet-->

        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.technical_review')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <input type="file" name="technical_review_image_path" value="" class="form-control m-input">

              <label class="mt-3">
                {{__('vehicle.expiration_date')}}
              </label>
              <input type="date" name="technical_review_expiration_date" value="{{old('technical_review_expiration_date')}}" class="form-control m-input" placeholder="{{__('vehicle.expiration_date')}}">
              @if ($errors->has('technical_review_expiration_date'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('technical_review_expiration_date') }}
                  </div>
              @endif
            </div>  

          </div>
        </div>
        <!--end::Portlet-->

      </div>

      <!-- SECOND COLUMN - TRAILER INFO -->
      <!-- ---------------------------- -->
      <div class="col-md-6">
        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.trailer_info')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">
              <label>
                {{__('vehicle.trailer_type')}}
              </label>
              {{ Form::select('trailer_type', $trailer_types, old('trailer_type'), ['class'=>'form-control m-input']) }}

              @if ($errors->has('trailer_type'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('trailer_type') }}
                  </div>
              @endif
            </div>
            <div class="form-group m-form__group">
              <label class="mt-3">
                {{__('vehicle.trailer_plate')}}
              </label>
              <input type="text" name="trailer_plate" value="{{old('trailer_plate')}}" class="form-control m-input" placeholder="{{__('vehicle.plate')}}">
              @if ($errors->has('trailer_plate'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('trailer_plate') }}
                  </div>
              @endif
            </div>            
          </div>
        </div>
        <!--end::Portlet-->


        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.trailer_plate_slip')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <input type="file" name="trailer_plate_slip_image_path" value="" class="form-control m-input">
            </div>  
          </div>
        </div>
        <!--end::Portlet-->


        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.trailer_insurance')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->                
              <input type="file" name="trailer_insurance_image_path" value="" class="form-control m-input">

              <label class="mt-3">
                {{__('vehicle.expiration_date')}}
              </label>
              <input type="date" name="trailer_insurance_expiration_date" value="{{old('trailer_insurance_expiration_date')}}" class="form-control m-input" placeholder="{{__('vehicle.expiration_date')}}">
              @if ($errors->has('trailer_insurance_expiration_date'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('trailer_insurance_expiration_date') }}
                  </div>
              @endif
            </div>  

          </div>
        </div>
        <!--end::Portlet-->

        <!--begin::Portlet-->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('vehicle.trailer_technical_review')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <input type="file" name="trailer_technical_review_image_path" value="" class="form-control m-input">

              <label class="mt-3">
                {{__('vehicle.expiration_date')}}
              </label>
              <input type="date" name="trailer_technical_review_expiration_date" value="{{old('trailer_technical_review_expiration_date')}}" class="form-control m-input" placeholder="{{__('vehicle.expiration_date')}}">
              @if ($errors->has('trailer_technical_review_expiration_date'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('trailer_technical_review_expiration_date') }}
                  </div>
              @endif
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
                <a href="{{url('vehicles/index/'.$shipping_company->id)}}" class="btn btn-secondary">
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

  function deleteFile(element_id){
    el = $('#'+element_id);
    swal({
      title: '{{__("nav.delete")}}',
      text: '{{__("messages.confirm_file_delete")}}',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        deleteFileConfirmed(element_id);
      }
    })
  }

  function deleteFileConfirmed(element){
    el = $('#'+element);

    $.post( "{{url('images/delete')}}", { 
      table: el.attr('table'),
      column: el.attr('column'),      
      pk: el.attr('pk'),
      clean_fields: el.attr('clean_fields'),
      _token: '{{ Session::token() }}' 
    })

    .done(function( data ) {
      //alert( "Data Loaded: " + data );      
      //Clear all fields related
      var clean_fields = el.attr('clean_fields').split(",").map(function(item) {
        $('input[name="'+item.trim()+'"]').val('');
      });      
      $('#'+element+' .without_file').removeClass('d-none');
      $('#'+element+' .with_file').addClass('d-none');
      //Shows the image upload field

    });
     
  }

</script>

@endsection

