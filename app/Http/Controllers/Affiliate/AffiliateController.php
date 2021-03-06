<?php

namespace App\Http\Controllers\Affiliate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Settings\API\SettingsApiController;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
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


    public function campaigns()
    {
        $prefix = 'campaign';
        $connect = new SettingsApiController();
        $result = $connect->getReport(['groupBy'=>$prefix,'limit'=> 10, 'offset'=> 5,'time'=>'today']);
        $cols = $connect->rows('campaign');



        return view('affiliate.campaign.campaigns', [
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

    public function ajaxCampaigns(Request $request)
    {
        if($request->isMethod('post')){
            if($request->input('column')){
                $update = $request->input('column');
                foreach ($update as $col => $value)
                {
                    DB::table('tab_description')->where('id','=',$col)->update(['status'=>$value['status']]);
                }
            }
            $data = $request->input('data');
            $prefix = 'campaign';
            $connect = new SettingsApiController();
            $result = $connect->getReport($data);
            $cols = $connect->rows($prefix);


        }

        return view('affiliate.campaign.table',[
            'result'=> $result,
            'cols'=> $cols
        ]);
    }
}