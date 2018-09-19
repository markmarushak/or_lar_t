@extends('layouts.admin.app')
@section('content')
    <style>
        .wrap {
            max-width: 100%;
            overflow: scroll;
        }
        .block-scroll {
            min-width: max-content;
        }
        .wrap::-webkit-scrollbar{
            display: none;
        }
    </style>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <div class="container text-center" style="width: 100%">
                <div id="spinner" class="m-loader m-loader--success m-loader--lg col-md-6" style="margin-top: 50px; width: 30px; display: none;"></div>
            </div>
            <div class="wrap">
                <div class="block-scroll">
                    <table class="table m-table m-table--head-separator-primary"
                           id="m_table_2">

                        <thead>
                        <tr>

                            @foreach($column as $col)
                                <th data-field="Website" class="m-datatable__cell m-datatable__cell--sort">
                                    {{ $col['label'] }}
                                </th>
                            @endforeach

                        </tr>
                        </thead>

                        @foreach($rows as $row)
                            <tr>
                                <td>{{ $row['campaignName'] }}</td>
                                <td>{{ $row['campaignId'] }}</td>
                                <td>Private: {{ $row['campaignWorkspaceName'] }}</td>
                                <td>{{ $row['visits'] }}</td>
                                <td>{{ $row['clicks'] }}</td>
                                <td>{{ $row['conversions'] }}</td>
                                <td>{{ $row['revenue'] }}</td>
                                <td>{{ $row['cost'] }}</td>
                                <td>{{ $row['profit'] }}</td>
                                <td>{{ $row['cpv'] }}</td>
                                <td>{{ $row['ctr'] }}</td>
                                <td>{{ $row['cr'] }}</td>
                                <td>{{ $row['cv'] }}</td>
                                <td>{{ $row['roi'] }}</td>
                                <td>{{ $row['epv'] }}</td>
                                <td>{{ $row['epc'] }}</td>
                                <td>{{ $row['ap'] }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="pt-2">
                    <a href="#" onclick="window.location = '/affiliate-service/compaigns/add'" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="la la-plus"></i>
							<span id="add_btn">Add</span>
						</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
