<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">

	<ul class="m-menu__nav  m-menu__nav--submenu-arrow">

		@foreach($MyNavBar->roots() as $item)
			<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true" >
				{{--<i class="m-nav__link-icon la la-home"></i>--}}

				<a href="{!! $item->url() !!}" class="m-menu__link">

					<i class="m-menu__link-icon la  flaticon-network"></i>
					<span class="m-menu__link-text">{!! $item->title !!}</span>
				</a>
			</li>



		@endforeach
	</ul>
</div>