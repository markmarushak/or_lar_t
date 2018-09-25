<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Settings\API\SettingsApiController;
use App\Models\TabDescription;
use App\Models\TabName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $to =date('Y-m-d',strtotime(date('Y-m-d').'+1 days'));

        $connect = new SettingsApiController();
        $result = $connect->get('report/errors',['limit'=>100,'offset'=>200,'sort'=>'','direction'=>'ASC','from'=>date('Y-m-d'),'to' => $to]);
//
//        foreach ($result['columnMappings'] as $row)
//        {
//            foreach ($columns as $col)
//            {
//                $col = trim($col);
//                $row['label'] = trim($row['label']);
//                if (strcasecmp($col, $row['label']) == 0){
//                    $cols[] = $row;
//                }
//            }
//        }
//        $cols = new TabDescription();
//        $result = $cols->allTabDescription();

//        RgisterApiModel::create([
//          'email' => 'asdasd@',
//          'phone' => ''
//        ]);

        return view('test.index',[
            'row' => $result,
        ]);
    }
}
