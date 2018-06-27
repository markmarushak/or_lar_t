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
        return $this->hasOne(SettingOfDataBase::class, 'data_filters_rules_id', 'data_filters_rules_id');
    }

    public function AffiliatesPartners()
    {
        return $this->hasOne(AffiliatePartner::class, 'affiliates_partners_id', 'affiliates_partners_id');
    }

}
