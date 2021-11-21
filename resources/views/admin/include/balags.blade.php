
<!doctype html>
<html lang="en">

<head>
    @include('Links.head')
    <title>بلاغات</title>
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


			   @if($state_number==1)
                               <h1 style="text-align: center;">البلاغات النشطة</h1>
                            @endif


  			   @if($state_number==2)
                               <h1 style="text-align: center;">البلاغات المغلقة</h1>
                            @endif


  			   @if($state_number==0)
                               <h1 style="text-align: center;">البلاغات المعلقة</h1>
                            @endif

                            @if($state_number==1)

<br><br>
                                <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                    <thead>
                                    <tr>
                                        <th >No.</th>
                                        <th >اسم المسعف</th>
                                        <th >وقت قبول المهمة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balags as $value)
                                        <td >{{$value->id}}</td>
                                        <td >{{$value->firstname}}  {{$value->father_name}}   {{$value->grand_name}}  {{$value->lastname}} </td>
                                        <td >{{$value->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif

                            @if($state_number==2)

                                <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                    <thead>
                                    <tr>
                                        <th >No.</th>
                                        <th >اسم المسعف</th>
                                        <th >وقت قبول المهمة</th>
                                        <th >وقت وصول موقع الحالة</th>
                                        <th >وقت إغلاق المهمة</th>
                                        <th >الإسعافات</th>
                                        <th >اسم المستشفى</th>
                                        <th >تفاصيل أخرى</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balags as $value)
                                        <td >{{$value->id}}</td>
                                        <td >{{$value->firstname}}  {{$value->father_name}}   {{$value->grand_name}}  {{$value->lastname}} </td>
                                        <td >{{$value->created_at}}</td>
                                        <td >{{$value->time_access_location}}</td>
                                        <td >{{$value->updated_at}}</td>
                                        <td >{{$value->relief_details}}</td>
                                        <td >{{$value->hospital_name}}</td>
                                        <td >{{$value->other_details}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif


                            @if($state_number==0)

                                <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                    <thead>
                                    <tr>
                                        <th >No.</th>
                                        <th >بلاغ باسم</th>
                                        <th >نوع البلاغ</th>
                                        <th >وصف الموقع</th>
                                        <th >عدد الأشخاص</th>
                                        <th >رقم الهاتف</th>
                                        <th >وقت طلب البلاغ</th>
                                        <th >تفاصيل أخرى</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balags as $value)
                                        <td >{{$value->id}}</td>
                                        <td >{{$value->name }}</td>
                                        <td >{{$value->balag_type}}</td>
                                        <td >{{$value->location_description}}</td>
                                        <td >{{$value->number_of_persons}}</td>
                                        <td >{{$value->phone}}</td>
                                        <td >{{$value->created_at}}</td>
                                        <td >{{$value->notes}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif

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
