@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.update')}} {{$shipping_company->name}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/shipping_companies', __('shipping_company.index')),
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
      <form action="{{url('/shipping_companies/store/'.$shipping_company->id)}}" method="post" class="m-form m-form--label-align-right">
        {{csrf_field()}}
        <input name="admin_update" value="true" type="hidden">
        
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
                      {{__('shipping_company.shipping_company')}}  
                    </h3>
                  </div>
                </div>
              </div>
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                      <label>
                        {{__('shipping_company.company_name')}}
                      </label>
                      <input type="text" name="company_name" value="{{old('company_name', $shipping_company->company_name)}}" class="form-control m-input" placeholder="{{__('shipping_company.company_name')}}">
                      @if ($errors->has('name'))
                          <div class="m-form__help text-danger">
                              {{ $errors->first('company_name') }}
                          </div>
                      @endif
                  </div>
                  <div class="form-group m-form__group">
                    <label>
                      {{__('shipping_company.email')}}
                    </label>
                    <input type="text" name="email" value="{{old('email', $shipping_company->email)}}" class="form-control m-input" placeholder="{{__('shipping_company.email')}}">
                    @if ($errors->has('email'))
                        <div class="m-form__help text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                  </div>

                  <div class="form-group m-form__group">
                    <label>
                      {{__('shipping_company.contact_name')}}
                    </label>
                    <input type="text" name="contact_name" value="{{old('contact_name', $shipping_company->contact_name)}}" class="form-control m-input" placeholder="{{__('shipping_company.contact_name')}}">
                    @if ($errors->has('contact_name'))
                        <div class="m-form__help text-danger">
                            {{ $errors->first('contact_name') }}
                        </div>
                    @endif
                  </div>

              
                  <div class="form-group m-form__group row">
                    <div class="col-lg-3 ">
                      <label>
                        {{__('user.phone_number_area_code')}}
                      </label>
                      <input type="text" name="phone_number_area_code" value="{{old('phone_number_area_code', $shipping_company->phone_number_area_code)}}" class="form-control m-input phone_area_validation" placeholder="{{__('user.phone_number_area_code')}}">
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
                      <input type="text" name="phone_number" value="{{old('phone_number', $shipping_company->phone_number)}}" class="form-control m-input phone_number_validation" placeholder="{{__('user.phone_number')}}">
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
              
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                  <label>
                    {{__('shipping_company.social_name')}}
                  </label>
                  <input type="text" name="social_name" value="{{old('social_name', $shipping_company->social_name)}}" class="form-control m-input" placeholder="{{__('shipping_company.social_name')}}">
                  @if ($errors->has('social_name'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('social_name') }}
                      </div>
                  @endif
                </div>

                <div class="form-group m-form__group">
                  <label>
                    {{__('shipping_company.fiscal_id_number')}}
                  </label>
                  <input type="text" name="fiscal_id_number" value="{{old('fiscal_id_number', $shipping_company->fiscal_id_number)}}" class="form-control m-input" placeholder="{{__('shipping_company.fiscal_id_number')}}">
                  @if ($errors->has('fiscal_id_number'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('fiscal_id_number') }}
                      </div>
                  @endif
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
                  {{ Form::select('country', array(__('nav.select_option')), old('country', $shipping_company->country), ['class'=>'form-control country_selector']) }}
                </div>
                <div class="form-group m-form__group ">
                  <label>
                    {{__('nav.state')}}
                  </label>
                  {{ Form::select('state', array(__('nav.select_option')), old('country', $shipping_company->country), ['class'=>'form-control state_selector']) }}
                </div>
                <div class="form-group m-form__group ">
                  <label>
                    {{__('nav.city')}}
                  </label>
                  {{ Form::select('city_id', array(old('city_id', $shipping_company->city_id)=>__('nav.select_option')), false, ['class'=>'form-control city_selector']) }}
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
                    <input type="text" name="address_street" value="{{old('address_street', $shipping_company->address_street)}}" class="form-control m-input" placeholder="{{__('nav.address_street')}}">
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
                    <input type="text" name="address_number" value="{{old('address_number', $shipping_company->address_number)}}" class="form-control m-input address_number_validation" placeholder="{{__('nav.address_number')}}">  
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
                    <input type="text" name="address_complement" value="{{old('address_complement', $shipping_company->address_complement)}}" class="form-control m-input" placeholder="{{__('nav.address_complement')}}">  
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
                    <input type="text" name="address_area" value="{{old('address_area', $shipping_company->address_area)}}" class="form-control m-input" placeholder="{{__('nav.address_area')}}">
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
                    <input type="text" name="zip_code" value="{{old('zip_code', $shipping_company->zip_code)}}" class="form-control m-input zip_code_validation" placeholder="{{__('nav.zip_code')}}">  
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
            <!--begin::Portlet-->
            <div class="m-portlet">
              
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                  <label>
                    {{__('shipping_company.order_fee_percentage')}}
                  </label>
                  <div class="input-group">
                    <input type="number" min="0" max="100" name="order_fee_percentage" value="{{old('order_fee_percentage', $shipping_company->order_fee_percentage)}}" class="form-control m-input" placeholder="{{__('shipping_company.order_fee_percentage')}}">
                    <span class="input-group-addon">%</span>
                  </div>
                  @if ($errors->has('order_fee_percentage'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('order_fee_percentage') }}
                      </div>
                  @endif
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
                <a href="{{url('shipping_companies')}}" class="btn btn-secondary">
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

