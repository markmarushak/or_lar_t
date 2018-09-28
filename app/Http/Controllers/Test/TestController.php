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
          DB::table('migrations')->where('id','=','15')->delete();
          DB::table('migrations')->where('id','=','16')->delete();
          DB::table('migrations')->where('id','=','17')->delete();
          DB::table('migrations')->where('id','=','18')->delete();
        Schema::drop('tab_name');
        Schema::drop('tab_description');


        return view('test.index',['todo']);
    }


}
