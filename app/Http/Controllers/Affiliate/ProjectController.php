<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUpdateConnectToDb;
use App\Mail\MailListener;
use App\Plugins\WordPress\Wpdb;
use App\Services\ConnectToDataBaseService\ConnectToDataBase;
use App\Services\ConnectToDataBaseService\UpdateDataBase;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

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

    /**
     * Show settings for Word Press data base
     *
     * @return View
    */
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
     * Update settings for connect to Word Press data base
     *
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
     * Show form builders
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function formBuilder()
    {
      $connectToDb =$this->connectToDataBase->connectionToDataBase($this->dataFilterRuleId);
        if (is_a($connectToDb, 'ErrorException')) {
            return view('affiliate.data-filters-rules.form-builder',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($connectToDb->getMessage() );
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
     * Show data base fields
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function dataBaseFields()
    {
        $connectToDb =$this->connectToDataBase->connectionToDataBase($this->dataFilterRuleId);
        if (is_a($connectToDb, 'ErrorException')) {
            return view('affiliate.database-fields',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($connectToDb->getMessage());
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
            return view('affiliate.data-filters-rules.data-filters-rules-data',
                [
                    'dataFilterRulesId' => $this->dataFilterRuleId
                ]
            );
        }


    public function bindProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId)
    {
        $this->projectService->bindProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId);
    }

    public function detachProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId)
    {

        return $this->projectService->detachProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId);
    }

    public function showPartners(Request $request)
    {
        $result = $this->projectService->showPartners($request->id);
        return response()->json($result);
    }

    public function get(Request $request)
    {
        $dataFilterRules = $this->projectService->getDataFiltersRulesById($request);
        return response()->json($dataFilterRules);
    }

    public function getPartners(Request $request){
        $result = $this->projectService->getPartners($request);
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

    public function addPartners(Request $request)
    {
        $affiliatesPartnersId = $this->projectService->addPartners($request['affiliates_partners_description']);
        $dataFiltersRulesId = $request['data_filters_rules_id'];
        $this->bindProjectAndPartner($dataFiltersRulesId, $affiliatesPartnersId);
        return response()->json();
    }

    public function addRules(Request $request)
    {
        $this->projectService->addRules($request);
        return response()->json();
    }

    public function getRule(Request $request)
    {
        $affiliatePartnerRule = $this->projectService->getRule($request);
        return response()->json($affiliatePartnerRule);
    }


    /**
     * Show all output overview
     *
     * @return View
     * */
    public function outputOverview()
    {
        $this->connectToDataBase = $this->connectToDataBase->connectionToDataBase($this->dataFilterRuleId);
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


    /**
     * Show single output overview by id
     * @param $request->single_id
     *
     * @return View
    */
    public function outputOverviewSingle(Request $request)
    {
        $connectToDb =$this->connectToDataBase->connectionToDataBase($this->dataFilterRuleId);
        if (is_a($connectToDb, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview-single',
                [
                    'dataFiltersRulesDescription' => $this->dataFilterRuleDescription
                ]
            )->withErrors($connectToDb->getMessage() );
        } else {
            $form = $this->projectService->outputOverviewSingleService($request->single_id);
            return view('affiliate.data-filters-rules.output-overview-single', [
                'dataFiltersRulesId' => $this->dataFilterRuleId,
                'dataFiltersRulesDescription' => $this->dataFilterRuleDescription,
                'nameEntry' => $this->projectService->nameEntry,
                'form' => $form
            ]);
        }
    }


    public function sendMail(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectToDb =$this->connectToDataBase->connectionToDataBase($this->dataFilterRuleId);
        if (is_a($connectToDb, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview-single',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectToDb->getMessage());
        } else {
            $entryId = 6;
            $form = $this->projectService->outputOverviewSingleService($entryId);
            Mail::to('thorfinn@orbitleads.com')
                ->send(new MailListener($form, $this->projectService->nameEntry, 'test'));
        }
        dd('good');
    }

}
