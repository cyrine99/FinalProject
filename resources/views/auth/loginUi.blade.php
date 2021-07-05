<!doctype html>
<html lang="en">
<head>
    <title>تسجيل الدخول</title>
   @include("Links.head")
</head>
<body>

<section class="ftco-section" dir="rtl">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10" >
                <div class="wrap d-md-flex" >
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <img src="{{URL::asset('images/download.png')}}" alt="الهلال الاحمر الليبي" />
                            <h2>جمعية الهلال الاحمر الليبي</h2>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">تسجيل الدخول</h3>
                            </div>

                        </div>
                        <form action="{{route('checkLogin')}}" method="post" class="signin-form">
                            @csrf

                            @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')}}
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <input name="employeeId" type="number" class="form-control" placeholder="الرقم الوظيفي للدخول" value="{{old('employeeId')}}">
                                <span class="text-danger">
                                    @error('employeeId')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-3">

                                <input name="password" type="password" class="form-control" placeholder="كلمة المرور" >
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">تسجيل الدخول</button>
                            </div>
                            <div class="form-group d-md-flex">



                                <div class="w-50 text-md-right">
                                    <a href="#">نسيت كلمة المرور</a>
                                    <br>
                                    <a href="#">استعادة اسم المستخدم</a>



                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>

