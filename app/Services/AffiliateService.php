<?php


namespace App\Services;

use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use App\Plugins\WordPress\Wpdb;
use App\Repository\AffiliateRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Config;


class AffiliateService extends BaseService
{
    private $affiliateRepository;

    public function __construct(
        AffiliateRepository $affiliateRepository
        )
    {
        $this->affiliateRepository = $affiliateRepository;
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

    public function editConnectToDb($request, $dataFiltersRulesId)
    {
        $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($dataFiltersRulesId);
        $settingOfDataBase = $this->encryptSettingToDb($request);
        $this->affiliateRepository->editConnectToDb($settingOfDataBase, $dataFiltersRulesObject);
    }

    public function addConnectToDb($request, $dataFiltersRulesId)
    {
        $dataFiltersRulesObject = $this->affiliateRepository->getDataFiltersRulesById($dataFiltersRulesId);
        $settingOfDataBase = $this->encryptSettingToDb($request);
        $this->affiliateRepository->addConnectToDb($settingOfDataBase, $dataFiltersRulesObject);
    }

    private function encryptSettingToDb($request)
    {
        $settingOfDataBase =  $request->only( 'domain', 'form', 'host', 'host_name', 'port', 'database', 'username',
            'password', 'charset', 'collation'
        );
        $settingOfDataBase = json_encode($settingOfDataBase);
        return encrypt($settingOfDataBase);
    }

    private function decryptSettingToDb($settingOfDataBase)
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

    public function addAffiliatePartner($request)
    {
       $this->affiliateRepository->addToDatabase($request);
    }

    public function getAffiliatesData()
    {
        return $this->affiliateRepository->getData();
    }

    public function deleteAffiliatesPartners($request)
    {
        $this->affiliateRepository->deleteFromDatabase($request);
    }


}