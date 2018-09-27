<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TabName extends Model
{
    protected $table = 'tab_name';
    protected $fillable = ['name'];
    public $timestamps = false;
    private $tab_name = ["Dashboard", "Campaigns", "Offers", "Landers", "Flows", "Traffic sources", "Affiliate networks", "Conversions", "Country", "Connection", "Connection Type", "ISP / Carrier", "Mobile Carrier", "Devices", "Device types", "Brands", "Models", "OS", "OS version", "Browsers", "Browsers version", "Error log"];

    public function baseContent()
    {
        $db = DB::table('tab_name')->select('*')->get();
        $db = json_decode(json_encode($db), True);
        if(empty($db)){
            foreach ($this->tab_name as $tab){
                TabName::create([
                    'name' => $tab,
                    'parent_id' => 0
                ]);
            }
        }

    }
}
