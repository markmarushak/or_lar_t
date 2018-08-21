<?php

namespace App\Repository;

use App\Models\AffiliatePartner;
use App\Models\DataFiltersRules;
use App\Models\SettingOfDataBase;
use App\Plugins\QformLibrary\Quform\Quform_Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AffiliateRepository
{
    protected $quformRepository;
    protected $settingOfDataBaseModel;
    protected $dataFiltersRulesModel;
    protected $affiliatePartnerModel;

    public function __construct(
        SettingOfDataBase $settingOfDataBaseModel,
        Quform_Repository $quformRepository,
        DataFiltersRules  $dataFiltersRulesModel,
        AffiliatePartner $affiliatePartnerModel
    )
    {
        $this->settingOfDataBaseModel = $settingOfDataBaseModel;
        $this->quformRepository = $quformRepository;
        $this->dataFiltersRulesModel = $dataFiltersRulesModel;
        $this->affiliatePartnerModel = $affiliatePartnerModel;

    }

    public function getSettingOfDataBaseById($dataFiltersRulesId)
    {
        try
        {
            return $this->settingOfDataBaseModel
                ->where('data_filters_rules_id', $dataFiltersRulesId)
                ->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
           return false;
        }
    }

    public function getDataFiltersRulesById($dataFiltersRulesId)
    {
        return $this->dataFiltersRulesModel
            ->find($dataFiltersRulesId)
            ->with('settingOfDataBase')
            ->firstOrFail();
    }

    public function editConnectToDb($settingOfDataBase, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject
            ->settingOfDataBase()
            ->update([
            'setting' => $settingOfDataBase
        ]);
    }

    public function addConnectToDb($settingOfDataBase, $dataFiltersRulesObject)
    {
        $dataFiltersRulesObject
            ->settingOfDataBase()
            ->updateOrCreate([
            'setting' => $settingOfDataBase
        ])->save();
    }

    public function addAffiliatePartner($request)
    {
        $this->affiliatePartnerModel
            ->insertGetId($request->only('name','description','website', 'address', 'country', 'type'));
    }

    public function getData($request)
    {
        if($request['data'] == 'All') {
            return $this->affiliatePartnerModel
                ->select()
                ->get();
        }
        else{
            return $this->affiliatePartnerModel
                ->where('type', $request['data'])
                ->select()
                ->get();

        }
    }

    public function updateAffiliateOrPartnerById($request)
    {
        $this->affiliatePartnerModel
            ->where('id', $request->id)
            ->update($request->only('name','description','website', 'address', 'email', 'country', 'type'));
    }

    public function deleteFromDatabase($request){
        $this->affiliatePartnerModel
            ->where('id', '=', $request->all())
            ->delete();
    }

    public function getDataById($request)
    {
        return $this->affiliatePartnerModel
            ->select()
            ->where('id', '=', $request->all())->get();
    }

    public function getAffiliateOrPartnerById($request)
    {
        return $this->affiliatePartnerModel
            ->where('id', '=', $request->id)
            ->firstOrFail();
    }

    public function getAffiliatesDescriptions($request)
    {
        $request = $request->all();
        return  $this->affiliatePartnerModel
            ->where('description', 'LIKE', '%'.$request['query'].'%')
            ->pluck('description');
    }
}
