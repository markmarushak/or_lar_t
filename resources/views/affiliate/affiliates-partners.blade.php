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
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>

                            <th>
                                RecordID
                            </th>
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
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <span style="width: 130px;"></span>
                                </td>

                                <td>
                                    <span style="width: 130px;"></span>
                                </td>

                                <td>
                                    <span style="width: 70px;"></span>
                                </td>
                                <td>
                                    <span style="width: 70px;"></span>
                                </td>

                                <td>
                            <span style="width: 70px;"><a
                                        href=""> /varww
                                    edit
                                </a></span>
                                </td>

                                <td>
                               <span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide"></span>
                               </span>
                                </td>
                                <td>
                                </td>

                            </tr>

                        </tbody>
                    </table>

                    <div class="col-3">
                        <span class="m-switch m-switch--icon m-switch--success">
                            <label>
                                <input type="checkbox" checked="checked" name="">
                                <span></span>
                            </label>
                        </span>
                    </div>


                </div>
            </div>

        </div>
    </div>



@endsection