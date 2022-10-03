@extends('layouts.app')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        {{__('user.index')}}
      </h3> 
      {{Breadcrumbs::make([
          Breadcrumbs::item('/dashboard/admin', '<i class="fa fa-home"></i>'),
          Breadcrumbs::item('/users', __('user.index'))
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
                  <div class="col-9 col-sm-3">
                    <div class="m-form__control">
                      {{ Form::select('blocked', array('' => __('nav.all'), '1' => __('user.blocked'), '0' =>  __('user.unblocked') ), request()->blocked, ['class'=>'form-control selectpicker m-bootstrap-select']) }}
                    </div>
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
                <th>{{Index::orderByLink('name', __('user.name'))}}</th>
                <th>{{Index::orderByLink('email', __('user.email'))}}</th>
                <th>{{Index::orderByLink('phone_number', __('user.phone_number'))}}</th>
                <th>{{Index::orderByLink('user_type_reference', __('user.user_type_reference'))}}</th>
                <th class="d-none d-sm-table-cell">{{Index::orderByLink('social_name', __('user.social_name'))}}</th>
                <th class="d-none d-sm-table-cell">{{Index::orderByLink('ssid', __('user.ssid'))}}</th>
                <th class="d-none d-sm-table-cell">{{Index::orderByLink('tos_accepted', __('user.tos_accepted_short'))}}</th>
                <th class="d-none d-sm-table-cell">{{Index::orderByLink('blocked', __('user.blocked'))}}</th>                
                <th>{{Index::orderByLink('created_at', __('user.created_at'))}}</th>
                <th>{{Index::orderByLink('updated_at', __('user.updated_at'))}}</th>
                <th></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body" style="">
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{__('user.'.$user->user_type_reference)}}</td>
                    <td class="d-none d-sm-table-cell">{{$user->social_name}}</td>
                    <td class="d-none d-sm-table-cell">{{$user->ssid}}</td>
                    <td class="d-none d-sm-table-cell">
                      <strong>
                        @if($user->tos_accepted)
                          <span class="m--font-success">{{__('messages.yes')}}</span>
                        @else
                          <span class="m--font-danger">{{__('messages.no')}}</span>
                        @endif
                      </strong>
                     </td>
                    <td class="d-none d-sm-table-cell">
                      <strong>
                        @if($user->blocked)
                          <span class="m--font-danger">{{__('messages.yes')}}</span>
                        @else
                          <span class="m--font-success">{{__('messages.no')}}</span>
                        @endif
                      </strong>
                     </td>                     
                    <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}</td>
                    <td>
                      <div class="dropdown ">             
                        <a href="#" class="btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                          <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3">
                          <a class="dropdown-item" href="{{url('users/show/'.$user->id)}}"><i class="fa fa-eye"></i> {{__('nav.show')}}</a>
                          <a class="dropdown-item" href="{{url('users/update/'.$user->id)}}"><i class="fa fa-edit"></i> {{__('nav.update')}}</a>
                          @if($user->blocked)
                            <a class="dropdown-item" href="javascript:userUnblock('{{$user->id}}', '{{$user->name}}')"><i class="fa fa-check"></i> {{__('user.unblock')}}</a>
                          @else
                            <a class="dropdown-item" href="javascript:userBlock('{{$user->id}}', '{{$user->name}}')"><i class="fa fa-remove"></i> {{__('user.block')}}</a>                          
                          @endif
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$users->appends(Input::except('page'))->links('includes.pagination')}}
        </div>
      </div>

    </div>
  </div>
</div>


<script>
    function userUnblock(user_id, user_name){
    swal({
      title: '{{__("user.unblock")}}',
      text: '{{__("user.confirm_unblock")}} '+user_name+'?',
      type: 'info',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-info',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("users/status")}}/'+user_id+'/unblocked';
      }
    })
  }

  function userBlock(user_id, user_name){
    swal({
      title: '{{__("user.block")}}',
      text: '{{__("user.confirm_block")}} '+user_name+'?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      confirmButtonText: '{{__("nav.confirm")}}',
      cancelButtonText: '{{__("nav.cancel")}}',
    }).then((result) => {
      if (result.value) {
        window.location = '{{url("users/status")}}/'+user_id+'/blocked';
      }
    })
  }
</script>
@endsection