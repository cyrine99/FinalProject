<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{

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
        $store=MedicalHistory::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function MedicalHistoryShowForUser($id)
    {
        $data = MedicalHistory::where('id_patient', $id)->get();

        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);

        }
    }


    public function edit(MedicalHistory $medicalHistory)
    {
        //
    }


    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        //
    }

    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
