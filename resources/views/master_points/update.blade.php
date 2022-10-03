@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('nav.update')}} {{$master_point->name}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/master_points', __('master_point.index')),
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
      <form action="{{url('/master_points/store/'.$master_point->id)}}" method="post" class="m-form m-form--label-align-right">
        {{csrf_field()}}
        <div class="row">

          <div class="col-12 col-md-6">

            <!--begin::Portlet-->
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon ">
                      <i class="la la-map-marker"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                      {{__('master_point.coordinates')}}  
                    </h3>
                  </div>
                </div>
              </div>
              <div class="m-portlet__body">
                <input name="latitude" id="latitude" value="{{old('latitude', $master_point->latitude)}}" type="hidden"/>
                <input name="longitude" id="longitude" value="{{old('longitude', $master_point->longitude)}}" type="hidden"/>
                <div class="map" id="master_point_map" style="height:300px;"></div>


                <div class="form-group m-form__group">
                  <!--<label>
                    {{__('master_point.address')}}
                  </label>-->
                  <textarea name="address" id="address" readonly class="form-control m-input  m-input--solid" placeholder="{{__('master_point.address')}}" rows="2">{{old('address', $master_point->address)}}</textarea>
                  @if ($errors->has('address'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('address') }}
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
                      {{__('master_point.description')}}  
                    </h3>
                  </div>
                </div>
              </div>
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                  <label>
                    {{__('master_point.name')}}
                  </label>
                  <input type="text" name="name" value="{{old('name', $master_point->name)}}" class="form-control m-input" placeholder="{{__('master_point.name')}}">
                  @if ($errors->has('name'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('name') }}
                      </div>
                  @endif
                </div>


                <div class="form-group m-form__group ">
                  <label>
                    {{__('master_point.description')}}
                  </label>
                  <textarea name="description" class="form-control m-input" placeholder="{{__('master_point.description')}}" rows="4">{{old('description', $master_point->description)}}</textarea>
                  <span class="m-form__help">
                    {{__('master_point.description_help')}}
                  </span>                  
                  @if ($errors->has('description'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('description') }}
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
                <a href="{{url('master_points')}}" class="btn btn-secondary">
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

