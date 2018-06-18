<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingOfDataBase extends Model
{
    protected $fillable = ['domain', 'form', 'host', 'host_name', 'port', 'database', 'username',
        'password', 'charset', 'collation'
    ];

    public function dataFiltersRules()
    {
        $this->belongsTo(DataFiltersRules::class, 'data_filters_rules_id');
    }

    public function add($request, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject->settingOfDataBase()->updateOrCreate($request->only( 'domain', 'form', 'host', 'host_name', 'port', 'database', 'username',
            'password', 'charset', 'collation'
        ));
    }

    public function edit($request, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject->settingOfDataBase()->update($request->only( 'domain', 'form', 'host', 'host_name', 'port', 'database', 'username',
            'password', 'charset', 'collation'
        ));
    }

}