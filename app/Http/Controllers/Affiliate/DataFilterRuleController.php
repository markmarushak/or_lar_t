<?php


namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;
use App\Plugins\QformLibrary\Quform\Quform_Options;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use App\Repositories\AffiliateRepository;
use App\Services\AffiliateService;
use App\Services\DataFilterRuleService;
use Illuminate\Http\Request;


class DataFilterRuleController extends Controller
{
    private $affiliateRepository;
    private $dataFiltersRulesModel;
    private $settingOfDataBaseModel;
    private $affiliateService;
    private $dataFilterRuleService;

    public function __construct(AffiliateRepository $affiliateRepository,
                                DataFiltersRules $dataFiltersRulesModel,
                                SettingOfDataBase $settingOfDataBaseModel,
                                AffiliateService $affiliateService,
                                DataFilterRuleService $dataFilterRuleService
    )
    {
        $this->affiliateRepository = $affiliateRepository;
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
        $this->settingOfDataBaseModel = $settingOfDataBaseModel;
        $this->affiliateService = $affiliateService;
        $this->dataFilterRuleService = $dataFilterRuleService;
    }

    public function index()
    {

        $dataFiltersRules = DataFiltersRules::all();
        if (!empty($dataFiltersRules)) {

            return view('affiliate.data-filters-rules.index',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRules' => $dataFiltersRules
                ]
            );
        }
        return view('affiliate.data-filters-rules.index', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
    }


    public function add()
    {
        return view('affiliate.data-filters-rules.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'category' => 'required',
            'source' => 'required',
            'country' => 'required'
        ]);
        $this->dataFiltersRulesModel->add($request->all());
        return redirect()->route('data-filters-rules');
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Connection Action
     */
    public function connection(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $settingsOfDataBase = $this->affiliateRepository->getSettingOfDataBaseById($dataFiltersRulesId);
        return view('affiliate.data-filters-rules.connection',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription,
                'settingsOfDataBase' => $settingsOfDataBase,
                'dataFiltersRulesId' => $dataFiltersRulesId
            ]
        );
    }


    /**
     * @param Request $request
     * @param $dataFiltersRulesId
     * @param $dataFiltersRulesDescription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConnectDb(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $this->validate($request, [
            'domain' => 'required',
            'form' => 'required',
            'host_name' => 'required',
            'host' => 'required',
            'port' => 'required',
            'database' => 'required',
            'username' => 'required',
            'password' => 'required',
            'charset' => 'required',
            'collation' => 'required'
        ]);
        if($request->id) {
            $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($dataFiltersRulesId);
            $this->settingOfDataBaseModel->edit($request, $dataFiltersRulesObject);
        } else {
            $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($dataFiltersRulesId);
            $this->settingOfDataBaseModel->add($request, $dataFiltersRulesObject);
        }
        return redirect()->route('connection', [ 'data_filters_rules_id' => $dataFiltersRulesId, 'data_filters_rules_description' => $dataFiltersRulesDescription]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function formBuilder(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
       $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
       if (is_a($connectionToDataBase, 'ErrorException')) {
           return view('affiliate.data-filters-rules.form-builder',
               [
                   'menu' => 'affiliate-service',
                   'dataFiltersRulesDescription' => $dataFiltersRulesDescription
               ]
           )->withErrors($connectionToDataBase->getMessage() );
       } else {
           $forms =  $this->dataFilterRuleService->getForms();
           $urls = $this->dataFilterRuleService->createUrls($forms, $dataFiltersRulesDescription);
           return view('affiliate.data-filters-rules.form-builder',
               [
                   'menu' => 'affiliate-service',
                   'forms' => $forms,
                   'urls' => $urls,
                   'dataFiltersRulesDescription' => $dataFiltersRulesDescription
               ]
           );
       }
    }

    public function outputOverview(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);

        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage() );
        } else {
            $recentEntries = $this->dataFilterRuleService->getRecentEntries();
            return view('affiliate.data-filters-rules.output-overview',
                [
                'menu' => 'affiliate-service',
                'recentEntries' => $recentEntries,
                'dataFiltersRulesId' =>$dataFiltersRulesId,
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            );
        }
    }


    public function outputOverviewSingle(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase= $this->affiliateService->connectionToDataBase($dataFiltersRulesId);

        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview-single',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage() );
        } else {
            $entryId = $request->single_id;
            $form = $this->dataFilterRuleService->outputOverviewSingleService($entryId);
            return view('affiliate.data-filters-rules.output-overview-single', [
                'menu' => 'affiliate-service',
                'dataFiltersRulesId' =>$dataFiltersRulesId,
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription,
                'nameEntry' => $this->dataFilterRuleService->nameEntry,
                'form' => $form
            ]);

        }

//        //getConfig
//        $formId =$this->affiliateRepository->getFormIdFromEntryId($entryId);
//        $row = $this->affiliateRepository->getQuformFormsById($formId);
//
//        $config = maybe_unserialize(base64_decode($row['config']));
//        if (is_array($config)) {
//            $config = $this->addRowDataToConfig($row, $config);
//        } else {
//            $config = null;
//        }
//        //endFunction
//
//
//        $config['environment'] = 'viewEntry';
//
//        $dataFiltersRulesId = $request->data_filters_rules_id;
//        $dataFiltersRuleRow = $this->affiliateRepository->allGetFiltersRulesById($dataFiltersRulesId);
//        $dataRemoteDB = $this->affiliateRepository->allGetGarageForms();
//        $description = $dataFiltersRuleRow[0]->description;
//
//        $this->formFactory = new Quform_Form_Factory();
//
//        $form = $this->formFactory->create($config);
//
//        $entry = $this->affiliateRepository->findEntry($entryId, $form);
//        foreach ($entry as $key => $value) {
//            if (preg_match('/element_(\d+)/', $key, $matches)) {
//                $elementId = $matches[1];
//                $form->setValueFromStorage($elementId, $value);
//                unset($entry[$key]);
//
//            }
//        }
//        // Calculate which elements are hidden by conditional logic and which groups are empty
//        $form->calculateElementVisibility();
//
//
//        // Mark as read
//        if ($entry['unread'] == 1) {
//            $this->affiliateRepository ->readEntries(array($entry['id']));
//        }
//
//        // Get label data from label IDs
//        $entry['labels'] = $this->affiliateRepository->getEntryLabels($entryId);
//
//
//        foreach ($form->getRecursiveIterator(RecursiveIteratorIterator::SELF_FIRST) as $element) {
//            if ($element->config('saveToDatabase')) {
//
//                $result[0][] = sprintf('<tr><th><div class="qfb-entry-element-label">%s</div></th></tr>', $element->getAdminLabel());
//                $result[1][] = sprintf('<tr><td>%s</td></tr>', $element->getValueHtml());
//            }
//        }
//
//        $data = array(
//
//            'form' => $form,
//            'entry' => $entry,
//            'showEmptyFields' => Quform::get($_COOKIE, 'qfb-show-empty-fields') ? true : false,
//        );
//        $nameEntry =$config['name'];
//
//        $data = $this->view->with($data);
//        return view('affiliate.output-overview-single', compact(
//                'entry',
//                'data',
//                'form',
//                'result',
//                'nameEntry'
//            )
//        );

    }


}