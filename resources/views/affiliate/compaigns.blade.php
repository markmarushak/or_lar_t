@extends('layouts.admin.app')
@section('content')
    <style>
        .hided {
            opacity: .5;
        }
        .block-scroll tr, .block-scroll td {
            max-width: 200px;
            overflow: hidden;
            white-space: nowrap;
        }
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
        .block-scroll tr,.block-scroll td {transition: all .5s;}
        .block-scroll tr:hover {
            background: #f2f3f8;
        }
        .block-scroll td:hover {
            background: #2c2e3e;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <div class="container text-center" style="width: 100%">
                <div id="spinner" class="m-loader m-loader--success m-loader--lg col-md-6" style="margin-top: 50px; width: 30px; display: none;"></div>
            </div>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Limit
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">50</a>
                        <a class="dropdown-item" href="#">100</a>
                        <a class="dropdown-item" href="#">200</a>
                        <a class="dropdown-item" href="#">500</a>
                        <a class="dropdown-item" href="#">1000</a>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">Archived</a>
                        <a class="dropdown-item" href="#">With traffic</a>
                        <a class="dropdown-item" href="#">Active</a>
                    </div>
                </div>
            </div>
            <div class="wrap">
                <div class="block-scroll">
                    <table class="table m-table m-table--head-separator-primary"
                           id="m_table_2">

                        <thead>
                        <tr>

                            @foreach($cols as $col)
                                <th data-field="Website" class="m-datatable__cell m-datatable__cell--sort">
                                    {{ $col['label'] }}
                                </th>
                            @endforeach

                        </tr>
                        </thead>
                            @foreach($result['rows'] as $rows)
                                <tr>
                                @foreach($cols as $col)
                                    <td>
                                        {{ $rows[$col['key']] }}
                                    </td>
                                @endforeach
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

    {{ Html::script('js/campaigns.js') }}

    <script>
        $(document).ready(function () {

            $('td').click(function () {
               $('td').addClass('hided');
               $(this).removeClass('hided');
               $(this).mouseleave(function () {
                  $('td').removeClass('hided');
               });
            });

        });

    </script>

@endsection
