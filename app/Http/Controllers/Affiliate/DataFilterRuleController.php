<?php


namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\DataFiltersRules;
use App\Models\SettingDataBase;
use App\Repositories\AffiliateRepository;
use Illuminate\Http\Request;


class DataFilterRuleController extends Controller
{
    private $affiliateRepository;

    public function __construct(affiliateRepository $affiliateRepository)
    {
        $this->affiliateRepository = $affiliateRepository;
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
        DataFiltersRules::add($request->all());
        return redirect()->route('data-filters-rules');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Connection Action
     */
    public function connection()
    {
        $settingsDataBase = SettingDataBase::all();
        return view('affiliate.data-filters-rules.connection', compact(
                'settingsDataBase'
            )
        );
    }

    public function updateConnectDb(Request $request)
    {
        dd($request);
    }


}