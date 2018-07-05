@extends('layouts.admin.app')

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
                        <input type="text" class="form-control m-input" name="country" id="query">
                    </div>
                </div>

                <div class="form-group m-form__group row" id="type_chose">
                    <label class="col-form-label col-lg-3 col-sm-12">Type:</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control m-input" name="type" id="n_type">
                            <option>Affiliate</option>
                            <option>Partner</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row col-lg-2 col-md-9 col-sm-12">
                    <input type="submit" class="form-control m-input btn-primary text-white" value="Save">
                </div>
            </form>
        </div>
    </div>
        {!! Html::script('js/affiliatePartners.js') !!}
@endsection