<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MadnessCODE\Voluum\Response\Response;

class Responce extends Response
{
    public function getCsv()
    {
        return $this->response['data'];
    }
}
