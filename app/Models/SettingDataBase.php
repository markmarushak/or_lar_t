<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SettingDataBase extends Model
{
    protected $fillable = ['driver', 'host', 'port', 'database', 'username',
        'password', 'charset', 'collation', 'prefix'
    ];

    public function dataFiltersRules()
    {
        $this->belongsTo(DataFiltersRules::class);
    }
}