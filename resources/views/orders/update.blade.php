@extends('layouts.app')

@section('content')


<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">

      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('titles.update_order')}}
      </h3>
      
      <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home">
          <a href="{{route('home')}}" class="m-nav__link m-nav__link--icon">
            <i class="m-nav__link-icon la la-home"></i>
          </a>
        </li>
      
        <li class="m-nav__separator">
          -
        </li>
      
        <li class="m-nav__item">
          <a href="{{route('home')}}" class="m-nav__link">
            <span class="m-nav__link-text">
              {{__('titles.home')}}
            </span>
          </a>
        </li>
      
        <li class="m-nav__separator">
          -
        </li>
      
        <li class="m-nav__item">
          <a href="{{action('OrderController@edit', ['id' => $order->id])}}" class="m-nav__link">
            <span class="m-nav__link-text">
              {{__('titles.update_order')}}
            </span>
          </a>
        </li>
      </ul>
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
      <div class="alert alert-danger">
          {{ session('message') }}
      </div>
  @endif


  <div class="row">

    <div class="col-lg-12">

      <!--begin::Form-->
      <form action="{{url('/orders/store_status/'.$order->id)}}" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
        {{csrf_field()}}

        @if(auth()->user()->type==1)
        <!--begin::Portlet-->
        <div class="m-portlet">
          
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('order.delegation')}}
                </h3>
              </div>
            </div>
          </div>

            <div class="m-portlet__body">

              <div class="form-group m-form__group row">

                <div class="col-lg-12">

                  <label class="">
                    {{__('order.delegation')}}
                  </label>

                  {{ Form::select('delegation', $delegationOptions, $order->delegation, array('class'=>'form-control m-input')) }}

                </div>

              </div>

            </div>    

          </div>
          <!--end::Portlet-->
          @endif

        <!--begin::Portlet-->
        <div class="m-portlet">
          
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon ">
                  <i class="la la-cube"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  {{__('order.order_status')}}
                </h3>
              </div>
            </div>
          </div>

            <div class="m-portlet__body">



              <div class="form-group m-form__group row">

                <div class="col-lg-12">

                  <label class="">
                    {{__('order.order_status')}}
                  </label>

                  {{ Form::select('status', $orderStatuses, $order->status, array('class'=>'form-control m-input')) }}

                </div>

              </div>

              <div class="form-group m-form__group row">

                <div class="col-lg-12 ">
                  <label>
                    {{__('order.payment_link')}}
                  </label>

                  <input type="text" name="payment_link" value="{{$order->payment_link}}" class="form-control m-input" placeholder="{{__('order.payment_link')}}">
                      
                  @if ($errors->has('payment_link'))
                      <div class="m-form__help text-danger">
                          {{ $errors->first('payment_link') }}
                      </div>
                  @endif

                  <span class="m-form__help">
                    {{__('order.payment_link_help')}}
                  </span>
                </div>
              </div>

          
              <div class="form-group m-form__group row">
                <div class="col-lg-12">
                  <label>
                     {{__('order.notificate_user')}}
                  </label>
                  <div class="m-radio-inline">
                    <label class="m-checkbox m-checkbox--solid">
                      <input type="checkbox" name="notificate_user" value="1" @if(old('notificate_user')) checked @endif >
                       {{__('order.notificate_user_option')}}
                      <span></span>
                    </label>
                  </div>
                 
                </div>
              </div>
            </div>    

            
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
              <div class="m-form__actions m-form__actions--solid">
                <div class="row">

                  <div class="col-lg-6 ">
                    <a href="{{route('home')}}" class="btn btn-secondary">
                      {{__('nav.cancel')}}
                    </a>
                  </div>

                  <div class="col-lg-6 m--align-right">
                    <button type="submit" class="btn btn-primary">
                      {{__('order.save_order')}}
                      <i class="fa fa-chevron-right"></i>
                    </button>
                  </div>

                </div>
              </div>
            </div>
            <!--end::Portlet-->

          </div>
          <!--end::Portlet-->


        </form>
        <!--end::Form-->


        </div>
        
    </div>

</div>

@endsection

