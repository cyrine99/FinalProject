<?php

namespace App\Http\Controllers;

use App\Models\ParamedicBalag;
use Illuminate\Http\Request;
use App\Models\Balag;
use Illuminate\Support\Facades\DB;

class ParamedicBalagController extends Controller
{

    public function index()
    {
        //
    }




    public function store(Request $request)
    {
        if($request->balag_state==1)
        {
         Balag::where('id',$request->balag_id)->update(['balag_state' => 1]);   
        }
        
        
        $store=ParamedicBalag::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }




    public function BalagUpdate(Request $request)
    
    { 
        $update= ParamedicBalag::where('id',$request->id)->update([
            'balag_state' => 2,
            'time_access_location'=>$request->time_access_location,
            'relief_details'=>$request->relief_details,
            'hospital'=>$request->hospital,
            'hospital_name'=>$request->hospital_name,
            'other_details'=>$request->other_details
            ]);
            
            $update2= Balag::where('id',$request->balag_id)->update([
            'balag_state' => 2
            ]);
            
        if($update && $update2)
         {
            return response()->json($request,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    
    }
    
    
     public function BalagNotClose($id,$state)
    
    { 
      $data = DB::table('paramedic_balags')
      ->where('paramedic_id', $id)
      ->where('balag_state', $state)
      ->orderByRaw('created_at DESC')->get();
      
      if($data)
         {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }
     
    }
    
     public function BalagData($id)
    
    { 
      $data = DB::table('balags')
      ->where('id', $id)
      ->get();
      
      if($data)
         {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }
     
    }


}
