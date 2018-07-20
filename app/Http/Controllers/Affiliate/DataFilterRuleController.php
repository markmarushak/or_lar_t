<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Repository\AffiliateRepository;
use App\Services\AffiliateService;
use App\Services\DataFilterRuleService;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DataFilterRuleController extends Controller
{
    private $affiliateRepository;
    private $affiliateService;
    private $dataFilterRuleService;
    private $newsletterService;

    public function __construct(
        AffiliateRepository $affiliateRepository,
        AffiliateService $affiliateService,
        DataFilterRuleService $dataFilterRuleService,
        NewsletterService $newsletterService
    )
    {
        $this->affiliateRepository = $affiliateRepository;
        $this->affiliateService = $affiliateService;
        $this->dataFilterRuleService = $dataFilterRuleService;
        $this->newsletterService = $newsletterService;;
    }

    public function index()
    {
          // $this->newsletterService->newsletterService();
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

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Connection Action
     */
    public function connection(Request $request)
    {

        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;

        $settingsOfDataBase = $this->affiliateService->getSettingOfDataBaseById($dataFiltersRulesId);

        return view('affiliate.data-filters-rules.connection',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription,
                'settingsOfDataBase' => $settingsOfDataBase,
                'dataFiltersRulesId' => $dataFiltersRulesId
            ]
        );
    }

    /**
     * @param Request $request
     * @param $dataFiltersRulesId
     * @param $dataFiltersRulesDescription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConnectDb(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $this->validate($request, [
            'domain' => 'required',
            'form' => 'required',
            'host_name' => 'required',
            'host' => 'required',
            'port' => 'required',
            'database' => 'required',
            'username' => 'required',
            'password' => 'required',
            'charset' => 'required',
            'collation' => 'required'
        ]);
        if($request->id) {
            $this->affiliateService->editConnectToDb($request, $dataFiltersRulesId);
        } else {

            $this->affiliateService->addConnectToDb($request, $dataFiltersRulesId);
        }
        return redirect()->route('connection', [ 'data_filters_rules_id' => $dataFiltersRulesId, 'data_filters_rules_description' => $dataFiltersRulesDescription]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function formBuilder(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
        if (is_a($connectionToDataBase, 'ErrorException')) {
           return view('affiliate.data-filters-rules.form-builder',
               [
                   'menu' => 'affiliate-service',
                   'dataFiltersRulesDescription' => $dataFiltersRulesDescription
               ]
           )->withErrors($connectionToDataBase->getMessage() );
        } else {
           $forms =  $this->dataFilterRuleService->getForms();
           $urls = $this->dataFilterRuleService->createUrls($forms, $dataFiltersRulesDescription);
           return view('affiliate.data-filters-rules.form-builder',
               [
                   'menu' => 'affiliate-service',
                   'forms' => $forms,
                   'urls' => $urls,
                   'dataFiltersRulesDescription' => $dataFiltersRulesDescription
               ]
           );
        }
    }

    public function dataBaseFields(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
        $dataFiltersRulesDescription = $request->data_filters_rules_description;

        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.database-fields',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage());
        }else {
            $data = array(
                'description' => $dataFiltersRulesDescription
            );
            return view('affiliate.database-fields',
                [
                    'menu' => 'affiliate-service',
                    'data' => $data
                ]
            );
        }
    }

    public function dataFiltersRulesData(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);

        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesId' => $dataFiltersRulesId
                ]
            )->withErrors($connectionToDataBase->getMessage());
        }else {
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'menu' => 'affiliate-service',
                    'dataFilterRulesId' => $dataFiltersRulesId
                ]
            );
        }
    }

    public function outputOverview(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage() );
        } else {
            $recentEntries = $this->dataFilterRuleService->getRecentEntries();
            return view('affiliate.data-filters-rules.output-overview',
                [
                'menu' => 'affiliate-service',
                'recentEntries' => $recentEntries,
                'dataFiltersRulesId' =>$dataFiltersRulesId,
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            );
        }
    }

    public function outputOverviewSingle(Request $request)
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
            $entryId = $request->single_id;
            $form = $this->dataFilterRuleService->outputOverviewSingleService($entryId);
            return view('affiliate.data-filters-rules.output-overview-single', [
                'menu' => 'affiliate-service',
                'dataFiltersRulesId' =>$dataFiltersRulesId,
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription,
                'nameEntry' => $this->dataFilterRuleService->nameEntry,
                'form' => $form
            ]);
        }
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