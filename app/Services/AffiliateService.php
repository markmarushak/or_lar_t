<?php


namespace App\Services;

use App\Plugins\WordPress\Wpdb;
use App\Repositories\AffiliateRepository;
use App\Services\BaseService;
use Exception;


class AffiliateService extends BaseService
{
    private $affiliateRepository;


    public function __construct(AffiliateRepository $affiliateRepository)
    {
        $this->affiliateRepository = $affiliateRepository;
    }

    public function decryptionConfig($data, $description)
    {
         return unserialize(base64_decode($data));
    }

    public function objectToArray($value)
    {
            foreach($value[0] as $object)
            {
                $var =  $object;
            }
            return $var;
    }

    public function connectionToDataBase($dataFiltersRulesId)
    {
        $settingOfDataBaseById = $this->affiliateRepository->getSettingOfDataBaseById($dataFiltersRulesId);

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








}