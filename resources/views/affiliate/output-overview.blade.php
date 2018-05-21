
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

        <div class="tab-content">
            <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                <div class="qfb-cf qfb-entry-wrap">
                <div class="qfb-entry-left">
                    <div class="qfb-box">
                        <div class="qfb-entry-show-empty-wrap"><form><label> </label></form></div>
                        <h3 class="qfb-entry-heading qfb-settings-heading"><i class="mdi mdi-message"></i></h3>
                        <table class="qfb-entry-table">
                            <?php

                            use App\Plugins\QformLibrary\Quform;use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Container;use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Field;use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Group;use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Html;foreach ($form->getRecursiveIterator(RecursiveIteratorIterator::SELF_FIRST) as $element) {
                                if ( ! $element instanceof Quform_Element_Field && ! $element instanceof Quform_Element_Container && ! $element instanceof Quform_Element_Html) {

                                    continue;
                                }


                                if ($element instanceof Quform_Element_Group) {

                                } else if ($element instanceof Quform_Element_Field) {
                                    if ($element->config('saveToDatabase')) {

                                        $var =$element->getAdminLabel();

                                        echo sprintf('<tr><th><div class="qfb-entry-element-label">%s</div></th></tr>', Quform::escape($element->getAdminLabel()));
                                        echo sprintf('<tr><td>%s</td></tr>', $element->getValueHtml());
                                    }
                                }
                            }
                            ?>











                           <?php
                            for ($i = 0; $i < count($entry); $i++)
                            echo '<tr><th><div class="qfb-entry-element-label">'.$entry[$i].'</div></th></tr>'.'<tr><td>'.$labels[$i].'</td></tr>';
                             ?>

                        </table>
                    </div>
                </div>


            </div>
        </div>
        </div>

    </div>






@endsection