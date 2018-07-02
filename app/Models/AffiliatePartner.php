<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatePartner extends Model
{
    protected $fillable = ['description', 'country', 'type', 'rules'];

    protected $guarded = ['_token'];

    protected $table = 'affiliates_partners';


    public function dataFiltersRules()
    {
        return $this->belongsToMany(DataFiltersRules::class, 'project_partners');
    }

}