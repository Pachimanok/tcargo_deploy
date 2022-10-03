@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.update')}} {{$driver->name}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/drivers/index/'.$driver->shipping_company->id, __('driver.index')),
          Breadcrumbs::item(url()->current(), __('nav.update'), true),
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <!--begin::Form-->
  <form enctype="multipart/form-data" action="{{url('/drivers/store/'.$driver->id)}}" method="post" class="m-form m-form--label-align-right">
    {{csrf_field()}}

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
                  {{__('driver.driver')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">
              <label>
                {{__('driver.name')}}
              </label>
              <input type="text" name="name" value="{{old('name', $driver->name)}}" class="form-control m-input" placeholder="{{__('driver.name')}}">
              @if ($errors->has('name'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('name') }}
                  </div>
              @endif
            </div>

            <div class="form-group m-form__group">
              <label>
                {{__('driver.email')}}
              </label>
              <input type="text" name="email" value="{{old('email', $driver->email)}}" class="form-control m-input" placeholder="{{__('driver.email')}}">
              @if ($errors->has('email'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('email') }}
                  </div>
              @endif
            </div>            

            <div class="form-group m-form__group row">
              <div class="col-lg-3 ">
                <label>
                  {{__('driver.phone_number_area_code')}}
                </label>
                <input type="text" name="phone_number_area_code" value="{{old('phone_number_area_code', $driver->phone_number_area_code)}}" class="form-control m-input" placeholder="{{__('driver.phone_number_area_code')}}">
                @if ($errors->has('phone_number_area_code'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('phone_number_area_code') }}
                    </div>
                @endif
              </div>
              <div class="col-lg-9 ">
                <label>
                  {{__('driver.phone_number')}}
                </label>
                <input type="text" name="phone_number" value="{{old('phone_number', $driver->phone_number)}}" class="form-control m-input" placeholder="{{__('user.phone_number')}}">
                @if ($errors->has('phone_number'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
              </div>
            </div>

            <div class="form-group m-form__group">
              <label>
                {{__('driver.birth_date')}}
              </label>
              <input type="date" name="birth_date" value="{{old('birth_date', $driver->birth_date)}}" class="form-control m-input" placeholder="{{__('driver.birth_date')}}">
              @if ($errors->has('birth_date'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('birth_date') }}
                  </div>
              @endif
            </div>

            <div class="form-group m-form__group">
              <label>
                {{__('driver.fiscal_id_number')}}
              </label>
              <input type="text" name="fiscal_id_number" value="{{old('fiscal_id_number', $driver->fiscal_id_number)}}" class="form-control m-input" placeholder="{{__('driver.fiscal_id_number')}}">
              @if ($errors->has('fiscal_id_number'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('fiscal_id_number') }}
                  </div>
              @endif
            </div>

            <div class="form-group m-form__group">
              <label>
                {{__('driver.professional_id_number')}}
              </label>
              <input type="text" name="professional_id_number" value="{{old('professional_id_number', $driver->professional_id_number)}}" class="form-control m-input" placeholder="{{__('driver.professional_id_number')}}">
              @if ($errors->has('professional_id_number'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('professional_id_number') }}
                  </div>
              @endif
            </div>


            <div class="form-group m-form__group">
              <label>
                {{__('driver.driver_load_classes')}}
              </label>              
              <div class="m-radio-inline">
                @foreach($load_classes as $load_class)
                <label class="m-checkbox m-checkbox--solid mt-1">
                  <input type="checkbox" name="load_classes[{{$load_class->id}}]" value="{{$load_class->id}}" @if(in_array($load_class->id, $driver->driver_load_classes)) checked @endif >
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
                  {{__('nav.address')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group ">
              <label>
                {{__('nav.country')}}
              </label>
              {{ Form::select('country', array(__('nav.select_option')), old('country', $driver->country), ['class'=>'form-control country_selector']) }}
            </div>
            <div class="form-group m-form__group ">
              <label>
                {{__('nav.state')}}
              </label>
              {{ Form::select('state', array(__('nav.select_option')), old('country', $driver->country), ['class'=>'form-control state_selector']) }}
            </div>
            <div class="form-group m-form__group ">
              <label>
                {{__('nav.city')}}
              </label>
              {{ Form::select('city_id', array(old('city_id', $driver->city_id)=>__('nav.select_option')), false, ['class'=>'form-control city_selector']) }}
              @if ($errors->has('city_id'))
                  <div class="m-form__help text-danger">
                      {{ $errors->first('city_id') }}
                  </div>
              @endif                    
            </div>  


            <div class="form-group m-form__group row">
              <div class="col-lg-6 mb-3">
                <label>
                  {{__('nav.address_street')}}
                </label>
                <input type="text" name="address_street" value="{{old('address_street', $driver->address_street)}}" class="form-control m-input" placeholder="{{__('nav.address_street')}}">
                @if ($errors->has('address_street'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('address_street') }}
                    </div>
                @endif
              </div>
              <div class="col-lg-3 mb-3">
                <label>
                  {{__('nav.address_number')}}
                </label>
                <input type="text" name="address_number" value="{{old('address_number', $driver->address_number)}}" class="form-control m-input" placeholder="{{__('nav.address_number')}}">  
                @if ($errors->has('address_number'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('address_number') }}
                    </div>
                @endif
              </div>                    
              <div class="col-lg-3 ">
                <label>
                  {{__('nav.address_complement')}}
                </label>
                <input type="text" name="address_complement" value="{{old('address_complement', $driver->address_complement)}}" class="form-control m-input" placeholder="{{__('nav.address_complement')}}">  
                @if ($errors->has('address_complement'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('address_complement') }}
                    </div>
                @endif
              </div>
            </div>

            <div class="form-group m-form__group row">
              <div class="col-lg-8 mb-3">
                <label>
                  {{__('nav.address_area')}}
                </label>
                <input type="text" name="address_area" value="{{old('address_area', $driver->address_area)}}" class="form-control m-input" placeholder="{{__('nav.address_area')}}">
                @if ($errors->has('address_area'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('address_area') }}
                    </div>
                @endif
              </div>
              <div class="col-lg-4  mb-3">
                <label>
                  {{__('nav.zip_code')}}
                </label>
                <input type="text" name="zip_code" value="{{old('zip_code', $driver->zip_code)}}" class="form-control m-input" placeholder="{{__('nav.zip_code')}}">  
                @if ($errors->has('zip_code'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('zip_code') }}
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
                  {{__('driver.license')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <div id="license_image" table="drivers" column="license_image_path" pk="{{$driver->id}}" clean_fields="">
                <div class="with_file @if(!$driver->license_image_path) d-none @endif">
                  <div class="row p-0">
                    <div class="col-6 col-md-4 m-auto  text-center">
                      <img class="img-fluid" src="/storage/{{$driver->license_image_path}}">
                      <p class="mt-1"><a href="javascript:deleteFile('license_image');" class="btn btn-block btn-sm btn-danger">{{__('nav.delete')}}</a></p>
                    </div>
                  </div>
                </div>
                <div class="without_file @if($driver->license_image_path) d-none @endif mb-4">
                  <input type="file" name="license_image_path" value="" class="form-control m-input">
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
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('driver.medical_license')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <div id="medical_license_image" table="drivers" column="medical_license_image_path" pk="{{$driver->id}}" clean_fields="">
                <div class="with_file @if(!$driver->medical_license_image_path) d-none @endif">
                  <div class="row p-0">
                    <div class="col-6 col-md-4 m-auto  text-center">
                      <img class="img-fluid" src="/storage/{{$driver->medical_license_image_path}}">
                      <p class="mt-1"><a href="javascript:deleteFile('medical_license_image');" class="btn btn-block btn-sm btn-danger">{{__('nav.delete')}}</a></p>
                    </div>
                  </div>
                </div>
                <div class="without_file @if($driver->medical_license_image_path) d-none @endif mb-4">
                  <input type="file" name="medical_license_image_path" value="" class="form-control m-input">
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
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('driver.special_license')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <div id="special_license_image" table="drivers" column="special_license_image_path" pk="{{$driver->id}}" clean_fields="">
                <div class="with_file @if(!$driver->special_license_image_path) d-none @endif">
                  <div class="row p-0">
                    <div class="col-6 col-md-4 m-auto  text-center">
                      <img class="img-fluid" src="/storage/{{$driver->special_license_image_path}}">
                      <p class="mt-1"><a href="javascript:deleteFile('special_license_image');" class="btn btn-block btn-sm btn-danger">{{__('nav.delete')}}</a></p>
                    </div>
                  </div>
                </div>
                <div class="without_file @if($driver->special_license_image_path) d-none @endif mb-4">
                  <input type="file" name="special_license_image_path" value="" class="form-control m-input">
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
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('driver.health_license')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group">              
              <!-- IMAGE HANDLER COMPONENT -->
              <div id="health_license_image" table="drivers" column="health_license_image_path" pk="{{$driver->id}}" clean_fields="">
                <div class="with_file @if(!$driver->health_license_image_path) d-none @endif">
                  <div class="row p-0">
                    <div class="col-6 col-md-4 m-auto  text-center">
                      <img class="img-fluid" src="/storage/{{$driver->health_license_image_path}}">
                      <p class="mt-1"><a href="javascript:deleteFile('health_license_image');" class="btn btn-block btn-sm btn-danger">{{__('nav.delete')}}</a></p>
                    </div>
                  </div>
                </div>
                <div class="without_file @if($driver->health_license_image_path) d-none @endif mb-4">
                  <input type="file" name="health_license_image_path" value="" class="form-control m-input">
                </div>
              </div>
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
                <a href="{{url('drivers/index/'.$driver->shipping_company->id)}}" class="btn btn-secondary">
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

