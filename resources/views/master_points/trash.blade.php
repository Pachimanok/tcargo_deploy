@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('master_point.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/master_points', __('master_point.index')),
          Breadcrumbs::item('/master_points/trash', __('nav.trash'), 1)
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
                <th>{{Index::orderByLink('name', __('master_point.name'))}}</th>
                <th>{{__('messages.created_at')}}</th>
                <th>{{__('messages.deleted_at')}}</th>                
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($master_points as $master_point)
                  <tr>
                    <td>{{$master_point->name}}</td>
                    <td>{{\Carbon\Carbon::parse($master_point->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($master_point->deleted_at)->format('d/m/Y')}}</td>                                   
                    <td class="text-right">
                      <a class="btn m-btn btn-secondary m-btn--pill" href="javascript:masterPointRestore('{{$master_point->id}}', '{{$master_point->name}}')"><i class="fa fa-remove"></i> {{__('nav.restore')}}</a>                          
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
    function masterPointRestore(master_point_id, master_point_name){
    swal({
      title: '{{__("nav.restore")}}',
      text: '{{__("messages.confirm_restore")}} '+master_point_name+'?',
      type: 'info',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("master_points/restore")}}/'+master_point_id;
      }
    })
  }
</script>
@endsection