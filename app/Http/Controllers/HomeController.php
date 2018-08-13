<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;


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
        return view('home', compact('dateAndTime'));
    }

    public function setTimeSentEmail()
    {
        $dateAndTime = $this->projectService->setTimeSentEmail();
        return   response()->json($dateAndTime);
    }
}
