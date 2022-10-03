<div class="m-header__bottom">
	<div class="m-container m-container--fluid m-container--xxl m-container--full-height m-page__container">
		<div class="m-stack m-stack--ver m-stack--desktop">
			<!-- begin::Horizontal Menu -->
			<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
				<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
					<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
						@foreach(\App\Navbar::fetch(@$navbar, @$shipping_company->id) as $item)
							<li class="m-menu__item @if ( strstr(Request::path(),$item->path) ) m-menu__item--active @endif"  data-menu-submenu-toggle="click" aria-haspopup="true">
								<a  href="{{ url($item->path) }}" class="m-menu__link ">
									<span class="m-menu__item-here"></span>
									<span class="m-menu__link-text">
										@if($item->icon) <i class="{{ __($item->icon) }}"></i> @endif
										{{ __($item->title) }}
									</span>
								</a>
							</li>
						@endforeach						
					</ul>
				</div>
			</div>
			<!-- end::Horizontal Menu -->	
		</div>
	</div>
</div>

