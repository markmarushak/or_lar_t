<?php

namespace App\Repository;


use App\Models\DataFiltersRules;
use App\Plugins\QformLibrary\Quform\Quform_Repository;

class DataFilterRuleRepository
{
    protected $dataFiltersRulesModel;
    protected $quformRepository;

    public function __construct(DataFiltersRules $dataFiltersRulesModel, Quform_Repository $quformRepository)
    {
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
        $this->quformRepository = $quformRepository;
    }

    public function addDataFilterRule($request)
    {
        return $this->dataFiltersRulesModel->fill($request->all())->save();
    }

    public function getAllDataFiltersRules()
    {
        return $this->dataFiltersRulesModel->all();
    }

    public function getFormsEntryById($id = null)
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
}