<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{asset("img/logo.png")}}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Quản lý đặt phòng</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info ">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview @yield('users-open')">
                    <a href="{{route('admin.users.list')}}" class="nav-link @yield('users-active')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quản lý người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.users.add')}}" class="nav-link @yield('users-add-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm người dùng </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.users.list')}}" class="nav-link @yield('users-list-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách người dùng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @yield('rooms-open')">

                    <a href="{{route('admin.rooms.list')}}" class="nav-link @yield('rooms-active')">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>
                            Quản lý phòng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.rooms.add')}}" class="nav-link @yield('rooms-add-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm phòng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.rooms.list')}}" class="nav-link @yield('rooms-list-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách phòng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @yield('services-open')">
                    <a href="{{route('admin.services.list')}}" class="nav-link @yield('services-active')">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Quản lý dịch vụ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.services.add')}}" class="nav-link @yield('services-add-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm dịch vụ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.services.list')}}" class="nav-link @yield('services-list-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách dịch vụ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @yield('orders-open')">
                    <a href="{{route('admin.orders.list')}}" class="nav-link @yield('orders-active') ">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Quản lý đặt lịch
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.orders.list')}}" class="nav-link @yield('orders-list-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý Yêu cầu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Đăng xuất</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
