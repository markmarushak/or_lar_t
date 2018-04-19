@extends('layouts.admin.app')

@section('content')

    <!--Begin::Section-->
    <div class="row">


        {{--<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>--}}
        <div class="col-xl-4">
            <!--begin:: Widgets/Top Products-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Trends
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                    All
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 37px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Support
																				</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Widget5-->
                    <div class="m-widget4">
                        <div class="m-widget4__chart m-portlet-fit--sides m--margin-top-10 m--margin-top-20" style="height:260px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="m_chart_trends_stats" width="309" height="260" class="chartjs-render-monitor" style="display: block; width: 309px; height: 260px;"></canvas>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo3.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														Phyton
													</span>
                                <br>
                                <span class="m-widget4__sub">
														A Programming Language
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-danger">
														+$17
													</span>
												</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo1.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														FlyThemes
													</span>
                                <br>
                                <span class="m-widget4__sub">
														A Let's Fly Fast Again Language
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-danger">
														+$300
													</span>
												</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo2.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														AirApp
													</span>
                                <br>
                                <span class="m-widget4__sub">
														Awesome App For Project Management
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-danger">
														+$6700
													</span>
												</span>
                        </div>
                    </div>
                    <!--end::Widget 5-->
                </div>
            </div>
            <!--end:: Widgets/Top Products-->
        </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Activity-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text m--font-light">
                                Activity
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                                    <i class="fa fa-genderless m--font-light"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 17px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Quick Actions
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Support
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                            Cancel
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget17">
                        <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                            <div class="m-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="m_chart_activities" width="309" height="208" class="chartjs-render-monitor" style="display: block; width: 309px; height: 208px;"></canvas>
                            </div>
                        </div>
                        <div class="m-widget17__stats">
                            <div class="m-widget17__items m-widget17__items-col1">
                                <div class="m-widget17__item">
														<span class="m-widget17__icon">
															<i class="flaticon-truck m--font-brand"></i>
														</span>
                                    <span class="m-widget17__subtitle">
															Delivered
														</span>
                                    <span class="m-widget17__desc">
															15 New Paskages
														</span>
                                </div>
                                <div class="m-widget17__item">
														<span class="m-widget17__icon">
															<i class="flaticon-paper-plane m--font-info"></i>
														</span>
                                    <span class="m-widget17__subtitle">
															Reporeted
														</span>
                                    <span class="m-widget17__desc">
															72 Support Cases
														</span>
                                </div>
                            </div>
                            <div class="m-widget17__items m-widget17__items-col2">
                                <div class="m-widget17__item">
														<span class="m-widget17__icon">
															<i class="flaticon-pie-chart m--font-success"></i>
														</span>
                                    <span class="m-widget17__subtitle">
															Ordered
														</span>
                                    <span class="m-widget17__desc">
															72 New Items
														</span>
                                </div>
                                <div class="m-widget17__item">
														<span class="m-widget17__icon">
															<i class="flaticon-time m--font-danger"></i>
														</span>
                                    <span class="m-widget17__subtitle">
															Arrived
														</span>
                                    <span class="m-widget17__desc">
															34 Upgraded Boxes
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Activity-->
        </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                                Blog
                            </button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="assets/app/media/img//blog/blog1.jpg" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
                                    <img class="m-widget19__img" src="assets/app/media/img//users/user1.jpg" alt="">
                                </div>
                                <div class="m-widget19__info">
														<span class="m-widget19__username">
															Anna Krox
														</span>
                                    <br>
                                    <span class="m-widget19__time">
															UX/UI Designer, Google
														</span>
                                </div>
                                <div class="m-widget19__stats">
														<span class="m-widget19__number m--font-brand">
															18
														</span>
                                    <span class="m-widget19__comment">
															Comments
														</span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Blog-->
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="m-portlet">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-xl-4">
                    <!--begin:: Widgets/Stats2-1 -->
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Member Profit
                                    </h3>
                                    <span class="m-widget1__desc">
															Awerage Weekly Profit
														</span>
                                </div>
                                <div class="col m--align-right">
														<span class="m-widget1__number m--font-brand">
															+$17,800
														</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Orders
                                    </h3>
                                    <span class="m-widget1__desc">
															Weekly Customer Orders
														</span>
                                </div>
                                <div class="col m--align-right">
														<span class="m-widget1__number m--font-danger">
															+1,800
														</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">
                                        Issue Reports
                                    </h3>
                                    <span class="m-widget1__desc">
															System bugs and issues
														</span>
                                </div>
                                <div class="col m--align-right">
														<span class="m-widget1__number m--font-success">
															-27,49%
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Stats2-1 -->
                </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Daily Sales-->
                    <div class="m-widget14">
                        <div class="m-widget14__header m--margin-bottom-30">
                            <h3 class="m-widget14__title">
                                Daily Sales
                            </h3>
                            <span class="m-widget14__desc">
													Check out each collumn for more details
												</span>
                        </div>
                        <div class="m-widget14__chart" style="height:120px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="m_chart_daily_sales" width="266" height="120" class="chartjs-render-monitor" style="display: block; width: 266px; height: 120px;"></canvas>
                        </div>
                    </div>
                    <!--end:: Widgets/Daily Sales-->
                </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Profit Share-->
                    <div class="m-widget14">
                        <div class="m-widget14__header">
                            <h3 class="m-widget14__title">
                                Profit Share
                            </h3>
                            <span class="m-widget14__desc">
													Profit Share between customers
												</span>
                        </div>
                        <div class="row  align-items-center">
                            <div class="col">
                                <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                    <div class="m-widget14__stat">
                                        45
                                    </div>
                                    <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;"><g class="ct-series custom"><path d="M100.839,99.523A45.852,45.852,0,0,0,59.352,34.148" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#716aca&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="92.19099426269531px 92.19099426269531px" stroke-dashoffset="-92.19099426269531px" stroke="#716aca"><animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-92.19099426269531px" to="0px" fill="freeze" stroke="#716aca" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M24.022,109.227A45.852,45.852,0,0,0,100.907,99.378" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#00c5dc&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="92.35074615478516px 92.35074615478516px" stroke-dashoffset="-92.35074615478516px" stroke="#00c5dc"><animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-92.35074615478516px" to="0px" fill="freeze" stroke="#00c5dc" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M59.352,34.148A45.852,45.852,0,0,0,24.125,109.35" class="ct-slice-donut" ct:value="36" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#ffb822&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="103.8759536743164px 103.8759536743164px" stroke-dashoffset="-103.8759536743164px" stroke="#ffb822"><animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-103.8759536743164px" to="0px" fill="freeze" stroke="#ffb822" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g></svg></div>
                            </div>
                            <div class="col">
                                <div class="m-widget14__legends">
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                        <span class="m-widget14__legend-text">
																37% Sport Tickets
															</span>
                                    </div>
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                        <span class="m-widget14__legend-text">
																47% Business Events
															</span>
                                    </div>
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                        <span class="m-widget14__legend-text">
																19% Others
															</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Profit Share-->
                </div>
            </div>
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-4">
            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit-">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text m--font-light">
                                Personal Income
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill m-btn btn-outline-light m-btn--hover-light">
                                    2017
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Orders
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Pending
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Delivered
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					Canceled
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Approved
																				</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget27 m-portlet-fit--sides">
                        <div class="m-widget27__pic">
                            <img src="assets/app/media/img//bg/bg-4.jpg" alt="">
                            <h3 class="m-widget27__title m--font-light">
													<span>
														<span>
															$
														</span>
														256,100
													</span>
                            </h3>
                            <div class="m-widget27__btn">
                                <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">
                                    Inclusive All Earnings
                                </button>
                            </div>
                        </div>
                        <div class="m-widget27__container">
                            <!-- begin::Nav pills -->
                            <ul class="m-widget27__nav-items nav nav-pills nav-fill" role="tablist">
                                <li class="m-widget27__nav-item nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#m_personal_income_quater_1">
                                        Quater 1
                                    </a>
                                </li>
                                <li class="m-widget27__nav-item nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#m_personal_income_quater_2">
                                        Quater 2
                                    </a>
                                </li>
                                <li class="m-widget27__nav-item nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#m_personal_income_quater_3">
                                        Quater 3
                                    </a>
                                </li>
                                <li class="m-widget27__nav-item nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#m_personal_income_quater_4">
                                        Quater 4
                                    </a>
                                </li>
                            </ul>
                            <!-- end::Nav pills -->
                            <!-- begin::Tab Content -->
                            <div class="m-widget27__tab tab-content">
                                <div id="m_personal_income_quater_1" class="tab-pane active">
                                    <div class="m-widget14 m-widget14--no-padding">
                                        <div class="row  align-items-center">
                                            <div class="col">
                                                <div id="m_chart_personal_income_quater_1" class="m-widget14__chart" style="height: 160px">
                                                    <div class="m-widget14__stat">
                                                        45
                                                    </div>
                                                    <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;"><g class="ct-series custom"><path d="M100.646,99.479A45.75,45.75,0,0,0,59.25,34.25" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#716aca&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="91.98627471923828px 91.98627471923828px" stroke-dashoffset="-91.98627471923828px" stroke="#716aca"><animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-91.98627471923828px" to="0px" fill="freeze" stroke="#716aca" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M23.999,109.162A45.75,45.75,0,0,0,100.714,99.335" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#00c5dc&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="92.14720153808594px 92.14720153808594px" stroke-dashoffset="-92.14720153808594px" stroke="#00c5dc"><animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-92.14720153808594px" to="0px" fill="freeze" stroke="#00c5dc" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M59.25,34.25A45.75,45.75,0,0,0,24.101,109.285" class="ct-slice-donut" ct:value="36" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#ffb822&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="103.64583587646484px 103.64583587646484px" stroke-dashoffset="-103.64583587646484px" stroke="#ffb822"><animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-103.64583587646484px" to="0px" fill="freeze" stroke="#ffb822" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g></svg></div>
                                            </div>
                                            <div class="col">
                                                <div class="m-widget14__legends">
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                                        <span class="m-widget14__legend-text">
																				37% Case
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                                        <span class="m-widget14__legend-text">
																				47% Events
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                                        <span class="m-widget14__legend-text">
																				19% Others
																			</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="m_personal_income_quater_2" class="tab-pane fade">
                                    <div class="m-widget14 m-widget14--no-padding">
                                        <div class="row  align-items-center">
                                            <div class="col">
                                                <div id="m_chart_personal_income_quater_2" class="m-widget14__chart" style="height: 160px">
                                                    <div class="m-widget14__stat">
                                                        70
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-widget14__legends">
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-focus"></span>
                                                        <span class="m-widget14__legend-text">
																				57% Orders
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-success"></span>
                                                        <span class="m-widget14__legend-text">
																				20% Cases
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-danger"></span>
                                                        <span class="m-widget14__legend-text">
																				19% Others
																			</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="m_personal_income_quater_3" class="tab-pane fade">
                                    <div class="m-widget14 m-widget14--no-padding">
                                        <div class="row  align-items-center">
                                            <div class="col">
                                                <div id="m_chart_personal_income_quater_3" class="m-widget14__chart" style="height: 160px">
                                                    <div class="m-widget14__stat">
                                                        67
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-widget14__legends">
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-info"></span>
                                                        <span class="m-widget14__legend-text">
																				47% Case
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-danger"></span>
                                                        <span class="m-widget14__legend-text">
																				55% Events
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                                        <span class="m-widget14__legend-text">
																				27% Others
																			</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="m_personal_income_quater_4" class="tab-pane fade">
                                    <div class="m-widget14 m-widget14--no-padding">
                                        <div class="row  align-items-center">
                                            <div class="col">
                                                <div id="m_chart_personal_income_quater_4" class="m-widget14__chart" style="height: 160px">
                                                    <div class="m-widget14__stat">
                                                        77
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-widget14__legends">
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                                        <span class="m-widget14__legend-text">
																				37% Case
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-primary"></span>
                                                        <span class="m-widget14__legend-text">
																				65% Events
																			</span>
                                                    </div>
                                                    <div class="m-widget14__legend">
                                                        <span class="m-widget14__legend-bullet m--bg-danger"></span>
                                                        <span class="m-widget14__legend-text">
																				33% Others
																			</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Blog-->
        </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text m--font-light">
                                Finance Stats
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill m-btn btn-outline-light m-btn--hover-light">
                                    2018
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Reports
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Support
																				</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget28">
                        <div class="m-widget28__pic m-widget28__pic--primary m-portlet-fit--sides"></div>
                        <div class="m-widget28__container">
                            <!-- begin::Nav pills -->
                            <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                <li class="m-widget28__nav-item nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#menu11">
															<span>
																<i class="fa flaticon-pie-chart"></i>
															</span>
                                        <span>
																GMI Taxes
															</span>
                                    </a>
                                </li>
                                <li class="m-widget28__nav-item nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu21">
															<span>
																<i class="fa flaticon-file-1"></i>
															</span>
                                        <span>
																IMT Invoice
															</span>
                                    </a>
                                </li>
                                <li class="m-widget28__nav-item nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu31">
															<span>
																<i class="fa flaticon-clipboard"></i>
															</span>
                                        <span>
																Main Notes
															</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- end::Nav pills -->
                            <!-- begin::Tab Content -->
                            <div class="m-widget28__tab tab-content">
                                <div id="menu11" class="m-widget28__tab-container tab-pane active">
                                    <div class="m-widget28__tab-items">
                                        <div class="m-widget28__tab-item">
																<span>
																	Company Name
																</span>
                                            <span>
																	SLT Back-end Solutions
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	INE Number
																</span>
                                            <span>
																	D330-1234562546
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	Total Charges
																</span>
                                            <span>
																	USD 1,250.000
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	Project Description
																</span>
                                            <span>
																	Creating Back-end Components
																</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu21" class="m-widget28__tab-container tab-pane fade">
                                    <div class="m-widget28__tab-items">
                                        <div class="m-widget28__tab-item">
																<span>
																	Project Description
																</span>
                                            <span>
																	Back-End Web Architecture
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	Total Charges
																</span>
                                            <span>
																	USD 2,170.000
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	INE Number
																</span>
                                            <span>
																	D110-1234562546
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	Company Name
																</span>
                                            <span>
																	SLT Back-end Solutions
																</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu31" class="m-widget28__tab-container tab-pane fade">
                                    <div class="m-widget28__tab-items">
                                        <div class="m-widget28__tab-item">
																<span>
																	Total Charges
																</span>
                                            <span>
																	USD 3,450.000
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	Project Description
																</span>
                                            <span>
																	Creating Back-end Components
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	Company Name
																</span>
                                            <span>
																	SLT Back-end Solutions
																</span>
                                        </div>
                                        <div class="m-widget28__tab-item">
																<span>
																	INE Number
																</span>
                                            <span>
																	D510-7431562548
																</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Blog-->
        </div>
        <div class="col-xl-4">
            <!--begin:: Packages-->
            <div class="m-portlet m--bg-warning m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text m--font-light">
                                Packages
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill m-btn btn-outline-light m-btn--hover-light">
                                    2018
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Reports
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Export
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					PDF
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Excel
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					CSV
																				</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Widget 29-->
                    <div class="m-widget29">
                        <div class="m-widget_content">
                            <h3 class="m-widget_content-title">
                                Monthly Income
                            </h3>
                            <div class="m-widget_content-items">
                                <div class="m-widget_content-item">
														<span>
															Total
														</span>
                                    <span class="m--font-accent">
															$680
														</span>
                                </div>
                                <div class="m-widget_content-item">
														<span>
															Change
														</span>
                                    <span class="m--font-brand">
															+15%
														</span>
                                </div>
                                <div class="m-widget_content-item">
														<span>
															Licenses
														</span>
                                    <span>
															29
														</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget_content">
                            <h3 class="m-widget_content-title">
                                Taxes info
                            </h3>
                            <div class="m-widget_content-items">
                                <div class="m-widget_content-item">
														<span>
															Total
														</span>
                                    <span class="m--font-accent">
															22.50
														</span>
                                </div>
                                <div class="m-widget_content-item">
														<span>
															Change
														</span>
                                    <span class="m--font-brand">
															+15%
														</span>
                                </div>
                                <div class="m-widget_content-item">
														<span>
															Count
														</span>
                                    <span>
															701
														</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget_content">
                            <h3 class="m-widget_content-title">
                                Partners Sale
                            </h3>
                            <div class="m-widget_content-items">
                                <div class="m-widget_content-item">
														<span>
															Total
														</span>
                                    <span class="m--font-accent">
															$680
														</span>
                                </div>
                                <div class="m-widget_content-item">
														<span>
															Change
														</span>
                                    <span class="m--font-brand">
															+15%
														</span>
                                </div>
                                <div class="m-widget_content-item">
														<span>
															Licenses
														</span>
                                    <span>
															29
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Widget 29-->
                </div>
            </div>
            <!--end:: Packages-->
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet " id="m_portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-map-location"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Calendar
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>
																Add Event
															</span>
														</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left" aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default">day</button><button type="button" class="fc-listWeek-button fc-button fc-state-default fc-corner-right">list</button></div></div><div class="fc-center"><h2>September 2017</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 641px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 106px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2017-08-27"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2017-08-28"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2017-08-29"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2017-08-30"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2017-08-31"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2017-09-01"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-09-02"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2017-08-27"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-08-27&quot;,&quot;type&quot;:&quot;day&quot;}">27</a></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2017-08-28"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-08-28&quot;,&quot;type&quot;:&quot;day&quot;}">28</a></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2017-08-29"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-08-29&quot;,&quot;type&quot;:&quot;day&quot;}">29</a></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2017-08-30"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-08-30&quot;,&quot;type&quot;:&quot;day&quot;}">30</a></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2017-08-31"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-08-31&quot;,&quot;type&quot;:&quot;day&quot;}">31</a></td><td class="fc-day-top fc-fri fc-past" data-date="2017-09-01"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-01&quot;,&quot;type&quot;:&quot;day&quot;}">1</a></td><td class="fc-day-top fc-sat fc-past" data-date="2017-09-02"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-02&quot;,&quot;type&quot;:&quot;day&quot;}">2</a></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--light m-fc-event--solid-warning fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--accent fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">1:30p</span> <span class="fc-title">Conference</span></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--light m-fc-event--solid-danger fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Dinner</span></div></a></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--danger m-fc-event--solid-focus fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 106px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-09-03"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2017-09-04"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2017-09-05"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2017-09-06"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2017-09-07"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2017-09-08"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-09-09"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2017-09-03"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-03&quot;,&quot;type&quot;:&quot;day&quot;}">3</a></td><td class="fc-day-top fc-mon fc-past" data-date="2017-09-04"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-04&quot;,&quot;type&quot;:&quot;day&quot;}">4</a></td><td class="fc-day-top fc-tue fc-past" data-date="2017-09-05"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-05&quot;,&quot;type&quot;:&quot;day&quot;}">5</a></td><td class="fc-day-top fc-wed fc-past" data-date="2017-09-06"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-06&quot;,&quot;type&quot;:&quot;day&quot;}">6</a></td><td class="fc-day-top fc-thu fc-past" data-date="2017-09-07"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-07&quot;,&quot;type&quot;:&quot;day&quot;}">7</a></td><td class="fc-day-top fc-fri fc-past" data-date="2017-09-08"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-08&quot;,&quot;type&quot;:&quot;day&quot;}">8</a></td><td class="fc-day-top fc-sat fc-past" data-date="2017-09-09"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-09&quot;,&quot;type&quot;:&quot;day&quot;}">9</a></td></tr></thead><tbody><tr><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--accent fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">1:30p</span> <span class="fc-title">Reporting</span></div></a></td><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--primary fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Company Trip</span></div></a></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--light m-fc-event--solid-primary fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">ICT Expo 2017 - Product Release</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 106px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-09-10"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2017-09-11"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2017-09-12"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2017-09-13"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2017-09-14"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2017-09-15"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-09-16"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2017-09-10"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-10&quot;,&quot;type&quot;:&quot;day&quot;}">10</a></td><td class="fc-day-top fc-mon fc-past" data-date="2017-09-11"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-11&quot;,&quot;type&quot;:&quot;day&quot;}">11</a></td><td class="fc-day-top fc-tue fc-past" data-date="2017-09-12"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-12&quot;,&quot;type&quot;:&quot;day&quot;}">12</a></td><td class="fc-day-top fc-wed fc-past" data-date="2017-09-13"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-13&quot;,&quot;type&quot;:&quot;day&quot;}">13</a></td><td class="fc-day-top fc-thu fc-past" data-date="2017-09-14"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-14&quot;,&quot;type&quot;:&quot;day&quot;}">14</a></td><td class="fc-day-top fc-fri fc-past" data-date="2017-09-15"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-15&quot;,&quot;type&quot;:&quot;day&quot;}">15</a></td><td class="fc-day-top fc-sat fc-past" data-date="2017-09-16"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-16&quot;,&quot;type&quot;:&quot;day&quot;}">16</a></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Dinner</span></div></a></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--danger fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 106px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-09-17"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2017-09-18"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2017-09-19"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2017-09-20"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2017-09-21"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2017-09-22"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-09-23"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2017-09-17"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-17&quot;,&quot;type&quot;:&quot;day&quot;}">17</a></td><td class="fc-day-top fc-mon fc-past" data-date="2017-09-18"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-18&quot;,&quot;type&quot;:&quot;day&quot;}">18</a></td><td class="fc-day-top fc-tue fc-past" data-date="2017-09-19"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-19&quot;,&quot;type&quot;:&quot;day&quot;}">19</a></td><td class="fc-day-top fc-wed fc-past" data-date="2017-09-20"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-20&quot;,&quot;type&quot;:&quot;day&quot;}">20</a></td><td class="fc-day-top fc-thu fc-past" data-date="2017-09-21"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-21&quot;,&quot;type&quot;:&quot;day&quot;}">21</a></td><td class="fc-day-top fc-fri fc-past" data-date="2017-09-22"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-22&quot;,&quot;type&quot;:&quot;day&quot;}">22</a></td><td class="fc-day-top fc-sat fc-past" data-date="2017-09-23"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-23&quot;,&quot;type&quot;:&quot;day&quot;}">23</a></td></tr></thead><tbody><tr><td rowspan="2"></td><td class="fc-event-container fc-limited"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--info m-fc-event--solid-accent fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Lunch</span></div></a></td><td class="fc-more-cell" rowspan="1"><div><a class="fc-more">+2 more</a></div></td><td rowspan="2"></td><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--accent fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">1p</span> <span class="fc-title">Conference</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Repeating Event</span></div></a></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 106px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-09-24"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2017-09-25"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2017-09-26"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2017-09-27"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2017-09-28"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2017-09-29"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-09-30"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2017-09-24"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-24&quot;,&quot;type&quot;:&quot;day&quot;}">24</a></td><td class="fc-day-top fc-mon fc-past" data-date="2017-09-25"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-25&quot;,&quot;type&quot;:&quot;day&quot;}">25</a></td><td class="fc-day-top fc-tue fc-past" data-date="2017-09-26"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-26&quot;,&quot;type&quot;:&quot;day&quot;}">26</a></td><td class="fc-day-top fc-wed fc-past" data-date="2017-09-27"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-27&quot;,&quot;type&quot;:&quot;day&quot;}">27</a></td><td class="fc-day-top fc-thu fc-past" data-date="2017-09-28"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-28&quot;,&quot;type&quot;:&quot;day&quot;}">28</a></td><td class="fc-day-top fc-fri fc-past" data-date="2017-09-29"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-29&quot;,&quot;type&quot;:&quot;day&quot;}">29</a></td><td class="fc-day-top fc-sat fc-past" data-date="2017-09-30"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-09-30&quot;,&quot;type&quot;:&quot;day&quot;}">30</a></td></tr></thead><tbody><tr><td class="fc-event-container fc-limited"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--primary fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Birthday Party</span></div></a></td><td class="fc-more-cell" rowspan="1"><div><a class="fc-more">+5 more</a></div></td><td rowspan="5"></td><td class="fc-event-container" rowspan="5"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--solid-info m-fc-event--light fc-draggable" href="http://google.com/" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td rowspan="5"></td><td rowspan="5"></td><td rowspan="5"></td><td rowspan="5"></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--danger fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Company Event</span></div></a></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--solid-focus m-fc-event--light fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Dinner</span></div></a></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--light m-fc-event--solid-focus fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Happy Hour</span></div></a></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end m-fc-event--warning fc-draggable" data-original-title="" title=""><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Meeting</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 111px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2017-10-01"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2017-10-02"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2017-10-03"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2017-10-04"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2017-10-05"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2017-10-06"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-past" data-date="2017-10-07"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2017-10-01"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-01&quot;,&quot;type&quot;:&quot;day&quot;}">1</a></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2017-10-02"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-02&quot;,&quot;type&quot;:&quot;day&quot;}">2</a></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2017-10-03"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-03&quot;,&quot;type&quot;:&quot;day&quot;}">3</a></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2017-10-04"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-04&quot;,&quot;type&quot;:&quot;day&quot;}">4</a></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2017-10-05"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-05&quot;,&quot;type&quot;:&quot;day&quot;}">5</a></td><td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2017-10-06"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-06&quot;,&quot;type&quot;:&quot;day&quot;}">6</a></td><td class="fc-day-top fc-sat fc-other-month fc-past" data-date="2017-10-07"><a class="fc-day-number" data-goto="{&quot;date&quot;:&quot;2017-10-07&quot;,&quot;type&quot;:&quot;day&quot;}">7</a></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-6">
            <!--begin:: Widgets/Tasks -->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Tasks
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content1" role="tab">
                                    Week
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab3_content1" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget2_tab1_content">
                            <div class="m-widget2">
                                <div class="m-widget2__item m-widget2__item--primary">
                                    <div class="m-widget2__checkbox">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="m-widget2__desc">
															<span class="m-widget2__text">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <br>
                                        <span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																	By Bob
																</a>
															</span>
                                    </div>
                                    <div class="m-widget2__actions">
                                        <div class="m-widget2__actions-nav">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                <a href="#" class="m-dropdown__toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
																									Activity
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
																									Messages
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
																									FAQ
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
																									Support
																								</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget2__item m-widget2__item--warning">
                                    <div class="m-widget2__checkbox">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="m-widget2__desc">
															<span class="m-widget2__text">
																Prepare Docs For Metting On Monday
															</span>
                                        <br>
                                        <span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																	By Sean
																</a>
															</span>
                                    </div>
                                    <div class="m-widget2__actions">
                                        <div class="m-widget2__actions-nav">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                <a href="#" class="m-dropdown__toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
																									Activity
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
																									Messages
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
																									FAQ
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
																									Support
																								</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget2__item m-widget2__item--brand">
                                    <div class="m-widget2__checkbox">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="m-widget2__desc">
															<span class="m-widget2__text">
																Make Widgets Great Again.Estudiat Communy Elit
															</span>
                                        <br>
                                        <span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																	By Aziko
																</a>
															</span>
                                    </div>
                                    <div class="m-widget2__actions">
                                        <div class="m-widget2__actions-nav">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                <a href="#" class="m-dropdown__toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
																									Activity
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
																									Messages
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
																									FAQ
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
																									Support
																								</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget2__item m-widget2__item--success">
                                    <div class="m-widget2__checkbox">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="m-widget2__desc">
															<span class="m-widget2__text">
																Make Metronic Great Again.Lorem Ipsum
															</span>
                                        <br>
                                        <span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																	By James
																</a>
															</span>
                                    </div>
                                    <div class="m-widget2__actions">
                                        <div class="m-widget2__actions-nav">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                <a href="#" class="m-dropdown__toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
																									Activity
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
																									Messages
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
																									FAQ
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
																									Support
																								</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget2__item m-widget2__item--danger">
                                    <div class="m-widget2__checkbox">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="m-widget2__desc">
															<span class="m-widget2__text">
																Completa Financial Report For Emirates Airlines
															</span>
                                        <br>
                                        <span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																	By Bob
																</a>
															</span>
                                    </div>
                                    <div class="m-widget2__actions">
                                        <div class="m-widget2__actions-nav">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                <a href="#" class="m-dropdown__toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
																									Activity
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
																									Messages
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
																									FAQ
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
																									Support
																								</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget2__item m-widget2__item--info">
                                    <div class="m-widget2__checkbox">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="m-widget2__desc">
															<span class="m-widget2__text">
																Completa Financial Report For Emirates Airlines
															</span>
                                        <br>
                                        <span class="m-widget2__user-name">
																<a href="#" class="m-widget2__link">
																	By Sean
																</a>
															</span>
                                    </div>
                                    <div class="m-widget2__actions">
                                        <div class="m-widget2__actions-nav">
                                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                <a href="#" class="m-dropdown__toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                                            <span class="m-nav__link-text">
																									Activity
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                            <span class="m-nav__link-text">
																									Messages
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                                            <span class="m-nav__link-text">
																									FAQ
																								</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                            <span class="m-nav__link-text">
																									Support
																								</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_widget2_tab2_content"></div>
                        <div class="tab-pane" id="m_widget2_tab3_content"></div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Tasks -->
        </div>
        <div class="col-xl-6">
            <!--begin:: Widgets/Support Tickets -->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Support Tickets
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                    <i class="la la-ellipsis-h m--font-brand"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Support
																				</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget3">
                        <div class="m-widget3__item">
                            <div class="m-widget3__header">
                                <div class="m-widget3__user-img">
                                    <img class="m-widget3__img" src="assets/app/media/img/users/user1.jpg" alt="">
                                </div>
                                <div class="m-widget3__info">
														<span class="m-widget3__username">
															Melania Trump
														</span>
                                    <br>
                                    <span class="m-widget3__time">
															2 day ago
														</span>
                                </div>
                                <span class="m-widget3__status m--font-info">
														Pending
													</span>
                            </div>
                            <div class="m-widget3__body">
                                <p class="m-widget3__text">
                                    Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                </p>
                            </div>
                        </div>
                        <div class="m-widget3__item">
                            <div class="m-widget3__header">
                                <div class="m-widget3__user-img">
                                    <img class="m-widget3__img" src="assets/app/media/img/users/user4.jpg" alt="">
                                </div>
                                <div class="m-widget3__info">
														<span class="m-widget3__username">
															Lebron King James
														</span>
                                    <br>
                                    <span class="m-widget3__time">
															1 day ago
														</span>
                                </div>
                                <span class="m-widget3__status m--font-brand">
														Open
													</span>
                            </div>
                            <div class="m-widget3__body">
                                <p class="m-widget3__text">
                                    Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.
                                </p>
                            </div>
                        </div>
                        <div class="m-widget3__item">
                            <div class="m-widget3__header">
                                <div class="m-widget3__user-img">
                                    <img class="m-widget3__img" src="assets/app/media/img/users/user5.jpg" alt="">
                                </div>
                                <div class="m-widget3__info">
														<span class="m-widget3__username">
															Deb Gibson
														</span>
                                    <br>
                                    <span class="m-widget3__time">
															3 weeks ago
														</span>
                                </div>
                                <span class="m-widget3__status m--font-success">
														Closed
													</span>
                            </div>
                            <div class="m-widget3__body">
                                <p class="m-widget3__text">
                                    Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Support Tickets -->
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <!--Begin::Portlet-->
            <div class="m-portlet  m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Recent Activities
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                    <i class="la la-ellipsis-h m--font-brand"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Quick Actions
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Support
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                            Cancel
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide _mCS_4" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; height: 380px; max-height: 380px; position: relative;"><div id="mCSB_4" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_4_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                <!--Begin::Timeline 2 -->
                                <div class="m-timeline-2">
                                    <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                        <div class="m-timeline-2__item">
														<span class="m-timeline-2__item-time">
															10:00
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text  m--padding-top-5">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                <br>
                                                incididunt ut labore et dolore magna
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															12:45
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-success"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
                                                AEOL Meeting With
                                            </div>
                                            <div class="m-list-pics m-list-pics--sm m--padding-left-20">
                                                <a href="#">
                                                    <img src="assets/app/media/img/users/100_4.jpg" title="" class="mCS_img_loaded">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/app/media/img/users/100_13.jpg" title="" class="mCS_img_loaded">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/app/media/img/users/100_11.jpg" title="" class="mCS_img_loaded">
                                                </a>
                                                <a href="#">
                                                    <img src="assets/app/media/img/users/100_14.jpg" title="" class="mCS_img_loaded">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															14:00
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-brand"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Make Deposit
                                                <a href="#" class="m-link m-link--brand m--font-bolder">
                                                    USD 700
                                                </a>
                                                To ESL.
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															16:00
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                <br>
                                                incididunt ut labore et dolore magna elit enim at minim
                                                <br>
                                                veniam quis nostrud
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															17:00
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-info"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Placed a new order in
                                                <a href="#" class="m-link m-link--brand m--font-bolder">
                                                    SIGNATURE MOBILE
                                                </a>
                                                marketplace.
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															16:00
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-brand"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                <br>
                                                incididunt ut labore et dolore magna elit enim at minim
                                                <br>
                                                veniam quis nostrud
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">
															17:00
														</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Received a new feedback on
                                                <a href="#" class="m-link m-link--brand m--font-bolder">
                                                    FinancePro App
                                                </a>
                                                product.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End::Timeline 2 -->
                            </div></div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 201px; max-height: 360px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                </div>
            </div>
            <!--End::Portlet-->
        </div>
        <div class="col-xl-6 col-lg-12">
            <!--Begin::Portlet-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Recent Notifications
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget2_tab1_content">
                            <!--Begin::Timeline 3 -->
                            <div class="m-timeline-3">
                                <div class="m-timeline-3__items">
                                    <div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time">
																09:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Bob
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--warning">
															<span class="m-timeline-3__item-time">
																10:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Sean
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time">
																11:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit eiusmdd tempor
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--success">
															<span class="m-timeline-3__item-time">
																12:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--danger">
															<span class="m-timeline-3__item-time">
																14:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Derrick
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time">
																15:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit,consectetur
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Iman
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time">
																17:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit consectetur eiusmdd tempor
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Aziko
																	</a>
																</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End::Timeline 3 -->
                        </div>
                        <div class="tab-pane" id="m_widget2_tab2_content">
                            <!--Begin::Timeline 3 -->
                            <div class="m-timeline-3">
                                <div class="m-timeline-3__items">
                                    <div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time m--font-focus">
																09:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Contrary to popular belief, Lorem Ipsum is not simply random text.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Bob
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--warning">
															<span class="m-timeline-3__item-time m--font-warning">
																10:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	There are many variations of passages of Lorem Ipsum available.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Sean
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time m--font-primary">
																11:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Contrary to popular belief, Lorem Ipsum is not simply random text.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--success">
															<span class="m-timeline-3__item-time m--font-success">
																12:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	The standard chunk of Lorem Ipsum used since the 1500s is reproduced.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--danger">
															<span class="m-timeline-3__item-time m--font-warning">
																14:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Latin words, combined with a handful of model sentence structures.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Derrick
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time m--font-info">
																15:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Contrary to popular belief, Lorem Ipsum is not simply random text.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Iman
																	</a>
																</span>
                                        </div>
                                    </div>
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time m--font-danger">
																17:00
															</span>
                                        <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem Ipsum is therefore always free from repetition, injected humour.
																</span>
                                            <br>
                                            <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Aziko
																	</a>
																</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End::Timeline 3 -->
                        </div>
                    </div>
                </div>
            </div>
            <!--End::Portlet-->
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-8">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Exclusive Datatable Plugin
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                        <i class="la la-ellipsis-h m--font-brand"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav">
                                                        <li class="m-nav__section m-nav__section--first">
																				<span class="m-nav__section-text">
																					Quick Actions
																				</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                <span class="m-nav__link-text">
																						Create Post
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                <span class="m-nav__link-text">
																						Send Messages
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                <span class="m-nav__link-text">
																						Upload File
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__section">
																				<span class="m-nav__section-text">
																					Useful Links
																				</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                <span class="m-nav__link-text">
																						FAQ
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-text">
																						Support
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                        <li class="m-nav__item m--hide">
                                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                                Submit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--scroll m-datatable--loaded" id="m_datatable_latest_orders" style=""><table class="m-datatable__table" style="display: block; min-height: 300px; max-height: 380px;"><thead class="m-datatable__head"><tr class="m-datatable__row" style="left: 0px;"><th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand"><input type="checkbox"><span></span></label></span></th><th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Order ID<i class="la la-arrow-up"></i></span></th><th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Ship Name</span></th><th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 110px;">Ship Date</span></th><th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Status</span></th><th data-field="Type" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Type</span></th><th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 110px;">Actions</span></th></tr></thead><tbody class="m-datatable__body mCustomScrollbar _mCS_9 mCS-autoHide" style="max-height: 324px; height: 324px; position: relative; overflow: visible;" data-scrollbar-shown="true"><div id="mCSB_9" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_9_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px; width: 900px; min-width: 100%; overflow-x: inherit;" dir="ltr"><tr data-row="0" class="m-datatable__row" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="15"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0006-3917 - PA</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Graham Group</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">3/10/2017</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown ">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="1" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="199"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0009-0068 - CN</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Stamm-Gutmann</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">12/20/2017</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--info m-badge--wide">Info</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown ">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="2" class="m-datatable__row" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="139"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0009-0758 - GT</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Wyman Inc</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">3/17/2016</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--metal m-badge--wide">Delivered</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown ">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="3" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="342"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0046-1103 - SE</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Botsford-West</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">1/21/2017</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown ">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="4" class="m-datatable__row" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="287"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0071-0803 - RU</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Mitchell-Hyatt</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">8/22/2016</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown ">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="5" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="34"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0078-0246 - NO</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Wilderman, Boehm and Murphy</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">10/18/2016</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown ">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="6" class="m-datatable__row" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="249"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0093-0148 - CN</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Schuster, Walsh and Weissnat</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">1/5/2017</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown dropup">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="7" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="253"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0093-0753 - CN</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Hartmann Group</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">12/20/2017</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--metal m-badge--wide">Delivered</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown dropup">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="8" class="m-datatable__row" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="158"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0121-0638 - SE</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Mraz, Gleichner and Schiller</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">12/19/2017</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown dropup">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr><tr data-row="9" class="m-datatable__row m-datatable__row--even" style="left: 0px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 40px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="206"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 150px;">0135-0559 - TL</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 150px;">Lemke-Schumm</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">4/29/2016</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge  m-badge--info m-badge--wide">Info</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 100px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">                        <div class="dropdown dropup">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    </span></td></tr></div></div><div id="mCSB_9_scrollbar_vertical" class="mCSB_scrollTools mCSB_9_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_9_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 168px; max-height: 290px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div><div id="mCSB_9_scrollbar_horizontal" class="mCSB_scrollTools mCSB_9_scrollbar mCS-minimal-dark mCSB_scrollTools_horizontal" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_9_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 50px; display: block; width: 366px; max-width: 552.406px; left: 0px;"><div class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></tbody></table><div class="m-datatable__pager m-datatable--paging-loaded clearfix"><ul class="m-datatable__pager-nav"><li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-double-left"></i></a></li><li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-left"></i></a></li><li style="display: none;"><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-prev" data-page="1"><i class="la la-ellipsis-h"></i></a></li><li style="display: none;"><input type="text" class="m-pager-input form-control" title="Page number"></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active" data-page="1" title="1">1</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="2" title="2">2</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="3" title="3">3</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="4" title="4">4</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="5" title="5">5</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="6" title="6">6</a></li><li><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next" data-page="7"><i class="la la-ellipsis-h"></i></a></li><li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next" data-page="2"><i class="la la-angle-right"></i></a></li><li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last" data-page="35"><i class="la la-angle-double-right"></i></a></li></ul><div class="m-datatable__pager-info"><div class="dropdown bootstrap-select m-datatable__pager-size" style="width: 70px;"><select class="selectpicker m-datatable__pager-size" title="Select page size" data-width="70px" data-selected="10" tabindex="-98"><option class="bs-title-option" value="">Select page size</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="50">50</option><option value="100">100</option></select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Select page size"><div class="filter-option"><div class="filter-option-inner">10</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div><span class="m-datatable__pager-detail">Displaying 1 - 10 of 350 records</span></div></div></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Audit Log-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Audit Log
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
                                    Week
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab3_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget4_tab1_content">
                            <div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide" data-scrollable="true" data-max-height="400" style="height: 400px; overflow: visible; max-height: 400px; position: relative;"><div id="mCSB_5" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_5_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                            <div class="m-list-timeline__items">
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                    <span class="m-list-timeline__text">
																	12 new users registered
																</span>
                                                    <span class="m-list-timeline__time">
																	Just now
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                                    <span class="m-list-timeline__text">
																	System shutdown
																	<span class="m-badge m-badge--success m-badge--wide">
																		pending
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	14 mins
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                                    <span class="m-list-timeline__text">
																	New invoice received
																</span>
                                                    <span class="m-list-timeline__time">
																	20 mins
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                                    <span class="m-list-timeline__text">
																	DB overloaded 80%
																	<span class="m-badge m-badge--info m-badge--wide">
																		settled
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	1 hr
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                                                    <span class="m-list-timeline__text">
																	System error -
																	<a href="#" class="m-link">
																		Check
																	</a>
																</span>
                                                    <span class="m-list-timeline__time">
																	2 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                                    <span class="m-list-timeline__text">
																	Production server down
																</span>
                                                    <span class="m-list-timeline__time">
																	3 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                                    <span class="m-list-timeline__text">
																	Production server up
																</span>
                                                    <span class="m-list-timeline__time">
																	5 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                    <span href="" class="m-list-timeline__text">
																	New order received
																	<span class="m-badge m-badge--danger m-badge--wide">
																		urgent
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	7 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                    <span class="m-list-timeline__text">
																	12 new users registered
																</span>
                                                    <span class="m-list-timeline__time">
																	Just now
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                                    <span class="m-list-timeline__text">
																	System shutdown
																	<span class="m-badge m-badge--success m-badge--wide">
																		pending
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	14 mins
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                                    <span class="m-list-timeline__text">
																	New invoice received
																</span>
                                                    <span class="m-list-timeline__time">
																	20 mins
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                                    <span class="m-list-timeline__text">
																	DB overloaded 80%
																	<span class="m-badge m-badge--info m-badge--wide">
																		settled
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	1 hr
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                                    <span class="m-list-timeline__text">
																	New invoice received
																</span>
                                                    <span class="m-list-timeline__time">
																	20 mins
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                                    <span class="m-list-timeline__text">
																	DB overloaded 80%
																	<span class="m-badge m-badge--info m-badge--wide">
																		settled
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	1 hr
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                                                    <span class="m-list-timeline__text">
																	System error -
																	<a href="#" class="m-link">
																		Check
																	</a>
																</span>
                                                    <span class="m-list-timeline__time">
																	2 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                                    <span class="m-list-timeline__text">
																	Production server down
																</span>
                                                    <span class="m-list-timeline__time">
																	3 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                                    <span class="m-list-timeline__text">
																	Production server up
																</span>
                                                    <span class="m-list-timeline__time">
																	5 hrs
																</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                    <span href="" class="m-list-timeline__text">
																	New order received
																	<span class="m-badge m-badge--danger m-badge--wide">
																		urgent
																	</span>
																</span>
                                                    <span class="m-list-timeline__time">
																	7 hrs
																</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div></div><div id="mCSB_5_scrollbar_vertical" class="mCSB_scrollTools mCSB_5_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_5_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 148px; max-height: 380px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                        </div>
                        <div class="tab-pane" id="m_widget4_tab2_content"></div>
                        <div class="tab-pane" id="m_widget4_tab3_content"></div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Audit Log-->
        </div>
    </div>
    <!--End::Section-->
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-8">
            <!--begin:: Widgets/Best Sellers-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Best Sellers
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
                                    Last Month
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
                                    last Year
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content" role="tab">
                                    All time
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Content-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-label">
																	author:
																</span>
                                            <span class="m-widget5__info-author-name">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																19,200
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1046
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product10.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																24,583
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																3809
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product11.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																10,054
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1103
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product11.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																24,583
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																3809
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																19,200
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1046
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product10.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																10,054
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1103
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product10.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																10.054
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1103
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product11.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																24,583
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																sales
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																3809
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="assets/app/media/img//products/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
																Make Metronic Great  Again.Lorem Ipsum Amet
															</span>
                                        <div class="m-widget5__info">
																<span class="m-widget5__author">
																	Author:
																</span>
                                            <span class="m-widget5__info-author m--font-info">
																	Fly themes
																</span>
                                            <span class="m-widget5__info-label">
																	Released:
																</span>
                                            <span class="m-widget5__info-date m--font-info">
																	23.08.17
																</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
															<span class="m-widget5__number">
																19,200
															</span>
                                        <br>
                                        <span class="m-widget5__sales">
																1046
															</span>
                                    </div>
                                    <div class="m-widget5__stats2">
															<span class="m-widget5__number">
																1046
															</span>
                                        <br>
                                        <span class="m-widget5__votes">
																votes
															</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
            <!--end:: Widgets/Best Sellers-->
        </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Authors Profit-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Authors Profit
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                    All
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">
																				Quick Actions
																			</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
																					Activity
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
																					Messages
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
																					FAQ
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
																					Support
																				</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                            Cancel
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget4">
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo5.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														Trump Themes
													</span>
                                <br>
                                <span class="m-widget4__sub">
														Make Metronic Great Again
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														+$2500
													</span>
												</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo4.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														StarBucks
													</span>
                                <br>
                                <span class="m-widget4__sub">
														Good Coffee &amp; Snacks
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														-$290
													</span>
												</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo3.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														Phyton
													</span>
                                <br>
                                <span class="m-widget4__sub">
														A Programming Language
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														+$17
													</span>
												</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo2.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														GreenMakers
													</span>
                                <br>
                                <span class="m-widget4__sub">
														Make Green Great Again
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														-$2.50
													</span>
												</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo1.png" alt="">
                            </div>
                            <div class="m-widget4__info">
													<span class="m-widget4__title">
														FlyThemes
													</span>
                                <br>
                                <span class="m-widget4__sub">
														A Let's Fly Fast Again Language
													</span>
                            </div>
                            <span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">
														+$200
													</span>
												</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Authors Profit-->
        </div>
    </div>
    <!--End::Section-->

@endsection
