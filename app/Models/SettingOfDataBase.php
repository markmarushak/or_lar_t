<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingOfDataBase extends Model
{
    protected $fillable = ['setting'];

    public function dataFiltersRules()
    {
        $this->belongsTo(DataFiltersRules::class, 'data_filters_rules_id');
    }

    public function add($settingOfDataBase, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject->settingOfDataBase()->updateOrCreate([
            'setting' => $settingOfDataBase
        ])->save();
    }

    public function edit($settingOfDataBase, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject->settingOfDataBase()->update([
            'setting' => $settingOfDataBase
        ]);

        
    }

}