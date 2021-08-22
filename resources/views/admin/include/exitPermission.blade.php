<!doctype html>
<html lang="en">
<head>
    @include('Links.head')
    <title >طلب تصرح</title>
{{--Git Hub Test--}}

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
                                <div  dir="rtl" class="w-100">



                                    <h3 style="font-family: BaseFont" class="mb-4">طلب تصريح</h3>
                                    @csrf
                                    @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            <script>
                                                alert('تم قبول الطلب ');
                                            </script>
                                            {{Session::get('success')}}
                                        </div>
                                    @endif


                                    @if($permissionData->request_state !=0)
                                        <h1>تم الرد على هذا التصريح من قبل</h1>
                                     @endif
                                    @if($permissionData->request_state ==0)


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
                                            <h1 >تفاصيل الحالة</h1>
                                            <h3> {{$permissionData->state_details}}</h3>
                                            <h1 >الاسم بالكامل</h1>
                                            <h3> {{$permissionData->driver_name}}</h3>
                                            <h1 >رقم الهوية</h1>
                                            <h3> {{$permissionData->driver_id}}</h3>
                                            <h1 >رقم الهاتف</h1>
                                            <h3> {{$permissionData->driver_phone}}</h3>
                                            <h1 >رقم لوحة السيارة</h1>
                                            <h3> {{$permissionData->car_bord_number}}</h3>
                                            <h1 >عنوان المنزل</h1>
                                            <h3> {{$permissionData->home_address}}</h3>
                                            <h1 >المستشفى</h1>
                                            <h3> {{$permissionData->hospital_name}}</h3>
                                            <h1 >وقت طلب التصريح</h1>
                                            <h3> {{$permissionData->date_time_request}}</h3>

                                        <a href="{{ url('/OkRequest/'.$permissionData->id.'/'.$permissionData->patient_id ) }}"  class="btn btn-success"><i style="margin: 10px" class="fas fa-check-circle"></i>قبول</a>

                                        <a href="{{ url('/CancelRequest/'.$permissionData->id.'/'.$permissionData->patient_id ) }}" class="btn btn-danger"><i style="margin: 10px" class="fas fa-frown"></i>رفض
                                        </a>



                                            <div class="form-group d-md-flex">

                                            </div>




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

