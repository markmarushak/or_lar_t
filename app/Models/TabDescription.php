<?php

namespace App\Models;

use App\Http\Controllers\Settings\API\SettingsApiController;
use Illuminate\Database\Eloquent\Model;

class TabDescription extends Model
{
    protected $table = 'tab_description';
    protected $fillable = ['tab_id','key','label','type','status'];
    public $timestamps = false;
    public $tab_descriptions =[
        'Campaign'           => [" Campaign", " Campaign ID", " External campaign ID", " Campaign URL", " Campaign country tag", " Campaign workspace", " Campaign workspace ID", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors", " Postback URL", " Redirect", " Cost model", " CPA", " CPC", " CPM"],
        'Offer'              => [" Offer", " Offer ID", " Offer URL", " Offer country tag", " Offer workspace", " Offer workspace ID", " Payout", " Conversion cap", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Lander'             => [" Lander", " Lander ID", " Lander URL", " Lander country tag", " Number of offers", " Lander workspace", " Lander workspace ID", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Flow'               => [" Flow", " Flow ID", " Flow workspace", " Flow workspace ID", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Traffic-source'     => [" Traffic source", " Traffic source ID", " Traffic source workspace", " Traffic source workspace ID", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors", " Postback URL", " Click ID", " Cost argument", " Variable 1", " Variable 2", " Variable 3", " Variable 4", " Variable 5", " Variable 6", " Variable 7", " Variable 8", " Variable 9", " Variable 10"],
        'affiliate-network'  => [" Affiliate network", " Affiliate network ID", " Affiliate network workspace", " Affiliate network workspace ID", " Append click ID", " Whitelisted IP", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Conversion'         => [" Postback timestamp", " Visit timestamp", " External ID", " Click ID", " Transaction ID", " Revenue", " Cost", " Conversion type", " Campaign ID", " Campaign", " Lander", " Lander ID", " Offer", " Offer ID", " Country", " Country code", " Traffic source", " Traffic source ID", " Affiliate network", " Affiliate network ID", " Device", " Operating system", " OS version", " Brand", " Model", " Browser", " Browser version", " ISP / Carrier", " Mobile carrier", " Connection type", " Visitor IP", " Visitor Referrer", " V1", " V2", " V3", " V4", " V5", " V6", " V7", " V8", " V9", " V10"],
        'Country'            => [" Country", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Connection Type'    => [" Connection type", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'ISP / Carrier'      => [" ISP / Carrier", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Mobile Carrier'     => [" Mobile carrier", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Device types'       => [" Device", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Brands'             => [" Brand", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Models'             => [" Model", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'OS'                 => [" Operating system", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'OS version'         => [" OS version", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Browsers'           => [" Browser", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Browsers version'   => [" Browser version", " Impressions", " Visits", " Clicks", " Conversions", " Revenue", " Cost", " Profit", " CPV", " ICTR", " CTR", " CR", " CV", " ROI", " EPV", " EPC", " AP", " Errors"],
        'Error log'          => ['Time', 'Campaign', 'Category', 'Details', 'URL']
    ];
}
