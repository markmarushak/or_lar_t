<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\SettingDataBase;
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

class AffiliateController extends Controller
{

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


    protected $affiliateRepository;
    protected $affiliateService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AffiliateRepository $affiliateRepository, AffiliateService $affiliateService)
    {
      //  $this->middleware('auth');
        $this->affiliateRepository = $affiliateRepository;
        $this->affiliateService = $affiliateService;
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


    public function dataFiltersRules(Request $request)
    {
        $dataFiltersRules = DataFiltersRules::all();

        if(!empty($request->data_filters_rules_id)) {

            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRuleRow = $this->affiliateRepository->allGetFiltersRulesById($dataFiltersRulesId);

            return view('affiliate.data-filters-rules-edit',
                            [
                             'menu' => 'affiliate-service',
                             'dataFiltersRuleRow' => $dataFiltersRuleRow[0],
                             'params' => $request
                            ]
            );

        } else {

            return view('affiliate.data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
        }

    }


    public function form(array $options = array())
    {

        $config = $this->config;

        if ( ! is_array($config)) {
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

        if ( ! ($form instanceof Quform_Form) || $form->config('trashed')) {
            return;
        }
        $output = $form->render($options);

        return $output;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Connection Action
     */
    public function connection(Request $request)
    {

        $data = "Connection Data should be here";

        $dataFiltersRules = DataFiltersRules::all();
        $settingsDataBase = SettingDataBase::all();

        return view('affiliate.connection', compact(
            'data',
            'dataFiltersRules',
            'settingsDataBase'
            )
        );

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  Action
     */
    public function formBuilder(Request $request)
    {
        //Get All rows from DataFiltersRules table
        $dataFiltersRules = DataFiltersRules::all();

        //get data_filters_rules_id from get Request
        $dataFiltersRulesId = $request->data_filters_rules_id;
        //fetch row corresponding data_filters_rules
        $dataFiltersRuleRow = $this->affiliateRepository->allGetFiltersRulesById($dataFiltersRulesId);

        //Connect to remote db of garasje-tilbud.no website
        $dataRemoteDB = $this->affiliateRepository->allGetGarageForms();

        //Get Description from current data_filters_rules
        $description = $dataFiltersRuleRow[0]->description;

        //Determine the config for qforms it containes decoded array of form
        $this->config = $this->affiliateService->decryptionConfig($dataRemoteDB[0]->config, $description);
        $this->form();

        //send params
        return view('affiliate.form-builder',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRuleRow' => $dataFiltersRuleRow[0],
                'garageData' => $dataRemoteDB,
                'form' => $this->form(),
                'params' => $request
            ]
        );
    }


    public function dataBaseFields(Request $request)
    {

        $data = "DataBaseFields should be here";

        $dataFiltersRules = DataFiltersRules::all();


        $dbName = "weeklyex_wp126";
        $tableName = "wpau_quform_forms";
        $dataRemoteDB = $this->affiliateRepository->allGetGarageForms();



        //fetch row corresponding data_filters_rules
        $id ='1';
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


        $data = $this->affiliateRepository->getGarageFormsEntryById();

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


    public function outputOverview(Request $request)
    {

        $data = "outputOverview should be here";

        $dataFiltersRules = DataFiltersRules::all();
        $data = $this->affiliateRepository->getGarageFormsEntryById('5');
        return view('affiliate.output-overview',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRules' => $dataFiltersRules,
                'data' => $data
            ]
        );
    }

}