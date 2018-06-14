@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
@section('content')

    <div class="row">
        <div class="clearfix"></div>

            <div class="col-xl-4">
            </div>
        </div>

    <div class="col-xl-12" style="margin-top: 20px;">
        {{--Call Tab Menu--}}
        @include('affiliate.tabs-menu.top-menu')



        <div class="row">
            <div class="col-xl-8">
                <div class="qfb-dashboard qfb-cf">
                    <div class="qfb-db-row qfb-cf">
                        <div class="qfb-db-col-xl-12">
                            @include('errors')
                            @if(isset($forms) && !empty($forms) )
                            <div class="qfb-box">

                                <div class="qfb-cf">

                                    <h3 class="qfb-box-heading qfb-db-heading">

                                        <i class="mdi mdi-view_stream"></i>
                                        Forms                        </h3>
                                </div>
                                <div class="qfb-content qfb-form-switcher qfb-db-form-list">
                                    <ul class="qfb-nav-menu qfb-cf">
                                        @foreach($forms as $form)

                                        <li class="qfb-cf">
                                           <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&sp=edit&id=3">{{$form['name']}}<span class="qfb-fade-overflow"></span></a>
                                            <span class="qfb-form-switcher-icons">
                                            <a href="https://{{$dataFiltersRulesDescription}}/wp-admin/admin.php?page=quform.forms&sp=edit&id={{$form['id']}}"><i title="Edit this form" class="fa fa-pencil"></i></a>
                                        </span>
                                        </li>
                                        @endforeach
                                        <li class="qfb-cf qfb-form-switcher-add-form-button qfb-form-switcher-two-buttons">
                                            <a href="http://garasje-tilbud.no/wp-admin/admin.php?page=quform.forms&amp;sp=add">Add New</a>
                                        </li>

                                    </ul>

                                </div>

                            </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection