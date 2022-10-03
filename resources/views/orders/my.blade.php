@extends('layouts.app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center ">
            <div class="mr-auto">
                
                <h3 class="m-subheader__title ">
                    {{ __('order.index') }}
                </h3>

                {{Breadcrumbs::make([
                  Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
                  Breadcrumbs::item('/orders/my', __('order.my_orders'), true)
                ])}}

            </div>
         
        </div>
    </div>
    <!-- END: Subheader -->

    <div class="m-content">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
              <!--begin: Search Form -->
              <form method="GET">
                <div class="row">
                  <div class="col">
                    <div class="form-group m-form__group row align-items-center">

                      <div class="col-9 col-sm-3">
                        <div class="m-input-icon m-input-icon--left">
                          <input type="text" name="search" class="form-control m-input" placeholder="{{__('nav.search')}}" value="{{request()->search}}">
                          <span class="m-input-icon__icon m-input-icon__icon--left">
                            <span><i class="la la-search"></i></span>
                          </span>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div>
                      <div class="col-9 col-sm-3">
                        {{ Form::select('amount', $amount_range, request()->amount, ['class'=>'form-control selectpicker m-bootstrap-select']) }}
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div>
                      <div class="col-3 col-sm-6">
                        <button type="submit" class="btn btn-default">{{__('nav.filter')}}</button>
                      </div>

                    </div>
                  </div>
                  
                  <div class="ml-auto">
                    <a href="{{url('/orders/create/')}}" class="btn btn-primary m-btn m-btn--icon m-btn--pill">
                      <span>
                        <i class="la la-plus"></i>
                        <span>{{__('order.create')}}</span>
                      </span>
                    </a>
                  
                  </div>
                </div>
              </form>
              <!--end: Search Form -->                       
                <div class=" table-responsive">
                    <table class="table m-table mb-4">
                        <thead class="">
                            <tr>
                                <th>{{Index::orderByLink('id', __('#'))}}</th>
                                <th>{{Index::orderByLink('description', __('order.description'))}}</th>
                                <th>{{Index::orderByLink('package_type', __('order.package_type'))}}</th>
                                <th>{{Index::orderByLink('load_type', __('order.load_type'))}}</th>
                                <th>{{__('messages.from')}}</th>
                                <th>{{__('messages.to')}}</th>
                                <th>{{Index::orderByLink('amount', __('order.order_amount'))}}</th>
                                <th>{{__('order.order_status')}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="m-datatable__body" style="">
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->description}}</td>
                                <td>{{__("order.".$order->package_type)}}</td>
                                <td>{{__("order.".$order->load_type)}}</td>
                                <td width="300px">{{$order->origin}}</td>
                                <td width="300px">{{$order->destination}}</td>
                                <td>
                                  <div class="row">
                                    <div class="col">
                                      $ {{number_format($order->amount, 2, ",", ".")}}
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <p>@if($order->insurance) <i class="fa fa-info-circle"></i> {{__('order.min_insurance')}} 
                                         @else <i class="fa fa-info-circle" style="opacity: 0.40"></i> {{__('order.min_no_insurance')}} @endif </p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  @if(!$order->shipping_company_id)
                                    {{__('order.status_pending_match')}}
                                  @elseif(!$order->payment_link)
                                    {{__('order.status_match_found')}}<br/>
                                    <a class="btn btn-success" target="_blank" href="{{url('orders/create_payment/'.$order->id)}}">{{__('order.make_payment')}}</a>
                                  @elseif(!$order->paid)
                                    {{__('order.status_payment_in_process')}}
                                    <a class="" target="_blank" href="{{$order->payment_link}}"><i class="fa fa-external-link"></i></a>
                                  @else
                                    {{__('order.paid')}}
                                  @endif                                  
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="showOrder('{{url("orders/show", ['id'=>$order->id])}}');" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill">
                                      <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$orders->appends(Input::except('page'))->links('includes.pagination')}}                        

            </div>
        </div>


    </div>
      

@endsection
