<?php

namespace App\Services\ConnectToDataBaseService;

use App\Plugins\WordPress\Wpdb;
use App\Repository\AffiliateRepository;

class ConnectToDataBase
{

    public $affiliateRepository;

    public function __construct(AffiliateRepository $affiliateRepository)
    {
        $this->affiliateRepository = $affiliateRepository;
    }

    public function connectionToDataBase($dataFiltersRulesId)
    {
        if (isset($dataFiltersRulesId) && !empty($dataFiltersRulesId)) {
            $settingOfDataBase = $this->getSettingOfDataBaseById($dataFiltersRulesId);
          return  $this->connectionToWPDataBase(
              $settingOfDataBase->username,
              $settingOfDataBase->password,
              $settingOfDataBase->database,
              $settingOfDataBase->host
          );
        } else {
            return false;
        }
    }

    public function connectionToWPDataBase($username, $password, $database, $host)
    {
        global $wpdb;
        try
        {
            if ($wpdb = new Wpdb ( $username, $password, $database, $host ))
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