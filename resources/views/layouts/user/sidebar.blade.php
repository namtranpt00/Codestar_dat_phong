<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('room.booking')}}" class="brand-link">
        <img src="{{asset("img/logo.png")}}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Đặt phòng UET</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info ">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview @yield('rooms-open')">
                    <a href="" class="nav-link @yield('rooms-active')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Danh sách phòng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('room.booking')}}" class="nav-link @yield('rooms-list-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách phòng </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('room.orderDetail')}}" class="nav-link @yield('orders-list-active')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yêu cầu</p>
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
