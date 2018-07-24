<?php

namespace App\Services\ConnectToDataBaseService;


use App\Plugins\WordPress\Wpdb;
use App\Repository\AffiliateRepository;
use Illuminate\Http\Request;


class ConnectToDataBase extends CrudToDataBase
{
        private $dataFilterRuleId;

    public function __construct
    (
        AffiliateRepository $affiliateRepository,
        Request $request
    )
    {
       // parent::__construct($affiliateRepository, $dataFiltersRulesId);

        $this->affiliateRepository = $affiliateRepository;
        $this->dataFilterRuleId = $request->data_filters_rules_id;
        $this->connectionToDataBase($this->dataFilterRuleId);
    }


    public function connectionToDataBase($dataFiltersRulesId)
    {
        $settingOfDataBaseById = $this->affiliateRepository->getSettingOfDataBaseById($dataFiltersRulesId);
        $settingOfDataBaseById = $this->decryptSettingToDb($settingOfDataBaseById->setting);
        global $wpdb;
        try
        {
            if ($wpdb = new Wpdb(
                $settingOfDataBaseById->username,
                $settingOfDataBaseById->password,
                $settingOfDataBaseById->database,
                $settingOfDataBaseById->host
            ))
            {
                return true;
            }
            else
            {
                throw new Exception('Unable to connect');
            }
        }
        catch(Exception $e)
        {
            return $e;
        }
    }


    public function editConnectToDb($request)
    {
        $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($this->dataFilterRuleId);
        $settingOfDataBase = $this->encryptSettingToDb($request);
        $this->affiliateRepository->editConnectToDb($settingOfDataBase, $dataFiltersRulesObject);
    }

    public function addConnectToDb($request)
    {
        $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($this->dataFilterRuleId);
        $settingOfDataBase = $this->encryptSettingToDb($request);
        $this->affiliateRepository->addConnectToDb($settingOfDataBase, $dataFiltersRulesObject);
    }

    protected function encryptSettingToDb($request)
    {
        $settingOfDataBase =  $request->only( 'domain', 'form', 'host', 'host_name', 'port', 'database', 'username',
            'password', 'charset', 'collation'
        );
        $settingOfDataBase = json_encode($settingOfDataBase);
        return encrypt($settingOfDataBase);
    }

    protected function decryptSettingToDb($settingOfDataBase)
    {
        $settingOfDataBase =  decrypt($settingOfDataBase);
        return json_decode($settingOfDataBase);
    }

    public function getSettingOfDataBaseById($dataFiltersRulesId)
    {
        $settingsOfDataBase = $this->affiliateRepository->getSettingOfDataBaseById($dataFiltersRulesId);

        if ($settingsOfDataBase == true) {
            if (isset($settingsOfDataBase->setting) && !empty($settingsOfDataBase->setting)) {
                $settingsOfDataBase->setting = decrypt($settingsOfDataBase->setting);
                $settingsOfDataBase->setting = json_decode($settingsOfDataBase->setting);
                return $settingsOfDataBase;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}