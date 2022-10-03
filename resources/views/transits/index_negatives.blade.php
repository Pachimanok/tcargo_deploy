@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('transit.negative_loads_opportunities')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/transits', __('transit.negative_loads_opportunities'), true)
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
                <th>{{__('shipping_company.shipping_company')}}</th>
                <th>{{__('vehicle.vehicle_load_classes')}}</th>
                <th>{{__('transit.transit')}}</th>
                <th>{{__('transit.negative_start')}}</th>
                <th>{{__('transit.negative_end')}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($negative_checkpoints as $checkpoint)
                  <tr>
                    <td>
                      <b>{{$checkpoint->transit->shipping_company->company_name}}</b>
                      <br>{{$checkpoint->transit->vehicle->model}}
                    </td>


                    <td>
                      
                      <? $vehicle_load_classes = explode('|', trim($checkpoint->transit->vehicle->vehicle_load_classes, '|'));        ?>
                      @foreach($load_classes as $load_class)
                          <div>
                            {{$load_class->name}}:
                            <b>
                            @if(in_array($load_class->id, $vehicle_load_classes)) 
                            {{__('messages.yes')}} 
                            @else 
                            {{__('messages.no')}} 
                            @endif
                            </b>
                          </div>
                      @endforeach

                    </td>

                    <td>
                      <?$start=0;?>
                      @foreach($checkpoint->transit->checkpoints as $transit_checkpoint)
                        <?if($transit_checkpoint->negative AND $transit_checkpoint->id == $checkpoint->id){$start=1;}?>
                        @if($start)
                        <div>
                          @if($transit_checkpoint->negative AND $transit_checkpoint->id == $checkpoint->id) 
                            <b>{{__('transit.load_point')}}:</b>
                            {{$transit_checkpoint->master_point->name}}
                            <i class="fa fa-truck" title="{{__('transit.negative_load')}}"></i> 
                          @else
                            {{$transit_checkpoint->master_point->name}}
                          @endif                                              
                        </div>           
                        @endif
                      @endforeach
                    </td>
                    <td>@if($checkpoint->negative_start){{date('d/m/Y H:i', strtotime($checkpoint->negative_start))}}@endif</td>
                    <td>@if($checkpoint->negative_end){{date('d/m/Y H:i', strtotime($checkpoint->negative_end))}}@endif</td>
                    <td>
                      <a class="pull-right btn btn-primary" href="{{url('orders/create/'.$checkpoint->id)}}">{{__('order.create_negative_load_order')}}</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$negative_checkpoints->appends(Input::except('page'))->links('includes.pagination')}}
        </div>
      </div>

    </div>
  </div>
</div>



@endsection

