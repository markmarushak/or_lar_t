@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
@section('content')

    <div class="row">
        <div class="clearfix"></div>

            <div class="col-xl-4">
                {{--<strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>--}}
            </div>
        </div>

    <div class="col-xl-12" style="margin-top: 20px;">
        {{--Call Tab Menu--}}
        @include('affiliate.tabs-menu.top-menu')

        {{--<div class="tab-content">--}}
            {{--<div class="qfb-db-col">--}}

                {{--<div class="qfb-box">--}}
                    {{--<div class="qfb-cf">--}}
                        {{--<h3 class="qfb-box-heading qfb-db-heading">--}}
                            {{--<i class="mdi mdi-view_stream"></i>--}}
                            {{--Forms--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                    {{--<div class="qfb-content qfb-form-switcher qfb-db-form-list">--}}
                        {{--@if (count($forms))--}}
                        {{--<ul class="qfb-nav-menu qfb-cf">--}}
                            {{--@foreach ($forms as $form)--}}
                            {{--<li class="qfb-cf">--}}
                                {{--<a href="                 ">{{$form['name']}} <span class="qfb-fade-overflow"></span></a>--}}
                                {{--<span class="qfb-form-switcher-icons">--}}
                                            {{--<a href="             "><i title="View entries" class="mdi mdi-chat"></i></a>--}}
                                            {{--<a href="              "><i title="Edit this form" class="fa fa-pencil"></i></a>--}}
                                        {{--</span>--}}
                            {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                        {{--@else--}}
                        {{--<div class="qfb-message-box qfb-message-box-info">--}}
                            {{--<div class="qfb-message-box-inner">--}}
                                {{--No forms yet--}}
                                {{--<a href="">Add new</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<ul class="qfb-nav-menu qfb-cf">--}}
                            {{--<li class="qfb-cf qfb-form-switcher-add-form-button">--}}
                                {{--<a href="">Add new</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

        <div class="row">
            <div class="col-xl-8">
                <div class="qfb-dashboard qfb-cf">
                    <div class="qfb-db-row qfb-cf">
                        <div class="qfb-db-col-xl-12">
                            <div class="qfb-box">
                                <div class="qfb-cf">
                                    <h3 class="qfb-box-heading qfb-db-heading">
                                        <i class="mdi mdi-view_stream"></i>
                                        Forms                        </h3>
                                </div>
                                <div class="qfb-content qfb-form-switcher qfb-db-form-list">
                                    <ul class="qfb-nav-menu qfb-cf">
                                        <li class="qfb-cf">
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&amp;sp=edit&amp;id=1">Få tilbud på Garasje<span class="qfb-fade-overflow"></span></a>
                                            <span class="qfb-form-switcher-icons">
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.entries&amp;id=1"><i title="View entries" class="mdi mdi-chat"></i></a>
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&amp;sp=edit&amp;id=1"><i title="Edit this form" class="fa fa-pencil"></i></a>
                                        </span>
                                        </li>
                                        <li class="qfb-cf">
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&amp;sp=edit&amp;id=3">Conditional logic<span class="qfb-fade-overflow"></span></a>
                                            <span class="qfb-form-switcher-icons">
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.entries&amp;id=1"><i title="View entries" class="mdi mdi-chat"></i></a>
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&amp;sp=edit&amp;id=3"><i title="Edit this form" class="fa fa-pencil"></i></a>
                                        </span>
                                        </li>
                                        <li class="qfb-cf qfb-form-switcher-add-form-button qfb-form-switcher-two-buttons">
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms">View all</a>
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&amp;sp=add">Add New</a>
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
@endsection