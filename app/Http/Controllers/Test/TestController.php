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

    public function index()
    {
        $td = new TabDescription();
        $tab_name = $td->tab_descriptions;
        $tab['affiliate-network'] = $tab_name['affiliate-network'];
        $this->allTabDescription($tab);
        $to =date('Y-m-d',strtotime(date('Y-m-d').'+1 days'));

        $connect = new SettingsApiController();
        $result = $connect->get('report',['groupBy'=>'affiliate-network','from'=>date('Y-m-d'),'to' => $to]);

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

            $to =date('Y-m-d',strtotime(date('Y-m-d').'+1 days'));
            $connect = new SettingsApiController();
            $result = $connect->getReport(['groupBy'=>$groupBy,'columns'=>'cost' ],date('Y-m-d'), $to);
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
        $tabs_name = trim($db);
        $tab_id = json_decode(json_encode($tab_id),true);
        foreach ($cols as $col){
            TabDescription::create([
                'tab_id' => $tab_id,
                'key' => $col['key'],
                'label' => $col['label'],
                'type' => $col['type']
            ]);
        }
        return true;
    }
}
