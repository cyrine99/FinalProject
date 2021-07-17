<?php

namespace App\Http\Controllers\Main;

use App\Models\Patient;
use Illuminate\Http\Request;

use  Illuminate\Routing\Controller;


class PatientController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'firstname'=>'required',//و تحقق ان الاسم مش مكرر في الجدول
                'lastname'=>'required',
                'birthDate'=>'required',
                'gender'=>'required',
                'phone'=>'required',
                'length'=>'required',
                'weight'=>'required',
                'deaf'=>'required',
            ]
        );

//        $patient = new Patient();
//        $patient=$request;
//
//       $data=$patient->save();

        $data=Patient::create($request->all());

        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json($data,400);

        }

    }


    public function show(Patient $patient)
    {
        //
    }


    public function edit(Patient $patient)
    {
        //
    }


    public function update(Request $request, Patient $patient)
    {
        //
    }

    public function destroy(Patient $patient)
    {
        //
    }
}
