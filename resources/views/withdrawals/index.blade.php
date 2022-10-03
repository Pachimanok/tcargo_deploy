@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('withdrawal.balance')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('', $shipping_company->company_name, true),
          Breadcrumbs::item('/shipping_company/'.$shipping_company->id, __('withdrawal.balance'), true)
      ])}}
    </div>
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <div class="row">
    <div class="col-lg-12">

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

                  <div class="col-3 col-sm-6">
                    <button type="submit" class="btn btn-default">{{__('nav.filter')}}</button>
                  </div>

                </div>
              </div>
              
              <div class="ml-auto">
                @if(request()->user()->hasRole('admin'))
                <a href="{{url('/withdrawals/create/'.$shipping_company->id)}}" class="btn btn-primary m-btn m-btn--icon m-btn--pill">
                  <span>
                    <i class="la la-plus"></i>
                    <span>{{__('withdrawal.add_withdrawal')}}</span>
                  </span>
                </a>
                @endif
              </div>
            </div>
          </form>
          <!--end: Search Form -->
          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{Index::orderByLink('date', __('withdrawal.date'))}}</th>
                <th  style="text-align:center;">{{Index::orderByLink('amount', __('withdrawal.credit'))}}</th>
                <th style="text-align:center;">{{Index::orderByLink('amount', __('withdrawal.withdrawal'))}}</th>                
                <th>{{Index::orderByLink('description', __('withdrawal.description'))}}</th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                <?php
                  $sum_orders = $sum_withdrawals = 0;
                ?>
                @foreach($payments as $payment)
                  <tr>
                    <td>{{\Carbon\Carbon::parse($payment->date)->format('d/m/Y H:i')}}</td>
                    <td align=center>@if($payment->amount>0) $ {{$payment->amount}} <?$sum_orders=$sum_orders+$payment->amount?> @endif</td>                    
                    <td align=center>@if($payment->amount<=0) $ {{$payment->amount}} <?$sum_withdrawals=$sum_withdrawals+$payment->amount?> @endif</td>                                        
                    <td>{{$payment->description}}</td>
                  </tr>                  
                @endforeach
                  <tr>
                    <td colspan=1></td>
                    <td align=center><b>$ {{$sum_orders}}</b></td>                    
                    <td align=center><b>$ {{$sum_withdrawals}}</b></td>
                    <td colspan=1></td>
                  </tr>                
                  <tr>
                    <td colspan=1></td>
                    <td colspan=2 align=center>
                      <b>{{__('withdrawal.balance')}}</b>
                      <br>
                      $ {{$sum_orders+$sum_withdrawals}}
                    </td>            
                    <td colspan=1></td>
                  </tr>                                  
              </tbody>
            </table>
          </div>
          
        </div>
      </div>

    </div>
  </div>
</div>


<script>
  function VehicleDelete(vehicle_id, vehicle_name){
    swal({
      title: '{{__("nav.delete")}}',
      text: '{{__("messages.confirm_delete")}} '+vehicle_name+'?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("vehicles/delete")}}/'+vehicle_id;
      }
    })
  }

  function vehicleShow(url){
    $( "#general_modal .modal-content" ).load( url, function(){   
      $('#general_modal').modal();
    } );
  }  
</script>

@endsection

