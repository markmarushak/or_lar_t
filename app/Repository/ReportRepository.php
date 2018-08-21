<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReportRepository
{
    public function __construct()
    {

    }

    public function getReport($dataFiltersRulesId)
    {
        try
        {
            return $this->settingOfDataBaseModel
                ->where('data_filters_rules_id', $dataFiltersRulesId)
                ->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
           return false;
        }
    }
}
