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
                    <a href="{{route('registerUpdateAndDelete')}}" class="dash-nav-dropdown-item">تعديل /حذف  مستخدم</a>
                </div>
            </div>
        @endif

        <div class="dash-nav-dropdown ">
            <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-cube"></i> المسعفون </a>
            <div class="dash-nav-dropdown-menu">
                <a href="" class="dash-nav-dropdown-item">كل المسعفون</a>
                <a href="{{route('addParamedicsUi')}}" class="dash-nav-dropdown-item">إضافة مسعف</a>
                <a href="{{route('registerUpdateAndDelete')}}" class="dash-nav-dropdown-item">تعديل /حذف  مستخدم</a>
            </div>
        </div>


        <a href="{{route('dashboard')}}" class="dash-nav-item">
            <i class="fas fa-building"></i> المدن و المناطق </a>

    </nav>
</div>
