<!-- Modal Header -->
<div class="modal-header">
	<h4 class="modal-title">{{$title}}</h4>
	<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
	@yield('content')
</div>

<!-- Modal footer -->
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('nav.close')}}</button>
</div>