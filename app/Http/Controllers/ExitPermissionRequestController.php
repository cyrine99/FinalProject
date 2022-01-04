<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\Driver;
use App\Models\ExitPermissionRequert;
use App\Models\LoginPatient;
use Illuminate\Http\Request;



use  Illuminate\Routing\Controller;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;


class ExitPermissionRequestController extends Controller
{


 //دالة لجلب التصريح حسب مريض معين
    public function exitPermissionForOnePatient($id)
    {
         $permissions = DB::table('exit_permission_requerts')->where('patient_id', $id)->orderByRaw('created_at DESC')->get();

             if($permissions!= null){
                 echo json_encode($permissions);

          }


    }

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
        //First 10 requests
        echo json_encode(ExitPermissionRequert::where('request_state','=',0)->take(10)->get());
    }



    public function CancelRequest($id,$id_patient,$id_admin)
    {
        $permissions = DB::table('login_patients')->where('patient_id', $id_patient)->get();

        $update=ExitPermissionRequert::where('id',$id)->update(['request_state' => -1,'admin_action' =>$id_admin ]);


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

    public function OkRequest($id,$id_patient,$id_admin)
    {

        $permissions = DB::table('login_patients')->where('patient_id', $id_patient)->get();

        $update=ExitPermissionRequert::where('id',$id)->update(['request_state' => 1,'admin_action' =>$id_admin ]);

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

    public function store(Request $request,ExitPermissionRequert $exitPermissionRequert, Driver  $driver)
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

        $driver->driver_name=$request->driver_name;
        $driver->driver_id=$request->driver_id;
        $driver->driver_phone=$request->driver_phone;
        $driver->car_bord_number=$request->car_bord_number;
        $save=$driver->save();

        //$store=ExitPermissionRequert::create($request->all());

        if($save)
        {
            $exitPermissionRequert->driver_id=$driver->id;
            $exitPermissionRequert->patient_id=$request->patient_id;
            $exitPermissionRequert->state_details=$request->state_details;
            $exitPermissionRequert->home_address=$request->home_address;
            $exitPermissionRequert->hospital_name=$request->hospital_name;
            $exitPermissionRequert->date_time_request=$request->date_time_request;
            $exitPermissionRequert->request_state=$request->request_state;
            $saveDone=$exitPermissionRequert->save();

            if($saveDone)
            {
                return response()->json('doneAll',200);
            }
            else
            {
                return response()->json('ExitNot',200);
            }

        }
        else
        {
            return response()->json('DriverError',400);
        }

    }


    public function show($id,$state)
    {


        if($state==1 || $state==-1)
        {

            $permissionData_exit_admin=DB::table('exit_permission_requerts')->where('id', $id)->get();
            foreach ($permissionData_exit_admin as $value)
            {
                $admin_id=$value->admin_action;

                if($value->request_state==1)
                {
                    $houres_to_add = 5;
                    $time = new \DateTime( $value->updated_at);
                    $time->add(new \DateInterval('PT' . $houres_to_add . 'H'));
                    $stamp = $time->format('Y-m-d H:i');

                    if(date("Y-m-d H:i:s") >= $stamp)
                    {
                        $data['stamp']='off';
                    }
                    else
                    {
                        $data['stamp']='on';

                    }


                }
            }
            foreach (DB::table('admin_models')->where('id', $admin_id )->get() as $value)
            {
                $data['admin_name']=$value->firstname."  ".$value->lastname;
            }
        }

        $data['permissionData'] = DB::select(' SELECT
        drivers.driver_name,
        drivers.driver_id ,
        drivers.driver_phone ,
        drivers.car_bord_number ,
        exit_permission_requerts.state_details,
        exit_permission_requerts.home_address,
        exit_permission_requerts.hospital_name,
        exit_permission_requerts.created_at,
        exit_permission_requerts.request_state,
        exit_permission_requerts.id ,
        exit_permission_requerts.patient_id FROM exit_permission_requerts,drivers WHERE exit_permission_requerts.id='.$id.'  and  drivers.id=exit_permission_requerts.driver_id ');

        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        $data['AllUsers']=AdminModel::all();

        return view('admin.include.exitPermission',$data);

    }

}
