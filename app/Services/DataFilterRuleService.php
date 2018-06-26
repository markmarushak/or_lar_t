<?php


namespace App\Services;

use App\Plugins\QformLibrary\Quform\Admin\Page\Forms\Quform_Admin_Page_Forms_Edit;
use App\Plugins\QformLibrary\Quform\Form\Quform_Form_Factory;
use App\Plugins\QformLibrary\Quform\Quform_Builder;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use App\Repository\DataFilterRuleRepository;


class DataFilterRuleService extends BaseService
{
    protected $quformRepository;
    protected $quformFormFactory;
    protected $dataFilterRuleRepository;
    protected $quformBuilder;
    protected $Quform_Admin_Page_Forms_Edit;

    public $nameEntry;

    public function __construct(
        Quform_Repository $quformRepository,
        Quform_Form_Factory $quformFormFactory,
        DataFilterRuleRepository $dataFilterRuleRepository,
        Quform_Builder $quformBuilder,
        Quform_Admin_Page_Forms_Edit $Quform_Admin_Page_Forms_Edit
    )
    {
        $this->quformRepository = $quformRepository;
        $this->quformFormFactory = $quformFormFactory;
        $this->dataFilterRuleRepository = $dataFilterRuleRepository;
        $this->quformBuilder = $quformBuilder;
        $this->Quform_Admin_Page_Forms_Edit = $Quform_Admin_Page_Forms_Edit;
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

    public function getFormById($form_id)
    {
        return $this->dataFilterRuleRepository->getFormsEntryById($form_id);
    }

    public function getSingleForm($singleId)
    {
        $singleForm['form'] = $this->quformRepository->getConfig($singleId);
        $singleForm['builder'] = $this->quformBuilder;
        $singleForm['page'] = $this->Quform_Admin_Page_Forms_Edit;
        return (object) $singleForm;
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

        // Mark as read
        if ($entry['unread'] == 1) {
            $this->quformRepository->readEntries(array($entry['id']));
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

    public function addDataFilterRule($request)
    {
        $this->dataFilterRuleRepository->addDataFilterRule($request);
    }

    public function getAllDataFiltersRules()
    {
        return $this->dataFilterRuleRepository->getAllDataFiltersRules();
    }


}