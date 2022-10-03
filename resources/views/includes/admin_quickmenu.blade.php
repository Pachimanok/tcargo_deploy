<div class="m-stack__item m-stack__item--middle m-brand__tools">
	<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" data-dropdown-toggle="click" aria-expanded="true">
		<a href="#" class="dropdown-toggle m-dropdown__toggle btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
			<span>
				{{__('user.admin')}}
			</span>
		</a>
		<div class="m-dropdown__wrapper">
			<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
			<div class="m-dropdown__inner">
				<div class="m-dropdown__body">
					<div class="m-dropdown__content">
						<ul class="m-nav">
							<li class="m-nav__item">
								<a href="{{url('dashboard/admin')}}" class="m-nav__link">
									<i class="m-nav__link-icon fa fa-star"></i>
									<span class="m-nav__link-text">
										{{__('nav.admin_dashboard')}}
									</span>
								</a>
							</li>

							<li class="m-nav__separator m-nav__separator--fit"></li>
							<li class="m-nav__item">
								<a href="{{url('orders/index')}}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-open-box"></i>
									<span class="m-nav__link-text">
										{{__('order.index')}}
									</span>
								</a>
							</li>	
							<li class="m-nav__item">
								<a href="{{url('transits/index')}}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-map-location"></i>
									<span class="m-nav__link-text">
										{{__('transit.index')}}
									</span>
								</a>
							</li>													
							<li class="m-nav__item">
								<a href="{{url('shipping_companies')}}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-truck"></i>
									<span class="m-nav__link-text">
										{{__('shipping_company.index')}}
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{url('users')}}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-users"></i>
									<span class="m-nav__link-text">
										{{__('user.index')}}
									</span>
								</a>
							</li>

							<li class="m-nav__separator m-nav__separator--fit"></li>
							<li class="m-nav__item">
								<a href="{{url('load_classes')}}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-transport"></i>
									<span class="m-nav__link-text">
										{{__('load_class.index_short')}}
									</span>
								</a>
							</li>

							<li class="m-nav__item">
								<a href="{{url('master_points')}}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-route"></i>
									<span class="m-nav__link-text">
										{{__('master_point.index')}}
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>