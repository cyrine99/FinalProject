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

Route::get('sendNoty', function () {


    $SERVER_API_KEY = 'AAAAyjOIxt4:APA91bHDGYSMyvu-tHFf4_py6VVdEaW5ptN5cwk8TtpTkZ56neF_Ehc3fFs3Lf2_366bGOyBakcpVUvVAPYBzYFUYi8ia6xMuu-M0_7TPFFP_bxRYcNvLFWXUmf3rGCchqUpyX-RV5Q1';

    $token_1 = 'e-_-9gCAQhSujXG5zrx5oj:APA91bHsSqmWYruNGOfxAReELJaopQJJ0aA9DRs2kYSSvk7UBC4oDhBxw8q6FrI9xoQCGi6ACq58u4iXXdy4ad9Uw7odH__IATn65jkVsY5iAoOnQQR41rsWxl6mc4fw1EbY0fBwQssX';

    $data = [

        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => 'Welcome',

            "body" => 'Description',

            "sound"=> "default" // required for sound on ios

        ],

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    dd($response);

});









