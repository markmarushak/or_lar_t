<?php


namespace App\Repository;


use App\Models\AffiliatePartner;
use App\Models\DataFiltersRules;
use App\Plugins\QformLibrary\Quform\Quform_Repository;

class ProjectRepository
{
    protected $quformRepository;
    protected $dataFiltersRulesModel;
    protected $affiliatePartnerModel;

    public function __construct(
        Quform_Repository $quformRepository,
        DataFiltersRules $dataFiltersRules,
        AffiliatePartner $affiliatePartner
    )
    {
        $this->quformRepository = $quformRepository;
        $this->dataFiltersRulesModel = $dataFiltersRules;
        $this->affiliatePartnerModel = $affiliatePartner;
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
        return $affiliatePartner->dataFiltersRules()
            ->sync($dataFilterRule);
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