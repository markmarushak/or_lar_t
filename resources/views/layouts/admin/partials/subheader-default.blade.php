<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
		<!-- Get Name of the current Route -->
		<?php $nameRoute = \Request::route()->getName(); ?>

		<!--Must be dynamic changed -->
			@if('data-filters-rules' == $nameRoute)
				{!! Breadcrumbs::render($nameRoute) !!}
			@elseif('edit-affiliate-partner' == $nameRoute)
				{!! Breadcrumbs::render($nameRoute) !!}
			@elseif('single-output-overview' == $nameRoute)
				{!! Breadcrumbs::render($nameRoute, $nameEntry) !!}
			@else
				{!! Breadcrumbs::render($nameRoute) !!}
			@endif
		</div>
		{{--<div>--}}
			{{--<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">--}}
				{{--<span class="m-subheader__daterange-label">--}}
					{{--<span class="m-subheader__daterange-title">Today:</span>--}}
					{{--<span class="m-subheader__daterange-date m--font-brand">Apr 14</span>--}}
				{{--</span>--}}
				{{--<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">--}}
					{{--<i class="la la-angle-down"></i>--}}
				{{--</a>--}}
			{{--</span>--}}
		{{--</div>--}}
	</div>
</div>