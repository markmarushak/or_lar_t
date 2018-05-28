<?php


namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;
use App\Repositories\AffiliateRepository;
use Illuminate\Http\Request;


class DataFilterRuleController extends Controller
{
    private $affiliateRepository;
    private $dataFiltersRulesModel;
    private $settingOfDataBaseModel;

    public function __construct(AffiliateRepository $affiliateRepository, DataFiltersRules $dataFiltersRulesModel, SettingOfDataBase $settingOfDataBaseModel)
    {
        $this->affiliateRepository = $affiliateRepository;
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
        $this->settingOfDataBaseModel = $settingOfDataBaseModel;
    }

    public function index()
    {
        $dataFiltersRules = DataFiltersRules::all();
        if (!empty($dataFiltersRules)) {

            //$dataFiltersRuleRow = $this->affiliateRepository->allGetFiltersRulesById($dataFiltersRulesId);
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
        $settingsOfDataBase = $this->settingOfDataBaseModel->all()->toArray();
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        return view('affiliate.data-filters-rules.connection', compact(
                'settingsOfDataBase',
                'dataFiltersRulesId',
                'dataFiltersRulesDescription'
            )
        );
    }

    
    /**
     * @param Request $request
     * @param $dataFiltersRulesId
     * @param $dataFiltersRulesDescription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConnectDb(Request $request,  $dataFiltersRulesId, $dataFiltersRulesDescription)
    {
        $this->validate($request, [
            'domain' => 'required',
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


}