<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use  Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;


//نقوم بتحميل المودل للعمل عل الجدول
use App\Models\AdminModel;

//لعمل هاش او تشفير للباسورد
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function __construct()
    {
    }


    public function store(Request $request,AdminModel $admin)
    {
        $request->validate(
            [
                'firstname'=>'required|max:15',//و تحقق ان الاسم مش مكرر في الجدول
                'lastname'=>'required|max:15',
                'employeeId'=>'required|unique:admin_models|min:7|max:15',
                'email'=>'required|email|unique:admin_models|max:50',
                'userType'=>'required',
                'password'=>'required|min:5|max:12',
                'passwordConfig'=>'required|min:5|max:12|same:password'
            ]
        );

        $admin->firstname=$request->firstname;
        $admin->lastname=$request->lastname;
        $admin->employeeId=$request->employeeId;
        $admin->email=$request->email;
        $admin->userType=$request->userType;
        $admin->password=Hash::make($request->password);
        $admin->admin_state=1;
        $save=$admin->save();

        if($save)
        {
            return back()->with('success','تم إضافة المستخدم بنجاح');
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }


    }

    public function show(AdminModel $adminModel)
    {
      //  return view('',$adminModel);
    }

    public function edit(AdminModel $adminModel)
    {
        //  return view('',$adminModel);
    }

    public function update(Request $request)
    {

        $admin=AdminModel::find($request->UserId);

        if ($admin->employeeId!=$request->employeeId)
        {
            $userInfo=AdminModel::where('employeeId','=',$request->employeeId)->first();

            if($userInfo)
            {
                return back()->with('fail','الرقم الوظيفي مكرر!!');
            }
            else {

                $admin->firstname = $request->firstname;
                $admin->lastname = $request->lastname;
                $admin->employeeId = $request->employeeId;
                $admin->email = $request->email;
                $admin->userType = $request->userType;

                $update = $admin->save();


                if ($update) {

                    return back()->with('success', 'تم تعديل المستخدم بنجاح');
                } else {
                    return back()->with('fail', 'هناك مشكلة ما ! ارجوا المحاولة لاحقا');
                }
            }

        }
        else {

            $admin->firstname = $request->firstname;
            $admin->lastname = $request->lastname;
            $admin->employeeId = $request->employeeId;
            $admin->email = $request->email;
            $admin->userType = $request->userType;

            $update = $admin->save();


            if ($update) {

                return back()->with('success', 'تم تعديل المستخدم بنجاح');
            } else {
                return back()->with('fail', 'هناك مشكلة ما ! ارجوا المحاولة لاحقا');
            }
        }



    }

    public function destroy($id)
    {

        $updateActive= AdminModel::where('id',$id)->update([
            'admin_state' => 0
        ]);


        if($updateActive)
        {
            return response()->json(['status'=>'تم إلغاء تفعيل المستخدم بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }

    public function admins_deactivate($id)
    {

        $updateActive= AdminModel::where('id',$id)->update([
            'admin_state' => 0
        ]);


        if($updateActive)
        {
            return response()->json(['status'=>'تم إلغاء تفعيل المستخدم بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }

    public function active($id)
    {
        $updateActive= AdminModel::where('id',$id)->update([
            'admin_state' => 1
        ]);


        if($updateActive)
        {
            return response()->json(['status'=>'تم  تفعيل المستخدم بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }
}
