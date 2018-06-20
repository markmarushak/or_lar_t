<?php

namespace App\Http\Controllers\Affiliate;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliatePartnerController extends Controller
{


    public function index()
    {
        return view('affiliate.affiliates-partners.index-affiliates-partners',
            [
                'menu' => 'affiliate-service',
                'data' => []
            ]
        );
    }

    public function add()
    {
        return view('affiliate.affiliates-partners.add-affiliate-partner',
            [
                'menu' => 'affiliate-service',
                'data' => []
            ]
        );
    }
}