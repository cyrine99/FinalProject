<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use  Illuminate\Routing\Controller;

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

        public function index()
        {
           $users= AdminModel::all();
          // info($users);
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

    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'firstname'=>'required',
                'lastname'=>'required',
                'employeeId'=>'required|min:7',
                'email'=>'required|email',
                'userType'=>'required',
            ]
        );

        $admin=AdminModel::find($id);
        $admin->firstname=$request->firstname;
        $admin->lastname=$request->lastname;
        $admin->employeeId=$request->employeeId;
        $admin->email=$request->email;
        $admin->userType=$request->userType;

        $update=$admin->save();


        if($update)
        {
            return back()->with('success','تم تعديل المستخدم بنجاح');
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }

    public function destroy($id)
    {
        $delete=AdminModel::find($id)->delete();

        if($delete)
        {
            return response()->json(['status'=>'تم حذف المستخدم بنجاح']);
        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }
}
