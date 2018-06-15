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

    public function createUrls($forms, $dataFiltersRulesDescription )
    {
        foreach ($forms as $singleForm) {
            $urls[$singleForm['name']] = 'http://www.'.$dataFiltersRulesDescription.'/wp-admin/admin.php?page=quform.forms&sp=edit&id='.$singleForm['id'].'';
        }
        return $urls;
    }





    public function encrypt()
    {
        define('ENCRYPTION_KEY', 'ab86d144e3f080b61c7c2e43');

        // Encrypt
        $plaintext = "Тестируем обратимое шифрование на php 7";
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, ENCRYPTION_KEY, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
        echo $ciphertext.'<br>';
    }

    public function decrypt()
    {
        $c = base64_decode($ciphertext);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $plaintext = openssl_decrypt($ciphertext_raw, $cipher, ENCRYPTION_KEY, $options=OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary=true);
        if (hash_equals($hmac, $calcmac))
        {
            echo $plaintext;
        }
    }






}