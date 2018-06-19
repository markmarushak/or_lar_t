<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatePartner extends Model
{
    protected $fillable = [ 'description', 'country', 'host', 'type', 'rules', 'status' ];



}