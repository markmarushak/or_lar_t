<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\SettingOfDataBase;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Container;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Field;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Html;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use App\Plugins\QformLibrary\Quform\Quform_View;
use App\Repositories\AffiliateRepository;
use App\Services\AffiliateService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataFiltersRules;
use App\Models\RemoteDBaccess;
use App\Plugins\QformLibrary\Quform;

//Quform Library
use App\Plugins\QformLibrary\Quform\Quform_Form;

use App\Plugins\QformLibrary\Quform\Form\Quform_Form_Factory;
use RecursiveIteratorIterator;


class AffiliateController extends Controller
{


    protected $data;
    /**
     * @var Quform_Repository
     */
    protected $repository;

    /**
     * @var Quform_Form_Factory
     */
    protected $formFactory;

    /**
     * @var Quform_Form_Processor
     */
    protected $processor;

    /**
     * @var Quform_Session
     */
    protected $session;

    /**
     * @var Quform_Uploader
     */
    protected $uploader;

    /*
     * Form counter to differentiate multiple instances of the same form
     *
     * @var int
     */
    protected $count = 0;

    /**
     * Store used unique IDs to avoid conflicts
     *
     * @var array
     */
    protected $uniqueIds = array();

    protected $view;

    protected $affiliateRepository;
    protected $affiliateService;
    protected $quformElementField;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AffiliateRepository $affiliateRepository,
                                AffiliateService $affiliateService,
                                Quform_Repository $repository,
                                Quform_View $view
    )
    {
        //  $this->middleware('auth');
        $this->affiliateRepository = $affiliateRepository;
        $this->affiliateService = $affiliateService;
        $this->repository = $repository;
        $this->view = $view;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('affiliate.affiliate-service', ['menu' => 'affiliate-service']);
    }


    public function compaigns()
    {

        return view('affiliate.affiliate-service', ['menu' => 'affiliate-service']);

    }

    public function emailBulkSplit()
    {

        return view('affiliate.email-bulk-split', ['menu' => 'affiliate-service']);
    }




    public function form(array $options = array())
    {

        $config = $this->config;

        if (!is_array($config)) {
            return;
        }

        $this->count++;
        $config['count'] = $this->count;

        $processingThisForm = Quform::isPostRequest() && Quform::get($_POST, 'quform_form_id') == $config['id'] && Quform::get($_POST, 'quform_count') == $this->count;

        if ($processingThisForm && Quform_Form::isValidUniqueId(Quform::get($_POST, 'quform_form_uid'))) {
            $uniqueId = Quform::get($_POST, 'quform_form_uid');
        } else {
            $uniqueId = Quform_Form::generateUniqueId();

            //while (in_array($uniqueId, $this->uniqueIds) || $this->session->has(sprintf('quform-%s', $uniqueId))) {
            $uniqueId = Quform_Form::generateUniqueId();
            //}
        }

        $config['uniqueId'] = $uniqueId;
        $this->uniqueIds[] = $uniqueId;

        /*if (is_string($options['values'])) {
            $options['values'] = join('&', explode('&amp;', $options['values']));
        }*/

        //$config['dynamicValues'] = $options['values'];

        $this->formFactory = new Quform_Form_Factory();

        $form = $this->formFactory->create($config);

        if (!($form instanceof Quform_Form) || $form->config('trashed')) {
            return;
        }


        $output = $form->render($options);
        return $output;
    }

        public function dataBaseFields()
        {

            $data = "DataBaseFields should be here";

            $dataFiltersRules = DataFiltersRules::all();


            $dbName = "weeklyex_wp126";
            $tableName = "wpau_quform_forms";
            $dataRemoteDB = $this->affiliateRepository->allGetGarageForms();
            //fetch row corresponding data_filters_rules
            $id = '1';
            $dataFiltersRuleRow = $this->affiliateRepository->allGetFiltersRulesById($id);

            //Get Description from current data_filters_rules
            $description = $dataFiltersRuleRow[0]->description;

            $data = array(
                'db_name' => $dbName,
                'db_table' => $tableName,
                'data_fields_number' => 1
            );

            return view('affiliate.database-fields',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRules' => $dataFiltersRules,
                    'data' => $data
                ]
            );
        }


        public function affiliatesPartners(Request $request)
        {
            $dataFiltersRules = DataFiltersRules::all();
            return view('affiliate.affiliates-partners',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRules' => $dataFiltersRules,
                    'data' => []
                ]
            );

        }


        public function dataFiltersRulesData(Request $request)
        {
            $data = "dataFiltersRulesData";

            //Connect to remote server in order to receive correspond form output
            $dbName = "weeklyex_wp126";
            $tableName = "wpau_quform_entries";

            $data = $this->affiliateRepository->getGarageFormsEntryById(1);

            //get data_filters_rules_id from get Request
            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRulesDescription = $request->data_filters_rules_description;

            $dataFiltersRules = DataFiltersRules::all();

            return view('affiliate.data-filters-rules-data',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRules' => $dataFiltersRules,
                    'data' => $data
                ]
            );
        }

        public function outputOverviewSingle(Request $request)
        {

            $entryId = $request->single_id;


            //getConfig
            $formId =$this->affiliateRepository->getFormIdFromEntryId($entryId);
            $row = $this->affiliateRepository->getQuformFormsById($formId);

            $config = maybe_unserialize(base64_decode($row['config']));
            if (is_array($config)) {
                $config = $this->addRowDataToConfig($row, $config);
            } else {
                $config = null;
            }
            //endFunction

            
            $config['environment'] = 'viewEntry';

            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRuleRow = $this->affiliateRepository->allGetFiltersRulesById($dataFiltersRulesId);
            $dataRemoteDB = $this->affiliateRepository->allGetGarageForms();
            $description = $dataFiltersRuleRow[0]->description;

            $this->formFactory = new Quform_Form_Factory();

            $form = $this->formFactory->create($config);

            $entry = $this->affiliateRepository->findEntry($entryId, $form);
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
                $this->affiliateRepository ->readEntries(array($entry['id']));
            }

            // Get label data from label IDs
            $entry['labels'] = $this->affiliateRepository->getEntryLabels($entryId);


            foreach ($form->getRecursiveIterator(RecursiveIteratorIterator::SELF_FIRST) as $element) {
                if ($element->config('saveToDatabase')) {

                    $result[0][] = sprintf('<tr><th><div class="qfb-entry-element-label">%s</div></th></tr>', $element->getAdminLabel());
                    $result[1][] = sprintf('<tr><td>%s</td></tr>', $element->getValueHtml());
                }
            }

            $data = array(

                'form' => $form,
                'entry' => $entry,
                'showEmptyFields' => Quform::get($_COOKIE, 'qfb-show-empty-fields') ? true : false,
            );
                $nameEntry =$config['name'];

            $data = $this->view->with($data);
            return view('affiliate.output-overview-single', compact(
                    'entry',
                    'data',
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        'form',
                    'result',
                    'nameEntry'
                )
            );

        }


        public function outputOverview(Request $request)
        {
            $result = $this->affiliateRepository->getRecentEntries(10);
            //TODO will make service
            $recentEntries = json_decode(json_encode($result), true);
            $unreadCount = 0;
            foreach ($recentEntries as $recentEntry) {
                if ($recentEntry['unread'] == '1') {
                    $unreadCount++;
                }
            }

            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRulesDescription = $request->data_filters_rules_description;
            return view('affiliate.output-overview', ['menu' => 'affiliate-service',
                'recentEntries' => $recentEntries,
                'dataFiltersRulesId' =>$dataFiltersRulesId,
                'dataFiltersRulesDescription' => $dataFiltersRulesDescription
            ]);
        }




        public function with($key, $value = null)
        {
            if (is_array($key)) {
                $this->data = array_merge($this->data, $key);
            } else {
                $this->data[$key] = $value;
            }
            return $this;
        }


        protected function addRowDataToConfig(array $row, array $config)
        {
            $config['id'] = (int) $row['id'];
            $config['name'] = $row['name'];
            $config['active'] = $row['active'] == 1;
            $config['trashed'] = $row['trashed'] == 1;

            return $config;
        }

}