<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUpdateConnectToDb;
use App\Services\ConnectToDataBaseService\ConnectToDataBase;
use App\Services\ConnectToDataBaseService\UpdateDataBase;
use App\Services\ProjectService;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public $dataFilterRuleId;
    public $dataFilterRuleDescription;
    public $projectService;
    public $updateDataBase;

    public $connectToDataBase;

    public function __construct(
        Request $request,
        UpdateDataBase $updateDataBase,
        ProjectService $projectService,
        connectToDataBase $connectToDataBase
    )
    {
        $this->updateDataBase = $updateDataBase;
        $this->projectService = $projectService;
        $this->connectToDataBase = $connectToDataBase;
        if (isset($request->data_filters_rules_id)
            && !empty($request->data_filters_rules_id)
            && isset($request->data_filters_rules_description)
            && !empty($request->data_filters_rules_description)
        ) {
            $this->dataFilterRuleId =  $request->data_filters_rules_id;
            $this->dataFilterRuleDescription =  $request->data_filters_rules_description;
        }
    }

    public function connection()
    {
        $settingsOfDataBase = $this->connectToDataBase->getSettingOfDataBaseById($this->dataFilterRuleId);
        return view('affiliate.data-filters-rules.connection',
            [
                'dataFiltersRulesDescription' => $this->dataFilterRuleDescription,
                'settingsOfDataBase' => $settingsOfDataBase,
                'dataFiltersRulesId' => $this->dataFilterRuleId
            ]
        );
    }

    /**
     * @param RequestUpdateConnectToDb $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConnectToDb(RequestUpdateConnectToDb $request)
    {
        if($request->id) {
            $this->updateDataBase->editConnectToDb($request, $this->dataFilterRuleId);
        } else {
            $this->updateDataBase->addConnectToDb($request, $this->dataFilterRuleId);
        }
        return redirect()->route('connection', [
            'data_filters_rules_id' => $this->dataFilterRuleId,
            'data_filters_rules_description' => $this->dataFilterRuleDescription
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function formBuilder()
    {
        if (is_a($this->connectToDataBase->connectionToDataBase($this->dataFilterRuleId), 'ErrorException')) {
            return view('affiliate.data-filters-rules.form-builder',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($this->connectToDataBase->getMessage() );
        } else {



            $forms =  $this->projectService->getForms();
            $urls = $this->projectService->createUrls($forms, $this->dataFilterRuleDescription);
            return view('affiliate.data-filters-rules.form-builder',
                [
                    'forms' => $forms,
                    'urls' => $urls,
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription,
                    'dataFiltersRulesId' => $this->dataFilterRuleId
                ]
            );
        }
    }


    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function dataBaseFields()
    {
        if (is_a($this->connectToDataBase, 'ErrorException')) {
            return view('affiliate.database-fields',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($this->connectToDataBase->getMessage());
        }else {
            return view('affiliate.database-fields',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            );
        }
    }

    public function dataFiltersRulesData()
    {
        if (is_a($this->connectToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'dataFiltersRulesId' => $this->dataFilterRuleId
                ]
            )->withErrors($this->connectToDataBase->getMessage());
        }else {
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'dataFilterRulesId' => $this->dataFilterRuleId
                ]
            );
        }
    }

    public function showPartners(Request $request)
    {
        $result = $this->dataFilterRuleService->showPartners($request->id);

        return response()->json($result);
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

    public function outputOverview()
    {
        if (is_a($this->connectToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($this->connectToDataBase->getMessage() );
        } else {
            $recentEntries = $this->projectService->getRecentEntries();
            return view('affiliate.data-filters-rules.output-overview',
                [
                    'recentEntries' => $recentEntries,
                    'dataFiltersRulesId' => $this->dataFilterRuleId,
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            );
        }
    }

    public function outputOverviewSingle(Request $request)
    {
        if (is_a($this->connectToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview-single',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($this->connectToDataBase->getMessage() );
        } else {
            $form = $this->projectService->outputOverviewSingleService($request->single_id);
            return view('affiliate.data-filters-rules.output-overview-single', [
                'dataFiltersRulesId' => $this->dataFilterRuleId,
                'dataFiltersRulesDescription' => $this->dataFilterRuleDescription,
                'nameEntry' => $this->dataFilterRuleService->nameEntry,
                'form' => $form
            ]);
        }
    }

}
