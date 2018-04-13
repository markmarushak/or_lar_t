<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<!--[html-partial:include:{"file":"partials\/_header-base.html"}]/-->
@include('layouts.admin.partials._header-base')
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
		@include('layouts.admin.partials._subheader-default')
		<!--[html-partial:include:{"file":"partials\/_subheader-default.html"}]/-->
            <div class="m-content"></div>
        </div>
    </div>
</div>
<!-- end::Body -->
@include('layouts.admin.partials._footer-default')

<!--[html-partial:include:{"file":"partials\/_footer-default.html"}]/-->
</div>
<!-- end:: Page -->
@include('layouts.admin.partials._layout-quick-sidebar')
@include('layouts.admin.partials._layout-scroll-top')
@include('layouts.admin.partials._layout-tooltips')
<!--[html-partial:include:{"file":"partials\/_layout-quick-sidebar.html"}]/-->
<!--[html-partial:include:{"file":"partials\/_layout-scroll-top.html"}]/-->
<!--[html-partial:include:{"file":"partials\/_layout-tooltips.html"}]/-->
