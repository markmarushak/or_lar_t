<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFiltersRules extends Model
{



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



}
