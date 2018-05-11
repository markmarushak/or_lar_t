
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


                <div class="row m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="">
                    <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                        <thead class="m-datatable__head">
                        <tr class="m-datatable__row" style="left: 0px;">
                            <th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                <span style="width: 10px;">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox">
                                        <span>
                                        </span>
                                    </label>
                                </span>
                            </th>
                            <th data-field="ID" class="m-datatable__cell m-datatable__cell--sort" data-sort="desc">
                                <span style="width: 30px;">ID<i class="la la-arrow-down"></i></span>
                            </th>
                            <th data-field="FormID" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 50px;">Form ID</span>
                            </th>
                            <th data-field="Unread" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 60px;">Unread</span>
                            </th>
                            <th data-field="IP" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">IP</span>
                            </th>
                            <th data-field="FormUrl" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 140px;">Form Url</span>
                            </th>
                            <th data-field="PostID" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 40px;">Post ID</span>
                            </th>
                            <th data-field="CreatedBY" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 60px;">Created By</span>
                            </th>
                            <th data-field="CreatedAT" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 60px;">Created At</span>
                            </th>

                            <th data-field="UpdatedAT" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 100px;">Updated At</span>
                            </th>
                            <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 50px;">Status</span>
                            </th>

                            <th data-field="EntryID" class="m-datatable__cell m-datatable__cell--sort">
                                <span style="width: 50px;">Entry ID</span>
                            </th>

                            <th data-field="ElementID" class="m-datatable__cell m-datatable__cell--sort">
                                <span >Element ID</span>
                            </th>

                            <th data-field="Value" class="m-datatable__cell m-datatable__cell--sort">
                                <span>Value</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="m-datatable__body" style="">


                        @foreach($data as $row)
                        <tr data-row="0" class="m-datatable__row" style="left: 0px;">
                            <td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                <span style="width: 10px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input value="80" type="checkbox"><span></span></label></span>
                            </td>
                            <td data-field="ID" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 30px;">{{$row->id}}</span>
                            </td>
                            <td data-field="FormID" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 50px;">{{$row->form_id}}</span>
                            </td>
                            <td data-field="Unread" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 60px;">{{$row->unread}}</span>
                            </td>
                            <td data-field="IP" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 100px;">{{$row->ip}}</span>
                            </td>
                            <td data-field="FormUrl" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 140px;">{{$row->form_url}}</span>
                            </td>
                            <td data-field="PostID" class="m-datatable__cell--sorted m-datatable__cell">

                                <span style="width: 30px;">
                                @if(isset($row->post_id))
                                    {{$row->post_id}}</span>
                                @else
                                    None
                                @endif
                                </span>
                            </td>
                            <td data-field="CreatedBY" class="m-datatable__cell--sorted m-datatable__cell"
                                <span style="width: 50px;">
                                {{$row->created_by}}
                                </span>
                            </td>
                            <td data-field="CreatedAT" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 50px;">{{$row->created_at}}</span>
                            </td>
                            <td data-field="UpdatedAT" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 100px;">{{$row->updated_at}}</span>
                            </td>
                            <td data-field="Status" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 50px;">{{$row->status}}</span>
                            </td>
                            <td data-field="EntryID" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 50px;">{{$row->entry_id}}</span>
                            </td>
                            <td data-field="ElementID" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 50px;">{{$row->element_id}}</span>
                            </td>
                            <td data-field="Value" class="m-datatable__cell--sorted m-datatable__cell">
                                <span style="width: 50px;">{{$row->value}}</span>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection