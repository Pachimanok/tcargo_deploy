@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('shipping_company.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/shipping_companies', __('shipping_company.index'))
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
              

            </div>
          </form>
          <!--end: Search Form -->
          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{Index::orderByLink('company_name', __('shipping_company.company_name'))}}</th>
                <th>{{__('shipping_company.owner')}}</th>
                <th>{{Index::orderByLink('order_fee_percentage', __('shipping_company.order_fee_percentage_short'))}}</th>
                <th>{{__('nav.city')}}</th>
                <th>{{__('shipping_company.phone_number')}}</th>
                <th>{{Index::orderByLink('contact_name', __('shipping_company.contact_name_short'))}}</th>
                <th>{{__('shipping_company.blocked')}}</th>
                <th>{{Index::orderByLink('created_at', __('messages.created_at'))}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($shipping_companies as $shipping_company)
                  <tr>
                    <td>{{$shipping_company->company_name}}</td>
                    <td>{{$shipping_company->user->name}}</td>
                    <td>{{$shipping_company->order_fee_percentage}}%</td>
                    <td>{{$shipping_company->city->city}} - {{$shipping_company->city->state->country->country}}</td>
                    <td>{{$shipping_company->phone_number_area_code}} {{$shipping_company->phone_number}}</td>
                    <td>{{$shipping_company->contact_name}}</td>
                    <td>
                        <strong>
                        @if($shipping_company->blocked)
                          <span class="m--font-danger">{{__('messages.yes')}}</span>
                        @else
                          <span class="m--font-success">{{__('messages.no')}}</span>
                        @endif  
                        </strong>                    
                    </td>
                    <td>{{\Carbon\Carbon::parse($shipping_company->created_at)->format('d/m/Y')}}</td>                                   
                    <td>
                      <div class="dropdown d-flex justify-content-end">             
                        <a title="{{__('withdrawal.balance')}}" href="{{url('withdrawals/index/'.$shipping_company->id)}}" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill">
                          <i class="fa  fa-credit-card"></i>
                        </a>&nbsp;                                           
                        <a title="{{__('transit.index')}}" href="{{url('transits/index/'.$shipping_company->id)}}" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill">
                          <i class="m-nav__link-icon flaticon-map-location"></i>
                        </a>&nbsp;                   
                        <a title="{{__('vehicle.index')}}" href="{{url('vehicles/index/'.$shipping_company->id)}}" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill">
                          <i class="fa fa-car"></i>
                        </a>&nbsp;
                        <a title="{{__('driver.index')}}" href="{{url('drivers/index/'.$shipping_company->id)}}" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill">
                          <i class="fa fa-users"></i>
                        </a>&nbsp;                                                
                        <a href="#" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                          <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3">
                          

                          <a class="dropdown-item" href="{{url('shipping_companies/update/'.$shipping_company->id)}}"><i class="fa fa-edit"></i> {{__('nav.update')}}</a>


                          @if($shipping_company->blocked)
                            <a class="dropdown-item" href="javascript:shippingCompanyUnblock('{{$shipping_company->id}}', '{{$shipping_company->company_name}}')"><i class="fa fa-remove"></i> {{__('nav.unblock')}}</a>
                          @else
                            <a class="dropdown-item" href="javascript:shippingCompanyBlock('{{$shipping_company->id}}', '{{$shipping_company->company_name}}')"><i class="fa fa-remove"></i> {{__('nav.block')}}</a>
                          @endif

                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$shipping_companies->appends(Input::except('page'))->links('includes.pagination')}}
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  function shippingCompanyBlock(shipping_company_id, shipping_company_name){
    swal({
      title: '{{__("nav.block")}}',
      text: '{{__("messages.confirm_block")}} '+shipping_company_name+'?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("shipping_companies/status")}}/'+shipping_company_id+'/blocked';
      }
    })
  }
  function shippingCompanyUnblock(shipping_company_id, shipping_company_name){
    swal({
      title: '{{__("nav.unblock")}}',
      text: '{{__("messages.confirm_unblock")}} '+shipping_company_name+'?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("shipping_companies/status")}}/'+shipping_company_id+'/unblocked';
      }
    })
  }

</script>


@endsection

