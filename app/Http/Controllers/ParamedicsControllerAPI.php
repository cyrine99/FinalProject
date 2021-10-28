<?php

namespace App\Http\Controllers;

use App\Models\Paramedics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
    
     public function update(Request $request)
    {
        $paramedic=Paramedics::find($request->id);

        $pass=$request->passwordOld;
        
        
        //نسيت كلمة المرور
           if ($request->state==0)
            {
                $update= Paramedics::where('id',$request->id)->update([
                    'password' =>Hash::make($request->passwordNew)
                ]);
                
                   if($update)
                    {
                        return response()->json($request,200);
                    }
                    else
                    {
                        return response()->json('لم يتم التعديل',400);
                    }
                    
                    return;
            }

           

        if (Hash::check($pass,$paramedic->password))
        {
            //Only Username
            if($request->state==1)
            {
                $update= Paramedics::where('id',$request->id)->update([
                    'username' =>$request->username,
                ]);

            }

            //Username && password
            if ($request->state==2)
            {
                $update= Paramedics::where('id',$request->id)->update([
                    'username' =>$request->username,
                    'password' =>Hash::make($request->passwordNew)
                ]);
            }

            if($update)
            {
                return response()->json($request,200);
            }
            else
            {
                return response()->json('لم يتم التعديل',400);
            }

        }
        else
        {
            return response()->json('الرمز السري القديم غير صحيح',400);
        }
    }


    public function balagsForParamedics($state,$id)
    {
        if($state==2)
        {
            $data= DB::select(' SELECT paramedic_balags.id ,paramedic_balags.created_at,paramedic_balags.updated_at,paramedics.firstname,paramedics.father_name ,paramedics.grand_name,paramedics.lastname,paramedic_balags.time_accept_task,paramedic_balags.time_access_location, paramedic_balags.relief_details,paramedic_balags.hospital_name,paramedic_balags.other_details FROM paramedic_balags,paramedics WHERE paramedic_balags.balag_state=2 and paramedic_balags.paramedic_id='.$id.' and  paramedics.id='.$id);
        }

        if($data)
        {
            return response()->json($data,200);
        }
        if(empty($data))
        {
            return response()->json('هناك خطأ او لا يوجد بيانات',400); 
        }
        else
        {
            return response()->json('هناك خطأ او لا يوجد بيانات',500);
        }

    }
    
    
        public function showDataForParamedic($phone)
    {
        $data =DB::table('paramedics')->where('phone', $phone)->get() ;
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
