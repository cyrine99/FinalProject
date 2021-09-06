<?php

namespace App\Http\Controllers;

use App\Models\Balag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalagController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

        $request->validate([
            'id_patient'=>'required',
            'location_latitude'=>'required',
            'location_longitude'=>'required',
            'phone'=>'required',
            'for_you'=>'required',
            'balag_type'=>'required',
            'location_description'=>'required',
            'number_of_persons'=>'required',
            'balag_state'=>'required',
            'name'=>'required',
            'age'=>'required',
            'notes'=>'required',
            'gender'=>'required'

        ]);

        $store=Balag::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function showForUser($id,$state)
    {
        $data =DB::table('balags')->where('id_patient', $id)->where('balag_state',$state)->orderByRaw('created_at DESC')->get() ;
        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function showAll($state)
    {
        $data =DB::table('balags')->where('balag_state',$state)->orderByRaw('created_at DESC')->get() ;
        if($data) {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function edit(Balag $balag)
    {
        //
    }


    public function update(Request $request, Balag $balag)
    {
        //
    }


    public function destroy(Balag $balag)
    {
        //
    }
}
