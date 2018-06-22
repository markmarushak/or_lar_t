<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Services\AffiliateService;
use App\Services\DataFilterRuleService;
use Illuminate\Http\Request;

class DataFilterRuleController extends Controller
{

    private $affiliateService;
    private $dataFilterRuleService;

    public function __construct(
        AffiliateService $affiliateService,
        DataFilterRuleService $dataFilterRuleService
    )
    {
        $this->affiliateService = $affiliateService;
        $this->dataFilterRuleService = $dataFilterRuleService;
    }

    public function index()
    {
        $dataFiltersRules =  $this->dataFilterRuleService->getAllDataFiltersRules();
        if (!empty($dataFiltersRules)) {
            return view('affiliate.data-filters-rules.index',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRules' => $dataFiltersRules
                ]
            );
        }
        return view('affiliate.data-filters-rules.index', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
    }

    public function add()
    {
        return view('affiliate.data-filters-rules.add');
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
        return redirect()->route('connection', [
            'data_filters_rules_id' => $dataFiltersRulesId,
            'data_filters_rules_description' => $dataFiltersRulesDescription
        ]);
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
                   'dataFiltersRulesId' => $dataFiltersRulesId,
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
                   'dataFiltersRulesId' => $dataFiltersRulesId,
                   'dataFiltersRulesDescription' => $dataFiltersRulesDescription
               ]
           );
       }
    }

    public function singleFormBuilder(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.single-form-builder',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesId' => $dataFiltersRulesId,
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage() );
        } else {
            $form = $this->dataFilterRuleService->getSingleForm($request->singleId);
            return view('affiliate.data-filters-rules.single-form-builder',
                [
                    'menu' => 'affiliate-service',
                    'form' => $form->form,
                    'builder' => $form->builder,
                    'page' => $form->page,
                    'dataFiltersRulesId' => $dataFiltersRulesId,
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
        $dataFiltersRulesDescription = $request->data_filters_rules_description;

        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage());
        }else {
            $data = $this->dataFilterRuleService->getFormById($dataFiltersRulesId);
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'menu' => 'affiliate-service',
                    'data' => $data
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

    public function singleOutputOverview(Request $request)
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
}