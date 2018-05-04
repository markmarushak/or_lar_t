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
Route::get('/affiliate-service', '\App\Http\Controllers\Affiliate\AffiliateService@index')->name('affiliate-service');
Route::get('/compaigns', '\App\Http\Controllers\Affiliate\AffiliateService@compaigns')->name('compaigns');

//Email BulkSplit
Route::get('/affiliate-service/email-bulk-split', '\App\Http\Controllers\Affiliate\AffiliateService@emailBulkSplit')
    ->name('email-bulk-split');

Route::get('/affiliate-service/email-bulk-split/data-filters-rules', '\App\Http\Controllers\Affiliate\AffiliateService@dataFiltersRules')
    ->name('data-filters-rules');

Route::get('/affiliate-service/email-bulk-split/data-filters-rules/edit', '\App\Http\Controllers\Affiliate\AffiliateService@dataFiltersRules')
    ->name('data-filters-rules');


// Data Filters Edit page
Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}', '\App\Http\Controllers\Affiliate\AffiliateService@dataFiltersRules')->name('data-filters-rules-edit');

//connection
Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/connection', '\App\Http\Controllers\Affiliate\AffiliateService@connection')->name('connection');

//form-builder
Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/form-builder', '\App\Http\Controllers\Affiliate\AffiliateService@formbuilder')->name('form-builder');

//dataBaseFields
Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/data-base-fields', '\App\Http\Controllers\Affiliate\AffiliateService@dataBaseFields')->name('data-base-fields');

//affiliates-partners
Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/affiliates-partners', '\App\Http\Controllers\Affiliate\AffiliateService@affiliatesPartners')->name('affiliates-partners');

//data-filters and rules data
Route::get('/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}/data-filters-rules-data', '\App\Http\Controllers\Affiliate\AffiliateService@dataFiltersRulesData')->name('data-filters-rules-data');