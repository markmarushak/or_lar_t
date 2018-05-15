<?php

namespace App\Repositories;

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







}