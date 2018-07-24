<?php

namespace App\Services\ConnectToDataBaseService;

use App\Plugins\WordPress\Wpdb;
use App\Repository\AffiliateRepository;

class CrudToDataBase
{

    protected $affiliateRepository;
    protected $dataFiltersRulesId;

    public function __construct(
        AffiliateRepository $affiliateRepository
    )
    {
//        $this->dataFiltersRulesId = $dataFiltersRulesId;
//        $this->affiliateRepository = $affiliateRepository;
    }




}