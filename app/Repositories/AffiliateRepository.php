<?php

namespace App\Repositories;


use App\Models\DataFiltersRules;
use App\Plugins\QformLibrary\Quform;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Field;

use App\Plugins\QformLibrary\Quform\Quform_Form;
use Illuminate\Support\Facades\DB;

use App\Models\wpdb;

class AffiliateRepository
{

    protected $garageDB;
    protected $dataFiltersRulesModel;

    public function __construct(DataFiltersRules $dataFiltersRulesModel)
    {
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




    //TODO fix limit
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


    /**
     * Get form rows, including counts of read and unread entries
     *
     * @param   array  $args  The query args
     * @return  array
     */
    public function getForms(array $args = array())
    {

        global $wpdb;
        $wpdb = new wpdb( 'root', 'q', 'weeklyex_wp126', 'localhost' );

            $args = wp_parse_args($args, array(
            'active' => null,
            'orderby' => 'updated_at',
            'order' => 'DESC',
            'trashed' => false,
            'offset' => 0,
            'limit' => 20,
            'search' => ''
            ));



        $sql = "SELECT SQL_CALC_FOUND_ROWS f.id, f.name, f.active, f.trashed, f.updated_at,
                COALESCE(e.cnt, 0) AS entries,
                COALESCE(u.cnt, 0) AS unread
                FROM wpau_quform_forms f
                LEFT JOIN ( SELECT form_id, COUNT(*) AS cnt FROM wpau_quform_entries GROUP BY form_id ) e
                ON f.id = e.form_id
                LEFT JOIN ( SELECT form_id, COUNT(*) AS cnt FROM wpau_quform_entries WHERE unread = 1 GROUP BY form_id ) u
                ON f.id = u.form_id";

        $where = array($wpdb->prepare('trashed = %d', $args['trashed'] ? 1 : 0));

        if ($args['active'] !== null) {
            $where[] = $wpdb->prepare('active = %d', $args['active'] ? 1 : 0);
        }

        if (Quform::isNonEmptyString($args['search'])) {
            $args['search'] = $wpdb->esc_like($args['search']);
            $where[] = $wpdb->prepare("name LIKE '%s'", '%' . $args['search'] . '%');
        }

        $sql .= " WHERE " . join(' AND ', $where);

        // Sanitise order/limit
        $args['orderby'] = in_array($args['orderby'], array('id', 'name', 'entries', 'active', 'created_at', 'updated_at')) ? $args['orderby'] : 'updated_at';
        $args['order'] = strtoupper($args['order']);
        $args['order'] = in_array($args['order'], array('ASC', 'DESC')) ? $args['order'] : 'DESC';
        $args['limit'] = (int) $args['limit'];
        $args['offset'] = (int) $args['offset'];

        $sql .= " ORDER BY `{$args['orderby']}` {$args['order']} LIMIT {$args['limit']} OFFSET {$args['offset']}";

        return $wpdb->get_results($sql, ARRAY_A);
    }




    public function getDataFiltersRulesById($dataFiltersRulesId)
    {
        return $this->dataFiltersRulesModel
            ->where('data_filters_rules_id', $dataFiltersRulesId)
            ->with('settingOfDataBase')
            ->firstOrFail();
    }

}