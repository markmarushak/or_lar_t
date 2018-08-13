@extends('layouts.admin.app')

@section('content')

    <!--Begin::Section-->
    <div class="row">

        <div class="col-xl-4">
            <!--begin:: Widgets/Top Products-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                               Email for Garasje-Tilbud.no
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__body">
                    <!--begin::Widget5-->
                    <div class="m-widget4">
                        <div class="m-widget4__chart m-portlet-fit--sides m--margin-top-10 m--margin-top-20"
                             style="height:260px;">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="m_chart_mail_stats" width="309" height="260" class="chartjs-render-monitor"
                                    style="display: block; width: 309px; height: 260px;"></canvas>
                        </div>

                    </div>
                    <!--end::Widget 5-->
                </div>
            </div>
            <!--end:: Widgets/Top Products-->
        </div>


    </div>


@endsection
