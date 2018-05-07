
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
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
                    <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                        <thead class="m-datatable__head"><tr class="m-datatable__row" style="left: 0px;">
                            <th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                <span style="width: 50px;">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox"><span></span></label></span></th>
                            <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="desc">
                                <span style="width: 150px;">ID<i class="la la-arrow-down"></i></span></th>
                            <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Descriptions</span>
                            </th>
                            <th data-field="Currency" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Country</span></th>
                            <th data-field="ShipAddress" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Type</span></th>
                            <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Rules</span></th>
                            <th data-field="Latitude" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Status</span></th>
                            <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Filter</span></th>
                        </tr>
                        </thead>
                        <tbody class="m-datatable__body" style="">
                        <tr data-row="0" class="m-datatable__row" style="left: 0px;">
                            <td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                <span style="width: 50px;">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="80"><span></span>
                                    </label>
                                </span>
                            </td>
                            <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 5px;">1</span></td>
                            <td data-field="ShipName" class="m-datatable__cell">
                                <span style="width: 150px;">Bergensgarasjen AS</span>
                            </td>
                            <td data-field="Currency" class="m-datatable__cell">
                                <span style="width: 100px;">Norway</span></td>
                            <td data-field="ShipAddress" class="m-datatable__cell">
                                <span style="width: 100px;">Partner</span>
                            </td>
                            <td data-field="ShipDate" class="m-datatable__cell">
                                <span style="width: 200px;">zipCode=from 5000 to 5500 - Material=</span>
                            </td>
                            <td data-field="Latitude" class="m-datatable__cell">
                                <span style="width: 100px;">Active</span>
                            </td>
                            <td data-field="Status" class="m-datatable__cell">
                                <span style="width: 100px;">
                                    <i class="fa fa-filter"></i>

                                </span>
                            </td>


                        </tr>
                     </tbody>

                     </table>

                </div>
        </div>


    </div>


    </div>



@endsection