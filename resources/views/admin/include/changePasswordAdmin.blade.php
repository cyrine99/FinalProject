<!doctype html>
<html lang="en">
<head>
    @include('Links.head')
    <title >بياناتك</title>
    {{--Git Hub Test--}}

    <script>
        $(document).ready(function(){
            $('.pass_show').append('<span class="ptxt">Show</span>');
        });


        $(document).on('click','.pass_show .ptxt', function(){

            $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

        });
    </script>
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
                                    <div class="container" style="text-align: right" >
{{--                                        <form action="{{route('checkLogin')}}" method="post" class="signin-form">--}}
{{--                                            @csrf--}}

{{--                                            @if(Session::get('fail'))--}}
{{--                                                <div class="alert alert-danger">--}}
{{--                                                    {{Session::get('fail')}}--}}
{{--                                                </div>--}}
{{--                                            @endif--}}

                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center">
                                                <h5 style="text-align: right">كلمة المرور الحالية</h5>
                                                <div class="form-group pass_show" style="text-align: right">
                                                    <input disabled id="current_pass" type="password" value="{{$PassUser}}" class="form-control"  placeholder="كلمة المرر الحالية">
                                                </div>
                                                <br>

                                                <h5 style="text-align: right" >كلمة المرور الجديدة</h5>
                                                <div class="form-group ">
                                                    <input  id="new_pass" type="password" class="form-control" placeholder="كلمة المرور الجديدة">
                                                    <span  id = "message" style="color:red;text-align: right"> </span>
                                                </div>
                                                <h5 style="text-align: right" >تأكيد كلمة المرور</h5>
                                                <div class="form-group ">
                                                    <input  type="password" id="last_pass" class="form-control" placeholder="تأكيد كلمة المرور">
                                                    <span  id = "message_confirm_pass" style="color:red;text-align: right"> </span>
                                                </div>

                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <button rel1="{{ url('/changePass/'.$LoggedInfo->id) }}"  class="form-control btn btn-primary submit px-3 change">تحديث كلمة المرور</button>
                                            </div>

{{--                                        </form>--}}
                                    </div>

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
<script>

    $(document).ready(function(){
        $('.pass_show').append('<span class="ptxt">عرض</span>');
    });


    $(document).on('click','.pass_show .ptxt', function(){

        $(this).text($(this).text() == "عرض" ? "إخفاء" : "عرض");

        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

    });
</script>


<script>
    $(document).ready(function(){
        var data= {
            _token: '{{csrf_token()}}',
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //change pass
        $('.change').click(function (e){

            var  new_pass=document.getElementById("new_pass").value;
            var  confirm_pass=document.getElementById("last_pass").value;

            if(new_pass == "") {
                document.getElementById("message").innerHTML = "قم بوضع كلمة مرور ! ";
                return false;
            }
            if(new_pass.length < 5) {
                document.getElementById("message").innerHTML = "كلمة المرور يجب أن تكون أكبر من 5 أحرف !";
                return false;
            }

            if(new_pass.length > 15) {
                document.getElementById("message").innerHTML = "كلمة المرور يجب أن لاتتجاوز 12 الحرف !";
                return false;
            }



            if(confirm_pass == "") {
                document.getElementById("message_confirm_pass").innerHTML = "قم بوضع كلمة مرور ! ";
                return false;
            }

            if(confirm_pass.length < 5) {
                document.getElementById("message_confirm_pass").innerHTML = "كلمة المرور يجب أن تكون أكبر من 5 أحرف !";
                return false;
            }
            if(confirm_pass.length > 15) {
                document.getElementById("message_confirm_pass").innerHTML = "كلمة المرور يجب أن لاتتجاوز 12 الحرف !";
                return false;
            }
            if(confirm_pass != new_pass)
            {
                document.getElementById("message_confirm_pass").innerHTML = "لا يتطابق مع كلمة المرور !";
                return false;
            }



            document.getElementById("message_confirm_pass").innerHTML = "";
            document.getElementById("message").innerHTML = "";


            var activeFunction = $(this).attr('rel1')+'/'+document.getElementById("last_pass").value;

            e.preventDefault();
            swal({
                title: " متأكد أنك تريد  تغيير كلمة المرور ؟",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete)
                    {

                        $.ajax(
                            {

                                type: 'GET',
                                url: activeFunction,
                                data: data,
                                success: function (response)
                                {
                                    swal(response.status, {
                                        icon: "success",
                                    })
                                        .then((result)=>{
                                            location.reload();
                                           // document.getElementById("current_pass").value = response.pass;
                                        });
                                },
                                error: function(xhr)
                                {
                                }
                            });
                    }

                });
        });
    });
</script>
</body>
</html>

