<!doctype html>
<html lang="en">
<head>
    @include('Links.head')
    <title >البلاغات</title>
{{--Git Hub Test--}}

    <style>
        a{
            cursor:pointer;
        }

        .my-card
        {
            position:absolute;
            left:40%;
            top:-20px;
            border-radius:50%;
        }
    </style>
</head>
<body>
<div class="dash">

    @include('admin.layouts.sideMenu')

    <div class="dash-app">
        @include('admin.layouts.header')

        <div class="jumbotron" style="background-color:#f8f9fd">
            <div class="row w-100">
                <div class="col-md-3">
                    <a href="{{url('balags/2')}}" class="card border-info mx-sm-1 p-3">
                        <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                        <div class="text-info text-center mt-3"><h4>بلاغات</h4></div>
                        <div class="text-info text-center mt-2"><h1>مغلقة</h1></div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('balags/1')}}" class="card border-success mx-sm-1 p-3">
                        <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-car" aria-hidden="true"></span></div>
                        <div class="text-success text-center mt-3"><h4>بلاغات</h4></div>
                        <div class="text-success text-center mt-2"><h1>نشطة</h1></div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('balags/-1')}}" class="card border-danger mx-sm-1 p-3">
                        <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-frown" aria-hidden="true"></span></div>
                        <div class="text-danger text-center mt-3"><h4>بلاغات</h4></div>
                        <div class="text-danger text-center mt-2"><h1>مرفوضة</h1></div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('balags/0')}}" class="card border-warning mx-sm-1 p-3">
                        <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-eye" aria-hidden="true"></span></div>
                        <div class="text-warning text-center mt-3"><h4>بلاغات</h4></div>
                        <div class="text-warning text-center mt-2"><h1>معلقة</h1></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@include('Links.body_js')

</body>
</html>

