<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MadnessCODE\Voluum\Auth;
use MadnessCODE\Voluum\Transport;

class API extends \MadnessCODE\Voluum\Client\API
{
    public $auth;

    public function __construct(Auth\OAuthInterface $auth)
    {
        parent::__construct($auth);
        $this->transport = new CurlController($this);
    }
}
