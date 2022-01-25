<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <h3 class="w-100 text-center font-weight-bold text-uppercase text-justify">Troylab</h3>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div>
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">الرئيسية</li>
            <li class="slide">
                <a class="side-menu__item" href="/">
                    <span class="side-menu__label"> <i class="ti-settings ml-3"></i> الرئيسية</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{Route('schools.index')}}">
                    <span class="side-menu__label"><i class="ti-home ml-3"></i> المدارس</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{Route('students.index')}}">
                    <span class="side-menu__label"><i class="ti-user ml-3"></i> الطلاب</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
