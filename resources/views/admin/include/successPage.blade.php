<!doctype html>
<html lang="en">
<head>
    @include('Links.head')
    <title >تمت العملية بنجاح</title>

        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
         <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style type="text/css">

        .payment
        {
            border:1px solid #1c1616;
            height:280px;
            border-radius:20px;
            background:#fff;
        }
        .payment_header
        {
            background: #abd0bc;
            padding:20px;
            border-radius:20px 20px 0px 0px;

        }

        .check
        {
            margin:0px auto;
            width:50px;
            height:50px;
            border-radius:100%;
            background:#fff;
            text-align:center;
        }

        .check i
        {
            vertical-align:middle;
            line-height:50px;
            font-size:30px;
        }

        .content
        {
            text-align:center;
        }

        .content  h1
        {
            font-size:25px;
            padding-top:25px;
        }

        .content a
        {
            width:200px;
            height:35px;
            color:#fff;
            border-radius:30px;
            padding:5px 10px;
            background:#abd0bc;
            transition:all ease-in-out 0.3s;
        }

        .content a:hover
        {
            text-decoration:none;
            background:#000;
        }

    </style>
{{--Git Hub Test--}}
</head>
<body>
<div class="dash">

    @include('admin.layouts.sideMenu')

    <div class="dash-app">
        @include('admin.layouts.header')
        <main class="dash-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto mt-5">
                        <div class="payment">
                            <div class="payment_header">
                                <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                            </div>
                            <div dir="rtl" class="content">
                                <h1>تم الرد على الطلب بنجاح !</h1>
                                <p>لقد قمت بقبول هذا الطلب , يمكن للمستخدم الان التجوال بهذا التصريح لمدة 5 ساعات فقط </p>
                                <a href="{{route('dashboard')}}">العودة للرئسية</a>
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

