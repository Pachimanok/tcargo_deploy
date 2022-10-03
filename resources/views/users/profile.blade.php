@extends('layouts.app')

@section('content')


<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('user.my_profile')}}
      </h3>
      
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/users/my_profile', __('user.my_profile'), true)
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->


<div class="m-content">
  <div class="row">
    <div class="col-lg-12">

      <!--begin::Form-->
      <form action="{{url('/users/store/'.$user->id)}}" method="post" class="m-form m-form--label-align-right">
        {{csrf_field()}}

        <input type="hidden" name="redirect" value="{{$redirect}}">
        <input type="hidden" name="self_profile" value="1">

          <div class="row">
            <div class="col-12 col-md-6">
              <!--begin::Portlet-->
              <div class="m-portlet">
                
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <span class="m-portlet__head-icon ">
                        <i class="la la-cube"></i>
                      </span>
                      <h3 class="m-portlet__head-text">
                        {{__('user.personal_data')}}
                      </h3>
                    </div>
                  </div>
                </div>

                <div class="m-portlet__body">
                  <div class="form-group m-form__group ">
                    <label>
                      {{__('user.name')}}
                    </label>
                    <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control m-input" placeholder="{{__('user.name')}}">
                    @if ($errors->has('name'))
                        <div class="m-form__help text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                  </div>

                  <div class="form-group m-form__group ">
                      <label>
                        {{__('user.email')}}
                      </label>
                      <input type="text" name="email" value="{{old('email', $user->email)}}" class="form-control m-input" placeholder="{{__('user.email')}}">
                      @if ($errors->has('email'))
                          <div class="m-form__help text-danger">
                              {{ $errors->first('email') }}
                          </div>
                      @endif
                  </div>

                  <div class="form-group m-form__group row">
                    <div class="col-lg-3 mb-3">
                      <label>
                        {{__('user.phone_number_area_code')}}
                      </label>
                      <input type="text" name="phone_number_area_code" value="{{old('phone_number_area_code', $user->phone_number_area_code)}}" class="form-control m-input phone_area_validation" placeholder="{{__('user.phone_number_area_code')}}">
                      @if ($errors->has('phone_number_area_code'))
                          <div class="m-form__help text-danger">
                              {{ $errors->first('phone_number_area_code') }}
                          </div>
                      @endif
                    </div>
                    <div class="col-lg-9 ">
                      <label>
                        {{__('user.phone_number')}}
                      </label>
                      <input type="text" name="phone_number" value="{{old('phone_number', $user->phone_number)}}" class="form-control m-input phone_number_validation" placeholder="{{__('user.phone_number')}}">  
                      @if ($errors->has('phone_number'))
                          <div class="m-form__help text-danger">
                              {{ $errors->first('phone_number') }}
                          </div>
                      @endif
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
                        {{__('user.company_data')}}
                      </h3>
                    </div>
                  </div>
                </div>

                <div class="m-portlet__body">
                  <div class="form-group m-form__group ">
                    <label>
                      {{__('user.social_name')}}
                    </label>
                    <input type="text" name="social_name" value="{{old('social_name', $user->social_name)}}" class="form-control m-input" placeholder="{{__('user.social_name')}}">
                    @if ($errors->has('social_name'))
                        <div class="m-form__help text-danger">
                            {{ $errors->first('social_name') }}
                        </div>
                    @endif
                    <span class="m-form__help">
                      {{__('user.only_if_copmany')}}
                    </span>                 
                  </div>

                  <div class="form-group m-form__group ">
                    <label>
                      {{__('user.ssid')}}
                    </label>
                    <input type="text" name="ssid" value="{{old('ssid', $user->ssid)}}" class="form-control m-input" placeholder="{{__('user.ssid')}}">
                    @if ($errors->has('ssid'))
                        <div class="m-form__help text-danger">
                            {{ $errors->first('ssid') }}
                        </div>
                    @endif
                    <span class="m-form__help">
                      {{__('user.only_if_copmany')}}
                    </span>                 
                  </div>
                </div>    
              </div>
              <!--end::Portlet-->



            </div>
            <div class="col-12 col-md-6">

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
                    {{ Form::select('country', array(__('nav.select_option')), old('country', $user->country), ['class'=>'form-control country_selector']) }}
                  </div>
                  <div class="form-group m-form__group ">
                    <label>
                      {{__('nav.state')}}
                    </label>
                    {{ Form::select('state', array(__('nav.select_option')), old('country', $user->country), ['class'=>'form-control state_selector']) }}
                  </div>
                  <div class="form-group m-form__group ">
                    <label>
                      {{__('nav.city')}}
                    </label>
                    {{ Form::select('city_id', array(old('city_id', $user->city_id)=>__('nav.select_option')), false, ['class'=>'form-control city_selector']) }}
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
                      <input type="text" name="address_street" value="{{old('address_street', $user->address_street)}}" class="form-control m-input" placeholder="{{__('nav.address_street')}}">
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
                      <input type="text" name="address_number" value="{{old('address_number', $user->address_number)}}" class="form-control m-input number_validation" placeholder="{{__('nav.address_number')}}">  
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
                      <input type="text" name="address_complement" value="{{old('address_complement', $user->address_complement)}}" class="form-control m-input" placeholder="{{__('nav.address_complement')}}">  
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
                      <input type="text" name="address_area" value="{{old('address_area', $user->address_area)}}" class="form-control m-input" placeholder="{{__('nav.address_area')}}">
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
                      <input type="text" name="zip_code" value="{{old('zip_code', $user->zip_code)}}" class="form-control m-input" placeholder="{{__('nav.zip_code')}}">  
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
          </div>


          <div class="row">
            <div class="col-12">
              <!--begin::Portlet-->
              <div class="m-portlet">
                <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label>
                       {{__('user.tos_accepted')}}
                    </label>
                    <div class="m-radio-inline">
                      <label class="m-checkbox m-checkbox--solid">
                        <input type="checkbox" name="tos_accepted" value="1" @if(old('tos_accepted', $user->tos_accepted)) checked @endif >
                         {{__('user.tos_accepted_info')}}
                         <span></span>
                      </label>
                      @if ($errors->has('tos_accepted'))
                          <div class="m-form__help text-danger">
                              {{ $errors->first('tos_accepted') }}
                          </div>
                      @endif
                    </div>
                  </div>
                </div>
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



@endsection

