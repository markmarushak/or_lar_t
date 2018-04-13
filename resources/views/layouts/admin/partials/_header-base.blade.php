<!-- begin::Header -->
<header class="m-grid__item		m-header "  data-minimize="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
	<div class="m-header__top">
		<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
			<div class="m-stack m-stack--ver m-stack--desktop">
			@include('layouts.admin.partials._header-brand')
			@include('layouts.admin.partials._header-topbar')
			<!--[html-partial:include:{"file":"partials\/_header-brand.html"}]/-->
				<!--[html-partial:include:{"file":"partials\/_header-topbar.html"}]/-->
			</div>
		</div>
	</div>
	<div class="m-header__bottom">
		<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
			<div class="m-stack m-stack--ver m-stack--desktop">
			@include('layouts.admin.partials._header-hor-menu')
			@include('layouts.admin.partials._header-search')
				<!--[html-partial:include:{"file":"partials\/_header-hor-menu.html"}]/-->
				<!--[html-partial:include:{"file":"partials\/_header-search.html"}]/-->
			</div>
		</div>
	</div>
</header>
<!-- end::Header -->
