
<!doctype html>
<html lang="en">

<head>
  @include('Links.head')
    <title>المستخدمون</title>
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



        <main class="dash-content" style="background-color: rgb(255,255,255)">

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
                                    <th >الاسم</th>
                                    <th >اللقب</th>
                                    <th >الرقم الوظيفي </th>
                                    <th >نوع المستخدم</th>
                                    <th >البريد الالكتروني</th>
                                    <th  >العملية</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($AllUsers as $value)

                                    @if($LoggedInfo->id==$value->id)

                                    @else

                                    @if($value->admin_state==0)
                                        <tr style="background-color: rgba(173,181,189,0.36)">
                                    @else
                                    <tr>
                                    @endif
                                        <td >{{ $value->id }}</td>
                                        <td >{{ $value->firstname }}</td>
                                        <td >{{ $value->lastname }}</td>
                                        <td >{{ $value->employeeId }}</td>
                                        @if($value->userType==1)
                                            <td >مدير نظام</td>
                                        @else
                                            <td >مستخدم نظام</td>
                                        @endif
                                        <td >{{ $value->email }}</td>
                                        <td >
                                                <a href="#" rel="{{ $value->id }}" rel1="{{ route('admins.update',$value->id) }}"  class="btn edit" style="color: #17a2b8" ><i class="fas fa-user-edit"></i></a>

                                            @if($value->admin_state==0)
                                                <a rel="{{ $value->id }}" rel1="{{ url('/active/'.$value->id) }}" class="btn active" style="color: rgba(128,236,61,0.53)"> <i class="fas fa-check-circle"></i> </a>
                                            @endif

                                            @if($value->admin_state==1)
                                                <a rel="{{ $value->id }}" rel1="{{ route('admins.destroy',$value->id) }}" class="btn deactivate" style="color: #dc3545"> <i class="fas fa-times-circle"></i></a>
                                            @endif

                                        </td>
                                    </tr>

                                @endif


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


<div dir="rtl" class="modal bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 style="margin: auto" class="modal-title">تعديل بيانات المستخدم</h3>

            </div>
            <div class="modal-body">
                <form  action="" method="post" class="col-md-12 signin-form" id="editForm">

                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group mb-3">
                        <input id="UserId" name="UserId" hidden >
                        <input required id="firstname" name="firstname" type="text" class="form-control" placeholder="اسم المستخدم"  value="{{old('firstname')}}">
                        <span class="text-danger">
                                    @error('firstname')
                            {{$message}}
                            @enderror
                                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <input required id="lastname" name="lastname" type="text" class="form-control" placeholder="لقب المستخدم" value="{{old('lastname')}}" >
                        <span class="text-danger">
                                    @error('lastname')
                            {{$message}}
                            @enderror
                                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <input  required type="text" pattern="\d*" minlength="7"  id="employeeId" name="employeeId"  placeholder="الرقم الوظيفي" class="form-control"  value="{{old('employeeId')}}" >
                        <span class="text-danger">
                                           @error('employeeId')
                            {{$message}}
                            @enderror
                                        </span>
                    </div>


                    <div class="form-group mb-3">
                        <input required id="email" name="email" type="email" class="form-control" placeholder="البريد الالكتروني"  value="{{old('email')}}">
                        <span class="text-danger">
                                           @error('email')
                            {{$message}}
                            @enderror
                                        </span>
                    </div>



                    <div class="form-group mb-3">

                        <select required id="userType" name="userType" class="form-control" aria-label="Default select example" value="{{old('userType')}}">
                            <option value="" style="color:#c1c1c1" selected>نوع المستخدم</option>
                            <option value="1">مدير نطام</option>
                            <option value="2">مستخدم نطام</option>
                        </select>
                        <span class="text-danger">
                                            @error('userType')
                            {{$message}}
                            @enderror
                                        </span>
                    </div>




                    <div class="form-group">
                        <button id="doEdit" type="submit" class="form-control btn btn-primary submit px-3">تعديل</button>
                    </div>
                    <div class="form-group d-md-flex">



                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



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



        //Deactivate
        $('.deactivate').click(function (e){
            var deleteFunction = $(this).attr('rel1');
            e.preventDefault();
            swal({
                title: " متأكد أنك تريد إلغاء تفعيل هذا المستخدم ؟",
                text: "بمجرد إلغاء تفعيل هذا المستخدم لن يتمكن مجددا من دخول النظام",
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


        //activate
        $('.active').click(function (e){

            var activeFunction = $(this).attr('rel1');;

            e.preventDefault();
            swal({
                title: " متأكد أنك تريد  تفعيل هذا المستخدم ؟",
                text: "بمجرد  تفعيل هذا المستخدم سيتمكن مجددا من دخول النظام",
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
