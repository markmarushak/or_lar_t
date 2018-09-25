<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class API extends Model
{
    protected $table = 'api';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','email', 'password'];
    public $timestamps = false;

}
