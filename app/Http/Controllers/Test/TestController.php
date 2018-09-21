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
        $columns = [" Campaign", " Campaign ID", " External campaign ID", " Campaign URL", " Campaign country tag", " Campaign workspace", " Campaign workspace ID", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors", " Postback URL", " Redirect", " Cost model", " CPA", " CPC", " CPM"];

        $connect = new SettingsApiController();
        $result = $connect->getReport(['groupBy'=>'campaign',['columns'=>'ap'] ],date('Y-m-d'), $to);

        foreach ($result['columnMappings'] as $row)
        {
            foreach ($columns as $col)
            {
                $col = trim($col);
                $row['label'] = trim($row['label']);
                if (strcasecmp($col, $row['label']) == 0){
                    $cols[] = $row;
                }
            }
        }

        return view('test.index',[
            'row' => $result['rows'],
            'th'     => $cols
        ]);
    }
}
