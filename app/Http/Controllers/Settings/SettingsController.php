<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Settings\API\SettingsApiController;
use App\Models\TabDescription;
use App\Models\TabName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function teamplateTable(Request $request = null)
    {
        if(!empty($request->query())){
            $db = new TabDescription();
            $tabs_name = $db->tab_descriptions;
            $tab_name[$request->input('tab')] = $tabs_name[$request->input('tab')];
            $allTab = new SettingsApiController();
            $allTab->allTabDescription($tab_name);
        }
        $result = json_decode(json_encode(DB::table('tab_name')->select('name','status')->get()),true);
        if (empty($result))
        {
            $tab_name = new TabName();
            $tab_name->baseContent();
            $result = json_decode(json_encode(DB::table('tab_name')->select('name')->get()),true);
        }

        return view('settings.table-template',[
            'list' => $result
        ]);
    }

    public function teamplateUpdate()
    {
        $tab_name = new TabName();
        $tab_name->updateBaseContent();

        $result = json_decode(json_encode(DB::table('tab_name')->select('name','status')->get()),true);
        if (empty($result))
        {
            $tab_name->baseContent();
            $result = json_decode(json_encode(DB::table('tab_name')->select('name')->get()),true);
        }

        return view('settings.table-template',[
            'list' => $result
        ]);
    }
}
