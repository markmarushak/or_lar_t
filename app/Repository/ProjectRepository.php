<?php


namespace App\Repository;


use App\Plugins\QformLibrary\Quform\Quform_Repository;

class ProjectRepository
{
    protected $quformRepository;

    public function __construct(Quform_Repository $quformRepository)
    {
        $this->quformRepository = $quformRepository;
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