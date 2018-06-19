<?php

namespace App\Http\Controllers\Affiliate;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AffiliateRepository;
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
                'data' => []
            ]
        );
    }

    public function add(Request $request)
    {
        return view('affiliate.affiliates-partners.add-affiliates-partners',
            [
                'menu' => 'affiliate-service',
                'data' => []
            ]
        );
    }


}