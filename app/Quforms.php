<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quforms extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }



    public static function getTagsList($data, $description)
    {
        $data = unserialize(base64_decode($data));


        return $data['elements'][0]['elements'];
    }

}
