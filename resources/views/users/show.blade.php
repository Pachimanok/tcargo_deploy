@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.show')}} {{$user->name}}
      </h3>
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/users', __('user.index')),
          Breadcrumbs::item(url()->current(), __('nav.show'), true),
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
              <div class="m-portlet m-portlet--tab">

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
                      <p class="form-control-static">{{$user->name}}</p>                    
                  </div>
                  <div class="form-group m-form__group">
                    <label>
                      {{__('user.email')}}
                    </label>
                    <p class="form-control-static">{{$user->email}}</p>                    
                  </div>



              
                  <div class="form-group m-form__group row">
                    <div class="col-lg-3 ">
                      <label>
                        {{__('user.phone_number_area_code')}}
                      </label>
                      <p class="form-control-static">{{$user->phone_number_area_code}}</p>                    
                    </div>
                    <div class="col-lg-9 ">
                      <label>
                        {{__('user.phone_number')}}
                      </label>
                      <p class="form-control-static">{{$user->phone_number}}</p>                    
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
                  <p class="form-control-static">{{$user->social_name}}</p>                    

                </div>

                <div class="form-group m-form__group">
                  <label>
                    {{__('user.ssid')}}
                  </label>
                  <p class="form-control-static">{{$user->ssid}}</p>                    
                </div>
                


              </div>
            </div>
            <!--end::Portlet-->
          </div>
        </div>        
      </form>

    </div>
  </div>
</div>
@endsection