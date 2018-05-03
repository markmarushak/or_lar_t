
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
@section('content')

    <div class="row">

        <div class="clearfix"></div>

            <div class="col-xl-4">
                <strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>
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
            <div class="tab-pane active" id="m_tabs_0_1" role="tabpanel">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.
            </div>
            <div class="tab-pane" id="m_tabs_0_2" role="tabpanel">
                {!!$form!!}
            </div>
            <div class="tab-pane" id="m_tabs_0_3" role="tabpanel">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type.
            </div>
            <div class="tab-pane" id="m_tabs_0_4" role="tabpanel">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div class="tab-pane" id="m_tabs_0_5" role="tabpanel">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div class="tab-pane" id="m_tabs_0_6" role="tabpanel">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
        </div>


    </div>






@endsection