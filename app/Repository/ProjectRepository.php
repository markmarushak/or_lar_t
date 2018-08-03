<?php


namespace App\Repository;


use App\Models\AffiliatePartner;
use App\Models\DataFiltersRules;
use App\Models\EmailNewsLetter;
use App\Plugins\QformLibrary\Quform\Quform_Repository;

class ProjectRepository
{
    protected $quformRepository;
    protected $dataFiltersRulesModel;
    protected $affiliatePartnerModel;
    protected $emailNewsLetterModel;

    public function __construct(
        Quform_Repository $quformRepository,
        DataFiltersRules $dataFiltersRules,
        AffiliatePartner $affiliatePartner,
        EmailNewsLetter $emailNewsLetterModel
    )
    {
        $this->quformRepository = $quformRepository;
        $this->dataFiltersRulesModel = $dataFiltersRules;
        $this->affiliatePartnerModel = $affiliatePartner;
        $this->emailNewsLetterModel = $emailNewsLetterModel;
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

    public function getPartnerWhichEmail($dataFilterRuleId)
    {
        return $this->dataFiltersRulesModel
            ->find($dataFilterRuleId)
            ->with('affiliatesPartners')
            ->firstOrFail()
            ->affiliatesPartners()
            ->whereNotNull('email')
            ->whereNotNull('name')
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

    public function getRuleByIdWithPartner($dataFiltersRulesId)
    {
        return $this->dataFiltersRulesModel
            ->find($dataFiltersRulesId)
            ->with('affiliatesPartners')
            ->firstOrFail();
    }

    public function receivers($projectId, $collectionOfPartner, $outputOverviewId)
    {
      $this->emailNewsLetterModel->fill(['project_id' => $projectId])->save();
    }

    public function setTimeSentEmail()
    {
       return $this->emailNewsLetterModel->select('project_id', 'created_at')->get()->all();
    }
}