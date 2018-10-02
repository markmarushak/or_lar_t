<?php

namespace App\Http\Controllers\Settings\API;

use App\Models\API;
use App\Http\Controllers\Controller;
use App\Models\TabDescription;
use App\Models\TabName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use MadnessCODE\Voluum\Auth\PasswordCredentials;


class SettingsApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function connect(Request $request = null)
    {
        $url = Route::getFacadeRoot()->current()->uri();;
        $data['user'] = Auth::id();
        $db = DB::table('api')->where('user_id',$data['user'])->select('email','password')->get();
        $db = json_decode(json_encode($db),True);
        if  (!empty($db)){
            return true;
        }
        elseif($url !== 'settings-service/api/send') {
            return false;
        }else{
            $data['email'] = $request->input('email-api');
            $data['password'] = $request->input('password-api');
            return $this->create($data);
        }
    }

    public function apiConnect()
    {
        $db = DB::table('api')->where('user_id', Auth::id())->select('email','password')->get();
        $db = json_decode(json_encode($db),True);
        $email = $db[0]['email'];
        $pass = decrypt($db[0]['password']);
        $client = new \MadnessCODE\Voluum\Client\API(new PasswordCredentials($email,$pass));
        $report_api = new \MadnessCODE\Voluum\API($client);
        return $report_api;
    }

    public function get($request,array $option)
    {
        $connect = $this->apiConnect();
        $req = $connect->get($request,$option);
        $result = $req->getData();
        $result = json_decode(json_encode($result),true);
        return $result;
    }

    public function post($request,array $option)
    {
        $connect = $this->apiConnect();
        $req = $connect->post($request,$option);
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
    public function getReport(array $option)
    {
        $connect = $this->apiConnect();

        $from = [
          'today' => $this->timeDate('0','+'),
          'yesterday' => $this->timeDate('1','-'),
            //TODO:доделать список времени
        ];
        $option['to'] = $this->timeDate('1','+');
        if(isset($option['time'])){
            $option['from'] = $from[$option['time']];
        }else{
            $option['from'] = $from['today'];
        }
        $req = $connect->get('report',$option);
        $result = $req->getData();
        $result = json_decode(json_encode($result),true);
        return $result;
    }

    public function rows($group_name)
    {
        $group = DB::table('tab_name')
            ->join('tab_description', function ($join) use ($group_name){

               $join->on('tab_name.id','=','tab_description.tab_id')
                    ->where('tab_name.name','like', $group_name.'%');
            })
            ->select('tab_description.id','tab_description.key','tab_description.label','tab_description.type','tab_description.status')
            ->get();
        $group = json_decode(json_encode($group),true);
        if($group){

        }
        $cols = [];
        $type = ['string','uuid','long','double'];
        foreach ($type as $types){
            foreach ($group as $g){
                if (strcasecmp($g['type'],$types) == 0)
                    $cols[] = $g;
            }
        }


        return $cols;
    }

    public function timeDate($number,$switchTime)
    {
        return date('Y-m-d',strtotime(date('Y-m-d').$switchTime.$number.' days'));
    }

    public function allTabDescription($tab_name)
    {
        $columns = $tab_name;
        $cols = [];
        foreach ($columns as $column => $group)
        {
            $groupBy = trim($column);
            $tab_id = DB::table('tab_name')->where('name', 'like', $groupBy.'%')->select('id')->get();
            $tab_id = json_decode(json_encode($tab_id),True);
            if(empty($tab_id)){
                $tab_name = new TabName();
                $tab_name->baseContent();
                $tab_id = DB::table('tab_name')->where('name', '=', $groupBy)->select('id')->get();
                $tab_id = json_decode(json_encode($tab_id),True);
            }
            $tab_id = $tab_id[0]['id'];

            if(json_decode(json_encode(DB::table('tab_description')->where('tab_id','=',$tab_id)->select('id')->get()),true) == false)
            {
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

                foreach ($cols as $col){
                    TabDescription::create([
                        'tab_id' => $tab_id,
                        'key' => $col['key'],
                        'label' => $col['label'],
                        'type' => $col['type'],
                        'status' => 0
                    ]);
                }
                DB::table('tab_name')->where('id','=',$tab_id)->update(['status'=>'load']);
                return true;
            }
        }
    }

    public function create(array $data)
    {
        API::create([
            'user_id' => $data['user'],
            'email' => $data['email'],
            'password' => encrypt($data['password']),
        ]);

        return redirect('home');

    }

}
