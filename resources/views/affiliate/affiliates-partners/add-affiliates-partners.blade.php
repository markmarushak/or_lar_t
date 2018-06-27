@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css' href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337'
      type='text/css' media='all'/>
@section('content')


        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">

            </div>
            <form action="{{route('add-affiliates-partners-store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include('errors')
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Description:</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="description">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Country:</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="country">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Type:</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control m-input" name="type">
                            <option>Affiliate</option>
                            <option>Partner</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Rules:</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" name="rules">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Status:</label>
                    <div class="col-3">
                                                <span class="m-switch m-switch--icon">
                                                    <label>
                                                    <input type="checkbox" checked="checked" name="status" id="n_status">
                                                    <span></span>
                                                    </label>
                                                </span>
                    </div>
                </div>
                <div class="form-group m-form__group row col-lg-2 col-md-9 col-sm-12">
                    <input type="submit" class="form-control m-input btn-primary text-white" value="Save">
                </div>
            </form>
        </div>


    </div>






@endsection