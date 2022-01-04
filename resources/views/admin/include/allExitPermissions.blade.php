
<!doctype html>
<html lang="en">

<head>
    @include('Links.head')
    <title>التصاريح</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">--}}



    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: none;
            color: black!important;
            border-radius: 4px;
            border: 1px solid #828282;
            cursor:pointer;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background: none;
            color: black!important;
        }
    </style>
</head>

<body>
@include('sweetalert::alert')
<div class="dash">


    @include('admin.layouts.sideMenu')

    <div class="dash-app">

        @include('admin.layouts.header')



        <main class="dash-content"  style="background-color: rgb(255,255,255)">

 <h1 style="text-align: center;">التصاريح</h1>
{{--            <div class="row justify-content-center"  >--}}
{{--                <div class="col-md-12 col-lg-10"   >--}}
{{--                    <div class="col-md-12 wrap d-md-flex"  style="background-color: #fff" >--}}

{{--                        <div dir="ltr" class="col-md-12 table-responsive" >--}}
                            <br>
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
                            <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                <thead>
                                <tr>
                                    <th >No.</th>
                                    <th >الحالة</th>
                                    <th >عنوان المنزل</th>
                                    <th >اسم المستشفى</th>
                                    <th >وقت طلب التصريح</th>
                                    <th >عرض</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($AllRequestBody as $value)
                                    @if($value->request_state==1)
                                        <tr style="background-color: rgba(114,255,151,0.25)">
                                    @endif
                                    @if($value->request_state==0)
                                        <tr style="background-color: rgba(255,211,126,0.25)">
                                    @endif
                                    @if($value->request_state==-1)
                                        <tr style="background-color: rgba(250,123,123,0.25)">
                                    @endif
                                            <td >{{$value->id}}</td>
                                            <td >{{$value->state_details}}</td>
                                            <td >{{$value->home_address}}</td>
                                            <td >{{$value->hospital_name}}</td>
                                            <td >{{$value->created_at}}</td>
                                        <td >
                                            <a href="{{url('/exitPermissionShow/'.$value->id.'/'.$value->request_state)}}" class="btn btn-info">التفاصيل</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        </main>
    </div>
</div>













@include('Links.body_js')


<script>
    $(document).ready(function(){
        var table= $('#datatable').DataTable();
    });
</script>


</body>

</html>
