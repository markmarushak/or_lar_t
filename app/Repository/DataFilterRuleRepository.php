<?php

namespace App\Repository;


use App\Models\DataFiltersRules;
use App\Models\AffiliatePartner;
use App\Plugins\QformLibrary\Quform\Quform_Repository;

class DataFilterRuleRepository
{
    protected $dataFiltersRulesModel;
    protected $quformRepository;
    protected $affiliatePartnerModel;

    public function __construct(DataFiltersRules $dataFiltersRulesModel, Quform_Repository $quformRepository, AffiliatePartner $affiliatePartnerModel)
    {
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
        $this->quformRepository = $quformRepository;
        $this->affiliatePartnerModel = $affiliatePartnerModel;
    }

    public function addDataFilterRule($request)
    {
        return $this->dataFiltersRulesModel->fill($request->all())->save();
    }

    public function getAllDataFiltersRules()
    {
        return $this->dataFiltersRulesModel->select()->get();
    }

    public function getDataFiltersRulesById($request)
    {
        return $this->dataFiltersRulesModel->where('id', '=', $request->all())->select()->get();
    }

    public function editDataFiltersRulesById($request)
    {
        $this->dataFiltersRulesModel->where('id', '=', $request['id'])->update([
            'description' => $request['description'],
            'category'=> $request['category'],
            'source'=>$request['source'],
            'status'=>$request['status'],
            'country'=>$request['country']
        ]);
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

    public function bindProjectAndPartner($dataFiltersRulesId)
    {
        $model = new AffiliatePartner;
//        $var = $this->dataFiltersRulesModel
//            ->where('data_filters_rules_id' ,$dataFiltersRulesId)
//            ->firstOrFail()
//        ->affiliatesPartners()
//            ->firstOrFail();
            $var2 = $model
                ->where('id', 34)
                ->firstOrFail()
            ->dataFiltersRules()->firstOrFail();
        dd($var2);
    }

    public function showPartners(){
        return $this->affiliatePartnerModel->select()->get();
    }

    public function getPartners($request){

    }

    public function editPartners($request){

    }

    public function deletePartners($request){

    }

    public function addPartners($request)
    {

    }
}