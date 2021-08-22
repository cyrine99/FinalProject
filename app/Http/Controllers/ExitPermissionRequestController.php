<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ExitPermissionRequert;
use App\Models\LoginPatient;
use Illuminate\Http\Request;



use  Illuminate\Routing\Controller;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;


class ExitPermissionRequestController extends Controller
{


    public function notificationCount()
    {
        $count= ExitPermissionRequert::where('request_state','=','0')->count();
        echo json_encode($count);

    }

    public function RequsetsAccept()
    {
        $count= ExitPermissionRequert::where('request_state','=','1')->count();
        echo json_encode($count);

    }

    public function RequsetsNotAccept()
    {
        $count= ExitPermissionRequert::where('request_state','=','-1')->count();
        echo json_encode($count);

    }
    public function AllRequsets()
    {
        $count= ExitPermissionRequert::where('id','>','0')->count();
        echo json_encode($count);

    }

    public function AllRequestBody()
    {
        //$data['ExitPermissionRequests']=;
        echo json_encode(ExitPermissionRequert::all());
    }



    public function CancelRequest($id,$id_patient)
    {
        $permissions = DB::table('login_patients')->where('patient_id', $id_patient)->get();

        $update=ExitPermissionRequert::where('id',$id)->update(['request_state' => -1]);

        if($update)
        {
            foreach($permissions as $key => $value)
            {
                $this->sendNoty($value->tokens,'المسعف','تم رفض الطلب , افحص قائمة طلباتك');
            }
            $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
            $data['AllUsers']=AdminModel::all();

            return view('admin.include.failed',$data);

        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }

    }

    public function OkRequest($id,$id_patient)
    {

        $permissions = DB::table('login_patients')->where('patient_id', $id_patient)->get();

        $update=ExitPermissionRequert::where('id',$id)->update(['request_state' => 1]);

        if($update)
        {
            foreach($permissions as $key => $value)
            {
                $this->sendNoty($value->tokens,'المسعف','تم الرد على طلبك , افحص قائمة طلباتك');
            }

            $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
            $data['AllUsers']=AdminModel::all();

            return view('admin.include.successPage',$data);

        }
        else
        {
            return back()->with('fail','هناك مشكلة ما ! ارجوا المحاولة لاحقا');
        }



    }

    public function sendNoty($token,$title,$body)
    {
        $SERVER_API_KEY = 'AAAAyjOIxt4:APA91bHDGYSMyvu-tHFf4_py6VVdEaW5ptN5cwk8TtpTkZ56neF_Ehc3fFs3Lf2_366bGOyBakcpVUvVAPYBzYFUYi8ia6xMuu-M0_7TPFFP_bxRYcNvLFWXUmf3rGCchqUpyX-RV5Q1';

        $token_1 =$token ;
        $data = [

            "registration_ids" => [
                $token_1
            ],

            "notification" => [

                "title" => $title,

                "body" => $body,

                "sound"=> "default" // required for sound on ios

            ],

        ];

        $dataString = json_encode($data);

        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

    }

    public function store(Request $request)
    {

        $request->validate([
            'patient_id'=>'required',
            'state_details'=>'required',
            'driver_name'=>'required',
            'driver_id'=>'required',
            'driver_phone'=>'required',
            'car_bord_number'=>'required',
            'home_address'=>'required',
            'hospital_name'=>'required',
            'date_time_request'=>'required',
        ]);

        $store=ExitPermissionRequert::create($request->all());

        if($store) {
            return response()->json($store,200);
        }
        else
        {
            return response()->json('Error',400);
        }

    }


    public function show( $id,$state)
    {
        $data['permissionData']= ExitPermissionRequert::find($id);

        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        $data['AllUsers']=AdminModel::all();

        return view('admin.include.exitPermission',$data);

    }

}
