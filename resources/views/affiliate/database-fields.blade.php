
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

        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                <div class="col-xl-3">
                    <div class="form-group m-form__group">
                        <label>

                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row">

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        {{$dataFiltersRules[0]->description}} - <strong>Form Frontpage</strong>
                    </div>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        Table Name - <strong>{{$data['db_table']}}</strong>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        Data Fields - <strong>{{$data['data_fields_number']}}</strong>
                    </div>
                </div>



            </div>
        </div>


    </div>






@endsection