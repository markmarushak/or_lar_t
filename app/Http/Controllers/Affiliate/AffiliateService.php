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


        return view('admin/affiliate-service', ['menu' => 'affiliate-service']);
    }


    public function compaigns()
    {

        return view('admin/affiliate-service', ['menu' => 'affiliate-service']);

    }

    public function emailBulkSplit()
    {

        return view('admin/email-bulk-split', ['menu' => 'affiliate-service']);
    }




    public function dataFiltersRules(Request $request)
    {


        $dataFiltersRules = DataFiltersRulesModel::all();

        if(!empty($request->data_filters_rules_id)) {

            $dataFiltersRulesId = $request->data_filters_rules_id;
            $dataFiltersRuleRow = DB::connection('mysql')->select("SELECT * FROM data_filters_rules WHERE data_filters_rules_id = ?", [$dataFiltersRulesId]);
            //COnditions will be enabled

            //Connect to Wordpress Forms should be


            //wpau_quform_forms

            $dataRemoteDB = DB::connection('garage')->select("SELECT * FROM weeklyex_wp126.wpau_quform_forms");
            $description = $dataFiltersRuleRow[0]->description;


            $formData = [];
            if($description == "Garasje-Tilbub.no") {

                $this->config = RemoteDBaccess::getConfig($dataRemoteDB[0]->config, $description);

                $this->form();
                die;

            }

            return view('admin/data-filters-rules-edit',
                            [
                             'menu' => 'affiliate-service',
                             'dataFiltersRuleRow' => $dataFiltersRuleRow[0],
                             'garageData' => $dataRemoteDB,
                             'tags' => $config
                            ]
            );

        } else {

            return view('admin/data-filters-rules', ['menu' => 'affiliate-service', 'dataFiltersRules' => $dataFiltersRules]);
        }

    }


    public function form(array $options = array())
    {
        /*$options = wp_parse_args($options, array(
            'id' => '',
            'values' => '',
            'content' => '',
            'popup' => false,
            'options' => '',
            'width' => '',
            'show_title' => true,
            'show_description' => true
        ));*/

        //wp version
        //$config = $this->repository->getConfig((int) $options['id']);


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


}