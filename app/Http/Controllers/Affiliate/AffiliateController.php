<?php

namespace App\Http\Controllers\Affiliate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Settings\API\SettingsApiController;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use MadnessCODE\Voluum\Auth\PasswordCredentials;
use MadnessCODE\Voluum\Client\API;

class AffiliateController extends Controller
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

        return view('affiliate.affiliate-service', ['menu' => 'affiliate-service']);
    }


    public function compaigns()
    {
        $prefix = 'campaign';
        $connect = new SettingsApiController();
        $result = $connect->getReport(['groupBy'=>$prefix],'today');
        $cols = $connect->rows('campaign');



        return view('affiliate.compaigns', [
            'menu' => 'affiliate-service',
            'result' => $result,
            'cols'  =>$cols
        ]);

    }

    public function emailBulkSplit()
    {

        return view('affiliate.email-bulk-split', ['menu' => 'affiliate-service']);
    }

    public function add()
    {
        return view('affiliate.compaigns-add');
    }

    public function ajaxCompaigns(Request $request = null)
    {

    }

}