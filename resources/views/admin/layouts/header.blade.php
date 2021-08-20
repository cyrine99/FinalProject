<header class="dash-toolbar">
    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
    <a href="#!" class="searchbox-toggle">
        <i class="fas fa-search"></i>
    </a>
    <form class="searchbox" action="#!">
       حفظ الله ليبيا
    </form>
    <div class="tools">



        <a href="{{route('exitPermission')}}"  data-toggle="modal" data-target="#exampleModal" class="tools-item">
            <i class="fas fa-bell"></i>
            @if($count > 0)
            <i class="tools-item-count">{{$count}}</i>
            @endif
        </a>





        <div class="dropdown tools-item">
            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="#!">الملف الشخصي</a>
                <a class="dropdown-item" href="{{route('logout')}}">خروج</a>
            </div>
        </div>


    </div>
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
                    <div class="row">



                        @foreach($ExitPermissionRequests as $value)

                            <a class="col-md-12" href=" {{ url('exitPermissionShow/'.$value->id .'/'.$value->request_state) }}">
                            <div  class="col-md-12">

                                @if($value->request_state==0)
                                <div style="background-color: #e7e7eb" class="card card-1">
                                @else
                                <div style="background-color: #ffffff" class="card card-1">
                                @endif
                                    <h3 style="text-align: center">طلب تصريح</h3>
                                    <p style="margin-right: 20px">
                                        {{$value->state_details}}
                                                                            </p>
                                </div>
                                <br>
                            </div>
                            </a>
                        @endforeach




                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
