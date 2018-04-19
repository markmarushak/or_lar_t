
@extends('layouts.admin.app')

@section('content')


    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
        <div class="row align-items-center">
            <div class="col-xl-8 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                    <div class="col-md-4">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
									<span><i class="la la-search"></i></span>
								</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="base_responsive_columns" style="">
        <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
            <thead class="m-datatable__head">
            <tr class="m-datatable__row" style="left: 0px;">

                <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">

                    <span style="width: 130px;">Descriptions</span>
                </th>
                <th data-field="ShipCity" class="m-datatable__cell m-datatable__cell--sort">
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
                <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                    <span style="width: 70px;">Country</span>
                </th>
            </tr>
            </thead>
            <tbody class="m-datatable__body" style="">
                <tr data-row="0" class="m-datatable__row" style="left: 0px;">

                    <td data-field="OrderID" class="m-datatable__cell">
                        <span style="width: 130px;">Garasje-Tilbub.no</span>
                    </td>
                    <td data-field="ShipCity" class="m-datatable__cell">
                        <span style="width: 130px;">Building Accessories</span>
                    </td>
                    <td data-field="Website" class="m-datatable__cell">
                        <span style="width: 70px;">Form</span>
                    </td>
                    <td data-field="Department" class="m-datatable__cell">
                        <span style="width: 70px;">Email</span>
                    </td>
                    <td data-field="ShipDate" class="m-datatable__cell">
                        <span style="width: 70px;">Edit</span>
                    </td>
                    <td data-field="Actions" class="m-datatable__cell">
                        <span style="overflow: visible; width: 70px;">
                            Active
                        </span>
                    </td>
                    <td data-field="ShipDate" class="m-datatable__cell">
                        <span style="width: 70px;">Norway</span>
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
            <div class="m-datatable__pager-info">
                <div class="dropdown bootstrap-select m-datatable__pager-size" style="width: 70px;"></div>
            </div>
        </div>
    </div>






@endsection
