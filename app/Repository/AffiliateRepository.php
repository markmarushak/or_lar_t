<?php

namespace App\Repository;

use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AffiliateRepository
{
    protected $quformRepository;
    protected $settingOfDataBaseModel;
    protected $dataFiltersRulesModel;

    public function __construct(
        SettingOfDataBase $settingOfDataBaseModel,
        Quform_Repository $quformRepository,
        DataFiltersRules  $dataFiltersRulesModel
    )
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
    public function getDataFiltersRulesById($dataFiltersRulesId)
    {
        return $this->dataFiltersRulesModel
            ->where('data_filters_rules_id', $dataFiltersRulesId)
            ->with('settingOfDataBase')
            ->firstOrFail();
    }

    public function editConnectToDb($settingOfDataBase, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject->settingOfDataBase()->update([
            'setting' => $settingOfDataBase
        ]);
    }

    public function addConnectToDb($settingOfDataBase, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject->settingOfDataBase()->updateOrCreate([
            'setting' => $settingOfDataBase
        ])->save();
    }


}