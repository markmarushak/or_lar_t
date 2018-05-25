<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingOfDataBase extends Model
{
    protected $fillable = ['driver', 'host', 'port', 'database', 'username',
        'password', 'charset', 'collation', 'prefix', 'domain'
    ];

    public function dataFiltersRules()
    {
        $this->belongsTo(DataFiltersRules::class);
    }

    public function add($fields)
    {
        $this->fill($fields);
        $this->save();
    }

}