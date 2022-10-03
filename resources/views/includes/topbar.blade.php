
	<div class="m-header__top">

		<div class="m-container m-container--fluid m-container--xxl m-container--full-height m-page__container">

			<div class="m-stack m-stack--ver m-stack--desktop">

				<!-- begin::Brand -->
				<div class="m-stack__item m-brand">
					<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
						<div class="m-stack__item m-stack__item--middle m-brand__logo">
							<a href="{{route('dashboard')}}" class="m-brand__logo-wrapper">
								<img alt="" style="max-height: 54px;" src="{{ asset('img/logo.png') }}"/>
							</a>
						</div>
						@if(Auth::user()->type=='admin')
							@include('includes.admin_quickmenu')
						@endif

						<div class="m-stack__item m-stack__item--middle m-brand__tools">
							
							<!-- begin::Responsive Header Menu Toggler-->
							<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
								<span></span>
							</a>
							<!-- end::Responsive Header Menu Toggler-->

							<!-- begin::Topbar Toggler-->
							<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
								<i class="flaticon-more"></i>
							</a>
							<!--end::Topbar Toggler-->
						</div>

					</div>
				</div>
				<!-- end::Brand -->

				<!-- begin::Topbar -->
				<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

					<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">

						<div class="m-stack__item m-topbar__nav-wrapper">

							<ul class="m-topbar__nav m-nav m-nav--inline">
								
								@include('includes.notifications')

								<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">

									<a href="#" class="m-nav__link m-dropdown__toggle">
										<span class="m-topbar__welcome">
											{{ __('messages.hello') }},&nbsp;
										</span>
										<span class="m-topbar__username">
											{{ Auth::user()->name }}&nbsp;&nbsp;
										</span>
										<span class="m-topbar__userpic">
											<img src="{{ asset('img/user.png') }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
										</span>
									</a>

									<div class="m-dropdown__wrapper">

										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>

										<div class="m-dropdown__inner">
											<div class="m-dropdown__header m--align-center topbar-user-bg" style="background: #9a0000;">
												<div class="m-card-user m-card-user--skin-dark">
													<div class="m-card-user__pic">
														<img src="{{ asset('img/user.png') }}" class="m--img-rounded m--marginless" alt=""/>
													</div>
													<div class="m-card-user__details">
														<span class="m-card-user__name m--font-weight-500">
															{{ Auth::user()->name }}
														</span>
														<a href="{{ route('dashboard') }}" class="m-card-user__email m--font-weight-300 m-link">
															{{ Auth::user()->email }}
														</a>
													</div>
												</div>
											</div>

											<div class="m-dropdown__body">

												<div class="m-dropdown__content">

													<ul class="m-nav m-nav--skin-light">

														<li class="m-nav__item">
															<a href="{{ route('dashboard') }}" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-imac"></i>
																<span class="m-nav__link-text">
																	{{ __('nav.my_dashboard') }}
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="{{ url('orders/my') }}" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-open-box"></i>
																<span class="m-nav__link-text">
																	{{ __('order.my_orders') }}
																</span>
															</a>
														</li>						

														@if(count(Auth::user()->user_shipping_companies)>0) 

															<li class="m-nav__separator m-nav__separator--fit"></li> 		
																					
															@foreach(Auth::user()->user_shipping_companies as $user_shipping_company) 

																<li class="m-nav__item">
																	<a href="{{ route('dashboard/shipping_company') }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-truck"></i>
																		<span class="m-nav__link-text">
																			{{$user_shipping_company->company_name}}
																		</span>
																	</a>
																</li>
																<?/*
																<li class="m-nav__item">
																	<a href="{{ url('orders/shipping_company/'.$user_shipping_company->id) }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-open-box"></i>
																		<span class="m-nav__link-text">
																			{{__('order.index')}}
																		</span>
																	</a>
																</li>

																<li class="m-nav__item">
																	<a href="{{ url('orders/all/'.$user_shipping_company->id) }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-truck"></i>
																		<span class="m-nav__link-text">
																			{{__('order.opportunities')}}
																		</span>
																	</a>
																</li>
																*/?>

															@endforeach

														@endif
														<?php $is_driver = App\Driver::where('email', Auth::user()->email)->first();?>	
														
															@if($is_driver)
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="{{ url('drivers/transits') }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-car"></i>
																		<span class="m-nav__link-text">
																			{{ __('driver.driver_tasks') }}
																		</span>
																	</a>
																</li>
															@endif
														
														<li class="m-nav__separator m-nav__separator--fit"></li>
														<li class="m-nav__item">
															<a href="{{ route('my_profile') }}" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-cogwheel"></i>
																<span class="m-nav__link-text">
																	{{ __('user.my_profile') }}
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-logout"></i>
																<span class="m-nav__link-text">
																	{{ __('auth.logout') }}
																</span>
															</a>
														</li>

													</ul>

												</div>

											</div>

										</div>

									</div>

								</li>
																
							</ul>
						</div>
					</div>
				</div>
				<!-- end::Topbar -->
			</div>
		</div>
	</div>