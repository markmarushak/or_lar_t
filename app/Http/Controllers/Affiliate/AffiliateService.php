<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


        return view('home', ['menu' => 'affiliate-service']);


    }



}
