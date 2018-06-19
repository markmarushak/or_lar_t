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

    public function __construct(DataFiltersRules $dataFiltersRulesModel, SettingOfDataBase $settingOfDataBaseModel, Quform\Quform_Repository $quformRepository)
    {
        $this->settingOfDataBaseModel = $settingOfDataBaseModel;
        $this->quformRepository = $quformRepository;
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;

    }


    public function getGarageFormsEntryById($id = null)
    {
        global $wpdb;
        $forms = array();

        if ($id == '') {
            return $forms;
        }
        $sql = "SELECT * FROM " . $this->quformRepository->getEntriesTableName() . "
         INNER JOIN ".$this->quformRepository->getEntryDataTableName()."
         ON ".$this->quformRepository->getEntriesTableName().".id = ".$this->quformRepository->getEntryDataTableName().".entry_id
         WHERE form_id = ($id)";

        $forms = $wpdb->get_results($sql, ARRAY_A);

        return $forms;
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