@extends('layouts.admin.app')
@section('content')
    <style>
        .wrap {
            max-width: 100%;
            overflow: scroll;
            max-height: 325px;
        }
        .block-scroll {
            min-width: max-content;
        }
        .wrap::-webkit-scrollbar{
            display: none;
        }
    </style>
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

@endsection
