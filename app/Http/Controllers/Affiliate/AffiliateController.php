<?php

namespace App\Http\Controllers\Affiliate;
use App\Http\Controllers\Controller;

class AffiliateController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( )
    {
        //  $this->middleware('auth');

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

        return view('affiliate.affiliate-service', ['menu' => 'affiliate-service']);

    }

    public function emailBulkSplit()
    {

        return view('affiliate.email-bulk-split', ['menu' => 'affiliate-service']);
    }



}