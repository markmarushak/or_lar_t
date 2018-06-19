@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css' href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337'
      type='text/css' media='all'/>
@section('content')


        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">

            </div>
            <form action="{{route('add-affiliates-partners')}}" method="get">
                <input type="hidden" name="_method" value="PUT">
                @include('errors')
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Description:
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" name="description" class="form-control m-input" value="">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">
                        Country:
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">

                        <input type="text" name="country" class="form-control m-input" value="">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="host" class="col-form-label col-lg-3 col-sm-12">
                        Type:
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">

                        <input id="host" name="type" type="text" class="form-control m-input"
                               value="">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="host" class="col-form-label col-lg-3 col-sm-12">
                        Rules:
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">

                        <input id="host" name="rules" type="text" class="form-control m-input"
                               value="">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="host" class="col-form-label col-lg-3 col-sm-12">
                        Status:
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">

                        <input id="host" name="status" type="text" class="form-control m-input"
                               value="">
                    </div>
                </div>
                <div class="form-group m-form__group row">

                    <div class="offset-10 col-lg-2 col-md-9 col-sm-12">

                        <input type="submit" class="form-control m-input btn-primary text-white" value="Save">
                    </div>
                </div>
            </form>
        </div>


    </div>






@endsection