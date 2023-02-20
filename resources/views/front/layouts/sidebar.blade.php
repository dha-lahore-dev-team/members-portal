<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('front/dist/img/dhalahorelogo.png')}}" alt="DHA Lahore Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DHA Lahore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
<!--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('front/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Super Admin</a>
            </div>
        </div>-->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('front.index')}}" class="nav-link {{  request()->is('front/index') ? 'active':'' }} ">
                        <i class="nav-icon fas fa-tachometer-alt" style="font-size:22px"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('schedule',['qey_id'=>Auth::user()->qey_id,'key'=>1])}}" class="nav-link {{  request()->is('schedule/*/1') ? 'active':'' }} ">
                        <i class="nav-icon fas fa-calendar-alt" style="font-size:22px"></i>
                        <p>
                            Schedule
                        </p>
                    </a>
                </li>
<!--
                <li class="nav-item ">
                    <a href="{{route('surcharge',['qey_id'=>Auth::user()->qey_id,'key'=>2])}}" class="nav-link {{  request()->is('surcharge/*/2') ? 'active':'' }} ">
                        <i class="nav-icon fas fa-edit" style="font-size:22px"></i>
                        <p>
                            Surcharge
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('challan',['qey_id'=>Auth::user()->qey_id,'key'=>3])}}" class="nav-link {{  request()->is('challan/*/3') ? 'active':'' }} ">
                        <i class="nav-icon fas fa-receipt" style="font-size:22px"></i>
                        <p>
                            Challan
                        </p>
                    </a>
                </li>
-->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link "
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt" style="font-size:22px"></i>
                        <p>
                            Logout
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

