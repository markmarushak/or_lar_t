<?php

namespace App\Http\Controllers\Settings\API;

use App\Models\API;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use MadnessCODE\Voluum\Auth\PasswordCredentials;


class SettingsApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->connect();
    }

    public function connect()
    {
        $url = Route::getFacadeRoot()->current()->uri();;

        $data['user'] = Auth::id();
        $db = DB::table('api')->where('user_id',$data['user'])->select('email','password')->get();
        $db = json_decode(json_encode($db),True);
        if  (!empty($db)){
            return $this->apiConnect($db);
        }
        elseif($url !== 'settings-service/api') {
            return false;
        }
    }

    public function apiConnect($db)
    {
        $email = $db[0]['email'];
        $pass = decrypt($db[0]['password']);
        $client = new \MadnessCODE\Voluum\Client\API(new PasswordCredentials($email,$pass));

        $report_api = new \MadnessCODE\Voluum\API($client);
        return $report_api;
    }

    public function get($request,array $option)
    {
        $connect = $this->connect();
        $req = $connect->get($request,$option);
        $result = $req->getData();
        $result = json_decode(json_encode($result),true);
        return $result;
    }

    /**
     * Get function only report with option [campaign,offers,lander, flows, Traffic source, Affiliate] ....
     * option = ['groupBy'=>'campaign']----|Example
     * Attention format-date ONLY" date('Y-m-d') ", because function not working!!!!!
     *
     * @param string $request
     * @param array $option
     * @return mixed
     */
    public function getReport(array $option, $timeFrom, $timeTo)
    {
        $connect = $this->connect();
        $option['to'] = $timeTo;
        $option['from'] = $timeFrom;
        $req = $connect->get('report',$option);
        $result = $req->getData();
        $result = json_decode(json_encode($result),true);
        return $result;
    }

    public function create(array $data)
    {
        return API::create([
            'user_id' => $data['user'],
            'email' => $data['email'],
            'password' => encrypt($data['password']),
        ]);

    }

}
