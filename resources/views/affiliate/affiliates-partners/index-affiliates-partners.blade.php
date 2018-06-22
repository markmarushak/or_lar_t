@extends('layouts.admin.app')

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('errors')
            <div class="input-group">
                <div class="m-radio-inline col-xl-5">
                    <label class="m-radio">
                        <input type="radio" id="affiliate" name="a_type" value="Affiliate" checked="checked" onclick="showData()">
                        Affiliate
                        <span></span>
                    </label>
                    <label class="m-radio">
                        <input type="radio" id="partner" name="a_type" id="Partner" value="Partner" onclick="showData()">
                        Partner
                        <span></span>
                    </label>
                </div>
                <div class="ml-auto">
                    <input id="m_search_input" placeholder="Search" type="text" onkeyup="searchData()"/>
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
                <tbody id="aff_table">
                </tbody>
            </table>


                <div class="pt-2">
                    <button class="btn btn-success" onclick="location.href=('{{route("add-affiliates-partners")}}')">Add Affiliates/Partners</button>
                </div>
        </div>
    </div>
    @include('modal')




@endsection