<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Settings\API\SettingsApiController;
use Illuminate\Http\Request;
use App\Services\AffiliateService;

class AffiliatePartnerController extends Controller
{
    public $affiliateService;

    public function __construct
    (
        AffiliateService $affiliateService
    )
    {
        $this->affiliateService = $affiliateService;
    }

    public function index()
    {
        $prefix = 'affiliate-network';
        $connect = new SettingsApiController();
        $result = $connect->getReport(['groupBy'=>$prefix]);
        $cols = $connect->rows($prefix);
        return view('affiliate.affiliates-partners.index-affiliates-partners',
            [
                'menu' => 'affiliate-service',
                'cols' =>$cols,
                'result' => $result
            ]
        );
    }

    public function show(Request $request)
    {
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

    public function store(Request $request)
    {
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

    public function edit(Request $request)
    {
       $affiliateOrPartner = $this->affiliateService->editAffiliatesPartners($request);

       return view('affiliate.affiliates-partners.edit-affiliates-partners',
            [
                'menu' => 'affiliate-service',
                'affiliateOrPartner' => $affiliateOrPartner
            ]
        );
    }

    public function update(Request $request)
    {
        $this->affiliateService->updateAffiliatesPartners($request);
        return redirect()->route('affiliates-partners');
    }

    public function acAffiliatesPartners(Request $request)
    {
        return $this->affiliateService->getAffiliatesDescriptions($request);
    }
}