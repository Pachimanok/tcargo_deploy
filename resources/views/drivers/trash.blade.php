@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('driver.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/drivers/index/'.$shipping_company->id, __('driver.index')),
          Breadcrumbs::item('/drivers/trash', __('nav.trash'), 1)
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
            <div class="mr-auto mb-3">
              <a href="{{url('/drivers/index/'.$shipping_company->id)}}" title="{{__('driver.index')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill">
                <i class="la la-undo"></i>
              </a>
            </div>

          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{Index::orderByLink('name', __('driver.name'))}}</th>
                <th>{{Index::orderByLink('email', __('driver.email'))}}</th>
                <th>{{Index::orderByLink('email', __('driver.fiscal_id_number'))}}</th>
                
                <th>{{Index::orderByLink('phone_number_area_code, phone_number', __('driver.phone_number'))}}</th>
                <th>{{Index::orderByLink('created_at', __('messages.created_at'))}}</th>
                <th>{{Index::orderByLink('updated_at', __('messages.updated_at'))}}</th>               
                <th>{{Index::orderByLink('deleted_at', __('messages.deleted_at'))}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($drivers as $driver)
                  <tr>
                    <td>{{$driver->name}}</td>
                    <td>{{$driver->email}}</td>
                    <td>{{$driver->fiscal_id_number}}</td>
                    <td>{{$driver->phone_number_area_code}} {{$driver->phone_number}}</td>
                    <td>{{\Carbon\Carbon::parse($driver->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($driver->updated_at)->format('d/m/Y')}}</td>               
                    <td>{{\Carbon\Carbon::parse($driver->deleted_at)->format('d/m/Y')}}</td>               
                    <td class="text-right">
                      <a href="javascript:DriverRestore('{{$driver->id}}', '{{$driver->name}}')" class="btn m-btn btn-secondary m-btn--pill">
                        {{__('nav.restore')}}
                      </a>                      
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
        </div>
      </div>

    </div>
  </div>
</div>


<script>
    function DriverRestore(driver_id, driver_name){
    swal({
      title: '{{__("nav.restore")}}',
      text: '{{__("messages.confirm_restore")}} '+driver_name+'?',
      type: 'info',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("drivers/restore")}}/'+driver_id;
      }
    })
  }
</script>

@endsection