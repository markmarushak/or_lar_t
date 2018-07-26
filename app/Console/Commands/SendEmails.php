<?php

namespace App\Console\Commands;

use App\Mail\DripEmailer;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    protected $signature = 'email:send';

    protected $description = 'Send drip e-mail to a user whitch do not read output overview' ;

    protected $drip;

    public function __construct(DripEmailer $drip)
    {
        parent::__construct();
            $this->drip = $drip;
    }

    public function handle()
    {
        $this->drip->send();
    }
}