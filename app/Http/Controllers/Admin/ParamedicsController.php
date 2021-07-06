<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paramedics;
use Illuminate\Http\Request;

//يجب اضافتها
use  Illuminate\Routing\Controller;


use Illuminate\Support\Facades\Hash;

class ParamedicsController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
    }


    public function store(Request $request,Paramedics $paramedic)
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

        if($store)
            return back()->with('success','تم تسجيل المسعف بنجاح');

        return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');




    }


    public function show($id=null)
    {
        if ($id)
        {
            $paramedics=Paramedics::find($id);
            return $paramedics;
        }
        else
        {
            $paramedics=Paramedics::all();
            return $paramedics;
        }


    }


    public function edit(Paramedics $paramedics)
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

    public function checkLogin(Request $request)
    {
        $userInfo=Paramedics::where('username','=',$request->username)->first();

        if(!$userInfo)
        {
            return  false;
        }
        else
        {
            if(Hash::check($request->password,$userInfo->password))
            {
               // $request->session()->put('LoggedUser',$userInfo->id);
                return true;

            }
            else
            {
                return false;
            }
        }
    }

}
