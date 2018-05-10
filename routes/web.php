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

        Route::group(['namespace' => 'Affiliate', ], function(){

        Route::get('/affiliate-service', 'AffiliateController@index')->name('affiliate-service');
        Route::get('/compaigns', 'AffiliateController@compaigns')->name('compaigns');

    //Email BulkSplit
        Route::get('/affiliate-service/email-bulk-split', 'AffiliateController@emailBulkSplit')
            ->name('email-bulk-split');

        Route::get('/affiliate-service/email-bulk-split/data-filters-rules', 'AffiliateController@dataFiltersRules')
            ->name('data-filters-rules');

        Route::get('/affiliate-service/email-bulk-split/data-filters-rules/edit', 'AffiliateController@dataFiltersRules')
            ->name('data-filters-rules');

    // Data Filters Edit page
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}', 'AffiliateController@dataFiltersRules')->name('data-filters-rules-edit');

    //connection
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/connection', 'AffiliateController@connection')->name('connection');

    //form-builder
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/form-builder', 'AffiliateController@formbuilder')->name('form-builder');


    //dataBaseFields
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/data-base-fields', 'AffiliateController@dataBaseFields')->name('data-base-fields');

    //affiliates-partners
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/affiliates-partners', 'AffiliateController@affiliatesPartners')->name('affiliates-partners');

    //data-filters and rules data
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/data-filters-rules-data', 'AffiliateController@dataFiltersRulesData')->name('data-filters-rules-data');

    //outputOverview
        Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/output-overview', 'AffiliateController@outputOverview')->name('output-overview');
});

