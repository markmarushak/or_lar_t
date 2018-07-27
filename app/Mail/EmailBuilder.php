<?php

namespace App\Mail;


use App\Services\ConnectToDataBaseService\ConnectToDataBase;
use App\Services\ProjectService;

class EmailBuilder
{
    public $projectId;
    public $projectService;
    public $connectToDataBase;

    public function __construct(ProjectService $projectService, ConnectToDataBase $connectToDataBase)
    {
        $this->projectService = $projectService;
        $this->connectToDataBase =  $connectToDataBase;
    }

    public function emailBuilder($dataFilterRule)
    {
        foreach ($dataFilterRule as $projectObject) {
            if ($projectObject->id) {
                $this->projectId = $projectObject->id;
                if (is_a($this->connectToDataBase->connectionToDataBase($this->projectId), 'ErrorException')) {
                            $error = $this->connectToDataBase->getMessage();
                } else {
                    $this->generateOutputEmail();

                }

            }
        }
    }

    public function generateOutputEmail()
    {
        $outputOverview = $this->projectService->getRecentEntries();
        foreach ($outputOverview as $key ) {
            if ($key['unread'] = 1) {
                    $form = $this->projectService->outputOverviewSingleService($key['id']);
                    $mail = new MailListener($form, null, $key['name']);

            }

        }
    }
}