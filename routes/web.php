<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['namespace' => 'Affiliate', 'prefix' => 'affiliate-service'], function(){

    Route::get('/', 'AffiliateController@index')->name('affiliate-service');
    Route::get('/compaigns', 'AffiliateController@compaigns')->name('compaigns');
    //affiliates-partners
    Route::get('/affiliates-partners', 'AffiliateController@affiliatesPartners')->name('affiliates-partners');


    //Email BulkSplit
    Route::get('/email-bulk-split', 'AffiliateController@emailBulkSplit')
        ->name('email-bulk-split');

    //data filters rules
    Route::get('/email-bulk-split/data-filters-rules', 'DataFilterRuleController@index')->name('data-filters-rules');

    Route::get('/email-bulk-split/data-filters-rules/add', 'DataFilterRuleController@add')->name('data-filters-rules-add');

    Route::post('/email-bulk-split/data-filters-rules/add', 'DataFilterRuleController@store')->name('data-filters-rules-store');

    Route::group(['prefix' => '/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}'], function (){

        //connection
        Route::get('/connection', 'DataFilterRuleController@connection')->name('connection');

        Route::put('/connection/update', 'DataFilterRuleController@updateConnectDb')->name('connection-update');

        //form-builder
        Route::get('/form-builder', 'DataFilterRuleController@formbuilder')->name('form-builder');

        // Data Filters Edit page
        Route::get('', 'AffiliateController@dataFiltersRules')->name('data-filters-rules-edit');



        //dataBaseFields
        Route::get('/data-base-fields', 'AffiliateController@dataBaseFields')->name('data-base-fields');

        //data-filters and rules data
        Route::get('/data-filters-rules-data', 'AffiliateController@dataFiltersRulesData')->name('data-filters-rules-data');

        //outputOverview
        Route::get('/output-overview', 'DataFilterRuleController@outputOverview')->name('output-overview');

        //outputOverviews
        Route::get('/output-overview-single/{single_id?}', 'AffiliateController@outputOverviewSingle')->name('output-overview-single');
    });
});