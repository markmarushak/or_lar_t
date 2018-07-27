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


}