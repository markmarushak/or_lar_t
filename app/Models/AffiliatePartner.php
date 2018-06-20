<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatePartner extends Model
{
    protected $fillable = ['description', 'country', 'type', 'rules', 'status'];

    protected $guarded = ['_token'];

    protected $table = 'affiliates_partners';



}