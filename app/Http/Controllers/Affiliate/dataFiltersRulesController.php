<?php


namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\DataFiltersRules;
use App\Repositories\AffiliateRepository;
use Illuminate\Http\Request;


class dataFiltersRulesController extends Controller
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
            'type' => 'required',
            'country' => 'required'
        ]);
        dd(123123);
    }


}