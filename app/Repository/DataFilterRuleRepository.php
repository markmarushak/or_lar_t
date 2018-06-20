<?php

namespace App\Repository;


use App\Models\DataFiltersRules;

class DataFilterRuleRepository
{
    protected $dataFiltersRulesModel;

    public function __construct(DataFiltersRules $dataFiltersRulesModel)
    {
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
    }

    public function addDataFilterRule($request)
    {
        return $this->dataFiltersRulesModel->fill($request->all())->save();
    }

    public function getAllDataFiltersRules()
    {
        return $this->dataFiltersRulesModel->all();
    }


}