<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500" m-menu->
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			{{--<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{ URL::route('home') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">

												Dashboard


											</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span>-
										</span>
									</span>
				</a>
			</li>--}}

            <?php if(!empty($menu) && $menu == 'affiliate-service'): ?>


            {{--<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Components
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>--}}

            <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">
										Compaigns
									</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggles="hover">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													Email BulkSplit
								</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggles="hover" id="menu_id">
                                        <a href="/affiliate-service/email-bulk-split/data-filters-rules" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Data Filters & Rules
								            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                         </li>
                    </ul>
                </div>
                </li>
                <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="{{route('affiliates-partners')}}" class="m-menu__link ">
                        <i class="m-menu__link-icon flat icon-users"></i>
                        <span class="m-menu__link-text">
                                            Affiliates/Partners
                                        </span>

                    </a>
                </li>
			<?php endif; ?>


		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>