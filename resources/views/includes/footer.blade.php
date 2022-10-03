<!-- begin::Footer -->
<footer class="m-grid__item m-footer ">

	<div class="m-container m-container--fluid m-container--xxl m-container--full-height m-page__container">

		<div class="m-footer__wrapper">

			<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">

				<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">

					<span class="m-footer__copyright">

						{{date('Y')}} &copy; {{__('nav.system_title')}} by
						
						<a href="{{__('nav.agency_url')}}" target="_new" class="m-link">
							{{__('nav.agency')}}
						</a>

					</span>

				</div>

				<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">

					<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">

						@if(!count(Auth::user()->user_shipping_companies)>0) 
						
						<li class="m-nav__item">

							<a href="{{ url('shipping_companies/create') }}" class="m-nav__link">

								<span class="m-nav__link-text m--font-primary">

									{{__('shipping_company.apply_as_shipping_company')}}

								</span>

							</a>

						</li>
						
						@endif

					
						<li class="m-nav__item">

							<a href="#" class="m-nav__link">

								<span class="m-nav__link-text">

									{{__('messages.all_rights_reserved')}}

								</span>

							</a>

						</li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</footer>
<!-- end::Footer -->