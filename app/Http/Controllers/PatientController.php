<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;



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
  
        $data=Patient::create($request->all());

        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }

    }


   public function ShowUserData($id)
    {
        $data = Patient::where('id', $id)->get();

        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);

        }
    }



    public function updateUserData(Request $request)
    {
        $update= Patient::where('id',$request->id)->update([
        
           'firstname'=>$request->firstname,
           'lastname'=>$request->lastname,
           'birthDate'=>$request->birthDate,
           'gender'=>$request->gender,
           'length'=>$request->length,
           'weight'=>$request->weight,
           'deaf'=>$request->deaf
            
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

  
      public function checkLoginAlmuseif (Request $request)
    {
        $userInfo=Patient::where('phone','=',$request->phone)->first();

        if(!$userInfo)
        {
             return response()->json('Error',400);
        }
        else
        {
                return response()->json($userInfo,200);
        }
    }
}
