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
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('', $shipping_company->company_name, true),
          Breadcrumbs::item('/vehicles', __('vehicle.index'), true)
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
                <a href="{{url('/vehicles/create/'.$shipping_company->id)}}" class="btn btn-primary m-btn m-btn--icon m-btn--pill">
                  <span>
                    <i class="la la-plus"></i>
                    <span>{{__('nav.create')}}</span>
                  </span>
                </a>
                 <a href="{{url('/vehicles/trash/'.$shipping_company->id)}}" title="{{__('nav.trash')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill" >
                    <i class="la la-trash"></i>
                </a>
              </div>
            </div>
          </form>
          <!--end: Search Form -->
          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{Index::orderByLink('brand', __('vehicle.brand'))}}</th>
                <th>{{Index::orderByLink('model', __('vehicle.model'))}}</th>
                <th>{{Index::orderByLink('type', __('vehicle.type'))}}</th>
                <th>{{Index::orderByLink('plate', __('vehicle.plate'))}}</th>
                <th>{{__('load_class.index')}}</th>
                <th>{{Index::orderByLink('satellite_tracking', __('vehicle.satellite_tracking'))}}</th>
                <th>{{Index::orderByLink('updated_at', __('messages.updated_at'))}}</th>                
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
                      <?
                        $vehicle_load_classes = explode("|", $vehicle->vehicle_load_classes);
                      ?>
                      @foreach($vehicle_load_classes as $load_class)
                        @if($load_class = $load_classes->find($load_class))
                          <li>{{$load_class->name}}</li>
                        @endif
                      @endforeach
                    </td>                    
                    <td>
                      @if($vehicle->satellite_tracking)
                        {{__('messages.yes')}}
                      @else
                        {{__('messages.no')}} 
                      @endif                      
                    </td>
                    <td>{{\Carbon\Carbon::parse($vehicle->updated_at)->format('d/m/Y')}}</td>               
                    <td>
                      <div class="dropdown d-flex justify-content-end">             
                        <a href="#" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                          <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3">
                          <a class="dropdown-item" href="javascript:vehicleShow('{{url("vehicles/show/".$vehicle->id)}}');"><i class="fa fa-eye"></i> {{__('nav.show')}}</a>
                          <a class="dropdown-item" href="{{url('vehicles/update/'.$vehicle->id)}}"><i class="fa fa-edit"></i> {{__('nav.update')}}</a>
                          <a class="dropdown-item" href="javascript:VehicleDelete('{{$vehicle->id}}', '{{$vehicle->plate}}')"><i class="fa fa-remove"></i> {{__('nav.delete')}}</a>                          
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$vehicles->appends(Input::except('page'))->links('includes.pagination')}}
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

