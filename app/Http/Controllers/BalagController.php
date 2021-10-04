<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\Balag;
use App\Models\Paramedics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalagController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

        $request->validate([
            'id_patient'=>'required',
            'location_latitude'=>'required',
            'location_longitude'=>'required',
            'phone'=>'required',
            'for_you'=>'required',
            'balag_type'=>'required',
            'location_description'=>'required',
            'number_of_persons'=>'required',
            'balag_state'=>'required',
            'name'=>'required',
            'age'=>'required',
            'notes'=>'required',
            'gender'=>'required'

        ]);

        $store=Balag::create($request->all());

        if($store) {

              $balagNoty = DB::table('login_paramedics')->get();

            foreach($balagNoty as $key => $value)
            {
                  $this->sendNoty($value->token,'هل أنت جاهز ؟!','أحد المستخدمين قام بطلب المساعدة , شاهد قائمة البلاغات ربما يكون المستخدم قريب منك !');
            }

            return response()->json($store,200);


        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function showForUser($id,$state)
    {
        $data =DB::table('balags')->where('id_patient', $id)->where('balag_state',$state)->orderByRaw('created_at DESC')->get() ;
        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }
    }


    public function showAll($state)
    {
        $data =DB::table('balags')->where('balag_state',$state)->orderByRaw('created_at DESC')->get() ;
        if($data) {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
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

    public function cancelBalag($id_Balag,$id_patient,$state)
    {
        if($state==0)
        {
         $data =DB::table('balags')->
         where('id', $id_Balag)->
         where('id_patient', $id_patient)->
         where('balag_state',$state)->
        delete() ;

        if($data)
        {
            return response()->json($data,200);
        }
        else
        {
            return response()->json('Error',400);
        }

        }

    }

    public function balags($state)
    {


        $data['state_number']=$state;

        if($state==0)
        {
            $data['balags']=DB::table('balags')->where('balag_state',$state)->get();
        }

        if($state==1)
        {
            $data['balags'] = DB::select(' SELECT paramedic_balags.id ,  paramedics.firstname,paramedics.father_name ,paramedics.grand_name,paramedics.lastname,paramedic_balags.time_accept_task FROM paramedic_balags,paramedics WHERE paramedic_balags.balag_state=1 and paramedic_balags.paramedic_id=paramedics.id');
        }
        if($state==2)
        {
            $data['balags'] = DB::select(' SELECT paramedic_balags.id , paramedics.firstname,paramedics.father_name ,paramedics.grand_name,paramedics.lastname,paramedic_balags.time_accept_task,paramedic_balags.time_access_location, paramedic_balags.relief_details,paramedic_balags.hospital_name,paramedic_balags.other_details FROM paramedic_balags,paramedics WHERE paramedic_balags.balag_state=2 and paramedic_balags.paramedic_id=paramedics.id');
        }
        if($state==-1)
        {
            $data['balags'] = DB::select(' SELECT paramedic_balags.id , paramedics.firstname,paramedics.father_name ,paramedics.grand_name,paramedics.lastname,paramedic_balags.time_deny_task,paramedic_balags.reasons_for_rejection, paramedic_balags.notes_reasons_for_rejection FROM paramedic_balags,paramedics WHERE paramedic_balags.balag_state=-1 and paramedic_balags.paramedic_id=paramedics.id');
        }
        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        return view('admin.include.balags',$data);
    }


}
