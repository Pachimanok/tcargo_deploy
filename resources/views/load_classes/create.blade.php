@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('load_class.index')}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/load_classes', __('load_class.index')),
          Breadcrumbs::item(url()->current(), __('nav.create'), true),
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->


<div class="m-content">
  <div class="row">
    <div class="col-lg-12">

      <!--begin::Form-->
      <form action="{{url('/load_classes/store')}}" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
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
                  {{__('nav.create')}}
                </h3>
              </div>
            </div>
          </div>

          <div class="m-portlet__body">
            <div class="form-group m-form__group row">
              <div class="col-12">
                <label>
                  {{__('load_class.name')}}
                </label>

                <input type="text" name="name" value="" class="form-control m-input" placeholder="{{__('user.name')}}">
                    
                @if ($errors->has('name'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
              </div>
            </div>
          </div>    
        </div>
        <!--end::Portlet-->
          
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions--solid">
            <div class="row">

              <div class="col-lg-6 ">
                <a href="{{url('load_classes')}}" class="btn btn-secondary">
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

