<?php


namespace App\Services;

use App\Services\BaseService;

class AffiliateService extends BaseService
{
        public function decryptionConfig($data, $description)
        {
            return unserialize(base64_decode($data));
        }
}