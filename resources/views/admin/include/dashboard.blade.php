
<!doctype html>
<html lang="en">

<head>
  @include('Links.head')
    <title>لوحة التحكم</title>
</head>

<body>

<div class="dash">


    @include('admin.layouts.sideMenu')

    <div class="dash-app">

       @include('admin.layouts.header')

        <main class="dash-content">
            <div class="container-fluid">
                <div class="row dash-row">
                    <div class="col-xl-6">
                        <div   class="stats stats-primary">
                            <h3 class="stats-title"> عدد كل الطلبات</h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div  class="stats-data">
                                    <div  id="AllRequsets" class="stats-number"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="stats stats-success ">
                            <h3 class="stats-title">الطلبات التي تم قبلها</h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="stats-data">
                                    <div id="RequsetsAccept" class="stats-number"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row dash-row">
                    <div class="col-xl-6">
                        <div class="stats stats-warning">
                            <h3 class="stats-title">الطلبات المعلقة </h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-pause"></i>
                                </div>
                                <div class="stats-data">
                                    <div id="unrederRequest" class="stats-number"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="stats stats-danger">
                            <h3 class="stats-title">الطلبات التي تم رفضها </h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-frown"></i>
                                </div>
                                <div class="stats-data">
                                    <div id="RequsetsNotAccept" class="stats-number"></div>
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


</body>

</html>
