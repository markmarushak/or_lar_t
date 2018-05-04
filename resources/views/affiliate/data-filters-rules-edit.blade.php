
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />


@section('content')

    <div class="row">

        <div class="clearfix"></div>

            <div class="col-xl-4">
                <strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>


                {{--<a href="{{ route('connection', ['data_filters_rules_id' => $params->data_filters_rules_id, 'data_filters_rules_description' => 'test']) }}">Connection</a>--}}
            </div>

        </div>

    <div class="col-xl-12" style="margin-top: 20px;">
        <ul class="nav nav-pills nav-pills--warning" role="tablist">
            @foreach($EditSectionMenu->roots() as $item)
                <li class="nav-item">

                    <a href="{!! $item->url() !!}" class="nav-link">
                        {!! $item->title !!}
                    </a>
                </li>
            @endforeach


        </ul>


        <div class="tab-content">

            <div class="tab-pane active" id="m_tabs_0_2" role="tabpanel">

            </div>

        </div>


    </div>






@endsection