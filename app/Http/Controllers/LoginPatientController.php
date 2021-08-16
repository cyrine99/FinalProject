<?php

namespace App\Http\Controllers;

use App\Models\LoginPatient;
use App\Models\Patient;
use Illuminate\Http\Request;

class LoginPatientController extends Controller
{

    public function index()
    {
        //
    }


    //دالة لجلب tokens حسب مريض معين
//    public function loginTokensForOnePatient($id)
//    {
//        $tokens= Patient::find($id)->loginPatientTokens;
//        return $tokens;
//    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'=>'required',
            'tokens'=>'required',
        ]);

        $store=LoginPatient::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function show(LoginPatient $loginPatient)
    {
        //
    }


    public function update(Request $request, LoginPatient $loginPatient)
    {
        //
    }


    public function destroy(LoginPatient $loginPatient)
    {
        //
    }
}
