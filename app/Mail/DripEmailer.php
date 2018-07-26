<?php

namespace App\Mail;


use App\Services\DataFilterRuleService;

class DripEmailer
{
    public $dataFilterRuleService;

    public function __construct(DataFilterRuleService $dataFilterRuleService)
    {
        $this->dataFilterRuleService = $dataFilterRuleService;
    }

    public function send()
    {
     $dataFilterRule =  $this->dataFilterRuleService->getAllDataFiltersRules()->all();
     dd($dataFilterRule);
    }

}