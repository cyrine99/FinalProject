<?php

namespace App\Http\Controllers;

use App\Models\ParamedicBalag;
use Illuminate\Http\Request;

class ParamedicBalagController extends Controller
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
        $store=ParamedicBalag::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function show(ParamedicBalag $paramedicBalag)
    {
        //
    }


    public function edit(ParamedicBalag $paramedicBalag)
    {
        //
    }

    public function update(Request $request, ParamedicBalag $paramedicBalag)
    {
        //
    }

    public function destroy(ParamedicBalag $paramedicBalag)
    {
        //
    }
}
