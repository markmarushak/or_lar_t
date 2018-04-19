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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/affiliate-service', '\App\Http\Controllers\Affiliate\AffiliateService@index');


Route::get('/compaigns', '\App\Http\Controllers\Affiliate\AffiliateService@index')->name('compaigns');

Route::get('/affiliate-service/email-bulk-split/data-filters-rules', '\App\Http\Controllers\Affiliate\AffiliateService@index');