<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Services\AffiliateService;
use App\Services\DataFilterRuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DataFilterRuleController extends Controller
{
    private $affiliateService;
    private $dataFilterRuleService;
    public $dataFilterRuleId;
    public $dataFilterRuleDescription;

    public function __construct
    (
        AffiliateService $affiliateService,
        DataFilterRuleService $dataFilterRuleService
    )
    {
        $this->affiliateService = $affiliateService;
        $this->dataFilterRuleService = $dataFilterRuleService;

    }

    public function index()
    {
            return view('affiliate.data-filters-rules.index',
                [
                    'menu' => 'affiliate-service'
                ]
            );
    }

    public function show()
    {
        $dataFiltersRules =  $this->dataFilterRuleService->getAllDataFiltersRules();
        return response()->json($dataFiltersRules);
    }

    public function showPartners(Request $request)
    {
        $result = $this->dataFilterRuleService->showPartners($request->id);

        return response()->json($result);
//        $dataFiltersRulesId = $request->all();
//        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
//
//        if (is_a($connectionToDataBase, 'ErrorException')) {
//            return response()->json()->withErrors($connectionToDataBase->getMessage());
//        }else {
//            $result = $this->dataFilterRuleService->showPartners();
//            return response()->json($result);
//        }

    }

    public function get(Request $request)
    {
        $dataFilterRules = $this->dataFilterRuleService->getDataFiltersRulesById($request);
        return response()->json($dataFilterRules);
    }

    public function getPartners(Request $request){
        $result = $this->dataFilterRuleService->getPartners($request);
        return response()->json($result);
    }

    public function edit(Request $request)
    {
        $this->dataFilterRuleService->editDataFiltersRulesById($request);
        return response()->json();
    }

    public function editPartners(Request $request)
    {
        $this->dataFilterRuleService->editPartners($request);
        return response()->json();
    }

    public function deletePartners(Request $request)
    {
        $dataFiltersRulesId = $request['data_filter_rules_id'];
        $affiliatePartnerId = $request['affiliate_partner_id'];
        $this->detachProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId);
        return response()->json();
    }

    public function add()
    {
        return view('affiliate.data-filters-rules.add');
    }

    public function addPartners(Request $request)
    {
        $affiliatesPartnersId = $this->dataFilterRuleService->addPartners($request['affiliates_partners_description']);
        $dataFiltersRulesId = $request['data_filters_rules_id'];
        $this->bindProjectAndPartner($dataFiltersRulesId, $affiliatesPartnersId);
        return response()->json();
    }

    public function addRules(Request $request)
    {
        $this->dataFilterRuleService->addRules($request);
        return response()->json();
    }

    public function getRule(Request $request)
    {
        $affiliatePartnerRule = $this->dataFilterRuleService->getRule($request);
        return response()->json($affiliatePartnerRule);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'category' => 'required',
            'source' => 'required',
            'country' => 'required'
        ]);
        $this->dataFilterRuleService->addDataFilterRule($request);
        return redirect()->route('data-filters-rules');
    }


    public function bindProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId)
    {
       $this->dataFilterRuleService->bindProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId);
    }

    public function detachProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId)
    {

        return $this->dataFilterRuleService->detachProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId);
    }

    public function sendMail(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview-single',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage() );
        } else {
            $entryId = 6;
            $form = $this->dataFilterRuleService->outputOverviewSingleService($entryId);
            Mail::to('thorfinn@orbitleads.com')
                ->send(new OrderShipped($form, $this->dataFilterRuleService->nameEntry), 'Få tilbud på Garasje')
                ;
        }
        dd('good');
    }
}