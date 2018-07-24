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


    public function bindProjectAndPartner($dataFilterRule, $affiliatePartner)
    {
      return $affiliatePartner->dataFiltersRules()
          ->sync($dataFilterRule);
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
            ->select()
            ->get();
    }

    public function getPartnerById($id)
    {
        return $this->affiliatePartnerModel
            ->find($id)
            ->first();
    }

    public function editPartners($request)
    {

    }

    public function deletePartners($request)
    {

    }

    public function addPartners($request)
    {
        return $this->affiliatePartnerModel
            ->where('description', '=', $request)
            ->select('id')
            ->get();
    }

    public function addRules($affiliatePartnerId, $dataFilterRuleId, $newRule)
    {
        return $this->dataFiltersRulesModel
            ->find($dataFilterRuleId)
            ->with('affiliatesPartners')
            ->firstOrFail()
            ->affiliatesPartners()
            ->where('affiliate_partner_id', '=', $affiliatePartnerId)
            ->update(['rules' => $newRule]);
    }

    public function getRule($request)
    {
        return $this->dataFiltersRulesModel
            ->find($request['data_filter_rule_id'])
            ->with('affiliatesPartners')
            ->firstOrFail()
            ->affiliatesPartners()
            ->where('affiliate_partner_id', '=', $request['affiliate_partner_id'])
            ->select('rules')
            ->get();
    }
}