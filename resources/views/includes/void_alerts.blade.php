@if (isset($shipping_company) && ($shipping_company->drivers->count() == 0 || $shipping_company->vehicles->count() == 0))
	<div class="mt-0 mb-0 m-alert m-alert--icon alert alert-danger" role="alert">
		<div class="m-alert__icon">
			<i class="flaticon-danger"></i>
		</div>
		<div class="m-alert__text">
		  	{{__('messages.missing_content')}}
		  	<ul class="mt-1 mb-0">
			  	@if ($shipping_company->drivers->count() == 0)
					<li>{{__('shipping_company.no_drivers')}} - <a style="color: inherit;" href="{{url('drivers/create/'.$shipping_company->id)}}"><u>{{__('driver.create_driver')}}</u></a></li>
				@endif
				@if ($shipping_company->vehicles->count() == 0)
					<li>{{__('shipping_company.no_vehicles')}} - <a style="color: inherit;" href="{{url('vehicles/create/'.$shipping_company->id)}}"><u>{{__('vehicle.create_vehicle')}}</u></a></li>
				@endif
			</ul>
		</div>		
	</div>
@endif