
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
            <div class="qfb-db-col">
                <div class="qfb-entry-left">
                    <div class="qfb-box" style="width: 713px">
                        <h3 class="qfb-entry-heading qfb-settings-heading"><i class="mdi mdi-message"></i>Submitted form data</h3>
                        <table class="qfb-entry-table">
                            <?php

                            use App\Plugins\QformLibrary\Quform;
                            use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Container;
                            use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Field;
                            use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Group;
                            use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Html;


                            foreach ($form->getRecursiveIterator(RecursiveIteratorIterator::SELF_FIRST) as $element) {
                                if ( ! $element instanceof Quform_Element_Field && ! $element instanceof Quform_Element_Container && ! $element instanceof Quform_Element_Html) {
                                    continue;
                                }

                                // Skip hidden elements
                                if ($element->isHidden()) {
                                    continue;
                                }

                                if ($element instanceof Quform_Element_Html) {
                                    if ($element->config('showInEntry')) {
                                        echo sprintf('<tr class="qfb-entry-row-html"><td colspan="2">%s</td></tr>', $element->getContent());
                                    }

                                    continue;
                                }


                                if ($element instanceof Quform_Element_Group) {
                                    if ($element->config('showLabelInEntry') && Quform::isNonEmptyString($element->config('label'))) {
                                        echo sprintf(
                                            '<tr colspan="2" class="qfb-entry-row-%s"><th><div class="qfb-entry-group-head">%s</div></th></tr>',
                                            $element->config('type'),
                                            Quform::escape($element->config('label'))
                                        );
                                    }
                                } else if ($element instanceof Quform_Element_Field) {
                                    if ($element->config('saveToDatabase')) {
                                        echo sprintf('<tr><th><div class="qfb-entry-element-label">%s</div></th></tr>', Quform::escape($element->getAdminLabel()));
                                        echo sprintf('<tr><td>%s</td></tr>', $element->getValueHtml());
                                    }
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>






@endsection