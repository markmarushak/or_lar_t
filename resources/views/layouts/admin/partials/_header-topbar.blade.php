<!-- begin::Topbar -->
<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
	<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
		<div class="m-stack__item m-topbar__nav-wrapper">
			<ul class="m-topbar__nav m-nav m-nav--inline">
			@include('layouts.admin.partials._topbar-user-profile')
			@include('layouts.admin.partials._topbar-notifications')
			@include('layouts.admin.partials._topbar-quick-actions')

			<!--[html-partial:include:{"file":"partials\/_topbar-user-profile.html"}]/-->
				<!--[html-partial:include:{"file":"partials\/_topbar-notifications.html"}]/-->
				<!--[html-partial:include:{"file":"partials\/_topbar-quick-actions.html"}]/-->
				<li id="m_quick_sidebar_toggle" class="m-nav__item">
					<a href="#" class="m-nav__link m-dropdown__toggle">
						<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
							<span class="m-nav__link-icon-wrapper">
								<i class="flaticon-grid-menu"></i>
							</span>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- end::Topbar -->
