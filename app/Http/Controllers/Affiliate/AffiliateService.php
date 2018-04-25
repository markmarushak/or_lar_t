<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataFiltersRulesModel;
use App\Quforms;

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

            DB::connection('garage');

            die;
            $dataRemoteDB = DB::connection('garage')->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms WHERE id = ?", [1]);

            $description = $dataFiltersRuleRow[0]->description;

            $tags = [];
            if($description == "Garasje-Tilbub.no") {


                $tags = Quforms::getTagsList($dataRemoteDB[0]->config, $description);

            }




            return view('admin/data-filters-rules-edit',
                            [
                             'menu' => 'affiliate-service',
                             'dataFiltersRuleRow' => $dataFiltersRuleRow[0],
                             'garageData' => $dataRemoteDB,
                             'tags' => $tags
                            ]
            );
        } else {

            return view('admin/data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
        }



    }
}