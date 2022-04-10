<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link text-center">
        <img src="{{ asset('client') }}/media/image/logo1.png" alt="" class="template-logo" style="opacity: .8"
            width="70%" />
        <span class="brand-text font-weight-light"></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 text-center text-uppercase">
            @if (Auth::user())
                <div class="image">
                    <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="Ảnh">
                    <a href="">{{ Auth::user()->name }}</a>
                    <p>{{ Auth::user()->id_role }}</p>
                </div>
            @else
                <div class="info">
                    <a href="/login" class="d-block">Đăng Nhập</a>
                </div>
            @endif
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>

                </li>

                <li class="nav-item {{ request()->is('admin/category*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('admin/category*') ? 'active ' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/category"
                                class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/category/add"
                                class="nav-link {{ request()->is('admin/category/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ request()->is('admin/product*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/product"
                                class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/product/add"
                                class="nav-link {{ request()->is('admin/product/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user/add" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li
                    class="nav-item {{ request()->is('admin/detail-product*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('admin/detail-product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Detail product
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/detail-product"
                                class="nav-link {{ request()->is('admin/detail-product') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/detail-product/add"
                                class="nav-link {{ request()->is('admin/detail-product/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Tin Tức
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Tin Tức
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/tin-tuc" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/tin-tuc/add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Mới</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Danh Mục
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/danh-muc-tin-tuc" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/danh-muc-tin-tuc/add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Mới</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="text-center">
            @if (Auth::check())
                <a href="/logout"><i class="nav-icon fas fa-sign-out-alt"></i> Thoát</a>
            @endif
        </div>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
