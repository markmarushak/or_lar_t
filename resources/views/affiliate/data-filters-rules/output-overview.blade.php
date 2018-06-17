
@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="clearfix"></div>

        <div class="col-xl-4">
        </div>
    </div>
    <div class="col-xl-12" style="margin-top: 20px;">
        @include('affiliate.tabs-menu.top-menu')
        <div class="row">
            @include('errors')
            <div class="qfb-db-col">
                <div class="qfb-box">
                    <div class="qfb-cf">
                        <h3 class="qfb-box-heading qfb-db-heading">
                            <i class="mdi mdi-chat"></i>

                            <span class="qfb-db-new-message-count"></span>

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
        </div>
    </div>


@endsection