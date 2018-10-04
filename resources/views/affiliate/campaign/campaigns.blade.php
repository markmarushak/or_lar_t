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
        .block-scroll tr.string, .block-scroll td.string {
            max-width: max-content;
        }
        .block-scroll tr.double, .block-scroll td.double {
            max-width: min-content;
        }
        .wrap {
            max-width: 100%;
            overflow-y: scroll;
            max-height: 300px;
        }
        .block-scroll {
            min-width: max-content;
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

        .show > * {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
            width: max-content;
            min-width: 100%;
            padding: 6px 7px;
            border-bottom: 1px solid #aaa;
        }
        .control-cols {
            max-height: 350px;
            overflow-y: scroll;
        }
    </style>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">

                {{--<div class="btn-group" role="group">--}}
                    {{--<button id="btnGroupDrop1" data-param="limit" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Limit--}}
                    {{--</button>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
                        {{----}}
                    {{--</div>    --}}
                {{--</div>--}}
                {{--<div class="btn-group" role="group">--}}
                    {{--<button id="btnGroupDrop1" data-param="include" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--status--}}
                    {{--</button>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}


                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-12 form-inline">
                    <div class="col-sm-7 form-inline">
                        <div class="form-group">
                            <select name="time" id="time" class="form-control">

                            </select>
                        </div>
                        <div class="form-group">
                            <select name="limit" id="limit" class="form-control">
                                <option value="0">choice limit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="include" id="include" class="form-control">

                            </select>
                        </div>
                        <div class="dropdown">

                            <button id="control-col" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Control column
                            </button>
                            <div class="dropdown-menu control-cols" aria-labelledby="control-col">
                                @foreach($cols as $col)
                                    @if($col['status'] == 1)
                                        <label>
                                            <input type="checkbox" name="{{ $col['id'] }}" value="{{ $col['status'] }}" checked>
                                            {{ $col['label'] }}
                                        </label>
                                    @else
                                        <label>
                                            <input type="checkbox" name="{{ $col['id'] }}" value="{{ $col['status'] }}" >
                                            {{ $col['label'] }}
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            <div class="container text-center" id="spinner" style="display: none; width: 100%">
                <div class="m-loader m-loader--success m-loader--lg col-md-6" style="margin-top: 50px; width: 30px; display: inline-block;"></div>
            </div>
            <div class="wrap">
                <div class="block-scroll">
                    <table id="t-info" class="table m-table m-table--head-separator-primary"
                           id="m_table_2">

                        <thead id="t-head">
                        <tr>

                            @foreach($cols as $col)

                                @if($col['status'] == 1)
                                    @if(strcasecmp($col['key'],'campaignName') == 0)
                                        <th class="string">
                                            {{ $col['label'] }}
                                        </th>
                                    @elseif(strcasecmp($col['type'],'double') == 0)
                                        <th class="double">
                                            {{ $col['label'] }}
                                        </th>
                                    @else
                                        <th>
                                            {{ $col['label'] }}
                                        </th>
                                    @endif
                                @endif

                            @endforeach

                        </tr>
                        </thead>
                        <tbody id="t-body">
                            @foreach($result['rows'] as $row)
                                <tr>
                                    @foreach($cols as $col)
                                        @if($col['status'] == 1)
                                            @if(strcasecmp($col['key'],'campaignName') == 0)
                                                <th class="string">
                                                    {{ $row[$col['key']] }}
                                                </th>
                                            @elseif(strcasecmp($col['type'],'double') == 0)
                                                <th class="double">
                                                    {{ $row[$col['key']] }}
                                                </th>
                                            @else
                                                <td>
                                                    {{ $row[$col['key']] }}
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>

                            @endforeach
                        </tbody>

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
