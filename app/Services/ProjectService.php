<?php

namespace App\Services;


use App\Plugins\QformLibrary\Quform\Form\Quform_Form_Factory;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use App\Repository\ProjectRepository;

class ProjectService
{

    protected $quformRepository;
    protected $quformFormFactory;
    protected $projectRepository;

    public $nameEntry;

    public function __construct(
        Quform_Repository $quformRepository,
        Quform_Form_Factory $quformFormFactory,
        ProjectRepository $projectRepository
    )
    {
        $this->quformRepository = $quformRepository;
        $this->quformFormFactory = $quformFormFactory;
        $this->projectRepository = $projectRepository;
    }


    public function createUrls($forms, $dataFiltersRulesDescription )
    {
        foreach ($forms as $singleForm) {
            $urls[$singleForm['name']] = 'http://www.'.$dataFiltersRulesDescription.'/wp-admin/admin.php?page=quform.forms&sp=edit&id='.$singleForm['id'].'';
        }
        return $urls;
    }

    public function getRecentEntries()
    {
        return $this->quformRepository->getRecentEntries();
    }

    public function getForms()
    {
        return $this->quformRepository->getForms();
    }

    public function getFormById($formId)
    {
        return $this->projectRepository->getFormsEntryById($formId);
    }

    public function outputOverviewSingleService($entryId)
    {
        $formId = $this->quformRepository->getFormIdFromEntryId($entryId);
        $config = $this->quformRepository->getConfig($formId);
        $config['environment'] = 'viewEntry';
        $this->nameEntry = $config['name'];

        $form = $this->quformFormFactory->create($config);
        $entry = $this->quformRepository->findEntry($entryId, $form);
        foreach ($entry as $key => $value) {
            if (preg_match('/element_(\d+)/', $key, $matches)) {
                $elementId = $matches[1];
                $form->setValueFromStorage($elementId, $value);
                unset($entry[$key]);
            }
        }

        // Calculate which elements are hidden by conditional logic and which groups are empty
        $form->calculateElementVisibility();

        if (Route::currentRouteName() == 'single-output-overview' ) {
            if ($entry['unread'] == 1) {
                $this->quformRepository->readEntries(array($entry['id']));
            }
        }

        // Get label data from label IDs
        $entry['labels'] = $this->quformRepository->getEntryLabels($entryId);
//        $data = array(
//            'options' => $this->options,
//            'form' => $form,
//            'entry' => $entry,
//            'showEmptyFields' => Quform::get($_COOKIE, 'qfb-show-empty-fields') ? true : false,
//            'labels' => $this->repository->getFormEntryLabels($form->getId())
//        );
        return $form;
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