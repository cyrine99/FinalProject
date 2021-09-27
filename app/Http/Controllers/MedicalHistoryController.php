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

    public function haveMedicalHistory($id)
    {
        $count= MedicalHistory::where('id_patient',$id)->count();
        if($count)
        {
            $data = MedicalHistory::where('id_patient', $id)->get();
            return response()->json($data,200);
        }
        else
        {
            
            return response()->json('Error',400);

        }
    }
    public function MedicalHistoryUpdate(Request $request)
    
    { 
        $update= MedicalHistory::where('id_patient',$request->id_patient)->update([
        
            'blood_type'=>$request->blood_type,
            
            'diabetes'=>$request->diabetes,
            
            'heart_disease'=>$request->heart_disease,
            
            'blood_pressure_disease'=>$request->blood_pressure_disease,
            
            'medicines_allergic'=>$request->medicines_allergic,
            
            'medicines_used'=>$request->medicines_used,
            
            'other_diseases_details'=>$request->other_diseases_details,
            
            'health_insurance'=>$request->health_insurance,
            
            'insurance_company_name'=>$request->insurance_company_name,
            
            'insurance_expiry_date'=>$request->insurance_expiry_date,
            
            'insurance_membership_No'=>$request->insurance_membership_No,
            
            ]);
            
        if($update)
         {
            return response()->json($request,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    
    }
    

}
