<div class="dash-nav dash-nav-dark">
    <header>
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
{{--        <i class="fas fa-user-md"></i>--}}
        <a href="#" class="easion-logo"><span>{{$LoggedInfo->firstname." ".$LoggedInfo->lastname}}</span></a>
    </header>
    <nav class="dash-nav-list">

        <a href="{{route('dashboard')}}" class="dash-nav-item">
            <i class="fas fa-home"></i> الرئسية </a>

        @if($LoggedInfo->userType==1)
            <div class="dash-nav-dropdown">
                <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                    <i class="fas fa-chart-bar"></i> المستخدمون </a>
                <div class="dash-nav-dropdown-menu">
                    <a href="{{route('register')}}" class="dash-nav-dropdown-item">إضافة مستخدم</a>
                    <a href="{{route('registerUpdateAndDelete')}}" class="dash-nav-dropdown-item">المستخدمون</a>
                </div>
            </div>
        @endif

        <div class="dash-nav-dropdown ">
            <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-hands-helping"></i> المسعفون </a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{route('addParamedicsUi')}}" class="dash-nav-dropdown-item">إضافة مسعف</a>
                <a href="{{route('updateAndDeleteParamedics')}}" class="dash-nav-dropdown-item">المسعفون</a>
            </div>
        </div>

        <div class="dash-nav-dropdown ">
            <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-hands-helping"></i> التصاريح </a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{route('allExitPermissionsRequests')}}" class="dash-nav-dropdown-item"><span style="color:#dc3545;text-decoration: double;font-size: larger" id="unrederRequest"></span>&nbsp&nbsp طلبات التصاريح</a>
                <a href="{{route('allExitPermission')}}" class="dash-nav-dropdown-item">التصاريح</a>
            </div>
        </div>




        <a href="{{route('balagsMain')}}" class="dash-nav-item">
            <i class="fas fa-running"></i> البلاغات </a>





    </nav>
</div>
