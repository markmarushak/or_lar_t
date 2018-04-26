<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemoteDBaccess extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


    public static function getConfig($data, $description)
    {
        return unserialize(base64_decode($data));
    }

}
