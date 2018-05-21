<?php

namespace App\Repositories;


use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Field;

use App\Plugins\QformLibrary\Quform\Quform_Form;
use Illuminate\Support\Facades\DB;

class AffiliateRepository
{


    public function allGetGarageForms()
    {
       return DB::connection('garage_dev')->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms");
    }

    public function allGetFiltersRulesById($dataFiltersRulesId)
    {
       return DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);
    }

    public function getGarageFormsEntryById($id = null)
    {
       return DB::connection('garage_dev')->select("SELECT * FROM weeklyex_wp126.wpau_quform_entries 
                        INNER JOIN weeklyex_wp126.wpau_quform_entry_data 
                        ON wpau_quform_entries.id = wpau_quform_entry_data.entry_id
                        WHERE form_id='$id'                      
                      ");
    }

    public function getConfigById($id)
    {
        return DB::connection('garage_dev')->select("SELECT config FROM weeklyex_wp126.wpau_quform_forms 
                          WHERE id='$id'                      
                      ");
    }

    public function findEntry($entryId, Quform_Form $form)
    {
        $array = [];

        global $wpdb;
        $sql = "SELECT `entries`.*";
        $columns = array();
        foreach ($form->getRecursiveIterator() as $element) {
            if ($element->config('saveToDatabase')) {
                    $columns['element_' . $element->getId()] = $element;
                }

        }



        $wpdb = 'SET @@GROUP_CONCAT_MAX_LEN = 65535';

          $value = ["Behov:",
              "Byggestart", "Gateadresse","Postnummer","Garasje med loft?",
                "Takkonstruksjon",
             "Lengde på garasjen?",  "Bredde på garasjen?",  "Ditt navn",
 "Telefon nummer", "Email address",
 "Utfyllende informasjon"
            ];

        $sql = "SELECT `entries`.*, GROUP_CONCAT(IF (`data`.`element_id` = 20, `data`.`value`, NULL)) AS `element_20`, GROUP_CONCAT(IF (`data`.`element_id` = 30, `data`.`value`, NULL)) AS `element_30`, GROUP_CONCAT(IF (`data`.`element_id` = 25, `data`.`value`, NULL)) AS `element_25`, GROUP_CONCAT(IF (`data`.`element_id` = 42, `data`.`value`, NULL)) AS `element_42`, GROUP_CONCAT(IF (`data`.`element_id` = 37, `data`.`value`, NULL)) AS `element_37`, GROUP_CONCAT(IF (`data`.`element_id` = 61, `data`.`value`, NULL)) AS `element_61`, GROUP_CONCAT(IF (`data`.`element_id` = 63, `data`.`value`, NULL)) AS `element_63`, GROUP_CONCAT(IF (`data`.`element_id` = 65, `data`.`value`, NULL)) AS `element_65`, GROUP_CONCAT(IF (`data`.`element_id` = 66, `data`.`value`, NULL)) AS `element_66`, GROUP_CONCAT(IF (`data`.`element_id` = 67, `data`.`value`, NULL)) AS `element_67`, GROUP_CONCAT(IF (`data`.`element_id` = 68, `data`.`value`, NULL)) AS `element_68`, GROUP_CONCAT(IF (`data`.`element_id` = 70, `data`.`value`, NULL)) AS `element_70`, GROUP_CONCAT(IF (`data`.`element_id` = 71, `data`.`value`, NULL)) AS `element_71`, GROUP_CONCAT(IF (`data`.`element_id` = 78, `data`.`value`, NULL)) AS `element_78`, GROUP_CONCAT(IF (`data`.`element_id` = 79, `data`.`value`, NULL)) AS `element_79`, GROUP_CONCAT(IF (`data`.`element_id` = 50, `data`.`value`, NULL)) AS `element_50`, GROUP_CONCAT(IF (`data`.`element_id` = 54, `data`.`value`, NULL)) AS `element_54`, GROUP_CONCAT(IF (`data`.`element_id` = 55, `data`.`value`, NULL)) AS `element_55`, GROUP_CONCAT(IF (`data`.`element_id` = 56, `data`.`value`, NULL)) AS `element_56`, GROUP_CONCAT(IF (`data`.`element_id` = 57, `data`.`value`, NULL)) AS `element_57`, GROUP_CONCAT(IF (`data`.`element_id` = 11, `data`.`value`, NULL)) AS `element_11`, GROUP_CONCAT(IF (`data`.`element_id` = 81, `data`.`value`, NULL)) AS `element_81`, GROUP_CONCAT(IF (`data`.`element_id` = 26, `data`.`value`, NULL)) AS `element_26`, GROUP_CONCAT(IF (`data`.`element_id` = 80, `data`.`value`, NULL)) AS `element_80` FROM `wpau_quform_entries` `entries`
LEFT JOIN `wpau_quform_entry_data` `data` ON `data`.`entry_id` = `entries`.`id`
WHERE `entries`.`id` = 5
GROUP BY `data`.`entry_id`";

        return DB::connection('garage_dev')->select($sql);
    }


    public function getLabelForAffiliate()
    {

        DB::connection('garage_dev')->select("SELECT * FROM weeklyex_wp126.wpau_quform_entries 
                        INNER JOIN weeklyex_wp126.wpau_quform_entry_data 
                        ON wpau_quform_entries.id = wpau_quform_entry_data.entry_id
                        WHERE form_id='id'                      
                      ");


      return  $label = [ "GARASJE",  "Dobbeltgarasje ink. garasjeport","2018",
            "",  "", "Ja", "Halvvalmet tak", "",  "", "Josip", "98002513","maki.jmaric@gmail.com"
            , ""];
    }

}