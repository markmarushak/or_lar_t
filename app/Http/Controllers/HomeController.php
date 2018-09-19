<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use App\Http\Controllers\Settings\API\SettingsApiController;


class HomeController extends Controller
{
    public $projectService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjectService $projectService)
    {
        $this->middleware('auth');
        $this->projectService = $projectService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $api = new SettingsApiController();
      if ($api->connect())
      {
          $report = $api->getReport(['groupBy'=>'campaign'],date('Y-m-d'),date('Y-m-d',strtotime(date('Y-m-d').'+1 days')));
      $total = $report['totals'];
        return view('home',[
            'total' => $total,
            'report' => $report
        ]);
      }else {
          return view('settings.api');
      }
    }

    public function setTimeSentEmail()
    {
        $dateAndTime = $this->projectService->setTimeSentEmail();
        return   response()->json($dateAndTime);
    }
}
