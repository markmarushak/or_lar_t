<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('affiliate.affiliate-service');
    }

    public function api()
    {
        return view('settings.api',['menu' => 'Settings-service']);
    }
}
