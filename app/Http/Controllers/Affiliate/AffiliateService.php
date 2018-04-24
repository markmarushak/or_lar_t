<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataFiltersRulesModel;

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

            //Connect to Wordpress Forms should be


            return view('admin/data-filters-rules-edit', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
        } else {


            return view('admin/data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
        }



    }
}