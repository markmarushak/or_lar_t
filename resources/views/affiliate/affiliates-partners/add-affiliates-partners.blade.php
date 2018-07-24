@extends('layouts.admin.app')

@section('content')

    <div class="m-portlet m-portlet--mobile m-porlet--tab">
        <form action="{{route('add-affiliates-partners-store')}}" method="post">
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('errors')

                    <div class="form-group m-form__group">
                        <label>Name:</label>
                        <div class="m-input-icon m-input-icon--left col-lg-4 col-md-9 col-sm-12">
                            <input name="name" type="text" class="form-control m-input " placeholder="Name company"
                                   value="{{old('name')}}">
                            <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                            class="la la-user"></i></span></span>
                        </div>
                    </div>

                    <div class="form-group m-form__group">
                        <label>Description:</label>
                        <div class="m-input-icon m-input-icon--left col-lg-4 col-md-9 col-sm-12">
                            <input name="description" type="text" class="form-control m-input "
                                   placeholder="Description company" value="{{old('description')}}">
                            <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                            class="la la-info-circle"></i></span></span>
                        </div>
                    </div>

                    <div class="form-group m-form__group">
                        <label>Website:</label>
                        <div class="m-input-icon m-input-icon--left col-lg-4 col-md-9 col-sm-12">
                            <input name="website" type="url" class="form-control m-input " placeholder="Website company"
                                   value="{{old('website')}}">
                            <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                            class="la la-tag"></i></span></span>
                        </div>
                    </div>

                    <div class="form-group m-form__group">
                        <label>Address:</label>
                        <div class="m-input-icon m-input-icon--left col-lg-4 col-md-9 col-sm-12">
                            <input name="address" type="text" class="form-control m-input "
                                   placeholder="Address company" value="{{old('address')}}">
                            <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                            class="la la-map-marker"></i></span></span>
                        </div>
                    </div>


                    <div class="form-group m-form__group">
                        <label>Country:</label>
                        <div class="m-input-icon m-input-icon--left col-lg-4 col-md-9 col-sm-12">
                            <input name="country" type="text" class="form-control m-input " placeholder="Country "
                                   id="query" value="{{old('country')}}">
                            <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                            class="la la-thumb-tack"></i></span></span>
                        </div>
                    </div>

                    <div class="form-group m-form__group" id="type_chose">
                        <label>Type:</label>
                        <div class="m-input-icon col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control m-input" name="type" id="n_type">
                                @if(old('type'))
                                    @if ( old('type') == 'Affiliate')
                                        <option value="{{ 'Affiliate' }} selected">{{ 'Affiliate' }}</option>
                                        <option value="{{ 'Partner' }}">{{ 'Partner' }}</option>
                                    @else
                                        <option value="{{ 'Partner' }}selected">{{ 'Partner' }}</option>
                                        <option value="{{ 'Affiliate' }}">{{ 'Affiliate' }}</option>
                                    @endif
                                    @else
                                    <option value="{{ 'Affiliate' }}">{{ 'Affiliate' }}</option>
                                    <option value="{{ 'Partner' }}">{{ 'Partner' }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot">
                    <div class="form-group m-form__group row col-lg-2 col-md-9 col-sm-12">
                        <input type="submit" class="form-control m-input btn-primary text-white" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!! Html::script('js/affiliatePartners.js') !!}
@endsection