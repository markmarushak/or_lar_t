<?php

namespace App\Repositories;


use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;
use App\Plugins\QformLibrary\Quform;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Field;

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
        //Check if it's local domain assign local db credentials
        $this->garageDB = ($_SERVER['HTTP_HOST'] != 'admin.orbitleads.com')? "garage_dev": "garage";

    }

    public function allGetGarageForms()
    {
       return DB::connection($this->garageDB)->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms");
    }

    public function allGetFiltersRulesById($dataFiltersRulesId)
    {
       return DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);
    }

    public function getGarageFormsEntryById($id = null)
    {
       return DB::connection($this->garageDB)->select("SELECT * FROM weeklyex_wp126.wpau_quform_entries 
                        INNER JOIN weeklyex_wp126.wpau_quform_entry_data 
                        ON wpau_quform_entries.id = wpau_quform_entry_data.entry_id
                        WHERE form_id='$id'                      
                      ");
    }

    public function getFormIdFromEntryId($entryId)
    {
        $result = DB::connection($this->garageDB)->select("SELECT form_id FROM wpau_quform_entries WHERE `id` = '$entryId'");
        $formId = $result[0]->form_id;
        return $formId;
    }

    public function getQuformFormsById($id)
    {
        $result = DB::connection($this->garageDB)->select("SELECT * FROM wpau_quform_forms WHERE id = '$id'");
        return (array) $result[0];
    }


    public function getConfigById($id)
    {
        return DB::connection($this->garageDB)->select("SELECT config FROM weeklyex_wp126.wpau_quform_forms 
                          WHERE id='$id'                      
                      ");
    }

    public function findEntry($entryId, Quform_Form $form)
    {
        $array = [];

        $sql = "SELECT `entries`.*";
        $columns = array();
        foreach ($form->getRecursiveIterator() as $element) {
             if ($element->config('saveToDatabase')) {
                $sql .= ", GROUP_CONCAT(IF (`data`.`element_id` = " . $element->getId() .", `data`.`value`, NULL)) AS `element_" . $element->getId() ."`";
                $columns['element_' . $element->getId()] = $element;
                }
        }
        $sql .= " FROM `wpau_quform_entries` `entries`
LEFT JOIN `wpau_quform_entry_data` `data` ON `data`.`entry_id` = `entries`.`id`
WHERE `entries`.`id` =  ".$entryId."
GROUP BY `data`.`entry_id`";


        $result = DB::connection($this->garageDB)->select($sql);
        return (array) $result[0];
    }





    public function getRecentEntries($count = null)
    {
        if (is_numeric($count)) {
         $sql = "SELECT f.name, e.* FROM wpau_quform_entries e LEFT JOIN wpau_quform_forms f ON e.form_id = f.id ORDER BY e.created_at DESC LIMIT 10";
        }


        $result = DB::connection($this->garageDB)->select($sql);

        return $result;
    }



    /**
     * Mark the entries with the IDs in the given array as read
     *
     * @param   array  $ids  The array of entry IDs
     * @return  int          The number of affected rows
     */
    public function readEntries(array $ids)
    {
        $ids = $this->prepareIds($ids);

        if ($ids == '') {
            return 0;
        }
        $sql = "UPDATE wpau_quform_entries SET unread = 0 WHERE id IN ($ids)";

        return DB::connection($this->garageDB)->select($sql);
    }



    /**
     * Prepare an array of IDs for use in an IN clause
     *
     * @param   array   $ids  The array of IDs
     * @return  string        The sanitised string for the IN clause
     */
    protected function prepareIds(array $ids)
    {
        //TODO fix array to string
        $ids = $this->sanitiseIds($ids);
        $ids = (int) implode('', $ids);
        //$ids = array_map('esc_sql', $ids);
       // $ids = join(',', $ids);

        return $ids;
    }

    /**
     * Sanitise the array of IDs ensuring they are all positive integers
     *
     * @param   array   $ids  The array of IDs
     * @return  array         The array of sanitised IDs
     */
    protected function sanitiseIds(array $ids)
    {
        $sanitised = array();

        foreach ($ids as $id) {
            if ( ! is_numeric($id)) {
                continue;
            }

            $id = (int) $id;

            if ($id > 0) {
                $sanitised[] = $id;
            }
        }

        $sanitised = array_unique($sanitised);

        return $sanitised;
    }


    /**
     * Get the entry label data from the given label IDs
     *
     * @param   int    $entryId
     * @return  array
     */
    public function getEntryLabels($entryId)
    {

        $sql ="SELECT * FROM wpau_quform_entry_labels WHERE `id` IN (SELECT entry_label_id FROM wpau_quform_entry_entry_labels WHERE entry_id =$entryId)";

        $labels = DB::connection($this->garageDB)->select($sql);
        if ( ! is_array($labels)) {
            $labels = array();
        }
        return $labels;
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