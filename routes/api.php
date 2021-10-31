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
Route::get('exitPermissionForOnePatient/{id}','ExitPermissionRequestController@exitPermissionForOnePatient');


//Api Insert Permission
Route::resource('exitPermissionRequestAPI',ExitPermissionRequestController::class);


//API login for Patient checkLoginAlmuseif
Route::post('checkLoginAlmuseifAPI','PatientController@checkLoginAlmuseif');


//API Save Tokens For Patient
Route::resource('loginPatientTokensAPI',LoginPatientController::class);


//API for return Tokens for one patient
//Route::get('loginTokensForOnePatientAPI/{id}/patientsLogin','LoginPatientController@loginTokensForOnePatient');




/**************************/

//API For insert Balag
Route::resource('BalagAdd',BalagController::class);


//API For Show  Balag For User
Route::get('showForUser/{id}/{state}','BalagController@showForUser')->name('showForUser');


//API For Show All Balag
Route::get('showAll/{state}','BalagController@showAll')->name('showAll');


/*************************/
//API For insert MedicalHistory
Route::resource('MedicalHistoryAdd',MedicalHistoryController::class);


//API For show MedicalHistory For user
Route::get('MedicalHistoryShowForUser/{id}','MedicalHistoryController@MedicalHistoryShowForUser');


//API For insert ParamedicBalag
Route::resource('ParamedicBalagAdd',ParamedicBalagController::class);

//**************//

Route::post('BalagUpdate', 'ParamedicBalagController@BalagUpdate');


Route::get('BalagNotClose/{id}/{state}', 'ParamedicBalagController@BalagNotClose');

Route::get('BalagData/{id}', 'ParamedicBalagController@BalagData');



//API For insert ParamedicLogin Tokens
Route::resource('ParamedicLogin',LoginParamedicController::class);


//API For insert ParamedicLogin Tokens
Route::get('deleteToken/{id}/{token}','LoginParamedicController@destroy');

/*************/
//API For chick  MedicalHistory For user
Route::get('haveMedicalHistory/{id}','MedicalHistoryController@haveMedicalHistory');

Route::post('MedicalHistoryUpdate', 'MedicalHistoryController@MedicalHistoryUpdate');


Route::get('ShowUserData/{id}','PatientController@ShowUserData');

Route::post('updateUserData','PatientController@updateUserData');

Route::get('deleteTokenUser/{id}/{token}','LoginPatientController@deleteTokenUser');

/*************/
Route::get('cancelBalag/{id_Balag}/{id_patient}/{state}','BalagController@cancelBalag');


/************************/
Route::post('updateDataForParamedic','ParamedicsControllerAPI@update');
Route::get('balagsForParamedics/{id}/{state}','ParamedicsControllerAPI@balagsForParamedics');

/**************/
Route::get('showDataForParamedic/{phone}','ParamedicsControllerAPI@showDataForParamedic');


/**********/

Route::post('ready_or_not','ParamedicsControllerAPI@ready_or_not');

