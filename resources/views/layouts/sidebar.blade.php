<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center text-uppercase">
        {{-- @if(isset($_SESSION['AUTH']))
        <div class="image">
            <img src="{{ '/public/adminlte/'}}dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{$_SESSION['AUTH']['name']}}</a>
        </div>
        @else --}}
        {{-- <div class="image">
            <img src="{{ '/public/adminlte/'}}dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                alt="User Image">
        </div> --}}

        <div class="info">
            <a href="" class="d-block">QUẢN LÝ</a>
        </div>


        {{-- @endif --}}
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item ">
                <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Lớp học
                        <i class="fas fa-angle-left right"></i>
                        {{-- <span class="badge badge-info right">6</span> --}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('lop_hoc.index') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('lop_hoc.add') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item ">
                <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Học sinh
                        <i class="fas fa-angle-left right"></i>
                        {{-- <span class="badge badge-info right">6</span> --}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('hoc_sinh.index') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('hoc_sinh.add') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>