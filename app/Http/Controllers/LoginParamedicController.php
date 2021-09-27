<?php

namespace App\Http\Controllers;

use App\Models\LoginParamedic;
use Illuminate\Http\Request;

class LoginParamedicController extends Controller
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
        $save=LoginParamedic::create($request->all());

        if($save)
        {
            return response()->json($save,200);
        }
        else
        {
            return response()->json('Error',400);
        }

    }

 
    public function show(LoginParamedic $loginParamedic)
    {
        //
    }


    public function edit(LoginParamedic $loginParamedic)
    {
        //
    }

    public function update(Request $request, LoginParamedic $loginParamedic)
    {
        //
    }

    public function destroy($id,$token)
    {
      $delete=LoginParamedic::
          where('id_paramedic',$id)->
          where('token',$token)->
          delete();
        if($delete)
        {
            return response()->json($delete,200);
        }
        else
        {
            return response()->json('Error',400);
        }

    }
}
