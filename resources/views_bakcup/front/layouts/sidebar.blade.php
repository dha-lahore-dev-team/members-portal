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
        </div>
         Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('front.index')}}" class="nav-link {{  request()->is('home') ? 'active':'' }} ">
                        <i class="nav-icon fas fa-tachometer-alt" style="font-size:22px"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Plot Dues
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('schedule.two')}}" class="nav-link {{  request()->is('schedule/*') || request()->is('schedule') || request()->is('search/schedule/*') ? 'active':'' }} ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Schedule
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('challan.two')}}" class="nav-link {{  request()->is('challan/*') || request()->is('challan') ||  request()->is('search/challan/*') ? 'active':'' }} ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                   Generate Challan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('history.two')}}" class="nav-link {{  request()->is('history/*') || request()->is('history') ||  request()->is('search/history/*') ? 'active':'' }} ">
                                <i class="nav-icon fas fa-history" style="font-size:22px"></i>
                                <p>
                                    Financial History
                                </p>
                            </a>
                        </li>
<!--                        <li class="nav-item ">
                            <a href="">
                                <i class="nav-icon fas fa-newspaper" style="font-size:22px"></i>
                                <p>
                                    Surcharge
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>-->
                    </ul>
                </li>


		<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Utility Bill
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
			<li class="nav-item ">
                            <a href="#" class="nav-link {{  request()->is('history/*') || request()->is('history') ||  request()->is('search/history/*') ? 'active':'' }} ">
                                <i class="nav-icon fas fa-history" style="font-size:22px"></i>
                                <p>
                                    Water Bill
                                </p>
                            </a>
                        </li>
                    </ul>
		</li>






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

