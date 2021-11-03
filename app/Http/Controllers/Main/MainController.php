<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use  Illuminate\Routing\Controller;

//نقوم بتحميل المودل للعمل عل الجدول
use App\Models\AdminModel;

//لعمل هاش او تشفير للباسورد
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;
use Nexmo\Laravel\Facade\Nexmo;


class MainController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        return view('auth.loginUi');
    }


    public function checkLogin(Request $request)
    {

        $request->validate(
          [
              'employeeId'=>'required|min:7',
              'password'=>'required|min:5|max:12|'
          ]
      );

      $userInfo=AdminModel::where('employeeId','=',$request->employeeId)->first();


      if(!$userInfo)
      {
          return back()->with('fail','الرقم الوظيفي غير صحيح');
      }
      else
      {
          if($userInfo->admin_state==0)
          {
              return back()->with('fail','تم إلغاء تفعيلك مسبقا !!');
          }

          if(Hash::check($request->password,$userInfo->password))
          {
              $request->session()->put('LoggedUser',$userInfo->id);
              $request->session()->put('PassUser',$request->password);

              return redirect('dashboard');

          }
          else
          {
              return back()->with('fail','كلمة المرور غير صحيحة');
          }
      }


    }


    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
           session()->pull('LoggedUser');
            return redirect('/');
        }
    }



}
