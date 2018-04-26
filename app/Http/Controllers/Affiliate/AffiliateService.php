<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataFiltersRulesModel;
use App\RemoteDBaccess;
use App\Models\Quform_Form;

class AffiliateService extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin/affiliate-service', ['menu' => 'affiliate-service']);
    }


    public function compaigns()
    {

        return view('admin/affiliate-service', ['menu' => 'affiliate-service']);

    }

    public function emailBulkSplit()
    {

        return view('admin/email-bulk-split', ['menu' => 'affiliate-service']);
    }

    public function dataFiltersRules(Request $request)
    {


        $dataFiltersRules = DataFiltersRulesModel::all();

        if(!empty($request->data_filters_rules_id)) {

            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRuleRow = DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);
            //COnditions will be enabled

            //Connect to Wordpress Forms should be


            //wpau_quform_forms

            $dataRemoteDB = DB::connection('garage')->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms");

            $description = $dataFiltersRuleRow[0]->description;

            $formData = [];
            if($description == "Garasje-Tilbub.no") {

                $formConfig = RemoteDBaccess::getConfig($dataRemoteDB[0]->config, $description);

                $Quform_Form = new Quform_Form($formConfig);
                $Quform_Form->config = $formConfig;




                $Quform_Form->render();

            }

            return view('admin/data-filters-rules-edit',
                            [
                             'menu' => 'affiliate-service',
                             'dataFiltersRuleRow' => $dataFiltersRuleRow[0],
                             'garageData' => $dataRemoteDB,
                             'tags' => $formConfig
                            ]
            );

        } else {

            return view('admin/data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
        }

    }
}