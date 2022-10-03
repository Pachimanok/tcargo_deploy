@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('vehicle.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/vehicles/index/'.$shipping_company->id, __('vehicle.index')),
          Breadcrumbs::item('/vehicles/trash', __('nav.trash'), 1)
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
              <a href="{{url('/vehicles/index/'.$shipping_company->id)}}" title="{{__('vehicle.index')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill">
                <i class="la la-undo"></i>
              </a>
            </div>

          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{Index::orderByLink('brand', __('vehicle.brand'))}}</th>
                <th>{{Index::orderByLink('model', __('vehicle.model'))}}</th>
                <th>{{Index::orderByLink('type', __('vehicle.type'))}}</th>
                <th>{{Index::orderByLink('plate', __('vehicle.plate'))}}</th>
                <th>{{Index::orderByLink('satellite_tracking', __('vehicle.satellite_tracking'))}}</th>
                <th>{{Index::orderByLink('created_at', __('messages.created_at'))}}</th>
                <th>{{Index::orderByLink('updated_at', __('messages.updated_at'))}}</th>               
                <th>{{Index::orderByLink('deleted_at', __('messages.deleted_at'))}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($vehicles as $vehicle)
                  <tr>
                    <td>{{$vehicle->brand}}</td>
                    <td>{{$vehicle->model}}</td>
                    <td>{{$vehicle_types[$vehicle->type]}}</td>
                    <td>{{$vehicle->plate}}</td>
                    <td>
                      @if($vehicle->satellite_tracking)
                        {{__('messages.yes')}}
                      @else
                        {{__('messages.no')}} 
                      @endif                      
                    </td>
                    <td>{{\Carbon\Carbon::parse($vehicle->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($vehicle->updated_at)->format('d/m/Y')}}</td>               
                    <td>{{\Carbon\Carbon::parse($vehicle->deleted_at)->format('d/m/Y')}}</td>               
                    <td class="text-right">
                      <a href="javascript:VehicleRestore('{{$vehicle->id}}', '{{$vehicle->plate}}')" class="btn m-btn btn-secondary m-btn--pill">
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
    function VehicleRestore(vehicle_id, vehicle_name){
    swal({
      title: '{{__("nav.restore")}}',
      text: '{{__("messages.confirm_restore")}} '+vehicle_name+'?',
      type: 'info',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("vehicles/restore")}}/'+vehicle_id;
      }
    })
  }
</script>

@endsection