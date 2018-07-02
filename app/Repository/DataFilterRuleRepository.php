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

    public function bindProjectAndPartner($dataFilterRule, $affiliatePartner)
    {
       $dataFilterRule->affiliatesPartners()->sync($affiliatePartner);
    }

    public function getRuleByIdWithPartner($dataFiltersRulesId)
    {
        return $this->dataFiltersRulesModel
            ->find($dataFiltersRulesId)
            ->with('affiliatesPartners')
            ->firstOrFail();
    }

    public function detachProjectAndPartner($dataFilterRule, $affiliatePartner)
    {

       return $dataFilterRule
           ->affiliatesPartners()
           ->detach($affiliatePartner);

    }

    public function showPartners($dataFilterRuleId)
    {

        return $this->dataFiltersRulesModel
            ->find($dataFilterRuleId)
            ->with('affiliatesPartners')
            ->firstOrFail()
            ->affiliatesPartners()
            ->firstOrFail();
    }

    public function getPartnerById($id)
    {
        return $this->affiliatePartnerModel->find($id);
    }

    public function editPartners($request){

    }

    public function deletePartners($request){

    }

    public function addPartners($request)
    {
        return $this->affiliatePartnerModel->where('description', '=', $request)->select('id')->get();
    }
}