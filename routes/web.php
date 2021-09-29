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

    Route::get('active/{id}', 'RegisterController@active')->name('active');
    Route::get('activeParamedic/{id}', 'ParamedicsController@activeParamedic')->name('activeParamedic');

    Route::get('admins_deactivate/{id}', 'RegisterController@admins_deactivate')->name('admins_deactivate');
    Route::get('deactiveParamedic/{id}', 'ParamedicsController@deactiveParamedic')->name('deactiveParamedic');

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
        Route::get('allExitPermission','AdminController@allExitPermission')->name('allExitPermission');
        Route::get('balagsMain','AdminController@balagsMain')->name('balagsMain');
        Route::get('updateAndDeleteParamedics','AdminController@updateAndDeleteParamedics')->name('updateAndDeleteParamedics');

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
    Route::get('CancelRequest/{id}/{id_patient}/{id_admin}', 'ExitPermissionRequestController@CancelRequest')->name('CancelRequest');
    Route::get('OkRequest/{id}/{id_patient}/{id_admin}', 'ExitPermissionRequestController@OkRequest')->name('OkRequest');

    Route::get('balags/{state}','BalagController@balags')->name('balags');
    Route::get('paramedic_name/{id}','BalagController@paramedic_name')->name('paramedic_name');




});













