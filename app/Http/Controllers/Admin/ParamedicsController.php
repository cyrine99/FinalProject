<?php

namespace App\Http\Controllers\Admin;

use App\Mail\TestMail;
use App\Models\Paramedics;
use Illuminate\Http\Request;

//يجب اضافتها
use  Illuminate\Routing\Controller;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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
//        $details=[
//            'title'=>'بيانات دخولك لتطبيق المستجيب',
//            'body'=>'اسم المستجيب : '.$request->username
//        ];


            $request->validate([
                'firstname'=>'required|max:15',
                'father_name'=>'required|max:15',
                'grand_name'=>'required|max:15',
                'lastname'=>'required|max:15',
                'phone'=>'required|max:10|min:10|unique:paramedics',
                'email'=>'email|required|max:50|unique:paramedics',
                'BD_Day'=>'required',
                'BD_Month'=>'required',
                'BD_Year'=>'required',
                'IDnumber'=>'required|max:50|unique:paramedics',
                'username'=>'required|max:50|unique:paramedics',
                'password'=>'required|min:5|max:12',
                'passwordConfig'=>'required|min:5|max:12|same:password'
            ]);
            $paramedic->firstname=$request->firstname;
            $paramedic->father_name=$request->father_name;
            $paramedic->grand_name=$request->grand_name;
            $paramedic->lastname=$request->lastname;
            $paramedic->phone=$request->phone;
            $paramedic->email=$request->email;
            $paramedic->birth_date=''.$request->BD_Year.'-'.$request->BD_Month.'-'.$request->BD_Day.'';
            $paramedic->IDnumber=$request->IDnumber;
            $paramedic->username=$request->username;
            $paramedic->password=Hash::make($request->password);
            $paramedic->paramedic_state=1;



            if($paramedic->save())
            {

               return back()->with('success','تم تسجيل المسعف بنجاح');

            }

            else
            {
                return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
            }





    }


    public function show($id=null)
    {

    }


    public function edit(Paramedics $paramedics)
    {
        //
    }

    public function update(Request $request,$id)
    {
        $paramedic=Paramedics::find($id);

        if ($paramedic->phone!=$request->phone)
        {
            $userInfo=Paramedics::where('phone','=',$request->phone)->first();

            if($userInfo)
            {
                return back()->with('fail','رقم الهاتف مكرر !! ');
            }

        }

        if ($paramedic->email!=$request->email)
        {
            $userInfo=Paramedics::where('email','=',$request->email)->first();

            if($userInfo)
            {
                return back()->with('fail','البريد الإلكتروني  مكرر !! ');
            }
        }

        if ($paramedic->IDnumber!=$request->IDnumber)
        {
            $userInfo=Paramedics::where('IDnumber','=',$request->IDnumber)->first();

            if($userInfo)
            {
                return back()->with('fail','الرقم الوطني مكرر !! ');
            }
        }

            $paramedic->firstname = $request->firstname;
            $paramedic->father_name = $request->father_name;
            $paramedic->grand_name = $request->grand_name;
            $paramedic->lastname = $request->lastname;
            $paramedic->phone = $request->phone;
            $paramedic->email = $request->email;
            $paramedic->birth_date=$request->birth_date;
            $paramedic->IDnumber = $request->IDnumber;

            $update = $paramedic->save();

            if ($update) {

                return back()->with('success', 'تم تعديل المسعف بنجاح');
            } else {
                return back()->with('fail', 'هناك مشكلة ما ! ارجوا المحاولة لاحقا');
            }


    }

    public function deactiveParamedic($id)
    {

        $updateActive= Paramedics::where('id',$id)->update([
            'paramedic_state' => 0
        ]);


        if($updateActive)
        {
            return response()->json(['status'=>'تم إلغاء تفعيل المسعف بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }



    public function destroy($id)
    {

        $updateActive= Paramedics::where('id',$id)->update([
            'paramedic_state' => 0
        ]);


        if($updateActive)
        {
            return response()->json(['status'=>'تم إلغاء تفعيل المسعف بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }

    public function activeParamedic($id)
    {
        $updateActive= Paramedics::where('id',$id)->update([
            'paramedic_state' => 1
        ]);


        if($updateActive)
        {
            return response()->json(['status'=>'تم  تفعيل المسعف بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }


}
