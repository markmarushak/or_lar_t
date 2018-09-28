<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Settings\API\SettingsApiController;
use App\Models\TabDescription;
use App\Models\TabName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use MadnessCODE\Voluum\Auth\PasswordCredentials;
use MadnessCODE\Voluum\Client\API;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request = null)
    {
        $result = json_decode(json_encode(DB::table('migrations')->select('id','migration')->get()),true);

//        Schema::drop('tab_name');
//        Schema::drop('tab_description');


        return view('test.index',[
            'list' => $result,
        ]);
    }


}
