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


    public function dataFiltersRules()
    {

        $dataFiltersRules = DataFiltersRulesModel::all();



        return view('admin/data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);

    }

}