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


                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="">
                    <div class="m-content">


                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__body">
                                <div id="m_table_1_wrapper"
                                     class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
                                                   id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                                   style="width: 915px;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="dt-right dt-right-remove-pseudo sorting_disabled" rowspan="1" colspan="1"
                                                        style="width: 30px;" aria-label="Actions">
                                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" value="" class="m-group-checkable">
                                                            <span></span>
                                                        </label></th>
                                                    <th data-field="OrderID"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting_desc"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 187.5px;" aria-label="

                        Descriptions
                    : activate to sort column ascending" aria-sort="descending">

                                                        <span style="width: 130px;">Descriptions</span>
                                                    </th>

                                                    <th data-field="ID"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting_desc"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 187.5px;" aria-label="

                        Descriptions
                    : activate to sort column ascending" aria-sort="descending">

                                                        <span style="width: 130px;">ID</span>
                                                    </th>

                                                    <th data-field="Category"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 109.5px;" aria-label="
                        Category
                    : activate to sort column ascending">
                                                        <span style="width: 130px;">Category</span>
                                                    </th>
                                                    <th data-field="Website"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 62.5px;" aria-label="
                        Source
                    : activate to sort column ascending">
                                                        <span style="width: 70px;">Source</span>
                                                    </th>
                                                    <th data-field="Department"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 45.5px;" aria-label="
                        Type
                    : activate to sort column ascending">
                                                        <span style="width: 70px;">Type</span>
                                                    </th>
                                                    <th data-field="ShipDate"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 36.5px;" aria-label="
                        Edit
                    : activate to sort column ascending">
                                                        <span style="width: 70px;">Edit</span>
                                                    </th>
                                                    <th data-field="Actions"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 58.5px;" aria-label="
                        Status
                    : activate to sort column ascending">
                                                        <span style="width: 70px;">Status</span>
                                                    </th>
                                                    <th data-field="Country"
                                                        class="m-datatable__cell m-datatable__cell--sort sorting"
                                                        tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                        style="width: 73.5px;" aria-label="
                        Country
                    : activate to sort column ascending">
                                                        <span style="width: 70px;">Country</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr role="row" class="odd">
                                                    <td class=" dt-right dt-right-remove-pseudo" tabindex="0">
                                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" value="" class="m-checkable">
                                                            <span></span>
                                                        </label></td>
                                                    <td class="sorting_1">
                                                        <span style="width: 130px;">LowCostEnergy.com</span>
                                                    </td>
                                                    <td class="sorting_1">
                                                        <span style="width: 130px;">LowCostEnergy.com</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 130px;">Gas &amp; Electricity</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 70px;">Form</span>
                                                    </td>
                                                    <td>
                                                        <span style="width: 70px;">email</span>
                                                    </td>

                                                    <td>
                            <span style="width: 70px;"><a
                                        href="http://127.0.0.1:8000/affiliate-service/data-filters-rules/edit/2/LowCostEnergy.com/connection">
                                    edit
                                </a></span>
                                                    </td>

                                                    <td><span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide">active</span>
                               </span></td>
                                                    <td>Norway</td>

                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class=" dt-right dt-right-remove-pseudo" tabindex="0">
                                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" value="" class="m-checkable">
                                                            <span></span>
                                                        </label></td>
                                                    <td class="sorting_1">
                                                        <span style="width: 130px;">Garasje-Tilbub.no</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 130px;">Building Accesories</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 70px;">Form</span>
                                                    </td>
                                                    <td>
                                                        <span style="width: 70px;">email</span>
                                                    </td>

                                                    <td>
                            <span style="width: 70px;"><a
                                        href="http://127.0.0.1:8000/affiliate-service/data-filters-rules/edit/1/Garasje-Tilbub.no/connection">
                                    edit
                                </a></span>
                                                    </td>

                                                    <td><span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide">active</span>
                               </span></td>
                                                    <td>Norway</td>

                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class=" dt-right dt-right-remove-pseudo" tabindex="0">
                                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" value="" class="m-checkable">
                                                            <span></span>
                                                        </label></td>
                                                    <td class="sorting_1">
                                                        <span style="width: 130px;">BestEnergyPrices.co.uk</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 130px;">Gas &amp; Electricity</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 70px;">Form</span>
                                                    </td>
                                                    <td>
                                                        <span style="width: 70px;">email</span>
                                                    </td>

                                                    <td>
                            <span style="width: 70px;"><a
                                        href="http://127.0.0.1:8000/affiliate-service/data-filters-rules/edit/4/BestEnergyPrices.co.uk/connection">
                                    edit
                                </a></span>
                                                    </td>

                                                    <td><span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide">active</span>
                               </span></td>
                                                    <td>Norway</td>

                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class=" dt-right dt-right-remove-pseudo" tabindex="0">
                                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" value="" class="m-checkable">
                                                            <span></span>
                                                        </label></td>
                                                    <td class="sorting_1">
                                                        <span style="width: 130px;">Best-Mobile-Network.com</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 130px;">Mobile Network</span>
                                                    </td>

                                                    <td class="">
                                                        <span style="width: 70px;">Form</span>
                                                    </td>
                                                    <td>
                                                        <span style="width: 70px;">email</span>
                                                    </td>

                                                    <td>
                            <span style="width: 70px;"><a
                                        href="http://127.0.0.1:8000/affiliate-service/data-filters-rules/edit/3/Best-Mobile-Network.com/connection">
                                    edit
                                </a></span>
                                                    </td>

                                                    <td><span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide">active</span>
                               </span></td>
                                                    <td>Norway</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="offset-10 col-lg-2 col-md-9 col-sm-12">
                                        <a href="http://127.0.0.1:8000/affiliate-service/email-bulk-split/data-filters-rules/add"
                                           class="form-control m-input btn-primary text-white btn-no-underline">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>



@endsection