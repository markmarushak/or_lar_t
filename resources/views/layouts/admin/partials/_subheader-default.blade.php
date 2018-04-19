<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title ">
				Dashboard
			</h3>
			{!! Breadcrumbs::render('compaigns') !!}
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				<li class="m-nav__item m-nav__item--home">
					<a href="#" class="m-nav__link m-nav__link--icon">
						<i class="m-nav__link-icon la la-home"></i>
					</a>
				</li>
				<li class="m-nav__separator">/</li>
				<li class="m-nav__item">
					<a href="#" class="m-nav__link">
						<span class="m-nav__link-text">Buttons</span>
					</a>
				</li>
				<li class="m-nav__separator">/</li>
				<li class="m-nav__item">
					<a href="#" class="m-nav__link">
						<span class="m-nav__link-text">Button Group</span>
					</a>
				</li>
			</ul>
		</div>


		<div>
			<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
				<span class="m-subheader__daterange-label">
					<span class="m-subheader__daterange-title">Today:</span>
					<span class="m-subheader__daterange-date m--font-brand">Apr 14</span>
				</span>
				<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
					<i class="la la-angle-down"></i>
				</a>
			</span>
		</div>
	</div>
</div>