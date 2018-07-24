<?php

namespace App\Services;


class NewsletterService extends DataFilterRuleService
{
    private $dataFilterRuleId;
    private $dataFilterRuleDescription;
    private $dataFilterRuleCategory;

    public function newsletterService()
    {
       $dataFiltersRules = $this->getAllDataFiltersRules();
       if (isset($dataFiltersRules) && !empty($dataFiltersRules)) {
           foreach ($dataFiltersRules as $dataFilterRule) {
              $this->dataFilterRuleId = $dataFilterRule->id;
               $this->dataFilterRuleDescription = $dataFilterRule->description;
               $this->dataFilterRuleCategory = $dataFilterRule->category;
           }

       }

    }
}