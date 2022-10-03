@if(count(Auth::user()->unreadNotifications)>0)
	<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
		<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
			<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
			<span class="m-nav__link-icon">
				<span class="m-nav__link-icon-wrapper">
					<i class="flaticon-music-2"></i>
				</span>
			</span>
		</a>
		<div class="m-dropdown__wrapper">
			<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
			<div class="m-dropdown__inner">
				<div class="m-dropdown__header m--align-center" style="background: #7e55dd;">
					<span class="m-dropdown__header-title">
						{{count(Auth::user()->unreadNotifications)}} {{trans_choice('notifications.new_notifications',count(Auth::user()->unreadNotifications))}}
					</span>
					<span class="m-dropdown__header-subtitle">
						{{trans_choice('notifications.notifications',count(Auth::user()->unreadNotifications))}}
					</span>
				</div>
				<div class="m-dropdown__body">
					<div class="m-dropdown__content">
						
						<div class="tab-content">
							
							<div class="tab-pane active" id="topbar_notifications_events" role="tabpanel">
								<div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="250" data-mobile-max-height="200">
									<div class="m-list-timeline m-list-timeline--skin-light">
										<div class="m-list-timeline__items">
											@foreach (Auth::user()->unreadNotifications as $notification)
												<div id="{{$notification->id}}" class="m-list-timeline__item">
													<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
													<a href="javascript:void(0);" onclick="markAsRead('{{$notification->id}}');" class="m-list-timeline__text">
														<span>{{$notification->data['message']}}</span>
													</a>
				
													<span class="m-list-timeline__time pr-3">
														<span  title="{{\Carbon\Carbon::parse($notification->created_at)->format('d/m/Y H:i:s')}}">
															{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
														</span>
													</span>
												</div>
											@endforeach

										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</li>

	<script>
		function markAsRead(id){
		    $.post( "{{url('notifications/mark_as_read')}}/"+id, { 
		      _token: '{{ Session::token() }}' 
		    })
		    .done(function( data ) {
		      //Hides the notification
		      $('#'+id).hide(100);
		      //Redirects if return is different from true/false boolean;
		      if(data != '1' && data != '0'){
		      	window.location = data;
		      }
		    });
		}
	</script>
@endif