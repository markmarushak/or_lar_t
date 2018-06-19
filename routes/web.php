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

Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return "View is cleared";
});

Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return "Route is cleared";
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['namespace' => 'Affiliate', 'prefix' => 'affiliate-service'], function(){

    Route::get('/', 'AffiliateController@index')->name('affiliate-service');
    Route::get('/compaigns', 'AffiliateController@compaigns')->name('compaigns');

    //affiliates-partners
    Route::group( ['prefix' => 'affiliates-partners'] , function() {

        Route::get('/', 'AffiliatePartnerController@index')->name('affiliates-partners');
        Route::get('/add-affiliates-partners', 'AffiliatePartnerController@add')->name('add-affiliates-partners');
    });

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
        Route::get('/data-base-fields', 'DataFilterRuleController@dataBaseFields')->name('data-base-fields');

        //data-filters and rules data
        Route::get('/data-filters-rules-data', 'DataFilterRuleController@dataFiltersRulesData')->name('data-filters-rules-data');

        //outputOverview
        Route::get('/output-overview', 'DataFilterRuleController@outputOverview')->name('output-overview');

        //outputOverviewsSingle
        Route::get('/output-overview-single/{single_id?}/', 'DataFilterRuleController@outputOverviewSingle')->name('output-overview-single');
    });
});