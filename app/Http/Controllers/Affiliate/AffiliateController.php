<?php

namespace App\Http\Controllers\Affiliate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Settings\API\SettingsApiController;
use App\Services\ProjectService;
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
        $connect = new SettingsApiController();
        $result = $connect->getReport(['groupBy'=>'campaign'],date('Y-m-d'),date('Y-m-d',strtotime(date('Y-m-d').'+ 1 days')));


        $colum = $result['columnMappings'];
        $rows = $result['rows'];

        $src = [18,17,24,74,27,29,60,30,59,35,39,36,40,63,46,45,2];
        $cols = [];
        for ($i=0;$i<count($src);$i++){
            $cols[] = $colum[$src[$i]];
        }


        return view('affiliate.compaigns', [
            'menu' => 'affiliate-service',
            'result' => $result,
            'column' => $cols,
            'rows'  =>$rows
        ]);

    }

    public function emailBulkSplit()
    {

        return view('affiliate.email-bulk-split', ['menu' => 'affiliate-service']);
    }

}