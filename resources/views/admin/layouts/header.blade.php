<meta name="csrf-token" content="{{ csrf_token() }}" />
<header class="dash-toolbar">

    <div class="col-md-2 tools">


        @include('Links.body_js')

        <div class="dropdown tools-item" >
            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div style="text-align: right" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="{{route('user_data')}}">ملف الشخصي</a>
                <a class="dropdown-item" href="{{route('logout')}}">خروج</a>
            </div>
        </div>

        <a id="notify-comet"  data-toggle="modal" data-target="#exampleModal" class="tools-item">
            <i style="cursor: pointer" class="fas fa-bell"></i>
            <i id="not-count"  class="tools-item-count"></i>
        </a>





    </div>

    <h5 class="col-md-10" style="text-align: center">
      جمعية الهلال الاحمر الليبي
    </h5>

    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
</header>


<style>
    .card
    {
        text-align: right;
        border-radius: 4px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
        padding: 14px 80px 18px 36px;
        cursor: pointer;
    }

    .card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }

    .card h3{
        font-weight: 600;
    }

    .card img{
        position: absolute;
        top: 20px;
        right: 15px;
        max-height: 120px;
    }

    .card-1{
        background-image: url(https://ionicframework.com/img/getting-started/ionic-native-card.png);
        background-repeat: no-repeat;
        background-position: right;
        background-size: 80px;
    }

    .card-1{
        background-image: url(https://ionicframework.com/img/getting-started/components-card.png);
        background-repeat: no-repeat;
        background-position: right;
        background-size: 80px;
    }

    .card-3{
        background-image: url(https://ionicframework.com/img/getting-started/theming-card.png);
        background-repeat: no-repeat;
        background-position: right;
        background-size: 80px;
    }

    @media(max-width: 990px){
        .card{
            margin: 20px;
        }
    }

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">طلبات التصريح</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

                <div class="container">
                    <div id="modelRequests" class="row">

                    </div>

                    <!-- Thissssssssssssssssssss-->
                    <a style="text-align: center" href="{{route('allExitPermissionsRequests')}}">عرض كل التصاريح</a>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@include('Links.body_js')

<script>
    jQuery(document).ready(function($){

	var localUrl='http://192.168.1.3:8080';

        $('#notify-comet').on('click', function()
        {
            $.ajax({
                url: localUrl+'/AllRequestBody',
                type: 'GET',
                dataType: 'json',
                success: function ( data) {
                    $('#modelRequests').empty();
                    $.each(data, function(key, value)
                        {
                            var id=value.id;
                            var request_state=value.request_state;

                            var urlAction= localUrl+'/exitPermissionShow/'+id+'/'+request_state;

                            if(request_state==0)
                            {
                                $('#modelRequests').append('' +
                                    ' <a  class="col-md-12" href=" '+urlAction+'">'+
                                    '<div   class="col-md-12">'+
                                    '<div style="background-color: #eeeef1"  class="card card-1">'+
                                    '<h4 style="text-align: center">طلب تصريح </h4>'+
                                    '<p style="margin-right: 20px">'+
                                    value.state_details
                                    + '</p>'+
                                    '<span style="margin-right: 20px;color: red">طلب تصريح لم يتم الرد عليه</span>'+
                                    '</div>'+
                                    '<br>'+
                                    '</div>'+
                                    '</a>'
                                );
                            }
                            else
                            {
                                $('#modelRequests').append('' +
                                    ' <a class="col-md-12" href=" '+urlAction+'">'+
                                    '<div  class="col-md-12">'+
                                    '<div  class="card card-1">'+
                                    '<h4 style="text-align: center">طلب تصريح</h4>'+
                                    '<p style="margin-right: 20px">'+
                                    value.state_details
                                    + '</p>'+
                                    '</div>'+
                                    '<br>'+
                                    '</div>'+
                                    '</a>'
                                );
                            }


                        });

                },
                error: function ( data ) {

                }
            });
        });




        function load_unseen_notification()
        {
            $.ajax({
                url:  localUrl+'/notificationCount',
                type: 'GET',
                dataType: 'json',
                success: function ( data) {

                    $('#not-count').html(data);

                },
                error: function ( data ) {

                }
            });

        }

        function RequestWait()
        {
            $.ajax({
                url:  localUrl+'/notificationCount',
                type: 'GET',
                dataType: 'json',
                success: function ( data) {
                    $('#unrederRequest').html(data);
                    $('#unrederRequest2').html(data);

                },
                error: function ( data ) {

                }
            });

        }
        function RequsetsAccept()
        {
            $.ajax({
                url:  localUrl+'/RequsetsAccept',
                type: 'GET',
                dataType: 'json',
                success: function ( data) {

                        $('#RequsetsAccept').html(data);



                },
                error: function ( data ) {

                }
            });

        }
        function RequsetsNotAccept()
        {
            $.ajax({
                url:  localUrl+'/RequsetsNotAccept',
                type: 'GET',
                dataType: 'json',
                success: function ( data) {

                    $('#RequsetsNotAccept').html(data);



                },
                error: function ( data ) {

                }
            });

        }

        function AllRequsets()
        {
            $.ajax({
                url:  localUrl+'/AllRequsets',
                type: 'GET',
                dataType: 'json',
                success: function ( data) {

                    $('#AllRequsets').html(data);



                },
                error: function ( data ) {

                }
            });

        }

        setInterval(function(){
            load_unseen_notification();
            RequsetsAccept();
            RequsetsNotAccept();
            AllRequsets();
            RequestWait();
        }, 1000);
    });

</script>


