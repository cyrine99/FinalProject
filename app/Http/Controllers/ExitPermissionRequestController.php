<?php

namespace App\Http\Controllers;

use App\Models\ExitPermissionRequert;
use Illuminate\Http\Request;

use  Illuminate\Routing\Controller;

use App\Models\Patient;


class ExitPermissionRequestController extends Controller
{

    //دالة لجلب التصريح حسب مريض معين
    public function exitPermissionForOnePatient($id)
    {
        $permissions= Patient::find($id)->exitPermissionRequest;

        return $permissions;
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate([
            'patient_id'=>'required',
            'state_details'=>'required',
            'driver_name'=>'required',
            'driver_id'=>'required',
            'driver_phone'=>'required',
            'car_bord_number'=>'required',
            'home_address'=>'required',
            'hospital_name'=>'required',
            'date_time_request'=>'required',
        ]);

        $store=ExitPermissionRequert::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }

    }


    public function show(ExitPermissionRequert $exitPermissionRequert)
    {
        //
    }


    public function edit(ExitPermissionRequert $exitPermissionRequert)
    {
        //
    }


    public function update(Request $request, ExitPermissionRequert $exitPermissionRequert)
    {
        //
    }


    public function destroy(ExitPermissionRequert $exitPermissionRequert)
    {
        //
    }
}
