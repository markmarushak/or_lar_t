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

Route::get('/affiliate-service', '\App\Http\Controllers\Affiliate\AffiliateService@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');





Route::group(['middleware' => 'can:accessAdminpanel'], function() {
    Route::get('/adminpanel/dashboard', 'Adminpanel\Dashboard@index');
    // future adminpanel routes also should belong to the group
});