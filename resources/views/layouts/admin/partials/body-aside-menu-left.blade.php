<script type="text/javascript">
    $(document).ready(function () {
        let url = window.location.href;
        if (url.indexOf('data-filters-rules') !== -1) {
            $("#hide_1").addClass("m-menu__item--open");
            $("#hide_2").addClass("m-menu__item--open");
        }
        else if(url.indexOf('email-bulk-split') !== -1){
            $("#hide_1").addClass("m-menu__item--open");
        }
    });
</script>
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

            <?php
            //if(!empty($menu) && $menu == 'affiliate-service'): ?>


            {{--<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Components
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>--}}

            <li class="m-menu__item  m-menu__item--submenu" id="hide_1" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle" id="mini_prof_1">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">
										Compaigns
									</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item m-menu__item--submenu" id="hide_2" aria-haspopup="true" m-menu-submenu-toggles="hover">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle" id="mini_prof_2">
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
                                    <li class="m-menu__item m-menu__item--submenu--active" aria-haspopup="true" m-menu-submenu-toggles="hover" id="menu_id">
                                        <a href="/affiliate-service/email-bulk-split/data-filters-rules" id="mini_prof_3" class="m-menu__link m-menu__toggle">
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
                        <li class="m-menu__item m-menu__item--submenu" id="hide_2" aria-haspopup="true" m-menu-submenu-toggles="hover">
                            <a href="/affiliate-service/compaigns" class="m-menu__link m-menu__toggle" id="mini_prof_2">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    compaigns
								</span>
                            </a>
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

                <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="{{route('reporting')}}" class="m-menu__link ">
                        <i class="m-menu__link-icon fa fa-bar-chart-o"></i>
                        <span class="m-menu__link-text">
                                                Reporting
                                            </span>

                    </a>
                </li>
            <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route('programs')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon fa fa-tasks"></i>
                    <span class="m-menu__link-text">
                                                Programs
                                            </span>

                </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route('conversions')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon fa fa-exchange"></i>
                    <span class="m-menu__link-text">
                                                Conversions
                                            </span>

                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route('payouts')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon fa fa-cc-mastercard"></i>
                    <span class="m-menu__link-text">
                                                Payouts
                                            </span>

                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" id="hide_1" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle" id="mini_prof_1">
                    <i class="m-menu__link-icon fa fa-wrench"></i>
                    <span class="m-menu__link-text">
                        Settings
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item m-menu__item--submenu" id="hide_2" aria-haspopup="true" m-menu-submenu-toggles="hover">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle" id="mini_prof_2">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
													Profile
								</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item m-menu__item--submenu--active" aria-haspopup="true" m-menu-submenu-toggles="hover" id="menu_id">
                                        <a href="/affiliate-service/email-bulk-split/data-filters-rules" id="mini_prof_3" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
													Info
								            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item m-menu__item--submenu" id="hide_2" aria-haspopup="true" m-menu-submenu-toggles="hover">
                            <a href="/settings-service/api" class="m-menu__link m-menu__toggle" id="mini_prof_2">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    API
								</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{route('support')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon fa fa-support"></i>
                    <span class="m-menu__link-text">
                                                Support
                                            </span>

                </a>
            </li>
			<?php //endif; ?>


		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
