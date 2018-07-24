@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-xl-4">
        </div>

    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <div class="container text-center" style="width: 100%">
                <div id="spinner" class="m-loader m-loader--success m-loader--lg col-md-6" style="display: none; margin-top: 50px; width: 30px; display: inline-block;"></div>
            </div>
            <table class="table m-table m-table--head-separator-primary" id="m_table_1" style="display: none">
                <thead>
                <tr>
                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 130px;">Descriptions</span>
                    </th>
                    <th data-field="Category" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 130px;">Category</span>
                    </th>
                    <th data-field="Website" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 70px;">Source</span>
                    </th>
                    <th data-field="Department" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 70px;">Type</span>
                    </th>
                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 70px;">Edit</span>
                    </th>
                    <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 70px;">Status</span>
                    </th>
                    <th data-field="Country" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 70px;">Country</span>
                    </th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="form-group m-form__group row">
                <div class="pt-2">
                    <a href="#" onclick="window.location = laroute.action('data-filters-rules-add')" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span id="add_btn">Add</span>
						</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {!! Html::script('js/dataFiltersRulesEdit.js') !!}
    @include('affiliate.data-filters-rules.edit')
@endsection