
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
@section('content')

    <div class="row">

        <div class="clearfix"></div>

            <div class="col-xl-4">
            </div>

        </div>

    <div class="col-xl-12" style="margin-top: 20px;">
        {{--Call Tab Menu--}}
        @include('affiliate.tabs-menu.top-menu')

        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                <div class="qfb-cf qfb-entry-wrap">
                <div class="qfb-entry-left">
                    <div class="qfb-box">
                        <div class="qfb-entry-show-empty-wrap"><form><label> </label></form></div>
                        <h3 class="qfb-entry-heading qfb-settings-heading"><i class="mdi mdi-message"></i></h3>
                        <table class="qfb-entry-table">
                            @if (is_array($result))
                                @for ($i = 0; $i < count($result[0]); $i++)
                                    {!!  $result[0][$i] !!}
                                    {!! $result[1][$i] !!}
                                @endfor
                            @endif

                        </table>
                    </div>
                </div>


            </div>
        </div>
        </div>

    </div>






@endsection