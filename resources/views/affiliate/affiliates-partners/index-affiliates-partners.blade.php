@extends('layouts.admin.app')

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('errors')
            @if(isset($affiliates_data) && !empty($affiliates_data) )
            <div class="input-group">
                <div class="m-radio-inline col-xl-5">
                    <label class="m-radio">
                        <input type="radio" name="example_8" value="1" checked="checked">
                        Affiliate
                        <span></span>
                    </label>
                    <label class="m-radio">
                        <input type="radio" name="example_8" value="2">
                        Partner
                        <span></span>
                    </label>
                </div>
                <div class="ml-auto">
                    <input id="m_search_input" placeholder="Search" type="text"/>
                </div>
            </div>

            <table class="table m-table m-table--head-separator-primary"
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
                    <th>

                    </th>


                </tr>
                </thead>
                <tbody>
                    @foreach($affiliates_data as $row)
                        <tr>
                            <td>
                            </td>

                            <td>
                                <span style="width: 130px;">{{$row['id']}}</span>
                            </td>
                            <td>
                                <span style="width: 130px;">{{$row['description']}}</span>
                            </td>

                            <td>
                                <span style="width: 130px;">{{$row['country']}}</span>
                            </td>

                            <td>
                                <span style="width: 70px;">{{$row['type']}}</span>
                            </td>
                            <td>
                                <span style="width: 70px;" id="rule_id">{{$row['rules']}}</span>
                            </td>

                            <td>
                                 @if($row['status'] == true)
                                    <span style="overflow: visible; width: 70px;">
                                            <span class="m-badge m-badge--success">
                                                <span hidden="true">{{$row['status']}}</span>
                                            </span>
                                    </span>
                                 @else
                                    <span style="overflow: visible; width: 70px;">
                                            <span class="m-badge m-badge--danger">
                                                <span hidden="true">{{$row['status']}}</span>
                                            </span>
                                    </span>
                                 @endif
                            </td>

                            <td>
                                    <i class="la la-scissors" name="{{$row['id']}}"></i>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12 m--font-bolder">Enable conditional logic rules</label>
                <div class="col-lg-4 col-md-9 col-sm-12 mt-2">
                    <label class="m-checkbox m-checkbox--air m-checkbox--solid m-checkbox--state-brand">
                        <input type="checkbox" id="m_hide">
                        <span></span>
                    </label>

                </div>

            </div>
            <div id="div_hide" hidden="true">
                <form class="form-inline">
                    <div class="form-group m-form__group">

                        <div class=" form-group">
                            <select class="form-control" style="width:110px" id="m_notify_placement_from">
                                <option value="top">ZipCode</option>
                                <option value="bottom">Bottom</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <select class="form-control ml-3" id="m_notify_placement_from">
                                    <option value="top">From</option>
                                    <option value="bottom">Bottom</option>
                                </select>
                            </div>
                            <input type="text" class="form-control col-3 ml-3">
                        </div>
                        <div class="form-group">
                            <div class=" form-group">
                                <select class="form-control" id="m_notify_placement_from">
                                    <option value="top">To</option>
                                    <option value="bottom">Bottom</option>
                                </select>
                            </div>
                            <input type="text" class="form-control col-3 ml-3">
                            <button class="form-control ml-3 btn btn-success">Add</button>
                        </div>
                    </div>
                </form>
                <form class="form-inline">
                    <div class="form-group m-form__group pt-2">

                        <div class=" form-group">
                            <select class="form-control" style="width:110px" id="m_notify_placement_from">
                                <option value="top">Material</option>
                                <option value="bottom">Bottom</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control ml-3" id="m_notify_placement_from">
                                <option value="top">Is</option>
                                <option value="bottom">Bottom</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class=" form-group">
                                <select class="form-control ml-3" id="m_notify_placement_from">
                                    <option value="top">Stone</option>
                                    <option value="bottom">Bottom</option>
                                </select>
                            </div>
                            <button class="form-control ml-3 btn btn-success">Add</button>
                        </div>
                    </div>
                </form>
                <div class="pt-2">
                    <button class="btn btn-success">Add Rule</button>
                </div>

                <div class="pt-2">
                    <button class="btn btn-outline-info active">Save</button>
                </div>
            </div>
                <div class="pt-2">
                    <button class="btn btn-success" onclick="location.href=('{{route("add-affiliates-partners")}}')">Add Affiliates/Partners</button>
                </div>
            @endif
        </div>
    </div>
    @include('modal')




@endsection