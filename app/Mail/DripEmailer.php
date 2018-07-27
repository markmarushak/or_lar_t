<?php

namespace App\Mail;


use App\Services\DataFilterRuleService;

class DripEmailer
{
    public $dataFilterRuleService;
    public $emailBuilder;

    public function __construct(
        DataFilterRuleService $dataFilterRuleService,
        EmailBuilder $emailBuilder
    )
    {
        $this->dataFilterRuleService = $dataFilterRuleService;
        $this->emailBuilder = $emailBuilder;
    }

    public function send()
    {
     $dataFilterRule =  $this->dataFilterRuleService->getAllDataFiltersRules()->all();
     $this->emailBuilder->emailBuilder($dataFilterRule);
    }


}