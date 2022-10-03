@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.update')}} {{$user->name}}
      </h3>
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/users', __('user.index')),
          Breadcrumbs::item(url()->current(), __('nav.update'), true),
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

          <div class="row">
            <div class="col-12 col-md-6">

              <!--begin::Portlet-->
              <div class="m-portlet ">

                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text">
                        {{__('user.personal_data')}}
                      </h3>
                    </div>
                  </div>
                </div>

                <div class="m-portlet__body">
                  <div class="form-group m-form__group">
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
                  <div class="form-group m-form__group">
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
                    <div class="col-lg-3 ">
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
          </div>

          <div class="col-12 col-md-6">

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">

              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      {{__('user.company_data')}}
                    </h3>
                  </div>
                </div>
              </div>

              <div class="m-portlet__body">
                <div class="form-group m-form__group">
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

                <div class="form-group m-form__group">
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
      </div>        



        
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions--solid">
            <div class="row">

              <div class="col-lg-6 ">
                <a href="{{url('users')}}" class="btn btn-secondary">
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
    </div>
  </div>
</div>
@endsection

