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
                  Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
                  Breadcrumbs::item('/orders/index', __('order.index'))
                ])}}

            </div>

        </div>
    </div>
    <!-- END: Subheader -->

    <div class="m-content">
        
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
                                <th>{{__('user.email')}}</th>
                                <th>{{__('user.phone_number')}}</th>
                                <th>{{__('shipping_company.shipping_company')}}</th>           
                                <th>{{Index::orderByLink('origin_period_end', __('order.origin_period_end_short'))}}</th>
                                <th>{{Index::orderByLink('destination_period_end', __('order.destination_period_end_short'))}}</th>
                                <th>{{__('order.distributed')}}</th>                                                        
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
                                <td width="200px">
                                  {{$order->origin}}

                                  <br><em>{{$order->origin_master_point->name}}</em>
                                </td>
                                <td width="200px">
                                  {{$order->destination}}
                                  <br><em>{{$order->destination_master_point->name}}</em>
                                </td>                                
                                <td>{{$order->user->email}}</td>
                                <td>{{$order->user->phone_number_area_code}} {{$order->user->phone_number}}</td>
                                <td nowrap>
                                    @if($order->shipping_company) 
                                        {{$order->shipping_company->company_name}}
                                        @if(!$order->paid)
                                          <a href="javascript:void(0);" onclick="unassignOrder('{{url("orders/unassign", ['id'=>$order->id])}}');" class="text-danger">
                                              <i class="fa fa-close"></i>
                                          </a>
                                        @endif
                                    @else {{__('order.unassigned')}} @endif

                                </td>
                                
                                <td>{{\Carbon\Carbon::parse($order->origin_period_end)->format('d/m/Y H:i')}}</td>

                                <td>{{\Carbon\Carbon::parse($order->destination_period_end)->format('d/m/Y H:i')}}</td>
 
                                <td>
                                    <a href="{{url('packages/index/'.$order->id)}}">
                                    @if($order->shipping_company AND $order->packages->count()>0) 
                                        {{$order->packages->count()}} {{trans_choice('package.packages',$order->packages->count())}}</a>
                                    @elseif($order->shipping_company)
                                        {{__('package.not_distributed')}}
                                    @endif
                                    </a>
                                </td>  
                                <td>
                                  @if(!$order->shipping_company_id)
                                    {{__('order.status_pending_match')}}
                                  @elseif(!$order->payment_link)
                                    {{__('order.status_pending_payment')}}
                                  @elseif(!$order->paid)
                                    <p>{{__('order.status_payment_in_process')}}</p>
                                    <p><a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="markAsPaid('{{url("orders/mark_as_paid", ['id'=>$order->id])}}');">{{__('order.mark_as_paid')}}</a></p>
                                  @elseif($order->withdrawal)
                                    <p>
                                      <b>{{__('order.status_shipping_company_paid')}}</b>
                                      <br>{{\Carbon\Carbon::parse($order->withdrawal)->format('d/m/Y H:i')}}
                                    </p>
                                  @else
                                    <p>{{__('order.paid')}}</p>
                                    <p><a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="markAsPaidToShippingCompany('{{url("orders/mark_as_paid", ['id'=>$order->id, 'shipping_company_id'=>$order->shipping_company_id])}}');">{{__('order.mark_as_paid_to_shipping_company')}}</a></p>                                    
                                  @endif                                  
                                </td>

                                <td nowrap>
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
      
<script>
    function markAsPaidToShippingCompany(url){
    swal({
      title: '{{__("order.mark_as_paid_to_shipping_company")}}',
      text: '{{__("order.confirm_mark_as_paid_to_shipping_company")}}',
      type: 'success',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = url;
      }
    })
  }

    function markAsPaid(url){
    swal({
      title: '{{__("order.mark_as_paid")}}',
      text: '{{__("order.confirm_mark_as_paid")}}',
      type: 'success',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = url;
      }
    })

}

    function unassignOrder(url){

    swal({
      title: '{{__("order.unassign_order")}}',
      text: '{{__("order.confirm_unassign_order")}}',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-warning',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = url;
      }
    })

}

</script>
@endsection
