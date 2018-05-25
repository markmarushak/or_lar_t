<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFiltersRules extends Model
{

    protected $fillable = ['description', 'category', 'source', 'country', ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_filters_rules';

    public $timestamps = false;

    public function settingsDataBase()
    {
        return $this->hasOne(SettingDataBase::class);
    }


    public static function add($fields)
    {
        $data = new static;
        $data->fill($fields);
        $data->save();
        return $data;
    }



}
