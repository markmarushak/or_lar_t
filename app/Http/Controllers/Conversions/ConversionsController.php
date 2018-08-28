<?php

namespace App\Http\Controllers\Conversions;
use App\Http\Controllers\Controller;
use App\Services\ProjectService;

class ConversionsController extends Controller
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



}