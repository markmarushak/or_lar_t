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
            @foreach($settingsOfDataBase as $settingOfDataBase)
                <form action="{{route('connection-update', ['data_filters_rules_id' => $dataFiltersRulesId, 'data_filters_rules_description' => $dataFiltersRulesDescription])}}" method="post">

                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                @include('errors')
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Domain:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="domain" class="form-control m-input" value="{{$settingOfDataBase->domain}}">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Form:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input type="text" class="form-control m-input" value="Form Frontpage">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host name:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="host_name" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->host_name}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="host" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->host}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Port:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="port" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->port}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Database:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="database" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->database}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Username:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="username" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->username}}">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Password:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="password" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->password}}">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Charset:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="charset" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->charset}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Collation:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="collation" type="text" class="form-control m-input"
                                   value="{{$settingOfDataBase->collation}}">
                        </div>
                    </div>

                <div class="form-group m-form__group row">

                    <div class="offset-10 col-lg-2 col-md-9 col-sm-12">

                        <input type="submit" class="form-control m-input btn-primary text-white" value="Submit">
                    </div>
                </div>
            </form>
            @endforeach

        </div>


    </div>






@endsection