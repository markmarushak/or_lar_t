<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingOfDataBase extends Model
{
    protected $fillable = ['domain', 'host', 'host_name', 'port', 'database', 'username',
        'password', 'charset', 'collation'
    ];

    public function dataFiltersRules()
    {
        $this->belongsTo(DataFiltersRules::class, 'data_filters_rules_id');
    }

    public function add($fields)
    {
        $data = $this->fill($fields);
        $data->save();
    }

    public function edit($fields, $dataFiltersRules)
    {

        dd($fields, $dataFiltersRules);
        $data = $this->fill($fields);
        $data->save();
    }

}