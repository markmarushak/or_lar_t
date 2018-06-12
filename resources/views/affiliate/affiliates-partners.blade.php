@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css' href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337'
      type='text/css' media='all'/>
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

                <div class="col-xl-8">
                    <div class="form-group">

                        <div class="input-group-prepend">
                            <div class="m-radio-inline col-xl-5">
                                <label class="m-radio">
                                    <input type="radio" name="example_8" value="1">
                                    Affiliate
                                    <span></span>
                                </label>
                                <label class="m-radio">
                                    <input type="radio" name="example_8" value="2">
                                    Partner
                                    <span></span>
                                </label>
                            </div>
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

        </div>
    </div>



@endsection