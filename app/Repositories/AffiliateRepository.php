<?php

namespace App\Repositories;


use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;

use App\Plugins\QformLibrary\Quform\Quform_Form;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Models\wpdb;

class AffiliateRepository
{

    protected $garageDB;
    protected $dataFiltersRulesModel;
    protected $settingOfDataBaseModel;

    public function __construct(DataFiltersRules $dataFiltersRulesModel, SettingOfDataBase $settingOfDataBaseModel)
    {
        $this->settingOfDataBaseModel = $settingOfDataBaseModel;
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;

    }


    public function getGarageFormsEntryById($id = null)
    {
       return DB::connection($this->garageDB)->select("SELECT * FROM weeklyex_wp126.wpau_quform_entries 
                        INNER JOIN weeklyex_wp126.wpau_quform_entry_data 
                        ON wpau_quform_entries.id = wpau_quform_entry_data.entry_id
                        WHERE form_id='$id'                      
                      ");
    }


    public function getDataFiltersRulesById($dataFiltersRulesId)
    {
        return $this->dataFiltersRulesModel
            ->where('data_filters_rules_id', $dataFiltersRulesId)
            ->with('settingOfDataBase')
            ->firstOrFail();
    }


    public function getSettingOfDataBaseById($dataFiltersRulesId)
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