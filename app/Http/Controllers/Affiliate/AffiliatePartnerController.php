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
        return view('affiliate.affiliates-partners.index-affiliates-partners',
            [
                'menu' => 'affiliate-service',
            ]
        );
    }

    public function show(Request $request){
        $affiliates_data = $this->affiliateService->getAffiliatesData($request);
        return response()->json($affiliates_data);
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
        if($request['status'] == 'on'){
            $request['status'] = TRUE;
        }
        $this->validate($request, [
            'description' => 'required',
            'country' => 'required',
            'type' => 'required'
        ]);

        $this->affiliateService->addAffiliatePartner($request);

        return redirect()->route('affiliates-partners');
    }

    public function delete(Request $request)
    {
        $this->affiliateService->deleteAffiliatesPartners($request);
        return response()->json();
    }

    public function getAffiliatePartner(Request $request)
    {
        $result = $this->affiliateService->getAffiliatesPartnersData($request);
        return response()->json($result);
    }

    public function edit(Request $request){

        $this->validate($request, [
            'description' => 'required',
            'country' => 'required',
            'type' => 'required'
        ]);
        $this->affiliateService->editAffiliatesPartners($request);
        return response()->json();
    }

    public function acAffiliatesPartners(Request $request)
    {
        $result = $this->affiliateService->getAffiliatesDescriptions($request);
        return response()->json($result);

    }


}