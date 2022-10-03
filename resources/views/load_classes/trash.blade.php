@extends('layouts.app')

@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('load_class.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/load_classes', __('load_class.index')),
          Breadcrumbs::item('/load_classes/trash', __('nav.trash'), 1)
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
              <a href="{{url('/load_classes')}}" title="{{__('load_class.index')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill">
                <i class="la la-undo"></i>
              </a>
            </div>

          <div class=" table-responsive">
            <table class="table m-table mb-4">
              <thead class="">
              <tr>
                <th>{{__('load_class.name')}}</th>
                <th>{{__('messages.created_at')}}</th>
                <th>{{__('messages.deleted_at')}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($load_classes as $load_class)
                  <tr>
                    <td>{{$load_class->name}}</td>
                    <td>{{\Carbon\Carbon::parse($load_class->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($load_class->deleted_at)->format('d/m/Y')}}</td>               
                    <td class="text-right">
                      <a href="javascript:loadClassRestore('{{$load_class->id}}', '{{$load_class->name}}')" class="btn m-btn btn-secondary m-btn--pill">
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
    function loadClassRestore(load_class_id, load_class_name){
    swal({
      title: '{{__("nav.restore")}}',
      text: '{{__("messages.confirm_restore")}} '+load_class_name+'?',
      type: 'info',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("load_classes/restore")}}/'+load_class_id;
      }
    })
  }
</script>

@endsection