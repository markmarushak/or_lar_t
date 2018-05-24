@extends('layouts.admin.app')
@section('content')
    <div class="row">

        <div class="clearfix"></div>

        <div class="col-xl-4">
            {{--<strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>--}}
        </div>

    </div>

    <div class="col-xl-12" style="margin-top: 20px;">

        <div class="tab-content">

            <form action="{{route('data-filters-rules-store')}}" method="post">
                {{ csrf_field() }}
                @include('errors')
                <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-1 col-sm-12">
                    Description:
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input name="description" type="text" class="form-control m-input" value="{{old('description')}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-1 col-sm-12">
                    Category:
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input name="category" type="text" class="form-control m-input" value="{{old('category')}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-1 col-sm-12">
                    Source:
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input name="source" type="text" class="form-control m-input" value="{{old('source')}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-1 col-sm-12">
                    Type:
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input name="type" type="text" class="form-control m-input" value="{{old('type')}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-1 col-sm-12">
                    Country:
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input name="country" type="text" class="form-control m-input" value="{{old('country')}}">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <div class="offset-10 col-lg-2 col-md-9 col-sm-12">
                    <input type="submit" class="form-control m-input btn-primary text-white" value="Submit">
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection