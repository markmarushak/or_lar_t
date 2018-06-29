
@extends('layouts.admin.app')
{{--<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />--}}
@section('content')

    <div class="row">

        <div class="clearfix"></div>

            <div class="col-xl-4">
                {{--<strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>--}}
            </div>

        </div>

        {{--Call Tab Menu--}}
        @include('affiliate.tabs-menu.top-menu')
        @include('errors')
        @if(isset($data) && !empty($data) )
                <!--<div class="col-xl-3">
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
                </div>-->

                <div class="form-group m-form__group row">

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        {{$data['description']}} - <strong>Form Frontpage</strong>
                    </div>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        Table Name - <strong></strong>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        Data Fields - <strong></strong>
                    </div>
                </div>

        @endif








@endsection