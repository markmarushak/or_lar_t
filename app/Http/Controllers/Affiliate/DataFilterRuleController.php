<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\MailListener;
use App\Services\AffiliateService;
use App\Services\DataFilterRuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DataFilterRuleController extends Controller
{
    private $affiliateService;
    private $dataFilterRuleService;
    public $dataFilterRuleId;
    public $dataFilterRuleDescription;

    public function __construct
    (
        AffiliateService $affiliateService,
        DataFilterRuleService $dataFilterRuleService
    )
    {
        $this->affiliateService = $affiliateService;
        $this->dataFilterRuleService = $dataFilterRuleService;

    }

    public function index()
    {
        return view('affiliate.data-filters-rules.index',
            [
                'menu' => 'affiliate-service'
            ]
        );
    }

    public function show()
    {
        $dataFiltersRules = $this->dataFilterRuleService->getAllDataFiltersRules();
        return response()->json($dataFiltersRules);
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
        $this->dataFilterRuleService->addDataFilterRule($request);
        return redirect()->route('data-filters-rules');
    }


    public function sendMail(Request $request)
    {
        $dataFiltersRulesId = $request->data_filters_rules_id;
        $dataFiltersRulesDescription = $request->data_filters_rules_description;
        $connectionToDataBase = $this->affiliateService->connectionToDataBase($dataFiltersRulesId);
        if (is_a($connectionToDataBase, 'ErrorException')) {
            return view('affiliate.data-filters-rules.output-overview-single',
                [
                    'menu' => 'affiliate-service',
                    'dataFiltersRulesDescription' => $dataFiltersRulesDescription
                ]
            )->withErrors($connectionToDataBase->getMessage());
        } else {
            $entryId = 6;
            $form = $this->dataFilterRuleService->outputOverviewSingleService($entryId);
            Mail::to('thorfinn@orbitleads.com')
                ->send(new MailListener($form, $this->dataFilterRuleService->nameEntry));
        }
        dd('good');
    }
}