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
//        $basic  = new \Vonage\Client\Credentials\Basic("78c856d3", "PaM0SlMzcxWw7R6W");
//        $client = new \Vonage\Client($basic);
//
//        $response = $client->sms()->send(
//            new \Vonage\SMS\Message\SMS("218913204801", 'BRAND_NAME', 'A text message sent using the Nexmo SMS API')
//        );
//
//        $message = $response->current();
//
//        if ($message->getStatus() == 0) {
//            echo "The message was sent successfully\n";
//        } else {
//            echo "The message failed with status: " . $message->getStatus() . "\n";
//        }

//        Nexmo::message()->send([
//            'to'=>'218916525287',
//            'from'=>'Wee',
//            'text'=>'hi nana'
//        ]);

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
          if(Hash::check($request->password,$userInfo->password))
          {
              $request->session()->put('LoggedUser',$userInfo->id);
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
