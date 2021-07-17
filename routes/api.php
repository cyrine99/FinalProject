<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('paramedicsAPI',ParamedicsControllerAPI::class);
Route::post('checkLoginAPI','ParamedicsControllerAPI@checkLogin');


