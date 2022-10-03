@if ($errors->any())
<div class="mt-4 mb-0 m-alert m-alert--icon alert alert-danger" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-danger"></i>
	</div>
	<div class="m-alert__text">
	  	{{__('messages.correct_errors_below')}}
	  	<ul class="mt-1 mb-0">
		  	@foreach($errors->all() as $error)
		  		<li>{{$error}}</li>
		  	@endforeach
		</ul>
	</div>		
</div>
@endif


<!--   @if (session('message'))
	<div class="mt-4 mb-0 m-alert m-alert--icon alert alert-info" role="alert">
		<div class="m-alert__icon">
			<i class="flaticon-exclamation"></i>
		</div>
		<div class="m-alert__text">
		  	{{ session('message') }}
		</div>	
	</div>
  @endif -->