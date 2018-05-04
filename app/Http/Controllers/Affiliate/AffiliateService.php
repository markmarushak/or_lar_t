<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataFiltersRulesModel;
use App\RemoteDBaccess;
use App\Models\QformLibrary\Quform;

//Quform Library
use App\Models\QformLibrary\Quform\Quform_Form;

use App\Models\QformLibrary\Quform\Form\Quform_Form_Factory;

class AffiliateService extends Controller
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



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('affiliate/affiliate-service', ['menu' => 'affiliate-service']);
    }


    public function compaigns()
    {

        return view('affiliate/affiliate-service', ['menu' => 'affiliate-service']);

    }

    public function emailBulkSplit()
    {

        return view('affiliate/email-bulk-split', ['menu' => 'affiliate-service']);
    }


    public function dataFiltersRules(Request $request)
    {
        $dataFiltersRules = DataFiltersRulesModel::all();

        if(!empty($request->data_filters_rules_id)) {

            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRuleRow = DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);


            return view('affiliate/data-filters-rules-edit',
                            [
                             'menu' => 'affiliate-service',
                             'dataFiltersRuleRow' => $dataFiltersRuleRow[0],
                             'params' => $request
                            ]
            );

        } else {

            return view('affiliate/data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
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

        $dataFiltersRules = DataFiltersRulesModel::all();
        return view('affiliate/connection',
                    [
                        'menu' => 'affiliate-service',
                        'dataFiltersRules' => $dataFiltersRules,
                        'data' => $data
                    ]
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
        $dataFiltersRules = DataFiltersRulesModel::all();

        //get data_filters_rules_id from get Request
        $dataFiltersRulesId = $request->data_filters_rules_id;

        //fetch row corresponding data_filters_rules
        $dataFiltersRuleRow = DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);

        //Connect to remote db of garasje-tilbud.no website
        $dataRemoteDB = DB::connection('garage')->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms");

        //Get Description from current data_filters_rules
        $description = $dataFiltersRuleRow[0]->description;

        //Determine the config for qforms it containes decoded array of form
        $this->config = RemoteDBaccess::getConfig($dataRemoteDB[0]->config, $description);
        $this->form();



        //send params
        return view('affiliate/form-builder',
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

        $data = "dataBaseFields should be here";

        $dataFiltersRules = DataFiltersRulesModel::all();
        return view('affiliate/connection',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRules' => $dataFiltersRules,
                'data' => $data
            ]
        );
    }


    public function affiliatesPartners(Request $request)
    {

        $data = "affiliates / Partners should be here";

        $dataFiltersRules = DataFiltersRulesModel::all();
        return view('affiliate/connection',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRules' => $dataFiltersRules,
                'data' => $data
            ]
        );
    }


    public function dataFiltersRulesData(Request $request)
    {

        $data = "dataFiltersRulesData";

        $dataFiltersRules = DataFiltersRulesModel::all();
        return view('affiliate/connection',
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

        $dataFiltersRules = DataFiltersRulesModel::all();
        return view('affiliate/connection',
            [
                'menu' => 'affiliate-service',
                'dataFiltersRules' => $dataFiltersRules,
                'data' => $data
            ]
        );
    }

}