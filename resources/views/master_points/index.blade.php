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
          Breadcrumbs::item('/master_point', __('master_point.index'))
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
                <a href="{{url('/master_points/create')}}" class="btn btn-primary m-btn m-btn--icon m-btn--pill">
                  <span>
                    <i class="la la-plus"></i>
                    <span>{{__('nav.create')}}</span>
                  </span>
                </a>
                </a>
                 <a href="{{url('/master_points/trash')}}" title="{{__('nav.trash')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill" >
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
                <th>{{Index::orderByLink('name', __('master_point.name'))}}</th>
                <th>{{Index::orderByLink('address', __('master_point.address'))}}</th>
                <th>{{Index::orderByLink('description', __('master_point.description'))}}</th>
                <th>{{Index::orderByLink('created_at', __('messages.created_at'))}}</th>
                <th>{{Index::orderByLink('updated_at', __('messages.updated_at'))}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($master_points as $master_point)
                  <tr>
                    <td>{{$master_point->name}}</td>
                    <td>{{$master_point->address}}</td>
                    <td>{{$master_point->description}}</td>
                    <td>{{\Carbon\Carbon::parse($master_point->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($master_point->updated_at)->format('d/m/Y')}}</td>                                   
                    <td>
                      <div class="dropdown d-flex justify-content-end">             
                        <a href="#" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                          <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3">
                          <a class="dropdown-item" href="javascript:masterPointShow('{{url("master_points/show/".$master_point->id)}}');"><i class="fa fa-eye"></i> {{__('nav.show')}}</a>
                          <a class="dropdown-item" href="{{url('master_points/update/'.$master_point->id)}}"><i class="fa fa-edit"></i> {{__('nav.update')}}</a>
                          <a class="dropdown-item" href="javascript:masterPointDelete('{{$master_point->id}}', '{{$master_point->name}}')"><i class="fa fa-remove"></i> {{__('nav.delete')}}</a>                          
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$master_points->appends(Input::except('page'))->links('includes.pagination')}}
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  function masterPointDelete(master_point_id, master_point_name){
    swal({
      title: '{{__("nav.delete")}}',
      text: '{{__("messages.confirm_delete")}} '+master_point_name+'?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("master_points/delete")}}/'+master_point_id;
      }
    })
  }

function masterPointShow(url){
  $( "#general_modal .modal-content" ).load( url, function(){   
    $('#general_modal').modal();
  } );
}
</script>

@endsection

