<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\ExitPermissionRequestController;
use App\Models\ExitPermissionRequert;
use App\Models\Paramedics;
use Illuminate\Http\Request;
use  Illuminate\Routing\Controller;

//نقوم بتحميل المودل للعمل عل الجدول
use App\Models\AdminModel;




class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard()
    {

        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        return view('admin.include.dashboard',$data);
    }
    public function register()
    {

        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        return view('admin.include.registerAdd',$data);
    }


    public function registerUpdateAndDelete()
    {
        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        $data['AllUsers']=AdminModel::all();
        return view('admin.include.registerUpdateAndDelete',$data);
    }


    public function addParamedicsUi()
    {
        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        return view('admin.include.addParamedicsUi',$data);
    }
    public function allExitPermission()
    {
        $data['AllRequestBody']= ExitPermissionRequert::orderByRaw('created_at DESC')->get();
        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        return view('admin.include.allExitPermissions',$data);
    }
    public function balagsMain()
    {
        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        return view('admin.include.balagsMain',$data);
    }
    public function updateAndDeleteParamedics()
    {
        $data['LoggedInfo']=AdminModel::where('id','=',session('LoggedUser'))->first();
        $data['AllUsers']=Paramedics::all();
        return view('admin.include.paramedicsUpdateAndDelete',$data);
    }
}
