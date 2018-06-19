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


        protected function addRowDataToConfig(array $row, array $config)
        {
            $config['id'] = (int) $row['id'];
            $config['name'] = $row['name'];
            $config['active'] = $row['active'] == 1;
            $config['trashed'] = $row['trashed'] == 1;

            return $config;
        }


}