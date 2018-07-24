<?php

namespace App\Services;

use App\Plugins\WordPress\Wpdb;
use App\Repository\AffiliateRepository;
use Exception;

class AffiliateService
{
    private $affiliateRepository;

    public function __construct
    (
        AffiliateRepository $affiliateRepository
        )
    {
        $this->affiliateRepository = $affiliateRepository;
    }


    public function addAffiliatePartner($request)
    {
       $this->affiliateRepository->addAffiliatePartner($request);
    }

    public function getAffiliatesData($request)
    {
        return $this->affiliateRepository->getData($request);
    }

    public function deleteAffiliatesPartners($request)
    {
        $this->affiliateRepository->deleteFromDatabase($request);
    }

    public function getAffiliatesPartnersData($request)
    {
        return $this->affiliateRepository->getDataById($request);
    }

    public function editAffiliatesPartners($request)
    {
        return $this->affiliateRepository->getAffiliateOrPartnerById($request);
    }

    public function updateAffiliatesPartners($request)
    {
        $this->affiliateRepository->updateAffiliateOrPartnerById($request);
    }

    public function getAffiliatesDescriptions($request)
    {
        $result['suggestions'] = $this->affiliateRepository->getAffiliatesDescriptions($request);
        return json_encode($result);
    }

}