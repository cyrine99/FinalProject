<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Main')->group(function ()
{

    Route::post('checkLogin','MainController@checkLogin')->name('checkLogin');

    Route::middleware('AuthCheck')->group(function ()
    {
        Route::get('/','MainController@login')->name('login');
        Route::get('logout','MainController@logout')->name('logout');
    });

});



Route::namespace('Admin')->group(function ()
{

    //Register Users
    Route::resource('admins', RegisterController::class);


    //ParamedicsUi
    Route::resource('paramedics',ParamedicsController::class);



    //Admin URL
    Route::middleware('AuthCheck')->group(function ()
    {
        Route::get('register','AdminController@register')->name('register');
        Route::get('dashboard','AdminController@dashboard')->name('dashboard');
        Route::get('addParamedicsUi','AdminController@addParamedicsUi')->name('addParamedicsUi');
        Route::get('registerUpdateAndDelete','AdminController@registerUpdateAndDelete')->name('registerUpdateAndDelete');
        Route::get('addParamedicsUi','AdminController@addParamedicsUi')->name('addParamedicsUi');

    });

});


Route::middleware('AuthCheck')->group(function () {
    Route::get('exitPermission', 'ExitPermissionRequestController@index')->name('exitPermission');
    Route::get('exitPermissionShow/{id}/{state}', 'ExitPermissionRequestController@show')->name('exitPermissionShow');

    Route::get('notificationCount', 'ExitPermissionRequestController@notificationCount')->name('notificationCount');
    Route::get('RequsetsAccept', 'ExitPermissionRequestController@RequsetsAccept')->name('RequsetsAccept');
    Route::get('RequsetsNotAccept', 'ExitPermissionRequestController@RequsetsNotAccept')->name('RequsetsNotAccept');
    Route::get('AllRequsets', 'ExitPermissionRequestController@AllRequsets')->name('AllRequsets');
    Route::get('AllRequestBody', 'ExitPermissionRequestController@AllRequestBody')->name('AllRequestBody');
    Route::get('CancelRequest/{id}/{id_patient}', 'ExitPermissionRequestController@CancelRequest')->name('CancelRequest');
    Route::get('OkRequest/{id}/{id_patient}', 'ExitPermissionRequestController@OkRequest')->name('OkRequest');







});













