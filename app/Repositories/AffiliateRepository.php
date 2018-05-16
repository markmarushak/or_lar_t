<?php

namespace App\Repositories;


use App\Quform_Form;
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

    public function findEntry($entryId, $form)
    {
        $array = [];

        global $wpdb;
        $sql = "SELECT `entries`.*";
        $columns = array();
        foreach ($form->getRecursiveIterator() as $element) {
                if (true) {

                    $sql .= ", GROUP_CONCAT(IF (`data`.`element_id` = " . $element->getId() . " , `data`.`value`, NULL)) AS `element_" . $element->getId() . "`";

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


        $sql .= " FROM `" . 'quform_entries' . "` `entries`
LEFT JOIN `" . 'quform_entry_data' . "` `data` ON `data`.`entry_id` = `entries`.`id`
WHERE `entries`.`id` = %d
GROUP BY `data`.`entry_id`". $entryId;
        return $value ;
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