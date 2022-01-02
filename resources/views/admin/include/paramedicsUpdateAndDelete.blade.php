
<!doctype html>
<html lang="en">

<head>
  @include('Links.head')
    <title>المسعفون</title>
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
                                    <th >الأب</th>
                                    <th >الجد</th>
                                    <th >اللقب</th>
                                    <th >الهاتف</th>
                                    <th >البريد</th>
                                    <th  >تاريخ الميلاد</th>
                                    <th  >الرقم الوطني</th>
                                    <th  >العملية</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($AllUsers as $value)

                                    @if($value->paramedic_state==0)
                                        <tr style="background-color: rgba(173,181,189,0.36)">
                                    @else
                                    <tr>
                                    @endif
                                        <td >{{ $value->id }}</td>
                                        <td >{{ $value->firstname }}</td>
                                        <td >{{ $value->father_name }}</td>
                                        <td >{{ $value->grand_name }}</td>
                                        <td >{{ $value->lastname }}</td>
                                        <td >{{ $value->phone }}</td>
                                        <td >{{ $value->email }}</td>
                                        <td >{{ $value->birth_date }}</td>
                                        <td >{{ $value->IDnumber }}</td>

                                        <td >
                                            <a href="#" rel="{{ $value->id }}" rel1="{{ route('paramedics.update',$value->id) }}"  class="btn edit" style="color: #17a2b8" ><i class="fas fa-user-edit"></i></a>

                                            @if($value->paramedic_state==0)
                                                <a rel="{{ $value->id }}" rel1="{{ url('/activeParamedic/'.$value->id) }}" class="btn active" style="color: rgba(128,236,61,0.53)"> <i class="fas fa-check-circle"></i> </a>
                                            @endif

                                            @if($value->paramedic_state==1)
                                                <a rel="{{ $value->id }}" rel1="{{ route('paramedics.destroy',$value->id) }}" class="btn deactivate" style="color: #dc3545"> <i class="fas fa-times-circle"></i></a>
                                            @endif

                                        </td>
                                    </tr>



                                @endforeach

                                </tbody>
                            </table>
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
                <h3 style="margin: auto" class="modal-title">تعديل بيانات المسعف</h3>

            </div>
            <div class="modal-body">
                <form action="" method="post" class="col-md-12 signin-form" id="editForm">

                    @csrf
                    {{method_field('PUT')}}


                    <div class="row">

                        <div class="col-md-3 form-group mb-3">
                            <input id="UserId" name="UserId" hidden >
                            <input required name="firstname" id="firstname" type="text" class="form-control" placeholder="اسم المسعف"  value="{{old('firstname')}}">
                            <span class="text-danger">
                                    @error('firstname')
                                {{$message}}
                                @enderror
                                        </span>
                        </div>

                        <div class="col-md-3 form-group mb-3">
                            <input required name="father_name" id="father_name" type="text" class="form-control" placeholder="اسم الأب" value="{{old('father_name')}}" >
                            <span class="text-danger">
                                    @error('father_name')
                                {{$message}}
                                @enderror
                                        </span>
                        </div>

                        <div class="col-md-3 form-group mb-3">
                            <input required name="grand_name" id="grand_name" type="text" class="form-control" placeholder="اسم الجد" value="{{old('grand_name')}}" >
                            <span class="text-danger">
                                    @error('grand_name')
                                {{$message}}
                                @enderror
                                        </span>
                        </div>

                        <div class="col-md-3 form-group mb-3">
                            <input required name="lastname" id="lastname" type="text" class="form-control" placeholder="اللقب" value="{{old('lastname')}}" >
                            <span class="text-danger">
                                    @error('lastname')
                                {{$message}}
                                @enderror
                                        </span>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-12 form-group mb-3">
                            <input required name="phone"  id="phone" type="number" class="form-control" placeholder=" رقم الهاتف" value="{{old('phone')}}" >
                            <span class="text-danger">
                                           @error('phone')
                                {{$message}}
                                @enderror
                                        </span>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <input required name="email" id="email" type="email" class="form-control" placeholder="البريد الالكتروني"  value="{{old('email')}}">
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
                            <input required type="date" id="birth_date" name="birth_date" class="form-control"
                                   min="1970-1-1"  max="2003-01-01">
                        </div>
                    </fieldset>

                    <div class="form-group mb-3">

                        <input required name="IDnumber" id="IDnumber" type="number" class="form-control" placeholder="الرقم الوطني "  value="{{old('IDnumber')}}" >
                        <span class="text-danger">
                                    @error('IDnumber')
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
            $('#father_name').val(oldData[2]);
            $('#grand_name').val(oldData[3]);
            $('#lastname').val(oldData[4]);
            $('#phone').val(oldData[5]);
            $('#email').val(oldData[6]);
            $('#birth_date').val(oldData[7]);
            $('#IDnumber').val(oldData[8]);



            $('#editForm').attr('action',EditFunction);
            $('#editModal').modal('show');
        });



        //Deactivate
        $('.deactivate').click(function (e){
            var deleteFunction = $(this).attr('rel1');
            e.preventDefault();
            swal({
                title: " متأكد أنك تريد إلغاء تفعيل هذا المسعف ؟",
                text: "بمجرد إلغاء تفعيل هذا المسعف لن يتمكن مجددا من دخول تطبيق المستجيب",
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
                title: " متأكد أنك تريد  تفعيل هذا المسعف ؟",
                text: "بمجرد  تفعيل هذا المسعف سيتمكن مجددا من دخول تطبيق المستجيب",
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
