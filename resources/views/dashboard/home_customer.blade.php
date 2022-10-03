@extends('layouts.app')

@section('content')
<div class="">&nbsp;</div>

<div class="m-portlet mt-5">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					{{__('dashboard.last_30_days')}}
				</h3>
			</div>
		</div>
	</div>	
	<div class="m-portlet__body  m-portlet__body--no-padding">
				
		<div class="row m-row--no-padding m-row--col-separator-xl">
			<div class="col-md-12 col-lg-6 col-xl-4">
				<div class="m-widget24">					 
				    <div class="m-widget24__item">
				        <h4 class="m-widget24__title">
				            {{__('dashboard.orders_amount')}}
				        </h4><br>
				        <span class="m-widget24__desc">
				            {{__('dashboard.paid_orders')}}
				        </span>
				        <span class="m-widget24__stats m--font-brand">
				            ${{$period->totals->total_amount}}
				        </span>		
				    </div>				      
				</div>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-4">
				<div class="m-widget24">
					 <div class="m-widget24__item">
				        <h4 class="m-widget24__title">
				            {{__('dashboard.orders')}}
				        </h4><br>
				        <span class="m-widget24__desc">
				            {{__('dashboard.total_orders')}}
				        </span>
				        <span class="m-widget24__stats m--font-info">
				            {{$period->totals->total_orders}}
				        </span>		
				    </div>		
				</div>
			</div>
			<!--
			<div class="col-md-12 col-lg-6 col-xl-3">
				<div class="m-widget24">
					<div class="m-widget24__item">
				        <h4 class="m-widget24__title">
				            {{__('dashboard.kilometers_done')}}
				        </h4><br>
				        <span class="m-widget24__desc">
				            {{__('dashboard.paid_orders')}}
				        </span>
				        <span class="m-widget24__stats m--font-danger">
				            {{$period->totals->total_distance}}km
				        </span>		
				    </div>		
				</div>
			</div>
		    -->
			<div class="col-md-12 col-lg-6 col-xl-4">
				<!--begin::New Users-->
				<div class="m-widget24">
					 <div class="m-widget24__item">
				        <h4 class="m-widget24__title">
				            {{__('dashboard.transported_tons')}}
				        </h4><br>
				        <span class="m-widget24__desc">
				            {{__('dashboard.paid_orders')}}
				        </span>
				        <span class="m-widget24__stats m--font-success">
				            {{round($period->totals->total_weight/1000,2)}}ton
				        </span>		
				        <div class="m--space-40"></div>
				    </div>		
				</div>
				<!--end::New Users--> 
			</div>
		</div>
	</div>
</div>

<div class="row mt-5">
  
  <div class="col-xl-12 m-auto">
    <!--begin:: Widgets/Authors Profit-->
	<div class="m-portlet ">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						{{__('dashboard.last_orders')}}
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body ">			
			<div class="m-widget4 ">
				@foreach($period->orders as $order)
				<div class="m-widget4__item">
					<div class="m-widget4__info">
						<span class="m-widget4__title">
						{{$order->description}} - {{$order->weight}}kg
						</span><br> 
						<span class="m-widget4__sub">
						@if($order->shipping_company) {{$order->shipping_company->company_name}} @endif
						</span>		 
					</div>
					<span class="m-widget4__ext">
						<span class="m-widget4__number m--font-brand">${{number_format($order->amount, 2, ",", ".")}}</span>
					</span>	
				</div>	
				@endforeach 
			</div>			 
		</div>
	</div>
	<!--end:: Widgets/Authors Profit-->  
  </div>
  
</div>
	
@endsection
