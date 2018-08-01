<?php

namespace App\Repository;


use App\Models\DataFiltersRules;
use App\Models\AffiliatePartner;
use App\Models\EmailLetter;
use App\Plugins\QformLibrary\Quform\Quform_Repository;

class DataFilterRuleRepository
{
    protected $dataFiltersRulesModel;
    protected $quformRepository;
    protected $affiliatePartnerModel;
    protected $emailLetter;

    public function __construct(
        DataFiltersRules $dataFiltersRulesModel,
        Quform_Repository $quformRepository,
        AffiliatePartner $affiliatePartnerModel,
        EmailLetter $emailLetter
    )
    {
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
        $this->quformRepository = $quformRepository;
        $this->affiliatePartnerModel = $affiliatePartnerModel;
        $this->emailLetter = $emailLetter;
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

    public function getEmailSend()
    {
        $this->emailLetter->fill([
            'data_filter_rule_id' => 1,
            'output_overview_id' => 5
        ])->save();
    }




}