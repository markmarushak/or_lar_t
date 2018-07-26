@extends('layouts.admin.app')

@section('content')

    <div class="row">

        <div class="clearfix"></div>

        <div class="col-xl-4">
        </div>
    </div>
        @include('affiliate.tabs-menu.top-menu')
    <div class="row">
        <div class="col-md-6">
    <div class="m-portlet m-portlet--mobile m-porlet--tab">
        <form action="{{route('connection-update', [  'dataFiltersRulesId' => $dataFiltersRulesId, 'dataFiltersRulesDescription' => $dataFiltersRulesDescription, 'id' => !empty($settingsOfDataBase->id) ? $settingsOfDataBase->id : null ])}}" method="post">
        <div class="m-portlet__body">

                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                @include('errors')
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Domain:
                        </label>
                        <div>
                            <input type="text" name="domain" class="form-control m-input" value="@if(!empty($settingsOfDataBase->domain)){{$settingsOfDataBase->domain}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            Form:
                        </label>
                        <div>

                            <input type="text" name="form" class="form-control m-input" value="@if(!empty($settingsOfDataBase->form)){{$settingsOfDataBase->form}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host name:
                        </label>
                        <div>

                            <input id="host" name="host_name" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->host_name)){{$settingsOfDataBase->host_name}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Host:
                        </label>
                        <div>

                            <input id="host" name="host" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->host)){{$settingsOfDataBase->host}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Port:
                        </label>
                        <div>

                            <input id="host" name="port" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->port)){{$settingsOfDataBase->port}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Database:
                        </label>
                        <div>

                            <input id="host" name="database" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->database)){{$settingsOfDataBase->database}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Username:
                        </label>
                        <div>

                            <input id="host" name="username" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->username)){{$settingsOfDataBase->username}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Password:
                        </label>
                        <div>

                            <input id="host" name="password" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->password)){{$settingsOfDataBase->password}}@endif">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Charset:
                        </label>
                        <div>

                            <input id="host" name="charset" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->charset)){{$settingsOfDataBase->charset}}@endif">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="host" class="col-form-label col-lg-3 col-sm-12">
                            Collation:
                        </label>
                        <div>

                            <input id="host" name="collation" type="text" class="form-control m-input"
                                   value="@if(!empty($settingsOfDataBase->collation)){{$settingsOfDataBase->collation}}@endif">
                        </div>
                    </div>
            </div>
                <div class="m-portlet__foot">
                <div class="form-group m-form__group row">

                    <div class="m-form__actions  col-lg-4 col-md-9 col-sm-12">

                        <input type="submit" class="form-control m-input btn-primary text-white" value="Save">
                    </div>
                </div>
                </div>
        </form>
    </div>
        </div>
    </div>








@endsection