
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



        <main class="dash-content">

            <div class="row justify-content-center"  >
                <div class="col-md-12 col-lg-10"   >
                    <div class="col-md-12 wrap d-md-flex"  style="background-color: #fff" >

                        <div dir="ltr" class="col-md-12 table-responsive" >
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

                            @if($state_number==-1)

                                <p>المرفوضة</p>
                                <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                    <thead>
                                    <tr>
                                        <th >No.</th>
                                        <th >اسم المسعف</th>
                                        <th >وقت رفض المهمة</th>
                                        <th >سبب الرفض</th>
                                        <th >ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balags as $value)
                                        <td >{{$value->id}}</td>
                                        <td >{{$value->paramedic_id }}</td>
                                        <td >{{$value->time_deny_task}}</td>
                                        <td >{{$value->reasons_for_rejection}}</td>
                                        <td >{{$value->notes_reasons_for_rejection}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif

                            @if($state_number==1)

                                <p>المرفوضة</p>
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
                                        <td >{{$value->paramedic_id }}</td>
                                        <td >{{$value->time_accept_task}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif

                            @if($state_number==2)

                                <p>المرفوضة</p>
                                <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                    <thead>
                                    <tr>
                                        <th >No.</th>
                                        <th >اسم المسعف</th>
                                        <th >وقت قبول المهمة</th>
                                        <th >وقت وصول موقع الحالة</th>
                                        <th >الإسعافات</th>
                                        <th >اسم المستشفى</th>
                                        <th >تفاصيل اخرى</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balags as $value)
                                        <td >{{$value->id}}</td>
                                        <td >{{$value->paramedic_id }}</td>
                                        <td >{{$value->time_accept_task}}</td>
                                        <td >{{$value->time_access_location}}</td>
                                        <td >{{$value->relief_details}}</td>
                                        <td >{{$value->hospital_name}}</td>
                                        <td >{{$value->other_details}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif


                            @if($state_number==0)

                                <p>المرفوضة</p>
                                <table  dir="rtl"  style="text-align: center;" id="datatable" class="table table-hover table-fixed"  >
                                    <thead>
                                    <tr>
                                        <th >No.</th>
                                        <th >بلاغ بإسم</th>
                                        <th >نوع البلاغ</th>
                                        <th >وصف الموقع</th>
                                        <th >عدد الأشخاص</th>
                                        <th >رقم الهاتف</th>
                                        <th >وقت البلاغ</th>
                                        <th >تفاصيل اخرى</th>
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
        var data= {
            _token: '{{csrf_token()}}',
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Update
        var table= $('#datatable').DataTable();

        $('.edit').click(function (e)
        {
            var EditFunction = $(this).attr('rel1');

            $tr=$(this).closest('tr');
            if($($tr).hasClass('child'))
            {
                $tr=$tr.prev('.parent');
            }
            var oldData=table.row($tr).data();
            //console.log(oldData);

            $('#UserId').val(oldData[0]);
            $('#firstname').val(oldData[1]);
            $('#lastname').val(oldData[2]);
            $('#employeeId').val(oldData[3]);
            if(oldData[4]=="مدير نظام")
            {
                $('#userType').val(1);

            }
            else
            {
                $('#userType').val(2);

            }
            $('#email').val(oldData[5]);

            $('#editForm').attr('action',EditFunction);

            $('#editModal').modal('show');
        });



        //Delete
        $('.servideletebtn').click(function (e){
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            e.preventDefault();
            swal({
                title: "هل انت متأكد من حذف هذا المستخدم ؟",
                text: "بمجرد حذف هذا المستخدم لن يتمكن مجددا من دخوا النظام !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete)
                    {

                        $.ajax(
                            {

                                type: 'DELETE',
                                url: deleteFunction,
                                data: data,
                                success: function (response)
                                {
                                    swal(response.status, {
                                        icon: "success",
                                    })
                                        .then((result)=>{
                                            location.reload();
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
