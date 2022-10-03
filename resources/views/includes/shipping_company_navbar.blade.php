<div class="m-header__bottom">
	<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
		<div class="m-stack m-stack--ver m-stack--desktop">

			<!-- begin::Horizontal Menu -->
			<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
				
				<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >

					<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">

						<li class="m-menu__item @if (strstr(URL::current(), 'home')) m-menu__item--active @endif" aria-haspopup="true">

							<a  href="{{ route('home', ['delegation'=>'all', 'shipping_company_id'=>$shipping_company_id]) }}" class="m-menu__link ">

								<span class="m-menu__item-here"></span>

								<span class="m-menu__link-text">
									{{ __('titles.shipping_company') }} 

								</span>

							</a>

						</li>
								
						<li class="m-menu__item @if (Route::current()->uri == 'drivers') m-menu__item--active @endif"  data-menu-submenu-toggle="click" aria-haspopup="true">

							<a  href="{{ route('index_drivers', ['shipping_company_id'=>$shipping_company_id]) }}" class="m-menu__link ">

								<span class="m-menu__item-here"></span>
								
								<span class="m-menu__link-text">
									{{ __('titles.drivers') }}
								</span>

							</a>
							
						</li>
						
					</ul>

				</div>
			</div>
			<!-- end::Horizontal Menu -->	
	
		</div>
	</div>
</div>