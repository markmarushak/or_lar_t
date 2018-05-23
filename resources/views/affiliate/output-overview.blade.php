
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

        <div class="qfb-db-col">

            <div class="qfb-box">
                <div class="qfb-cf">
                    <h3 class="qfb-box-heading qfb-db-heading">
                        <i class="mdi mdi-chat"></i>
                        Recent entries
                    </h3>
                </div>
                <div class="qfb-content qfb-form-switcher qfb-db-entry-list">
                    <ul class="qfb-nav-menu qfb-cf">
                        <?php foreach ($recentEntries as $recentEntry) : ?>
                        <li class="qfb-cf<?php echo $recentEntry['unread'] == '1' ? ' qfb-unread' : ''; ?>">
                            <a href="{{route('output-overview-single', ['single_id' => $recentEntry['id'], 'name' => $recentEntry, 'data_filters_rules_id' => $dataFiltersRulesId, 'data_filters_rules_description'=> $dataFiltersRulesDescription ])}}">
                                <?php if ($recentEntry['unread'] == '1') : ?>
                                <i class="fa fa-envelope"></i>
                                <?php else : ?>
                                <i class="fa fa-envelope-open-o"></i>
                                <?php endif; ?>
                                <span class="qfb-db-entry-list-date"><?php echo $recentEntry['created_at']?></span>
                                <span class="qfb-db-entry-list-form-name"><?php echo $recentEntry['name']?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>

    </div>






@endsection