
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
@section('content')

    <div class="row">
        <div class="col-xl-12">

            <div class="form-group m-form__group col-xl-3">
                <div class="input-group">

                    <input type="text" class="form-control" placeholder="Search for...">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="button">Search</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>


            <div class="col-xl-4">
                <strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>
            </div>
            <div class="col-xl-4">
                Table Name:  <strong>wpau_quform_forms</strong>
            </div>
            <div class="col-xl-4">
                | Data fields: <strong>17</strong>
            </div>
        </div>

    <div class="col-xl-10" style="margin-top: 20px;">
    {!!$form!!}

</div>



<ul class="nav nav-pills nav-pills--success" role="tablist" style="margin-top:50px;">
    {{--<li class="nav-item m-tabs__item">
        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
            Last Month
        </a>
    </li>
    <li class="nav-item m-tabs__item">
        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
            All Time
        </a>
    </li>--}}

    {{--@foreach($tags as $key => $tag)

        @if(!empty($tag['label']))
        <li class="nav-item">
            <a data-toggle="tab" href="#m_widget11_tab2_content" class="nav-link"  data-toggle="tab">
               SECTION {{ $tag['logicRules'][0]['value'] }}
            </a>
        </li>
        @endif


        @if(!empty($tag['elements']))
            @foreach($tag['elements'] as $element)
                @if(!empty($element['label']))
                <li class="nav-item">
                    <a title="Section Child of {{ $tag['logicRules'][0]['value'] }}" data-toggle="tab" href="#m_widget11_tab2_content" class="nav-link"  >
                        {{ $element['label'] }}
                    </a>

                </li>

                @endif

                @if(!empty($element['options']))
                    @foreach($element['options'] as $key => $optionValue)
                        @if(!empty($optionValue['value']))
                        <li class="nav-item">
                            <a title="Element Child of {{ $element['label'] }} " data-toggle="tab" href="#m_widget11_tab2_content" class="nav-link">
                                {{$optionValue['value']}}
                            </a>
                        </li>

                        @endif
                    @endforeach
                @endif
             @endforeach

        @endif
    @endforeach--}}
</ul>
@endsection