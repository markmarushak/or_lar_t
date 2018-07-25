<?php

namespace App\Services\ConnectToDataBaseService;

use App\Repository\AffiliateRepository;

class UpdateDataBase
{
    public $affiliateRepository;

    public function __construct(
        AffiliateRepository $affiliateRepository,
        ConfigurationToDataBase $configurationToDataBase
        )
    {
        $this->affiliateRepository = $affiliateRepository;
        $this->configurationToDataBase = $configurationToDataBase;
    }

    public function editConnectToDb($request, $dataFilterRuleId)
    {
        $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($dataFilterRuleId);
        $settingOfDataBase = $this->encryptSettingToDb($request);
        $this->affiliateRepository->editConnectToDb($settingOfDataBase, $dataFiltersRulesObject);
    }

    public function addConnectToDb($request, $dataFilterRuleId)
    {
        $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($dataFilterRuleId);
        $settingOfDataBase = $this->encryptSettingToDb($request);
        $this->affiliateRepository->addConnectToDb($settingOfDataBase, $dataFiltersRulesObject);
    }

    public function encryptSettingToDb($request)
    {
        $settingOfDataBase =  $request->only( 'domain', 'form', 'host', 'host_name', 'port', 'database', 'username',
            'password', 'charset', 'collation'
        );
        $settingOfDataBase = json_encode($settingOfDataBase);
        return encrypt($settingOfDataBase);
    }

    public function decryptSettingToDb($settingOfDataBase)
    {
        $settingOfDataBase =  decrypt($settingOfDataBase);
        return json_decode($settingOfDataBase);
    }
}