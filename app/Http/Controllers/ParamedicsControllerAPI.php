<?php

namespace App\Http\Controllers;

use App\Models\Paramedics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParamedicsControllerAPI extends Controller
{

    public function index()
    {
        //في paginate عطينا 5 تعني أظهر ال5  العناصر الأحدث فقط
        //$data=Paramedics::latest()->paginate(5);
        $data=Paramedics::all();
        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);

        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required|max:15',
            'father_name'=>'required|max:15',
            'grand_name'=>'required|max:15',
            'lastname'=>'required|max:15',
            'phone'=>'required|max:10|min:10|unique:Paramedics',
            'email'=>'email|required|max:50|unique:Paramedics',
            'BD_Day'=>'required',
            'BD_Month'=>'required',
            'BD_Year'=>'required',
            'city'=>'required',
            'area'=>'required',
            'IDnumber'=>'required|max:50|unique:Paramedics',
            'username'=>'required|max:50|unique:Paramedics',
            'password'=>'required|min:5|max:12',
            'passwordConfig'=>'required|min:5|max:12|same:password'
        ]);
        $paramedic=new Paramedics();

        $paramedic->firstname=$request->firstname;
        $paramedic->father_name=$request->father_name;
        $paramedic->grand_name=$request->grand_name;
        $paramedic->lastname=$request->lastname;
        $paramedic->phone=$request->phone;
        $paramedic->email=$request->email;
        $paramedic->BD_Day=$request->BD_Day;
        $paramedic->BD_Month=$request->BD_Month;
        $paramedic->BD_Year=$request->BD_Year;
        $paramedic->city=$request->city;
        $paramedic->area=$request->area;
        $paramedic->IDnumber=$request->IDnumber;
        $paramedic->username=$request->username;
        $paramedic->password=Hash::make($request->password);

        $store=$paramedic->save();

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }


    }



    public function show(Paramedics $paramedics)
    {
        //
    }


    public function update(Request $request, Paramedics $paramedics)
    {
        //
    }


    public function destroy(Paramedics $paramedics)
    {
        //
    }

    public function checkLogin (Request $request)
    {
        $userInfo=Paramedics::where('username','=',$request->username)->first();

        if(!$userInfo)
        {
             return response()->json('Error',400);
        }
        else
        {
            if(Hash::check($request->password,$userInfo->password))
            {

                return response()->json($userInfo,200);

            }
            else
            {
                return response()->json('Error',400);
            }
        }
    }

}
