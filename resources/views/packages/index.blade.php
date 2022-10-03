@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('package.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item(request()->user()->hasRole('admin')?'/dashboard/admin':'/dashboard/shipping_company', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('', $shipping_company->company_name, true),
          Breadcrumbs::item('/orders/shipping_company/'.$shipping_company->id, __('order.index')),
          Breadcrumbs::item("javascript:showOrder('".url("orders/show", ['id'=>$order->id])."');", __('order.order').' #'.$order->id),
          Breadcrumbs::item('/packages', __('package.index'), true)
      ])}}
    </div>
  </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      @include('packages.order')
      <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">

          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{__('package.package')}} #</th>
                <th>{{__('transit.transit')}} #</th>
                <th>{{__('package.origin_checkpoint')}}</th>
                <th>{{__('package.load_date')}}</th>
                <th>{{__('package.destination_checkpoint')}}</th>
                <th>{{__('package.unload_date')}}</th>
                <th>{{__('package.information')}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                <? $order_complete = true; ?>
                @foreach($packages as $package)
                  <tr>
                    <td>{{__('package.package')}} #{{$package->id}}</td>
                    <td>
                       <a href="javascript:transitshow('{{url("transits/show/".$package->transit_id)}}', '{{$package->transit_id}}');">{{__('transit.transit')}} #{{$package->transit_id}}</a>  
                    </td>
                    <td>{{$package->origin_checkpoint->sort}} - {{$package->origin_checkpoint->master_point->name}}</td>
                    <td>@if($package->load_date) {{\Carbon\Carbon::parse($package->load_date)->format('d/m/Y H:i')}} @else <em>{{__('package.pending_action')}}</em> @endif</td>
                    <td>{{$package->destination_checkpoint->sort}} - {{$package->destination_checkpoint->master_point->name}}</td>
                    <td>@if($package->unload_date) {{\Carbon\Carbon::parse($package->unload_date)->format('d/m/Y H:i')}} @else <em>{{__('package.pending_action')}}</em> @endif</td>

                    <td>@if($package->information) {{$package->information}} @else {{__('package.no_information')}} @endif</td>
                    
                    <td class="text-right" width="1%">
                      <a class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:PackageDelete('{{$package->id}}', '{{$package->name}}')"><i class="fa fa-remove"></i></a>                                              
                    </td>
                  </tr>
                  <?if(!$package->load_date OR !$package->unload_date){$order_complete = false;}?>
                @endforeach
              </tbody>
            </table>
            
          </div>
          @if($packages->count()==0)
          <div class="alert alert-info">{{__('package.empty_order')}}</div>
          @endif
          {{$packages->appends(Input::except('page'))->links('includes.pagination')}}
        </div>
      </div>
          @if($order->completed)
            <div class="alert alert-success">
              <i class="fa fa-check"></i> {{__('order.complete')}}
            </div>
            <a class="pull-right" href="{{url('orders/complete/'.$order->id.'/1')}}">{{__('nav.undo')}}</a>
          @elseif($packages->count()>0 AND $order_complete == true)
            <div class="m-portlet m-portlet--mobile">
              <div class="m-portlet__body">
                  <p class="text-center">
                    <a class="btn btn-primary" href="{{url('orders/complete/'.$order->id)}}">{{__('order.mark_as_complete')}}</a>
                  </p>    
              </div>
            </div>      
          @else
            <div class="alert alert-secondary">
              {{__('order.incomplete')}}
            </div>
          @endif

    </div>



  </div>
</div>



<script>
  function PackageDelete(package_id){
    swal({
      title: '{{__("nav.delete")}}',
      text: '{{__("messages.confirm_delete")}}',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("packages/delete")}}/'+package_id;
      }
    })
  }


  function packageshow(url){
    $( "#general_modal .modal-content" ).load( url, function(){   
      $('#general_modal').modal();
    } );
  }  

  
  function transitshow(url, id){
    $( "#general_modal .modal-content" ).load( url, function(){   
      $('#general_modal').modal();
    } );
  }  


</script>

@endsection

