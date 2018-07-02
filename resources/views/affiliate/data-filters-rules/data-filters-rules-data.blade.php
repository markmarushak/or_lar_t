
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
                {{--<div class="form-group m-form__group row pt-4">--}}
                    {{--<label for="host" class="col-form-label col-lg-3 col-sm-12">--}}
                        {{--Enable conditional logic rules:--}}
                    {{--</label>--}}
                    {{--<div class="col-3">--}}
											{{--<span class="m-switch m-switch--outline m-switch--icon m-switch--success">--}}
												{{--<label>--}}
						                        {{--<input type="checkbox" name="" id="rules_switch" onclick="showConditionalLogic()">--}}
						                        {{--<span></span>--}}
						                        {{--</label>--}}
						                    {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div id="div_hide" hidden="true">--}}
                    {{--<form class="form-inline">--}}
                        {{--<div class="form-group m-form__group">--}}

                            {{--<div class=" form-group">--}}
                                {{--<select class="form-control" style="width:110px" id="m_notify_placement_from">--}}
                                    {{--<option value="top">ZipCode</option>--}}
                                    {{--<option value="bottom">Bottom</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="form-group">--}}
                                    {{--<select class="form-control ml-3" id="m_notify_placement_from">--}}
                                        {{--<option value="top">From</option>--}}
                                        {{--<option value="bottom">Bottom</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<input type="text" class="form-control col-3 ml-3">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class=" form-group">--}}
                                    {{--<select class="form-control" id="m_notify_placement_from">--}}
                                        {{--<option value="top">To</option>--}}
                                        {{--<option value="bottom">Bottom</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<input type="text" class="form-control col-3 ml-3">--}}
                                {{--<div class="ml-3">--}}
                                    {{--<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">--}}
						{{--<span>--}}
							{{--<i class="la la-plus"></i>--}}
							{{--<span id="add_btn">Add</span>--}}
						{{--</span>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    {{--<form class="form-inline">--}}
                        {{--<div class="form-group m-form__group pt-2">--}}

                            {{--<div class=" form-group">--}}
                                {{--<select class="form-control" style="width:110px" id="m_notify_placement_from">--}}
                                    {{--<option value="top">Material</option>--}}
                                    {{--<option value="bottom">Bottom</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<select class="form-control ml-3" id="m_notify_placement_from">--}}
                                    {{--<option value="top">Is</option>--}}
                                    {{--<option value="bottom">Bottom</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class=" form-group">--}}
                                    {{--<select class="form-control ml-3" id="m_notify_placement_from">--}}
                                        {{--<option value="top">Stone</option>--}}
                                        {{--<option value="bottom">Bottom</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div class="ml-3">--}}
                                    {{--<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">--}}
						{{--<span>--}}
							{{--<i class="la la-plus"></i>--}}
							{{--<span id="add_btn">Add</span>--}}
						{{--</span>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    {{--<div class="pt-2">--}}
                        {{--<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">--}}
						{{--<span>--}}
							{{--<i class="la la-plus"></i>--}}
							{{--<span id="add_btn">Add Rule</span>--}}
						{{--</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


    <div class="modal fade show" id="m_modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 15px; background: rgba(20, 20, 20, 0.9)" hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('modal_delete')">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    {!! Html::script('js/dataFRData.js') !!}
@endsection