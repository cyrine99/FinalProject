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










