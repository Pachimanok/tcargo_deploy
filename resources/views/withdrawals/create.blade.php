@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('withdrawal.add_withdrawal')}}
      </h3>

      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('', $shipping_company->company_name, true),
          Breadcrumbs::item('/withdrawals/index/'.$shipping_company->id, __('withdrawal.index')),
          Breadcrumbs::item('/withdrawals/create/'.$shipping_company->id, __('withdrawal.add_withdrawal'), true)
      ])}}

    </div>
    
  </div>
</div>
<!-- END: Subheader -->


<div class="m-content">
  <div class="row">
    <div class="col-lg-12">

      <!--begin::Form-->
      <form action="{{url('/withdrawals/store')}}" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
        {{csrf_field()}}
        <input type="hidden" value="{{$shipping_company->id}}" name="shipping_company_id">
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
                  {{__('withdrawal.description')}}
                </label>

                <input type="text" name="description" value="{{old('description')}}" class="form-control m-input" placeholder="{{__('withdrawal.description')}}">
                    
                @if ($errors->has('description'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('description') }}
                    </div>
                @endif
              </div>
            </div>

            <div class="form-group m-form__group row">
              <div class="col-12">
                <label>
                  {{__('withdrawal.amount')}}
                </label>

                <input type="number" step="0.01" min="0" name="amount" value="{{old('amount')}}" class="form-control m-input" placeholder="{{__('withdrawal.amount')}}">
                    
                @if ($errors->has('amount'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
              </div>
            </div>

            <div class="form-group m-form__group row">
              <div class="col-12">
                <label>
                  {{__('withdrawal.type')}}
                </label>

                {{ Form::select('withdrawal_type', array(1=>__('withdrawal.type_withdrawal'), 2=>__('withdrawal.type_refund')), old('withdrawal_type'), array('class'=>'form-control m-input')) }}
                    
              </div>
            </div>


            <div class="form-group m-form__group row">
              <div class="col-12">
                <label>
                  {{__('withdrawal.date')}}
                </label>

                <input type="text" name="date" value="{{old('date')}}" class="form-control m-input datetime_picker" placeholder="{{__('withdrawal.date')}}">
                    
                @if ($errors->has('date'))
                    <div class="m-form__help text-danger">
                        {{ $errors->first('date') }}
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

