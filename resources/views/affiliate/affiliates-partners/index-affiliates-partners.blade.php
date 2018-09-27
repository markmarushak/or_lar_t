@extends('layouts.admin.app')

@section('content')

    {{--{{ dd($cols) }}--}}
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="index_id">
            @include('errors')
            <div class="input-group">
                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow" m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-dropdown__toggle btn btn-success dropdown-toggle-split" id="dropdownMenuButton" style="width: 120px; text-align: left">All
                    </a>
                    <div class="m-dropdown__wrapper" style="z-index: 101; width: 120px">
                        <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__item">
                                            <a href="#" class="m-nav__link" onclick="changeType('All')">
                                                <i class="m-nav__link-icon flaticon-users"> </i>
                                                <span class="m-nav__link-text">All</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="#" class="m-nav__link" onclick="changeType('Affiliate')">
                                                <i class="m-nav__link-icon flaticon-users"> </i>
                                                <span class="m-nav__link-text">Affiliates</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="#" class="m-nav__link" onclick="changeType('Partner')">
                                                <i class="m-nav__link-icon flaticon-users"> </i>
                                                <span class="m-nav__link-text">Partners</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-auto">
                    <input id="m_search_input" placeholder="Search" type="text" onkeyup="searchData()"/>
                </div>
            </div>
            <div class="container text-center" id="spinner" style="display: none; width: 100%">
                <div class="m-loader m-loader--success m-loader--lg col-md-6" style="margin-top: 50px; width: 30px; display: inline-block;"></div>
            </div>

            <table class="table m-table m-table--head-separator-primary"
                   id="m_table_2" style="display: none">
                <thead>
                <tr>
                    <th data-field="ID" class="m-datatable__cell m-datatable__cell--sort">

                        <span style="width: 130px;">ID</span>
                    </th>

                    <th data-field="Name" class="m-datatable__cell m-datatable__cell--sort">

                        <span style="width: 130px;">Name</span>
                    </th>

                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">

                        <span style="width: 130px;">Descriptions</span>
                    </th>

                    <th data-field="Website" class="m-datatable__cell m-datatable__cell--sort">

                        <span style="width: 130px;">Website</span>
                    </th>

                    <th data-field="Address" class="m-datatable__cell m-datatable__cell--sort">

                        <span style="width: 130px;">Address</span>
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
                    <a href="#" onclick="window.location = '\affiliates-partners\/add-affiliates-partners'" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span id="add_btn">Add</span>
						</span>
                    </a>
                </div>
        </div>
    </div>

    {!! Html::script('js/crud.js') !!}

    @include('affiliate.affiliates-partners.modal')
    @include('affiliate.delete-modal')




@endsection