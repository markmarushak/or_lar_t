<?php


namespace App\Services;

use App\Plugins\WordPress\Wpdb;
use App\Services\BaseService;



class AffiliateService extends BaseService
{
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

    public function connectionToDataBase()
    {
        global $wpdb;


        return $wpdb = new Wpdb( 'weeklyex_wp126', '7d9!SO)pL4', 'weeklyex_wp126', '109.199.120.183' );
    }








}