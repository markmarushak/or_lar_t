@extends('layouts.admin.app')
@section('content')


    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
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
                @foreach($dataFiltersRules as $row)
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <span style="width: 130px;">{{$row->description}}</span>
                        </td>

                        <td>
                            <span style="width: 130px;">{{$row->category}}</span>
                        </td>

                        <td>
                            <span style="width: 70px;">{{$row->source}}</span>
                        </td>
                        <td>
                            <span style="width: 70px;">{{$row->type}}</span>
                        </td>

                        <td>
                            <span style="width: 70px;"><a
                                        href="{{ route('form-builder', ['data_filters_rules_id' => $row->data_filters_rules_id, 'data_filters_rules_description' => $row->description]) }}">
                                    edit
                                </a></span>
                        </td>

                        <td>
                               <span style="overflow: visible; width: 70px;">
                                    <span class="m-badge  m-badge--success m-badge--wide">{{$row->status}}</span>
                               </span>
                        </td>
                        <td>
                            {{$row->country}}
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {{--<input type="submit" class="form-control m-input btn-primary text-white" value="Submit">--}}
            <div class="form-group m-form__group row">
                <div class="offset-10 col-lg-2 col-md-9 col-sm-12">
                    <a href="{{route('data-filters-rules-add')}}" class="form-control m-input btn-primary text-white btn-no-underline">Add</a>
                </div>
            </div>
        </div>
    </div>
@endsection