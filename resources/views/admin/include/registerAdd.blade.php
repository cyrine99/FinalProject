<!doctype html>
<html lang="en">
<head>
@include('Links.head')
    <title >إضافة مستخدم جديد</title>
</head>
<body>
<div class="dash">

@include('admin.layouts.sideMenu')

<div class="dash-app">
    @include('admin.layouts.header')
    <main class="dash-content">

                <div class="row justify-content-center" >
                    <div class="col-md-12 col-lg-10"  >
                        <div class="wrap d-md-flex"  >
                            <div class="login-wrap p-4 p-lg-5" >
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">إضافة مستخدم جديد</h3>
                                    </div>
                                </div>
                                <form  action="{{route('admins.store')}}" method="post" class="col-md-12 signin-form">

                                    @csrf

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


                                    <div class="form-group mb-3">
                                        <input name="firstname" type="text" class="form-control" placeholder="اسم المستخدم"  value="{{old('firstname')}}">
                                        <span class="text-danger">
                                    @error('firstname')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input name="lastname" type="text" class="form-control" placeholder="لقب المستخدم" value="{{old('lastname')}}" >
                                        <span class="text-danger">
                                    @error('lastname')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input name="employeeId" type="number" class="form-control" placeholder="الرقم الوظيفي" value="{{old('employeeId')}}" >
                                        <span class="text-danger">
                                           @error('employeeId')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="form-group mb-3">
                                        <input name="email" type="email" class="form-control" placeholder="البريد الالكتروني"  value="{{old('email')}}">
                                        <span class="text-danger">
                                           @error('email')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>



                                    <div class="form-group mb-3">

                                        <select name="userType" class="form-control" aria-label="Default select example" >
                                            <option value="{{old('userType')}}" style="color:#c1c1c1" selected>نوع المستخدم</option>
                                            <option value="1">مدير نظام</option>
                                            <option value="2">مستخدم نظام</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('userType')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>



                                    <div class="form-group mb-3">

                                        <input name="password" type="password" class="form-control" placeholder="كلمة المرور"  >
                                        <span class="text-danger">
                                    @error('password')
                                            {{$message}}
                                            @enderror
                                </span>
                                    </div>
                                    <div class="form-group mb-3">

                                        <input name="passwordConfig" type="password" class="form-control" placeholder="تأكيد كلمة المرور" >
                                        <span class="text-danger">
                                    @error('passwordConfig')
                                            {{$message}}
                                            @enderror
                                </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary submit px-3">تسجيل    </button>
                                    </div>
                                    <div class="form-group d-md-flex">



                                    </div>
                                </form>
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

