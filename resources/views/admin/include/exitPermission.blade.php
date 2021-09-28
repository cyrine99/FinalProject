<!doctype html>
<html lang="en">
<head>
    @include('Links.head')
    <title >طلب تصرح</title>

</head>
<body>
<div class="dash">

    @include('admin.layouts.sideMenu')

    <div class="dash-app">
        @include('admin.layouts.header')
        <main dir="rtl" class="dash-content">


            <div class="row justify-content-center" >
                <div class="col-md-12 col-lg-10"  >
                    <div class="wrap d-md-flex"  >
                        <div class="login-wrap p-4 p-lg-5" >
                            <div class="d-flex">
                                <div style="text-align: center" class="w-100">

{{--                                    <h3 style="text-align: center;background-color: #dae9fa" class="mb-4">طلب تصريح</h3>--}}

                                    @csrf
                                    @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            <script>
                                                alert('تم قبول الطلب ');
                                            </script>
                                            {{Session::get('success')}}
                                        </div>

                                    @endif


                                            @if(Session::get('success'))
                                                <div class="alert alert-success">
                                                    {{Session::get('success')}}
                                                </div>
                                            @endif

                                            @if(Session::get('fail'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('fail')}}
                                                </div>
                                            @endif

                                            <h2 style="background-color: #dafadd"  >تفاصيل الحالة</h2>
                                            <h3> {{$permissionData->state_details}}</h3>
                                                <br>
                                                <br>
                                            <h2 style="background-color: #dafadd" >الاسم بالكامل</h2>
                                            <h3> {{$permissionData->driver_name}}</h3>
                                                <br>
                                                <br>

                                                <h2 style="background-color: #dafadd" >رقم الهوية</h2>
                                            <h3> {{$permissionData->driver_id}}</h3>
                                                <br>
                                                <br>

                                                <h2 style="background-color: #dafadd" >رقم الهاتف</h2>
                                            <h3> {{$permissionData->driver_phone}}</h3>
                                                <br>
                                                <br>

                                                <h2 style="background-color: #dafadd">رقم لوحة السيارة</h2>
                                            <h3> {{$permissionData->car_bord_number}}</h3>

                                                <br>
                                                <br>

                                                <h2 style="background-color: #dafadd" >عنوان المنزل</h2>
                                            <h3> {{$permissionData->home_address}}</h3>
                                                <br>
                                                <br>

                                                <h2 style="background-color: #dafadd" >المستشفى</h2>
                                            <h3> {{$permissionData->hospital_name}}</h3>
                                                <br>
                                                <br>

                                                <h2 style="background-color: #dafadd" >وقت طلب التصريح</h2>
                                            <h3> {{$permissionData->date_time_request}}</h3>
                                                <br>
                                                <br>

                                                <br>
                                                <br>

                                                @if($permissionData->request_state ==0)

                                                        <a href="{{ url('/OkRequest/'.$permissionData->id.'/'.$permissionData->patient_id ) }}"  class="btn btn-success"><i style="margin: 10px" class="fas fa-check-circle"></i>قبول</a>
                                                        <a href="{{ url('/CancelRequest/'.$permissionData->id.'/'.$permissionData->patient_id ) }}" class="btn btn-danger"><i style="margin: 10px" class="fas fa-frown"></i>رفض</a>

                                                @else
                                                        <h1  style="text-align: center;color: #adb5bd">تم الرد على هذا التصريح من قبل</h1>
                                                        <br>
                                                        <br>
                                                @endif



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>



    </div>

</div>
@include('Links.body_js')



</body>
</html>

