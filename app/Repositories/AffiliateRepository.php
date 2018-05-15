<?php

namespace App\Repositories;


use App\Quform_Form;
use Illuminate\Support\Facades\DB;

class AffiliateRepository
{

<<<<<<< HEAD
=======

>>>>>>> origin/back-end
    public function allGetGarageForms()
    {
       return DB::connection('garage')->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms");
    }

    public function allGetFiltersRulesById($dataFiltersRulesId)
    {
       return DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);
    }

    public function getGarageFormsEntryById($id = null)
    {
       return DB::connection('garage')->select("SELECT * FROM weeklyex_wp126.wpau_quform_entries 
                        INNER JOIN weeklyex_wp126.wpau_quform_entry_data 
                        ON wpau_quform_entries.id = wpau_quform_entry_data.entry_id
                        WHERE form_id='$id'                      
                      ");
    }

    public function getConfigById($id)
    {
        return DB::connection('garage')->select("SELECT config FROM weeklyex_wp126.wpau_quform_forms 
                          WHERE id='$id'                      
                      ");
    }

    public function findEntry($entryId, $form)
    {
        global $wpdb;
        $sql = "SELECT `entries`.*";
        $columns = array();
        foreach ($form->getRecursiveIterator() as $element) {

                if (true) {
                    dd($element);



                    $sql .= ", GROUP_CONCAT(IF (`data`.`element_id` = " . $element->getId() . " , `data`.`value`, NULL)) AS `element_" . $element->getId() . "`";

                    $columns['element_' . $element->getId()] = $element;
                }

        }

        $sql .= " FROM `" . 'quform_entries' . "` `entries`
LEFT JOIN `" . 'quform_entry_data' . "` `data` ON `data`.`entry_id` = `entries`.`id`
WHERE `entries`.`id` = %d
GROUP BY `data`.`entry_id`". $entryId;

        $wpdb->query('SET @@GROUP_CONCAT_MAX_LEN = 65535');

        return $wpdb->get_row($sql, ARRAY_A);
    }







}