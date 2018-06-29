<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFiltersRules extends Model
{

    protected $fillable = ['description', 'category', 'source', 'status', 'country', ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_filters_rules';

    public $timestamps = false;


    public function settingOfDataBase()
    {
        return $this->hasOne(SettingOfDataBase::class);
    }

    public function affiliatesPartners()
    {
        return $this->belongsToMany(AffiliatePartner::class, 'project_partners');
    }

}
