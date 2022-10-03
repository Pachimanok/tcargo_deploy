@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('transit.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/transits/index/'.$shipping_company->id, __('transit.index')),
          Breadcrumbs::item('/transits/trash', __('nav.trash'), 1)
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
              <a href="{{url('/transits/index/'.$shipping_company->id)}}" title="{{__('transit.index')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill">
                <i class="la la-undo"></i>
              </a>
            </div>

          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{__('driver.driver')}}</th>
                <th>{{__('vehicle.vehicle')}}</th>
                <th>{{__('transit.checkpoints')}}</th>
                <th>{{Index::orderByLink('updated_at', __('messages.updated_at'))}}</th>                
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($transits as $transit)
                  <tr>
                    <td>
                      {{$transit->driver->name}}
                      <br>{{$transit->driver->phone_number_area_code}} {{$transit->driver->phone_number}}
                    </td>
                    <td>
                      {{$transit->vehicle->model}}
                      <br>{{$transit->vehicle->plate}}
                    </td>
                    <td>
                      @foreach($transit->checkpoints as $checkpoint)
                        <div>{{print_r($checkpoint->master_point->name)}}</div>
                      @endforeach
                    </td>
                    <td>{{\Carbon\Carbon::parse($transit->updated_at)->format('d/m/Y')}}</td>    
                    <td class="text-right">
                      <a href="javascript:TransitRestore('{{$transit->id}}')" class="btn m-btn btn-secondary m-btn--pill">
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
    function TransitRestore(transit_id, transit_name){
    swal({
      title: '{{__("nav.restore")}}',
      text: '{{__("messages.confirm_restore")}}?',
      type: 'info',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("transits/restore")}}/'+transit_id;
      }
    })
  }
</script>

@endsection