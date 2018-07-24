<?php


namespace App\Services;

use App\Plugins\QformLibrary\Quform\Form\Quform_Form_Factory;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use App\Repository\DataFilterRuleRepository;

class DataFilterRuleService
{
    protected $quformRepository;
    protected $quformFormFactory;
    protected $dataFilterRuleRepository;

    public $nameEntry;

    public function __construct(
        Quform_Repository $quformRepository,
        Quform_Form_Factory $quformFormFactory,
        DataFilterRuleRepository $dataFilterRuleRepository
    )
    {
        $this->quformRepository = $quformRepository;
        $this->quformFormFactory = $quformFormFactory;
        $this->dataFilterRuleRepository = $dataFilterRuleRepository;
    }

    public function addDataFilterRule($request)
    {
        $this->dataFilterRuleRepository->addDataFilterRule($request);
    }

    public function getAllDataFiltersRules()
    {
        return $this->dataFilterRuleRepository->getAllDataFiltersRules();
    }

    public function getDataFiltersRulesById($request)
    {
        return $this->dataFilterRuleRepository->getDataFiltersRulesById($request);
    }

    public function editDataFiltersRulesById($request)
    {
        return $this->dataFilterRuleRepository->editDataFiltersRulesById($request);
    }

    public function bindProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId)
    {
        $affiliatePartner = $this->dataFilterRuleRepository->getPartnerById($affiliatePartnerId);
        $dataFilterRule =  $this->dataFilterRuleRepository->getRuleByIdWithPartner($dataFiltersRulesId);
        $this->dataFilterRuleRepository->bindProjectAndPartner($dataFilterRule, $affiliatePartner);

    }

    public function detachProjectAndPartner($dataFiltersRulesId, $affiliatePartnerId)
    {
        $affiliatePartner = $this->dataFilterRuleRepository->getPartnerById($affiliatePartnerId);
        $dataFilterRule =  $this->dataFilterRuleRepository->getRuleByIdWithPartner($dataFiltersRulesId);
        return $this->dataFilterRuleRepository->detachProjectAndPartner($dataFilterRule, $affiliatePartner);
    }

    public function showPartners($dataFilterRuleId){
        return $this->dataFilterRuleRepository->showPartners($dataFilterRuleId);
    }

    public function getPartners($request)
    {
        return $this->dataFilterRuleRepository->getPartners($request);
    }

    public function editPartners($request)
    {
        $this->dataFilterRuleRepository->editPartners($request);
    }

    public function deletePartners($request)
    {
        $this->dataFilterRuleRepository->deletePartners($request);
    }

    public function addPartners($request)
    {
        return $this->dataFilterRuleRepository->addPartners($request);
    }

    public function addRules($request)
    {
        $affiliatePartnerId = $request['affiliate_partner_id'];
        $dataFilterRuleId =  $request['data_filter_rules_id'];
        $newRule = $request['new_rule'];
        $this->dataFilterRuleRepository->addRules($affiliatePartnerId, $dataFilterRuleId, $newRule);
    }

    public function getRule($request)
    {
        return $this->dataFilterRuleRepository->getRule($request);
    }


}