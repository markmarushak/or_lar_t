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
    public function __construct( )
    {
        //  $this->middleware('auth');

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



}