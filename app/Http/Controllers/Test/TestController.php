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

    public function index(Request $request)
    {
        $to =date('Y-m-d',strtotime(date('Y-m-d').'+1 days'));
        $db = new TabDescription();
        $tabs_name = $db->tab_descriptions;
        $tab_name[$request->input('tab')] = $tabs_name[$request->input('tab')];
        $this->allTabDescription($tab_name);
        $connect = new SettingsApiController();
        $result = $connect->getReport(['groupBy'=>$request->input('tab'),'columns'=>'cost'],'today');

        return view('test.index',[
            'row' => $result,
        ]);
    }

    public function allTabDescription($tab_name)
    {
        $columns = $tab_name;
        $cols = [];
        foreach ($columns as $column => $group)
        {
            $groupBy = trim($column);
            $db = $columns[$groupBy][0];
            $db = trim($db);
            $to =date('Y-m-d',strtotime(date('Y-m-d').'+1 days'));
            $connect = new SettingsApiController();
            $result = $connect->getReport(['groupBy'=>$groupBy,'columns'=>'cost' ],'today');
            foreach ($result['columnMappings'] as $row)
            {
                foreach ($group as $col)
                {
                    $col = trim($col);
                    $row['label'] = trim($row['label']);
                    if (strcasecmp($col, $row['label']) == 0){
                        $cols[] = $row;
                    }
                }
            }
        }
        $tab_id = DB::table('tab_name')->where('name', 'like', $db.'%')->select('id')->get();
        $tab_id = json_decode(json_encode($tab_id),True);
        if(empty($tab_id)){
            $tab_name = new TabName();
            $tab_name->baseContent();
            $tab_id = DB::table('tab_name')->where('name', '=', $db)->select('id')->get();
            $tab_id = json_decode(json_encode($tab_id),True);
        }
        $tab_id = $tab_id[0]['id'];
        foreach ($cols as $col){
            TabDescription::create([
               'tab_id' => $tab_id,
               'key' => $col['key'],
               'label' => $col['label'],
               'type' => $col['type'],
               'status' => 0
            ]);
        }
        return true;
    }
}
