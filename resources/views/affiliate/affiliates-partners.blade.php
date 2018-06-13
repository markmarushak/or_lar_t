@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'
      type='text/css' media='all'/>
@section('content')

    <div class="row">

        <div class="clearfix"></div>

        <div class="col-xl-4">
        </div>

    </div>

    <div class="col-xl-12" style="margin-top: 20px;">

        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="m-content">
                            <div class="m-portlet m-portlet--mobile">
                                <div class="m-portlet__body">

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
                                    </div>

                                    <table class="table table-striped- table-bordered table-hover table-checkable cell-border "
                                           id="m_table_2">
                                        <thead>
                                        <tr>

                                            <th>

                                            </th>
                                            <th data-field="ID" class="m-datatable__cell m-datatable__cell--sort">

                                                <span style="width: 130px;">ID</span>
                                            </th>

                                            <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">

                                                <span style="width: 130px;">Descriptions</span>
                                            </th>

                                            <th data-field="Country" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 70px;">Country</span>
                                            </th>

                                            <th data-field="Department"
                                                class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 70px;">Type</span>
                                            </th>

                                            <th data-field="Rules" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 130px;">Rules</span>
                                            </th>

                                            <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                                                <span style="width: 70px;">Status</span>
                                            </th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>
                                            </td>

                                            <td>
                                                1
                                            </td>
                                            <td>
                                                <span style="width: 130px;">Bargensgarajen AS</span>
                                            </td>

                                            <td>
                                                <span style="width: 130px;">Norway</span>
                                            </td>

                                            <td>
                                                <span style="width: 70px;">Partner</span>
                                            </td>
                                            <td>
                                                <span style="width: 70px;">ZipCode=from 5000 to 5500 - Material = Stone </span>
                                            </td>

                                            <td>
                               <span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide">status</span>
                               </span>
                                            </td>


                                        </tr>

                                        </tbody>
                                    </table>


                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Enable conditional logic rules</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">


                                                    <input data-switch="true"
                                                                                                  type="checkbox"
                                                                                                  data-on-color="brand"
                                                                                                  id="m_notify_icon">
                                                </div>

                                        </div>
                                    <div class="form-group m-form__group row">

                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <select class="form-control m-input--fixed" id="m_notify_placement_from">
                                                <option value="top">ZipCode</option>
                                                <option value="bottom">Bottom</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <select class="form-control m-input--fixed m-input--slim" id="m_notify_placement_from">
                                                <option value="top">ZipCode</option>
                                                <option value="bottom">Bottom</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <select class="form-control m-input--fixed m-input--slim" id="m_notify_placement_from">
                                                <option value="top">ZipCode</option>
                                                <option value="bottom">Bottom</option>
                                            </select>
                                        </div>
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