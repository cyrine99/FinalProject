<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Patient;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Return All Paramedics
Route::resource('paramedicsAPI',ParamedicsControllerAPI::class);


//Chick login for Paramedics
Route::post('checkLoginAPI','ParamedicsControllerAPI@checkLogin');


//Insert or Register Patient
Route::resource('patientAPI',PatientController::class);


//Api return permission for one patient
Route::get('exitPermissionForOnePatient/{id}/patients','ExitPermissionRequestController@exitPermissionForOnePatient');


//Api Insert Permission
Route::resource('exitPermissionRequestAPI',ExitPermissionRequestController::class);





