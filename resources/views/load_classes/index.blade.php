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
          Breadcrumbs::item('/load_classes', __('load_class.index'))
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
                <a href="{{url('/load_classes/create')}}" class="btn btn-primary m-btn m-btn--icon m-btn--pill">
                  <span>
                    <i class="la la-plus"></i>
                    <span>{{__('nav.create')}}</span>
                  </span>
                </a>
                 <a href="{{url('/load_classes/trash')}}" title="{{__('nav.trash')}}" class="btn m-btn btn-secondary m-btn--icon  m-btn--pill" >
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
                <th>{{Index::orderByLink('name', __('load_class.name'))}}</th>
                <th>{{Index::orderByLink('created_at', __('messages.created_at'))}}</th>
                <th>{{Index::orderByLink('updated_at', __('messages.updated_at'))}}</th>                
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body">
                @foreach($load_classes as $load_class)
                  <tr>
                    <td>{{$load_class->name}}</td>
                    <td>{{\Carbon\Carbon::parse($load_class->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($load_class->updated_at)->format('d/m/Y')}}</td>               
                    <td>
                      <div class="dropdown d-flex justify-content-end">             
                        <a href="#" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                          <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3">
                          <a class="dropdown-item" href="{{url('load_classes/update/'.$load_class->id)}}"><i class="fa fa-edit"></i> {{__('nav.update')}}</a>
                          <a class="dropdown-item" href="javascript:loadClassDelete('{{$load_class->id}}', '{{$load_class->name}}')"><i class="fa fa-remove"></i> {{__('nav.delete')}}</a>                          
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$load_classes->appends(Input::except('page'))->links('includes.pagination')}}
        </div>
      </div>

    </div>
  </div>
</div>


<script>
  function loadClassDelete(load_class_id, load_class_name){
    swal({
      title: '{{__("nav.delete")}}',
      text: '{{__("messages.confirm_delete")}} '+load_class_name+'?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("load_classes/delete")}}/'+load_class_id;
      }
    })
  }
</script>

@endsection

