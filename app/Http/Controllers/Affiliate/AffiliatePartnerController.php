<?php

namespace App\Http\Controllers\Affiliate;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\AffiliateRepository;
use App\Services\AffiliateService;

class AffiliatePartnerController extends Controller
{


    public function __construct(
        AffiliateRepository $affiliateRepository,
        AffiliateService $affiliateService
    ){
        $this->affiliateRepository = $affiliateRepository;
        $this->affiliateService = $affiliateService;
    }

    public function index()
    {
        $affiliates_data = $this->affiliateService->getAffiliatesData();
        return view('affiliate.affiliates-partners.index-affiliates-partners',
            [
                'menu' => 'affiliate-service',
                'affiliates_data' => $affiliates_data
            ]
        );
    }

    public function add()
    {
        return view('affiliate.affiliates-partners.add-affiliates-partners',
            [
                'menu' => 'affiliate-service',
                'data' => []
            ]
        );
    }

    public function store(Request $request){
        if($request['status'] == null){
            $request['status'] = FALSE;
        }
        $this->validate($request, [
            'description' => 'required',
            'country' => 'required',
            'type' => 'required',
            'rules' => 'required',
            'status' => 'required'
        ]);

        $this->affiliateService->addAffiliatePartner($request);

        return redirect()->route('affiliates-partners');
    }

    public function delete(Request $request)
    {
        $this->affiliateService->deleteAffiliatesPartners($request);
    }


}