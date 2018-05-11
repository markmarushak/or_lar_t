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


            </div>


            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
                    Domain:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <input type="email" class="form-control m-input" value="{{$dataFiltersRules[0]->description}}">
                </div>
            </div>
            @foreach($settingsDataBase as $settingDataBase)
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
                    Form:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input type="email" class="form-control m-input" value="Form Frontpage">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Host name:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="host_name" type="text" class="form-control m-input" value="{{$settingDataBase->host_name}}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Host:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="host" type="text" class="form-control m-input" value="{{$settingDataBase->host}}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Port:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="port" type="text" class="form-control m-input" value="{{$settingDataBase->port}}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Database:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="database" type="text" class="form-control m-input" value="{{$settingDataBase->database}}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Username:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="username" type="text" class="form-control m-input" value="{{$settingDataBase->username}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Password:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="password" type="text" class="form-control m-input" value="{{$settingDataBase->password}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Charset:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" name="charset" type="text" class="form-control m-input" value="{{$settingDataBase->charset}}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Collation:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input id="host" type="text" class="form-control m-input" value="{{$settingDataBase->collation}}">
                </div>
            </div>
            @endforeach
            <div class="form-group m-form__group row">

                <div class="offset-10 col-lg-2 col-md-9 col-sm-12">

                    <input type="submit" class="form-control m-input btn-primary text-white" value="Submit">
                </div>
            </div>
        </div>



    </div>






@endsection