@extends('layouts.admin.app')

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="index_id">
            @include('errors')
            <div class="input-group">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" style="width: 140px; text-align: left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="All">All
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                        <a class="dropdown-item" href="#" onclick="changeType('All')">All</a>
                        <a class="dropdown-item" href="#" onclick="changeType('Affiliate')">Affiliate</a>
                        <a class="dropdown-item" href="#" onclick="changeType('Partner')">Partner</a>
                    </div>
                </div>
                <div class="ml-auto">
                    <input id="m_search_input" placeholder="Search" type="text" onkeyup="searchData()"/>
                </div>
            </div>

            <table class="table m-table m-table--head-separator-primary"
                   id="m_table_2">
                <thead>
                <tr>
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

                    <th>

                    </th>


                </tr>
                </thead>
                <tbody id="aff_table">

                </tbody>
            </table>


                <div class="pt-2">
                    <a href="#" onclick="window.location = laroute.action('add-affiliates-partners', {type: $('#dropdownMenuButton').text()})" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span id="add_btn">Add</span>
						</span>
                    </a>
                </div>
        </div>
    </div>
    <div class="modal fade show" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 15px; background: rgba(20, 20, 20, 0.9)" hidden="true">
        <div class="modal-dialog modal-sm" role="document" style="top:20%">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <h5 class="modal-title" id="exampleModalLabel">Delete <span id="aff"></span> with:
                        </h5>
                    </div>
                    <div>
                        <h5 class="modal-title" id="exampleModalLabel">id: <span style="color:red" id="aff_id"></span>
                        </h5>
                    </div>
                    <div>
                         <h5 class="modal-title" id="exampleModalLabel">description: <span style="color:red" id="aff_descr"></span>?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="deleteRow()">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('modal_4')">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {!! Html::script('js/crud.js') !!}
    @include('affiliate.affiliates-partners.modal')




@endsection