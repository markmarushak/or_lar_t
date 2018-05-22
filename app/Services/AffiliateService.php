<?php


namespace App\Services;

use App\Services\BaseService;
use http\Env\Request;

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

        public function outputOverviewSingleService(Request $request)
        {

        }
}