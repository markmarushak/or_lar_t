<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Settings\API\SettingsApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MadnessCODE\Voluum\Auth\PasswordCredentials;
use MadnessCODE\Voluum\Client\API;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $to =date('Y-m-d',strtotime(date('Y-m-d').'+1 days'));


        $connect = new SettingsApiController();
        $result = $connect->connect()->post('campaign');
        return view('test.index',[
            'result' => $result
        ]);
    }
}
