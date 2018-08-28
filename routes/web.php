<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


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

Route::get('/time-sent-email', 'HomeController@setTimeSentEmail')->name('set-time-sent-email');


Route::group(['namespace' => 'Reporting', 'prefix' => 'report-service', 'middleware' => 'auth'], function(){
    Route::get('/', 'ReportingController@index')->name('reporting');
});


Route::group(['namespace' => 'Programs', 'prefix' => 'programs-service', 'middleware' => 'auth'], function(){
    Route::get('/', 'ProgramsController@index')->name('programs');
});


Route::group(['namespace' => 'Conversions', 'prefix' => 'conversions-service', 'middleware' => 'auth'], function(){
    Route::get('/', 'ConversionsController@index')->name('conversions');
});


// Payouts
Route::group(['namespace' => 'Payouts', 'prefix' => 'payouts-service', 'middleware' => 'auth'], function(){
    Route::get('/', 'PayoutsController@index')->name('payouts');
});

//Settings
Route::group(['namespace' => 'Settings', 'prefix' => 'settings-service', 'middleware' => 'auth'], function(){
    Route::get('/', 'SettingsController@index')->name('settings');
});

//Support
Route::group(['namespace' => 'Support', 'prefix' => 'support-service', 'middleware' => 'auth'], function(){
    Route::get('/', 'SupportController@index')->name('support');
});



Route::group(['namespace' => 'Affiliate', 'prefix' => 'affiliate-service', 'middleware' => 'auth'], function(){

    Route::get('/', 'AffiliateController@index')->name('affiliate-service');
    Route::get('/compaigns', 'AffiliateController@compaigns')->name('compaigns');

    //affiliates-partners
    Route::group( ['prefix' => 'affiliates-partners'] , function() {

        Route::get('/', 'AffiliatePartnerController@index')->name('affiliates-partners');
        Route::delete('/delete', 'AffiliatePartnerController@delete')->name('delete-affiliate-partner');
        Route::get('/show', 'AffiliatePartnerController@show')->name('show-affiliates-partners');
        Route::post('/get', 'AffiliatePartnerController@getAffiliatePartner')->name('get-affiliate-partner');
        Route::get('/edit/{id}', 'AffiliatePartnerController@edit')->name('edit-affiliate-partner');
        Route::post('/update/', 'AffiliatePartnerController@update')->name('update-affiliate-partner');
        Route::get('/acaffiliates', 'AffiliatePartnerController@acAffiliatesPartners')->name('get-affiliates-partners-autocomplete');

        Route::get('/add-affiliates-partners', 'AffiliatePartnerController@add')->name('add-affiliates-partners');
        Route::post('/add-affiliates-partners', 'AffiliatePartnerController@store')->name('add-affiliates-partners-store');
    });

    //Email BulkSplit
    Route::get('/email-bulk-split', 'AffiliateController@emailBulkSplit')
        ->name('email-bulk-split');

    //data filters rules
    Route::group( ['prefix' => 'email-bulk-split/data-filters-rules'] , function() {
        Route::get('/', 'DataFilterRuleController@index')->name('data-filters-rules');
        Route::get('/show', 'DataFilterRuleController@show')->name('data-filters-rules-show');
        Route::get('/get', 'DataFilterRuleController@get')->name('data-filters-rules-get');
        Route::post('/edit', 'DataFilterRuleController@edit')->name('data-filters-rules-edit');
        Route::get('/add', 'DataFilterRuleController@add')->name('data-filters-rules-add');
        Route::post('/add', 'DataFilterRuleController@store')->name('data-filters-rules-store');
    });

    Route::group(['prefix' => '/data-filters-rules/edit/{data_filters_rules_id}/{data_filters_rules_description}'], function (){

        //connection
        Route::get('/connection', 'ProjectController@connection')->name('connection');

        Route::put('/connection/update', 'ProjectController@updateConnectToDb')->name('connection-update');

        //form-builder
        Route::get('/form-builder', 'ProjectController@formbuilder')->name('form-builder');

        //single-form-builder
        Route::get('/single-form-builder/{singleId?}/', 'DataFilterRuleController@singleFormBuilder')->name('single-form-builder');


        // Data Filters Edit page
        Route::get('', 'ProjectController@dataFiltersRules')->name('data-filters-rules-edit');



        //dataBaseFields
        Route::get('/data-base-fields', 'ProjectController@dataBaseFields')->name('data-base-fields');

        //data-filters and rules data
        Route::group( ['prefix' => 'data-filters-rules-data'] , function() {
        Route::get('/', 'ProjectController@dataFiltersRulesData')->name('data-filters-rules-data');
        Route::get('/bind-project-partner', 'ProjectController@bindProjectAndPartner')->name('bind-project-and-partner');
        Route::get('/detach-project-partner', 'ProjectController@detachProjectAndPartner')->name('detach-project-and-partner');


            Route::get('/show-partners', 'ProjectController@showPartners')->name('show-partners');
            Route::post('/get-partners', 'ProjectController@getPartners')->name('get-partners');
            Route::post('/edit-partners', 'ProjectController@editPartners')->name('edit-partners');
            Route::delete('/delete-partners', 'ProjectController@deletePartners')->name('delete-partners');
            Route::post('/add-partners', 'ProjectController@addPartners')->name('add-partners');
            Route::post('/add-rules', 'ProjectController@addRules')->name('add-rules');
            Route::get('/get-rule', 'ProjectController@getRule')->name('get-rule');
        });
        //outputOverview
        Route::get('/output-overview', 'ProjectController@outputOverview')->name('output-overview');

        //outputOverviewSingle
        Route::get('/output-overview-single/{single_id}/', 'ProjectController@outputOverviewSingle')->name('single-output-overview');

        //Send Mail
        Route::get('/send', 'ProjectController@sendMail');
    });
});