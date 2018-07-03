
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />


@section('content')
    <div class="row">
        <div class="clearfix"></div>

        <div class="col-xl-4">
        </div>
    </div>
        @include('affiliate.tabs-menu.top-menu')
            @include('errors')
            @if(isset($recentEntries) && !empty($recentEntries) )
            <div class="qfb-entry-left">
                <div class="qfb-box " style="width: 700px">
                    <div class="qfb-cf">
                        <h3 class="qfb-box-heading qfb-db-heading">
                            <i class="mdi mdi-chat"></i>
                        </h3>
                    </div>
                    <div class="qfb-content qfb-form-switcher qfb-db-entry-list">
                        <?php if (count($recentEntries)) : ?>
                        <ul class="qfb-nav-menu qfb-cf">
                            <?php foreach ($recentEntries as $recentEntry) : ?>
                            <li class="qfb-cf<?php echo $recentEntry['unread'] == '1' ? ' qfb-unread' : ''; ?>">
                                <a href="{{route('output-overview-single', [
                                'single_id' => $recentEntry['id'],
                                'dataFiltersRulesId' => $dataFiltersRulesId,
                                'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                                 ])}}">
                                    <?php if ($recentEntry['unread'] == '1') : ?>
                                    <i class="fa fa-envelope"></i>
                                    <?php else : ?>
                                    <i class="fa fa-envelope-open-o"></i>
                                    <?php endif; ?>
                                    <span class="qfb-db-entry-list-date">{{$recentEntry['created_at']}}</span>
                                    <span class="qfb-db-entry-list-form-name">{{$recentEntry['name']}}</span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="  " class="qfb-link qfb-db-recent-entries-link">   </a>
                        <?php else : ?>
                        <div class="qfb-message-box qfb-message-box-info"><div class="qfb-message-box-inner">  </div></div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        @endif


@endsection