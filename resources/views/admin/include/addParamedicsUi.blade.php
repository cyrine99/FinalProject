<!doctype html>
<html lang="en">
<head>
    @include('Links.head')
    <title >تسجيل مسعف جديد</title>
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
                                    <h3 class="mb-4">تسجيل مسعف جديد</h3>
                                </div>
                            </div>
                            <form  action="{{route('paramedics.store')}}" method="post" class="col-md-12 signin-form">

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


                                <div class="row">

                                    <div class="col-md-3 form-group mb-3">
                                        <input required name="firstname" type="text" class="form-control" placeholder="اسم المسعف"  value="{{old('firstname')}}">
                                        <span class="text-danger">
                                    @error('firstname')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-3 form-group mb-3">
                                        <input required name="father_name" type="text" class="form-control" placeholder="اسم الأب" value="{{old('father_name')}}" >
                                        <span class="text-danger">
                                    @error('father_name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-3 form-group mb-3">
                                        <input required name="grand_name" type="text" class="form-control" placeholder="اسم الجد" value="{{old('grand_name')}}" >
                                        <span class="text-danger">
                                    @error('grand_name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-3 form-group mb-3">
                                        <input required name="lastname" type="text" class="form-control" placeholder="اللقب" value="{{old('lastname')}}" >
                                        <span class="text-danger">
                                    @error('lastname')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <input required name="phone" type="number" class="form-control" placeholder=" رقم الهاتف" value="{{old('phone')}}" >
                                        <span class="text-danger">
                                           @error('phone')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-12 form-group mb-3">
                                        <input required name="email" type="email" class="form-control" placeholder="البريد الالكتروني"  value="{{old('email')}}">
                                        <span class="text-danger">
                                           @error('email')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>






                           <fieldset class="form-group mb-3">
                               <legend  style="text-align: right;margin-right: 30px">تاريخ الميلاد</legend>
                               <div class="row">

                                    <div class="col-md-4 form-group mb-3">
                                        <select required name="BD_Day" class="form-control" aria-label="Default select example"
                                                {{--هذه لعمل سكرول للقائمة--}}
                                                onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>

                                            {{--طريقة التعبائة هنا غير صحيحة !!!!!!!!!! لكن سيتم تصحيحها ان شاء الله .. هنا فقط للتجربة--}}
                                            <option value="{{old('BD_Day')}}" style="color:#c1c1c1" selected>إختر اليوم</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('BD_Day')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-4 form-group mb-3">
                                        <select required name="BD_Month" class="form-control" aria-label="Default select example"
                                                onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' >

                                            {{--طريقة التعبائة هنا غير صحيحة !!!!!!!!!! لكن سيتم تصحيحها ان شاء الله .. هنا فقط للتجربة--}}
                                                 <option value="{{old('BD_Month')}}" style="color:#c1c1c1" selected>إختر الشهر</option>
                                                <option value="1">يناير</option>
                                                <option value="2">فبراير</option>
                                                <option value="3">مارس</option>
                                                <option value="4">إبريل</option>
                                                <option value="5">مايو</option>
                                                <option value="6">بونبو</option>
                                                <option value="7">يوليو</option>
                                                <option value="8">أغسطس</option>
                                                <option value="9">سبتمبر</option>
                                                <option value="10">أكتوبر</option>
                                                <option value="11">نوفمبر</option>
                                                <option value="12">ديسمبر</option>
                                        </select>

                                        <span class="text-danger">
                                            @error('BD_Month')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-4 form-group mb-3">
                                        <select required name="BD_Year" class="form-control" aria-label="Default select example"
                                                onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>

                                            {{--طريقة التعبائة هنا غير صحيحة !!!!!!!!!! لكن سيتم تصحيحها ان شاء الله .. هنا فقط للتجربة--}}
                                            <option value="{{old('BD_Year')}}" style="color:#c1c1c1" selected>إختر السنة</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('BD_Year')
                                            {{$message}}
                                            @enderror
                                        </span>


                                    </div>
                                   </div>
                                </fieldset>

                           <fieldset class="form-group mb-3">
                               <legend  style="text-align: right;margin-right: 30px">العنوان</legend>
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <select required name="city" class="form-control" aria-label="Default select example" >
                                                <option value="{{old('city')}}" style="color:#c1c1c1" selected>إختر المدينة</option>
                                                <option value="1">طرابلس</option>
                                            </select>
                                            <span class="text-danger">
                                            @error('city')
                                                {{$message}}
                                                @enderror
                                        </span>
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <select required name="area" class="form-control" aria-label="Default select example" >
                                                {{--طريقة التعبئة غير صحيحة !!! سيتم ان شاء الله تصحيحها و يتم جلبها من DB--}}
                                                <option value="{{old('area')}}" style="color:#c1c1c1" selected>إختر المنطقة</option>

                                                <option value="1">حي الأندلس</option>
                                                <option value="2">تاجوراء</option>
                                                <option value="3">خلة الفرجان</option>
                                                <option value="4">سيدي سليم</option>
                                                <option value="5"> الكريمية</option>
                                                <option value="6">صلاح الدين</option>
                                                <option value="7">سوق الجمعة</option>
                                            </select>
                                            <span class="text-danger">
                                            @error('area')
                                                {{$message}}
                                                @enderror
                                        </span>
                                        </div>

                                    </div>
                                </fieldset>

                                <div class="form-group mb-3">

                                    <input required name="IDnumber" type="number" class="form-control" placeholder="الرقم الوطني "  value="{{old('IDnumber')}}" >
                                    <span class="text-danger">
                                    @error('IDnumber')
                                        {{$message}}
                                        @enderror
                                </span>
                                </div>



                                <fieldset class="form-group">
                                    <legend  style="text-align: right;margin-right: 30px">بيانات الدخول</legend>
                                     <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <input required name="username" type="text" class="form-control" placeholder="اسم المستخدم"  value="{{old('username')}}">
                                            <span class="text-danger">
                                        @error('username')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6 form-group mb-3">
                                            <input required name="password" type="password" class="form-control" placeholder="كلمة المرور"  >
                                            <span class="text-danger">
                                    @error('password')
                                                {{$message}}
                                                @enderror
                                </span>
                                        </div>


                                        <div class="col-md-6 form-group mb-3">

                                            <input required name="passwordConfig" type="password" class="form-control" placeholder="تأكيد كلمة المرور" >
                                            <span class="text-danger">
                                    @error('passwordConfig')
                                                {{$message}}
                                                @enderror
                                </span>
                                        </div>
                                    </div>
                                </fieldset>





                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">تسجيل</button>
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

