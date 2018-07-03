
@extends('layouts.admin.app')

@section('content')

    <div class="row">
        <div class="clearfix"></div>
            <div class="col-xl-4">
            </div>

        </div>

        {{--Call Tab Menu--}}
        @include('affiliate.tabs-menu.top-menu')
        @include('errors')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="project_id" value="{{ $dataFilterRulesId }}">
            <div class="m-portlet m-portlet--mobile">
                 <div class="m-portlet__body qfb-box">

                     <div id="auto_complete" class="input-group m-input-icon m-input-icon--left">
                         <input name="query" class="form-control col-4 m-input" id="query" placeholder="Search" type="text"/>
                         <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-map-marker"></i></span></span>
                         <a href="#" onclick="addPartner()" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air ml-4" id="ac_btn">
                            <span>
                                <i class="la la-plus"></i>
                                <span id="add_btn">Add</span>
                            </span>
                         </a>
                     </div>
                        <table class="table m-table m-table--head-separator-primary" id="m_table_4">
                            <thead>
                            <tr>
                             <!--   <th>

                                </th>-->
                                <th data-field="ID" class="m-datatable__cell m-datatable__cell--sort" data-sort="desc">
                                    <span style="width: 130px;">ID<i class="la la-arrow-down"></i></span>
                                </th>
                                <th data-field="FormID" class="m-datatable__cell m-datatable__cell--sort">
                                    <span style="width: 50px;">Description</span>
                                </th>
                                <th data-field="Unread" class="m-datatable__cell m-datatable__cell--sort">
                                    <span style="width: 60px;">Country</span>
                                </th>
                                <th data-field="IP" class="m-datatable__cell m-datatable__cell--sort">
                                    <span style="width: 100px;">Type</span>
                                </th>
                                <th data-field="FormUrl" class="m-datatable__cell m-datatable__cell--sort">
                                    <span style="width: 140px;">Rules</span>
                                </th>
                                <th>

                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                 </div>
            </div>

    {!! Html::script('js/dataFRData.js') !!}
    @include('affiliate.delete-modal')
@endsection