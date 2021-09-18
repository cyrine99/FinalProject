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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoginParamedic  $loginParamedic
     * @return \Illuminate\Http\Response
     */
    public function show(LoginParamedic $loginParamedic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoginParamedic  $loginParamedic
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginParamedic $loginParamedic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoginParamedic  $loginParamedic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginParamedic $loginParamedic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoginParamedic  $loginParamedic
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginParamedic $loginParamedic)
    {
        //
    }
}
