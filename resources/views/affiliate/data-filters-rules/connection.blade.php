@extends('layouts.admin.app')

@section('content')

    <div class="row">

        <div class="clearfix"></div>

        <div class="col-xl-4">
        </div>
    </div>
        {{--Call Tab Menu--}}
        @include('affiliate.tabs-menu.top-menu')
        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">

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
                            <input type="text" name="domain" class="form-control m-input" value="@if(!empty($settingsOfDataBase->setting->domain)){{$settingsOfDataBase->setting->domain}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Form:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input type="text" name="form" class="form-control m-input" value="@if(!empty($settingsOfDataBase->setting->form)){{$settingsOfDataBase->setting->form}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host name:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="host_name" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->host_name)){{$settingsOfDataBase->setting->host_name}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="host" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->host)){{$settingsOfDataBase->setting->host}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Port:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="port" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->port)){{$settingsOfDataBase->setting->port}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Database:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="database" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->database)){{$settingsOfDataBase->setting->database}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Username:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="username" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->username)){{$settingsOfDataBase->setting->username}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Password:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="password" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->password)){{$settingsOfDataBase->setting->password}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Charset:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="charset" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->charset)){{$settingsOfDataBase->setting->charset}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Collation:
                        </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">

                            <input id="host" name="collation" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->setting->collation)){{$settingsOfDataBase->setting->collation}}@endif">
                        </div>
                    </div>

                <div class="form-group m-form__group row">

                    <div class="offset-10 col-lg-2 col-md-9 col-sm-12">

                        <input type="submit" class="form-control m-input btn-primary text-white" value="Save">
                    </div>
                </div>
            </form>
        </div>








@endsection