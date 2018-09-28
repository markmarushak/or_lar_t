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
        if(!empty($request->query())){
            $db = new TabDescription();
            $tabs_name = $db->tab_descriptions;
            $tab_name[$request->input('tab')] = $tabs_name[$request->input('tab')];
            $this->allTabDescription($tab_name);
        }
        $result = json_decode(json_encode(DB::table('tab_name')->select('name')->get()),true);
        if (empty($result))
        {
            $tab_name = new TabName();
            $tab_name->baseContent();
            $result = json_decode(json_encode(DB::table('tab_name')->select('name')->get()),true);
        }



        return view('test.index',[
            'list' => $result,
        ]);
    }


}
