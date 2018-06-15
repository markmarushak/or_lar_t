@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css' href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337'
      type='text/css' media='all'/>
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

                    </div>
                </div>
            </div>

            <form action="{{route('connection-update', [  'dataFiltersRulesId' => $dataFiltersRulesId, 'dataFiltersRulesDescription' => $dataFiltersRulesDescription, 'id' => !empty($settingsOfDataBase->id) ? $settingsOfDataBase->id : null ])}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                @include('errors')
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Domain:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="domain" class="form-control m-input" value="@if(!empty($settingsOfDataBase->domain)){{$settingsOfDataBase->domain}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Form:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input type="text" name="form" class="form-control m-input" value="@if(!empty($settingsOfDataBase->form)){{$settingsOfDataBase->form}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host name:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="host_name" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->host_name)){{$settingsOfDataBase->host_name}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="host" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->host)){{$settingsOfDataBase->host}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Port:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="port" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->port)){{$settingsOfDataBase->port}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Database:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="database" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->database)){{$settingsOfDataBase->database}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Username:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="username" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->username)){{$settingsOfDataBase->username}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Password:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="password" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->host)){{$settingsOfDataBase->host}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Charset:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="charset" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->charset)){{$settingsOfDataBase->charset}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Collation:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="collation" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->collation)){{$settingsOfDataBase->collation}}@endif">
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