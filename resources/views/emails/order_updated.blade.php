<html>
<head></head>
	<body>

		<h1>{{$title}}</h1>

		<p>{{$content}}</p>

		<p><b>{{__('order.package_description')}}:</b> {{$description}}</p>

		<p><b>{{__('order.order_status')}}:</b> {{__('order.'.$status)}}</p>

		<p><b>{{__('order.load_origin')}}:</b> {{$origin}}</p>

		<p><b>{{__('order.load_destination')}}:</b> {{$destination}}</p>


		@if($status=='approved' AND $payment_link)
			<p>
				<b>{{__('order.payment_link')}}</b> 
				<a href="{{$payment_link}}">{{$payment_link}}</a>
			</p>
		@endif

	</body>
</html>