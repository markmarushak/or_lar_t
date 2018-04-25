
@extends('layouts.admin.app')
<link rel='stylesheet' id='quform-css'  href='http://garasje-tilbud.no/modules/quform/cache/quform.css?ver=1521656337' type='text/css' media='all' />
@section('content')

    <div class="row">
        <div class="col-xl-12">

            <div class="form-group m-form__group col-xl-3">
                <div class="input-group">

                    <input type="text" class="form-control" placeholder="Search for...">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="button">Search</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>


            <div class="col-xl-4">
                <strong>{!!$dataFiltersRuleRow->description!!} -  Form Frontpage</strong>
            </div>
            <div class="col-xl-4">
                Table Name:  <strong>wpau_quform_forms</strong>
            </div>
            <div class="col-xl-4">
                | Data fields: <strong>17</strong>
            </div>
        </div>

    <div class="col-xl-10" style="margin-top: 20px;">


        <div id="quform-5206b2" class="quform quform-1"><form id="quform-form-5206b2" class="quform-form quform-form-1" action="http://garasje-tilbud.no/#quform-5206b2" method="POST" enctype="multipart/form-data" novalidate="novalidate" data-options="{&quot;id&quot;:1,&quot;uniqueId&quot;:&quot;5206b2&quot;,&quot;theme&quot;:&quot;&quot;,&quot;ajax&quot;:true,&quot;logic&quot;:{&quot;logic&quot;:{&quot;22&quot;:{&quot;action&quot;:true,&quot;match&quot;:&quot;all&quot;,&quot;rules&quot;:[{&quot;elementId&quot;:&quot;20&quot;,&quot;operator&quot;:&quot;eq&quot;,&quot;optionId&quot;:&quot;1&quot;,&quot;value&quot;:&quot;GARASJE&quot;}]},&quot;59&quot;:{&quot;action&quot;:true,&quot;match&quot;:&quot;all&quot;,&quot;rules&quot;:[{&quot;elementId&quot;:&quot;20&quot;,&quot;operator&quot;:&quot;eq&quot;,&quot;optionId&quot;:&quot;2&quot;,&quot;value&quot;:&quot;GARASJEPORT&quot;}]},&quot;68&quot;:{&quot;action&quot;:true,&quot;match&quot;:&quot;all&quot;,&quot;rules&quot;:[{&quot;elementId&quot;:&quot;61&quot;,&quot;operator&quot;:&quot;gt&quot;,&quot;optionId&quot;:null,&quot;value&quot;:&quot;1&quot;}]},&quot;69&quot;:{&quot;action&quot;:true,&quot;match&quot;:&quot;all&quot;,&quot;rules&quot;:[{&quot;elementId&quot;:&quot;20&quot;,&quot;operator&quot;:&quot;eq&quot;,&quot;optionId&quot;:&quot;1&quot;,&quot;value&quot;:&quot;GARASJE&quot;}]},&quot;46&quot;:{&quot;action&quot;:true,&quot;match&quot;:&quot;all&quot;,&quot;rules&quot;:[{&quot;elementId&quot;:&quot;20&quot;,&quot;operator&quot;:&quot;eq&quot;,&quot;optionId&quot;:&quot;2&quot;,&quot;value&quot;:&quot;GARASJEPORT&quot;}]}},&quot;dependents&quot;:{&quot;20&quot;:[22,59,69,46],&quot;61&quot;:[68]},&quot;elementIds&quot;:[22,59,68,69,46],&quot;dependentElementIds&quot;:[&quot;20&quot;,&quot;61&quot;],&quot;animate&quot;:true},&quot;currentPageId&quot;:1,&quot;errorsIcon&quot;:&quot;&quot;,&quot;updateFancybox&quot;:true,&quot;hasPages&quot;:true,&quot;pages&quot;:[1,69,46,8],&quot;pageProgressType&quot;:&quot;&quot;,&quot;tooltipsEnabled&quot;:true,&quot;tooltipClasses&quot;:&quot;qtip-quform-dark qtip-shadow&quot;,&quot;tooltipMy&quot;:&quot;left center&quot;,&quot;tooltipAt&quot;:&quot;right center&quot;,&quot;scrollOffset&quot;:-50,&quot;scrollSpeed&quot;:800}" encoding="multipart/form-data"><button class="quform-default-submit" name="quform_submit" type="submit" value="submit"></button><div class="quform-form-inner quform-form-inner-1"><input type="hidden" name="quform_form_id" value="1"><input type="hidden" name="quform_form_uid" value="5206b2"><input type="hidden" name="quform_count" value="1"><input type="hidden" name="form_url" value="http://garasje-tilbud.no/"><input type="hidden" name="referring_url" value=""><input type="hidden" name="post_id" value="350"><input type="hidden" name="post_title" value="Hjem - Garasjer skreddersydd etter dine behov"><input type="hidden" name="quform_current_page_id" value="1"><input type="hidden" name="quform_csrf_token" value="VEsClgoPaUrLLfHEAyeDJseGRkTCgDxh8PRrRMCx"><div class="quform-elements quform-elements-1 quform-cf"><div class="quform-element quform-element-page quform-page-1 quform-page-1_1 quform-cf quform-group-style-plain quform-first-page quform-current-page" style="display: block;"><div class="quform-child-elements"><div class="quform-element quform-element-radio quform-element-1_20 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-inner quform-inner-radio quform-inner-1_20 quform-field-size-medium"><div class="quform-input quform-input-radio quform-input-1_20 quform-cf"><div class="quform-options quform-cf quform-options-columns quform-2-columns quform-responsive-columns-phone-landscape quform-options-style-button quform-button-style-bootstrap-primary quform-button-size-medium quform-button-icon-left"><div class="quform-option"><input type="radio" name="quform_1_20" id="quform_1_20_5206b2_1" class="quform-field quform-field-radio quform-field-1_20 quform-field-1_20_1" value="GARASJE" checked=""><label for="quform_1_20_5206b2_1" class="quform-option-label quform-option-label-1_20_1"><span class="quform-option-icon-selected"><i class="fa fa-check"></i></span><span class="quform-option-text">GARASJE</span></label></div><div class="quform-option"><input type="radio" name="quform_1_20" id="quform_1_20_5206b2_2" class="quform-field quform-field-radio quform-field-1_20 quform-field-1_20_2" value="GARASJEPORT"><label for="quform_1_20_5206b2_2" class="quform-option-label quform-option-label-1_20_2"><span class="quform-option-icon-selected"><i class="fa fa-check"></i></span><span class="quform-option-text">GARASJEPORT</span></label></div></div></div></div></div></div><div class="quform-element quform-element-group quform-element-1_22 quform-cf quform-group-style-plain" style="display: block;"><div class="quform-spacer"><div class="quform-child-elements"><div class="quform-element quform-element-checkbox quform-element-1_30 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_30"><label class="quform-label-text">Behov:</label></div><div class="quform-inner quform-inner-checkbox quform-inner-1_30 quform-field-size-medium"><div class="quform-input quform-input-checkbox quform-input-1_30 quform-cf"><div class="quform-options quform-cf quform-options-block quform-options-style-button quform-button-width-full quform-button-icon-left"><div class="quform-option"><input type="checkbox" name="quform_1_30[]" id="quform_1_30_5206b2_1" class="quform-field quform-field-checkbox quform-field-1_30 quform-field-1_30_1" value="Enkeltgarasje ink. garasjeport"><label for="quform_1_30_5206b2_1" class="quform-option-label quform-option-label-1_30_1"><span class="quform-option-icon"><i class="fa fa-circle-thin"></i></span><span class="quform-option-icon-selected"><i class="fa fa-check"></i></span><span class="quform-option-text">Enkeltgarasje ink. garasjeport</span></label></div><div class="quform-option"><input type="checkbox" name="quform_1_30[]" id="quform_1_30_5206b2_5" class="quform-field quform-field-checkbox quform-field-1_30 quform-field-1_30_5" value="Dobbeltgarasje ink. garasjeport"><label for="quform_1_30_5206b2_5" class="quform-option-label quform-option-label-1_30_5"><span class="quform-option-icon"><i class="fa fa-circle-thin"></i></span><span class="quform-option-icon-selected"><i class="fa fa-check"></i></span><span class="quform-option-text">Dobbeltgarasje ink. garasjeport</span></label></div><div class="quform-option"><input type="checkbox" name="quform_1_30[]" id="quform_1_30_5206b2_4" class="quform-field quform-field-checkbox quform-field-1_30 quform-field-1_30_4" value="Ikke bestemt/annet"><label for="quform_1_30_5206b2_4" class="quform-option-label quform-option-label-1_30_4"><span class="quform-option-icon"><i class="fa fa-circle-thin"></i></span><span class="quform-option-icon-selected"><i class="fa fa-check"></i></span><span class="quform-option-text">Ikke bestemt/annet</span></label></div></div></div></div></div></div><div class="quform-element quform-element-select quform-element-1_25 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_25"><label class="quform-label-text" for="quform_1_25_5206b2">Byggestart</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="0"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_25 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_25 quform-cf"><select id="quform_1_25_5206b2" name="quform_1_25" class="quform-field quform-field-select quform-field-1_25"><option value="2018">2018</option><option value="2019">2019</option><option value="Ikke bestemt">Ikke bestemt</option></select></div></div></div></div><div class="quform-element quform-element-text quform-element-1_42 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_42"><label class="quform-label-text" for="quform_1_42_5206b2">Gateadresse</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="1"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-text quform-inner-1_42 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_42 quform-cf"><input type="text" id="quform_1_42_5206b2" name="quform_1_42" class="quform-field quform-field-text quform-field-1_42"></div></div></div></div><div class="quform-element quform-element-text quform-element-1_37 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_37"><label class="quform-label-text" for="quform_1_37_5206b2">Postnummer</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="2"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-text quform-inner-1_37 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_37 quform-cf"><input type="text" id="quform_1_37_5206b2" name="quform_1_37" class="quform-field quform-field-text quform-field-1_37"></div></div></div></div></div></div></div><div class="quform-element quform-element-group quform-element-1_59 quform-cf quform-group-style-plain" style="display: none;"><div class="quform-spacer"><div class="quform-child-elements"><div class="quform-element quform-element-select quform-element-1_61 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_61"><label class="quform-label-text" for="quform_1_61_5206b2">Antall garasjeporter</label></div><div class="quform-inner quform-inner-select quform-inner-1_61 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_61 quform-cf"><select id="quform_1_61_5206b2" name="quform_1_61" class="quform-field quform-field-select quform-field-1_61"><option value="1">1</option><option value="2">2</option><option value="Flere">Flere</option></select></div></div></div></div><div class="quform-element quform-element-text quform-element-1_63 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_63"><label class="quform-label-text" for="quform_1_63_5206b2">Bredde portåpning (Lysåpning)</label></div><div class="quform-inner quform-inner-text quform-inner-1_63 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_63 quform-cf quform-has-field-icon-right"><input type="text" id="quform_1_63_5206b2" name="quform_1_63" class="quform-field quform-field-text quform-field-1_63" placeholder="300 cm"><span class="quform-field-icon quform-field-icon-right"><i class="fa fa-check"></i></span></div></div></div></div><div class="quform-element quform-element-text quform-element-1_65 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_65"><label class="quform-label-text" for="quform_1_65_5206b2">Høyde portåpning (Lysåpning)</label></div><div class="quform-inner quform-inner-text quform-inner-1_65 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_65 quform-cf"><input type="text" id="quform_1_65_5206b2" name="quform_1_65" class="quform-field quform-field-text quform-field-1_65" placeholder="250 cm"></div></div></div></div><div class="quform-element quform-element-text quform-element-1_66 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_66"><label class="quform-label-text" for="quform_1_66_5206b2">Overhøyde</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="3"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Avstand fra portåpning opp til innvendig tak</div></div></div><div class="quform-inner quform-inner-text quform-inner-1_66 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_66 quform-cf"><input type="text" id="quform_1_66_5206b2" name="quform_1_66" class="quform-field quform-field-text quform-field-1_66" placeholder="50 cm (valgfritt)"></div></div></div></div><div class="quform-element quform-element-text quform-element-1_67 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_67"><label class="quform-label-text" for="quform_1_67_5206b2">Avstand fra portåpning til innvendig sidevegg</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="4" aria-describedby="qtip-4"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Avstand fra portåpning opp til innvendig tak</div></div></div><div class="quform-inner quform-inner-text quform-inner-1_67 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_67 quform-cf"><input type="text" id="quform_1_67_5206b2" name="quform_1_67" class="quform-field quform-field-text quform-field-1_67" placeholder="25 cm h.side, 50 cm v. side (frivillig)"></div></div></div></div><div class="quform-element quform-element-text quform-element-1_68 quform-cf quform-element-optional" style="display: none;"><div class="quform-spacer"><div class="quform-label quform-label-1_68"><label class="quform-label-text" for="quform_1_68_5206b2">Avstand mellom portåpningene</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="5"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Avstand fra portåpning opp til innvendig tak</div></div></div><div class="quform-inner quform-inner-text quform-inner-1_68 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_68 quform-cf"><input type="text" id="quform_1_68_5206b2" name="quform_1_68" class="quform-field quform-field-text quform-field-1_68" placeholder="50  (valgfritt)"></div></div></div></div></div></div></div><div class="quform-element quform-element-submit quform-element-1_2 quform-cf quform-button-style-sexy-silver quform-button-size-medium quform-button-width-full"><div class="quform-button-next quform-button-next-default quform-button-next-1_2"><button name="quform_submit" type="submit" class="quform-next" value="submit"><span class="quform-button-text quform-button-next-text">Gå videre</span></button></div><div class="quform-loading quform-loading-position-left quform-loading-type-spinner-1" style="display: none;"><div class="quform-loading-inner"><div class="quform-loading-spinner"><div class="quform-loading-spinner-inner"></div></div></div></div></div></div></div><div class="quform-element quform-element-page quform-page-69 quform-page-1_69 quform-cf quform-group-style-plain" style="display: none;"><div class="quform-child-elements"><div class="quform-element quform-element-select quform-element-1_70 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_70"><label class="quform-label-text" for="quform_1_70_5206b2">Garasje med loft?</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="6"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_70 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_70 quform-cf"><select id="quform_1_70_5206b2" name="quform_1_70" class="quform-field quform-field-select quform-field-1_70"><option value="" selected="selected">Please select</option><option value="Ja">Ja</option><option value="Nei">Nei</option><option value="Vet ikke">Vet ikke</option></select></div></div></div></div><div class="quform-element quform-element-select quform-element-1_71 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_71"><label class="quform-label-text" for="quform_1_71_5206b2">Takkonstruksjon</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="7"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_71 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_71 quform-cf"><select id="quform_1_71_5206b2" name="quform_1_71" class="quform-field quform-field-select quform-field-1_71"><option value="" selected="selected">Please select</option><option value="Saltak">Saltak</option><option value="Valmtak">Valmtak</option><option value="Halvvalmet tak">Halvvalmet tak</option><option value="Flatt tak">Flatt tak</option><option value="Vet ikke">Vet ikke</option></select></div></div></div></div><div class="quform-element quform-element-text quform-element-1_78 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_78"><label class="quform-label-text" for="quform_1_78_5206b2">Lengde på garasjen?</label></div><div class="quform-inner quform-inner-text quform-inner-1_78 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_78 quform-cf"><input type="text" id="quform_1_78_5206b2" name="quform_1_78" class="quform-field quform-field-text quform-field-1_78" placeholder="330 cm"></div></div></div></div><div class="quform-element quform-element-text quform-element-1_79 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_79"><label class="quform-label-text" for="quform_1_79_5206b2">Bredde på garasjen?</label></div><div class="quform-inner quform-inner-text quform-inner-1_79 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_79 quform-cf"><input type="text" id="quform_1_79_5206b2" name="quform_1_79" class="quform-field quform-field-text quform-field-1_79" placeholder="330 cm"></div></div></div></div><div class="quform-element quform-element-submit quform-element-1_77 quform-cf quform-button-style-sexy-silver quform-button-size-medium quform-button-width-full"><div class="quform-button-back quform-button-back-default quform-button-back-1_77"><button name="quform_submit" type="submit" class="quform-back" value="back"><span class="quform-button-text quform-button-back-text">Tilbake</span></button></div><div class="quform-button-next quform-button-next-default quform-button-next-1_77"><button name="quform_submit" type="submit" class="quform-next" value="submit"><span class="quform-button-text quform-button-next-text">Gå videre</span></button></div><div class="quform-loading quform-loading-position-left quform-loading-type-spinner-1" style="display: none;"><div class="quform-loading-inner"><div class="quform-loading-spinner"><div class="quform-loading-spinner-inner"></div></div></div></div></div></div></div><div class="quform-element quform-element-page quform-page-46 quform-page-1_46 quform-cf quform-group-style-plain"><div class="quform-child-elements"><div class="quform-element quform-element-select quform-element-1_50 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_50"><label class="quform-label-text" for="quform_1_50_5206b2">Farge</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="8"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_50 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_50 quform-cf"><select id="quform_1_50_5206b2" name="quform_1_50" class="quform-field quform-field-select quform-field-1_50"><option value="" selected="selected">Please select</option><option value="Hvit">Hvit</option><option value="Blå">Blå</option><option value="Grå">Grå</option><option value="Sort">Sort</option><option value="Ubehandlet">Ubehandlet</option><option value="Annen farge">Annen farge</option><option value="Vet ikke">Vet ikke</option></select></div></div></div></div><div class="quform-element quform-element-select quform-element-1_54 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_54"><label class="quform-label-text" for="quform_1_54_5206b2">Skal porten ha vindu?</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="9"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_54 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_54 quform-cf"><select id="quform_1_54_5206b2" name="quform_1_54" class="quform-field quform-field-select quform-field-1_54"><option value="" selected="selected">Please select</option><option value="Ja">Ja</option><option value="Nei">Nei</option><option value="Vet ikke">Vet ikke</option></select></div></div></div></div><div class="quform-element quform-element-select quform-element-1_55 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_55"><label class="quform-label-text" for="quform_1_55_5206b2">Skal tilbudet inkludere montering?</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="10"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_55 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_55 quform-cf"><select id="quform_1_55_5206b2" name="quform_1_55" class="quform-field quform-field-select quform-field-1_55"><option value="" selected="selected">Please select</option><option value="Ja">Ja</option><option value="Nei">Nei</option><option value="Usikker">Usikker</option></select></div></div></div></div><div class="quform-element quform-element-select quform-element-1_56 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_56"><label class="quform-label-text" for="quform_1_56_5206b2">Skal porten være motorisert?</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="11"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">Bla, bla, bla....</div></div></div><div class="quform-inner quform-inner-select quform-inner-1_56 quform-field-size-medium"><div class="quform-input quform-input-select quform-input-1_56 quform-cf"><select id="quform_1_56_5206b2" name="quform_1_56" class="quform-field quform-field-select quform-field-1_56"><option value="" selected="selected">Please select</option><option value="Ja">Ja</option><option value="Nei">Nei</option><option value="Usikker">Usikker</option></select></div></div></div></div><div class="quform-element quform-element-textarea quform-element-1_57 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_57"><label class="quform-label-text" for="quform_1_57_5206b2">Design / Materiell / Annet</label></div><div class="quform-inner quform-inner-textarea quform-inner-1_57 quform-field-size-slim"><div class="quform-input quform-input-textarea quform-input-1_57 quform-cf"><textarea id="quform_1_57_5206b2" name="quform_1_57" class="quform-field quform-field-textarea quform-field-1_57" placeholder="Moderne eller tradisjonell port? Kodetastatur? Andre spesifikasjoner? (Frivillig)"></textarea></div></div></div></div><div class="quform-element quform-element-submit quform-element-1_53 quform-cf quform-button-style-sexy-silver quform-button-size-medium quform-button-width-full"><div class="quform-button-back quform-button-back-default quform-button-back-1_53"><button name="quform_submit" type="submit" class="quform-back" value="back"><span class="quform-button-text quform-button-back-text">Tilbake</span></button></div><div class="quform-button-next quform-button-next-default quform-button-next-1_53"><button name="quform_submit" type="submit" class="quform-next" value="submit"><span class="quform-button-text quform-button-next-text">Gå videre</span></button></div><div class="quform-loading quform-loading-position-left quform-loading-type-spinner-1" style="display: none;"><div class="quform-loading-inner"><div class="quform-loading-spinner"><div class="quform-loading-spinner-inner"></div></div></div></div></div></div></div><div class="quform-element quform-element-page quform-page-8 quform-page-1_8 quform-cf quform-group-style-plain quform-last-page"><div class="quform-child-elements"><div class="quform-element quform-element-row quform-element-row-1_9 quform-1-columns quform-element-row-size-fixed"><div class="quform-element quform-element-column quform-element-1_10"><div class="quform-element quform-element-text quform-element-1_11 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_11"><label class="quform-label-text" for="quform_1_11_5206b2">Ditt navn</label></div><div class="quform-inner quform-inner-text quform-inner-1_11 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_11 quform-cf quform-has-field-icon-left"><input type="text" id="quform_1_11_5206b2" name="quform_1_11" class="quform-field quform-field-text quform-field-1_11" placeholder="Ditt fornavn"><span class="quform-field-icon quform-field-icon-left"><i class="fa fa-user"></i></span></div></div></div></div></div></div><div class="quform-element quform-element-text quform-element-1_81 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_81"><label class="quform-label-text" for="quform_1_81_5206b2">Telefon nummer</label></div><div class="quform-inner quform-inner-text quform-inner-1_81 quform-field-size-medium"><div class="quform-input quform-input-text quform-input-1_81 quform-cf"><input type="text" id="quform_1_81_5206b2" name="quform_1_81" class="quform-field quform-field-text quform-field-1_81"></div></div></div></div><div class="quform-element quform-element-email quform-element-1_26 quform-cf quform-element-required"><div class="quform-spacer"><div class="quform-label quform-label-1_26"><label class="quform-label-text" for="quform_1_26_5206b2">Email address</label><span class="quform-required">*</span></div><div class="quform-inner quform-inner-email quform-inner-1_26 quform-field-size-medium"><div class="quform-input quform-input-email quform-input-1_26 quform-cf"><input type="email" id="quform_1_26_5206b2" name="quform_1_26" class="quform-field quform-field-email quform-field-1_26" placeholder="navn@domene.no"></div></div></div></div><div class="quform-element quform-element-textarea quform-element-1_80 quform-cf quform-element-optional"><div class="quform-spacer"><div class="quform-label quform-label-1_80"><label class="quform-label-text" for="quform_1_80_5206b2">Utfyllende informasjon</label><div class="quform-tooltip-icon quform-tooltip-icon-hover" data-hasqtip="12"><i class="qicon-question-circle"></i><div class="quform-tooltip-icon-content">F.eks. informasjon om garasjen, spesielle ønsker etc. (Frivillig).</div></div></div><div class="quform-inner quform-inner-textarea quform-inner-1_80 quform-field-size-medium"><div class="quform-input quform-input-textarea quform-input-1_80 quform-cf"><textarea id="quform_1_80_5206b2" name="quform_1_80" class="quform-field quform-field-textarea quform-field-1_80" placeholder="F.eks. informasjon om garasjen, spesielle ønsker etc. (Frivillig)."></textarea></div></div></div></div><div class="quform-element quform-element-submit quform-element-1_14 quform-cf quform-button-style-sexy-silver quform-button-size-medium quform-button-width-full"><div class="quform-button-back quform-button-back-default quform-button-back-1_14"><button name="quform_submit" type="submit" class="quform-back" value="back"><span class="quform-button-text quform-button-back-text">Tilbake</span></button></div><div class="quform-button-submit quform-button-submit-default quform-button-submit-1_14"><button name="quform_submit" type="submit" class="quform-submit" value="submit"><span class="quform-button-text quform-button-submit-text">Få uforpliktende tilbud</span></button></div><div class="quform-loading quform-loading-position-left quform-loading-type-spinner-1" style="display: none;"><div class="quform-loading-inner"><div class="quform-loading-spinner"><div class="quform-loading-spinner-inner"></div></div></div></div></div><div class="quform-hidden"><label>This field should be left blank<input type="text" name="quform_1_0" autocomplete="off"></label></div></div></div></div></div></form></div>
    </div>


    ---------------- Coupons Like in Mockup ----------------------

    <ul class="nav nav-pills nav-pills--success" role="tablist" style="margin-top:50px;">
        {{--<li class="nav-item m-tabs__item">
            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
                Last Month
            </a>
        </li>
        <li class="nav-item m-tabs__item">
            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                All Time
            </a>
        </li>--}}

        @foreach($tags as $key => $tag)

            @if(!empty($tag['label']))
            <li class="nav-item">
                <a data-toggle="tab" href="#m_widget11_tab2_content" class="nav-link"  data-toggle="tab">
                   SECTION {{ $tag['logicRules'][0]['value'] }}
                </a>
            </li>
            @endif


            @if(!empty($tag['elements']))
                @foreach($tag['elements'] as $element)
                    @if(!empty($element['label']))
                    <li class="nav-item">
                        <a title="Section Child of {{ $tag['logicRules'][0]['value'] }}" data-toggle="tab" href="#m_widget11_tab2_content" class="nav-link"  >
                            {{ $element['label'] }}
                        </a>

                    </li>

                    @endif

                    @if(!empty($element['options']))
                        @foreach($element['options'] as $key => $optionValue)
                            @if(!empty($optionValue['value']))
                            <li class="nav-item">
                                <a title="Element Child of {{ $element['label'] }} " data-toggle="tab" href="#m_widget11_tab2_content" class="nav-link">
                                    {{$optionValue['value']}}
                                </a>
                            </li>

                            @endif
                        @endforeach
                    @endif
                 @endforeach

            @endif
        @endforeach
</ul>
@endsection