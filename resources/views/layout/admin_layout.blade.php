<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('title')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('public/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.min.css') }}">
    {{-- datatable.css --}}
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    {{-- select --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/tail.select@0.5.15/css/bootstrap4/tail.select-default.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 17px !important;
        }

        .btn-head {
            padding: 4px 20px;
        }

        .tr-admin {
            background-color: #56bc1659
        }
        .card-header.text-center {
    background-color: #11700b59;
}
    .card-body.table-responsive.p-0 {
        padding-top: 5px !important;
    }
    .toast{
        opacity: 1 !important;
    }
    .
element.style {
}
.dropdown-menu-lg .dropdown-item {
    padding: .5rem 1rem;
}
.dropdown-item{
    white-space: normal !important;
}
.my-drop {
    overflow-y: scroll;
    height: 300px;
}

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('trangchu_admin') }}" class="nav-link"><button type="button"
                            class="btn btn-primary btn-head">Trang chủ</button></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('list_order') }}" class="nav-link"><button type="button"
                            class="btn btn-success btn-head">Đơn hàng ({{ $countOrderNew }})</button></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin_logout') }}" class="nav-link"><button type="button"
                            class="btn btn-danger btn-head">Đăng xuất</button></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                </li>

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge count-notification">{{count(Auth::user()->unreadNotifications)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right my-drop">
                        <span class="dropdown-item dropdown-header"> <span class="count-notification">{{count(Auth::user()->unreadNotifications)}}</span> Thông báo</span>
                   <div id="drop-notification">
                        @foreach(Auth::user()->unreadNotifications as $notification)
                        <div class="dropdown-divider"></div>
                        <a href="order/get-detail/{{$notification->data['order_id']}}/{{$notification->id}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>Khách hàng {{$notification->data['custommerName']}} vừa đặt hàng !
                            {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                        </a>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a href="{{route('delete_all_notifications')}}" class="dropdown-item dropdown-footer">Xóa tất cả thông báo</a>
                    </div>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="my-toast">
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="fa fa-globe-americas"></i>
                              <strong class="mr-auto">Thông báo</strong>
                              <button type="button" class="ml-2 mb-1 close" id="close-toast" data-dismiss="toast" aria-label="Close" >
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="toast-body">
                             Bạn có thông báo mới !
                            </div>
                          </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Trang Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('public/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    @if (Auth::check())
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    @endif

                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('trangchu_admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @can('author')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-list-ul"></i>
                                    <p>
                                        Danh mục bài viết
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('view_add_category_post') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Thêm danh mục bài viết</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_category_post') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liệt kê danh mục bài viết</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        Quản lý bài viết
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('view_add_post') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Thêm bài viết</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_post') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liệt kê bài viết</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        Quản lý slider
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('add_slide') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Thêm Slide</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manage_banner') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liệt kê Slide</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        @can('user')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-list-ul"></i>
                                    <p>
                                        Danh mục sản phẩm
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('view_add_category_product') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Thêm danh mục sản phẩm</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_category_product') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liệt kê danh mục sản phẩm</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fab fa-product-hunt"></i>
                                    <p>
                                        Quản lý sản phẩm
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('view_add_product') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Thêm sản phẩm</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_product') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liệt kê sản phẩm</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        Quản lý phiếu nhập
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('view_insert_input') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Lập phiếu nhập</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_input') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách phiếu nhập</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        @can('admin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-truck"></i>
                                    <p>
                                        Vận chuyển
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('add_delivery') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Quản lý vận chuyển</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-scroll"></i>
                                    <p>
                                        Mã giảm giá
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('view_insert_coupon') }}" class="nav-link">
                                            <i class="nav-icon far fa-plus-square"></i>
                                            <p>Thêm mã giảm giá</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_coupon') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liệt kê mã giảm giá</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fab fa-product-hunt"></i>
                                <p>
                                    Quản lý nhà cung cấp
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('view_insert_vendor') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>Thêm nhà cung cấp</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('list_vendor') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liệt kê nhà cung cấp</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fab fa-product-hunt"></i>
                                <p>
                                    Quản lý kho
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('view_insert_warehouse') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>Thêm kho</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('list_warehouse') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liệt kê các kho</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @can('admin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>
                                        Users
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('register-user') }}" class="nav-link">
                                            <i class="fas fa-user-plus"></i>
                                            <p>Đăng ký user</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('list_user') }}" class="nav-link">
                                            <i class="fas fa-list"></i>
                                            <p>Liệt kê user</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Địa chỉ: 180 Trung Hành, Đằng Lâm, Hải An, Hải Phòng,
                <a href="">Công ty cổ phần VTS Việt Nam</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-rc
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    

<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('public/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/dist/js/pages/dashboard.js') }}"></script>
<script type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tail.select@0.5.15/js/tail.select-full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
 $( function() {
  $("#datepicker").datepicker({
    dateFormat: "yy-mm-dd",
    duration: "slow"
  });
  $("#datepicker2").datepicker({
    dateFormat: "yy-mm-dd",
    duration: "slow"
  });
  $("#coupon_date_start").datepicker({
    dateFormat: "yy-mm-dd",
    duration: "slow"
  });
  $("#coupon_date_end").datepicker({
    dateFormat: "yy-mm-dd",
    duration: "slow"
  });
    $("#datepicker3").datepicker({
    dateFormat: "yy-mm-dd",
    duration: "slow"
  });
    $("#datepicker4").datepicker({
    dateFormat: "yy-mm-dd",
    duration: "slow"
  });

});
// </script>
<script type="text/javascript">
  $(document).ready(function() {

    /*xử lý select*/
   //  tail.select('.select2',{
   //   search:true,
   //   hideDisabled: true,
   //   hideSelected: true,
   // });
   /*end select*/
 });
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#table_category_post').DataTable();
    $('#table_post').DataTable();
    $('#table_vendors').DataTable();
    $('#table_warehouse').DataTable();
    $('#table_input').DataTable();
    $('#table_product').DataTable();
    $('#table_order').DataTable();
  } );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    CKEDITOR.replace('ck');
    CKEDITOR.replace('ck_1');
  });
</script>

{{-- xử lý thống kê báo cáo --}}

<script type="text/javascript">
    $(document).ready(function() {
        chart_orders_30days();
        var chart = new Morris.Area({
            element: 'chart',
            lineColors: ['#609e4d','#FF6541','#c9940e'],  /*màu cột*/
            pointFillColors: ['#269300'],
            pointStrokeColors: ['black'],
            parseTime:false,
            hideHover: 'auto',
            xkey: 'period',
            fillOpacity:0.3,
            gridTextColor:'#269300',
            ykeys: ['order','profit','quantity'],
            labels: ['Đơn hàng','lợi nhuận','số lượng'],
            behaveLikeLine: true
        });
        
        function chart_orders_30days(){
            $.ajax({
                url: '{{ route('order_30_day') }}',
                type: 'POST',
                dataType:'JSON',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data) /*dữ liệu(data) trả về bên function*/
                {
                    chart.setData(data);
                }     
            });   
        }
        $('.admin_filter').change(function(event) {
            var filterValue = $(this).val();
            $.ajax({
                url: '{{ route('order_filter') }}',
                type: 'POST',
                dataType:'JSON',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    filterValue:filterValue,

                }, /*name:biến var*/
                success:function(data) /*dữ liệu(data) trả về bên function*/
                {
                    if (data!=null) {
                        chart.setData(data);
                    }

                }     
            });  

        });


        $('#btn-dashboard-filter').click(function(event) {
            event.preventDefault();
            var fromDate = $('#datepicker3').val();
            var toDate = $('#datepicker4').val();
            $.ajax({
                url: '{{ route('filter_date') }}',
                type: 'POST',
                dataType:'JSON',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    fromDate:fromDate,
                    toDate:toDate,

                }, /*name:biến var*/
                success:function(data) /*dữ liệu(data) trả về bên function*/
                {
                    chart.setData(data);
                }     
            });   

        });
    });
</script>

{{-- end xử lý thống kê báo --}}


{{-- xử lý chọn nhiều ảnh --}}
<script type="text/javascript">
  $(document).ready(function() {
    load_image();
    function load_image()
    {
      var product_id = $('.product_id').val();
      var token =$('input[name="_token"]').val();
      $.ajax({
                url: '{{ route('select_gallery') }}',
                type: 'POST',
                data:{
                    product_id:product_id,
                    _token:token,

                }, /*name:biến var*/
                success:function(data) /*dữ liệu(data) trả về bên function*/
                {
                     $('#load_image').html(data);
                }
            });
    }
});

    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            /*xử lý select*/
            //  tail.select('.select2',{
            //   search:true,
            //   hideDisabled: true,
            //   hideSelected: true,
            // });
            /*end select*/
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_category_post').DataTable();
            $('#table_post').DataTable();
            $('#table_vendors').DataTable();
            $('#table_warehouse').DataTable();
            $('#table_input').DataTable();
            $('#table_product').DataTable();
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('ck');
            CKEDITOR.replace('ck_1');
        });

    </script>
    {{-- xử lý chọn nhiều ảnh --}}
    <script type="text/javascript">
        $(document).ready(function(){
            load_image();
            function load_image() {
                var product_id = $('.product_id').val();
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('select_gallery') }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        _token: token,

                    },
                    /*name:biến var*/
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        $('#load_image').html(data);
                    }
                });
            }
            $('#file').change(function(event) {
                var files = $('#file')[0].files;
                var error = '';
                if (files.length > 5) {
                    error += '<p class="text-danger">Bạn chỉ được chọn tối đa 5 ảnh</p>';
                } else if (files.length == '') {
                    error += '<p class="text-danger">Bạn không được bỏ trống ảnh</p>';
                }

                if (error == '') {} else {
                    $('#file').val('');
                    $('#error_image').html(error);
                }

            });

            $(document).on('blur', '.edit_gallery_name', function() {
                var gallery_id = $(this).data('gallery_id');
                var gallery_text = $(this).text();
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('update_gallery') }}',
                    type: 'POST',
                    data: {
                        gallery_id: gallery_id,
                        gallery_text: gallery_text,
                        _token: token,

                    },
                    /*name:biến var*/
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        load_image();
                    }
                });
            });
            $(document).on('click', '.delete-image', function(e) {
                e.preventDefault();
                var gallery_id = $(this).data('id');
                var token = $('input[name="_token"]').val();
                swal({
                    title: 'Bạn có muốn xóa hình ảnh này không!!!',
                    icon: "warning",
                    buttons: ["không", "ok"],
                }).then((ok) => {
                    if (ok) {
                        $.ajax({
                            url: '{{ route('delete_gallery') }}',
                            type: 'POST',
                            data: {
                                gallery_id: gallery_id,
                                _token: token,

                            },
                            /*name:biến var*/
                            success: function(
                                data) /*dữ liệu(data) trả về bên function*/ {
                                    swal({
                                        title: 'Xóa thành công',
                                        icon: "success",
                                        button: "quay lại",
                                    }).then(ok => {
                                        window.location.reload();
                                    });

                                }
                        });
                    } else {
                        swal({
                            title: 'images have been verity safe',
                            icon: "success",
                            button: "quay lại",
                        });
                    }
                });

            });
            $(document).on('change', '.file_name', function() {
                var image_id = $(this).data('image_id');
                var file = document.getElementById('file_name_' + image_id).files[0];

                form_data = new FormData();
                form_data.append('file', document.getElementById('file_name_' + image_id).files[0]);
                form_data.append('image_id', image_id);
                $.ajax({
                    url: '{{ route('update_image') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    /*name:biến var*/
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        swal({
                            title: 'Đã upload ảnh thành công',
                            icon: "success",
                            button: "quay lại",
                        });
                        load_image();

                    }
                });
            });
        });

    </script>
    {{-- end xử lý chọn nhiều ảnh --}}

    {{-- xử lý phiếu nhập --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#status', function() {
                var status = $(this).val();
                var input_id = $(this).next().val();
                var token = $('input[name="_token"]').val();
                if (status) {
                    swal({
                        title: 'Bạn có muốn thay đổi trạng thái không?!!!',
                        icon: "warning",
                        buttons: ['không', 'ok'],
                    }).then((ok) => {
                        if (ok) {
                            $.ajax({
                                url: '{{ route('change_status') }}',
                                type: 'POST',
                                data: {
                                    _token: token,
                                    input_id: input_id,
                                    status: status
                                },
                                success: function(
                                    data) /*dữ liệu(data) trả về bên function*/ {
                                        swal({
                                            title: 'Thay đổi trạng thái thành công!!!',
                                            icon: "success",
                                            button: "quay lại",
                                        }).then((ok) => {
                                            window.location.reload();
                                        });
                                    }
                            });
                        } else {
                            window.location.reload();
                        }
                    });
                }
            });
            $(document).on('change', '#nhacungcap', function() {
                var token = $('input[name="_token"]').val();
                var vendor_id = $(this).val();
                if (vendor_id) {
                    $.ajax({
                        url: '{{ route('load_input_sheet') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: token,
                            vendor_id: vendor_id
                        },
                        success: function(data) /*dữ liệu(data) trả về bên function*/ {
                            var html = '';
                            html +=
                                `<tr>
          <td>
          <select class="form-control select2 product_input" name="product_id[]" id="product_input" data-live-search='true'>`;
                            html += `<option value="${item}">Chọn</option>`;
                            for (var item in data) {
                                html +=
                                    `<option value="${item}" id="product_${item}">${data[item]}</option>`;
                            }
                            html += `</select>
          </td>
          <td>
          <input type="number" name="quantity[]" class="quantity_input" min="0">
          </td>
          <td>
          <input type="text" name="unit[]" class="unit" min="0">
          </td>
          <td><input type="number" name="price_import[]" class="price_import" min="0"></td>
          <td class="total_amount text-center" name="total_amount"></td>
          <td class="text-center"><a data-href="" class="delete-input" style="cursor:pointer;"><i class="fa fa-times text-danger"></i></a></td>
          </tr>`;
                            $('.load_input_sheet').html(html);
                        }
                    });
                } else {
                    swal({
                        title: 'Bạn phải nhập nhà cung cấp',
                        icon: "warning",
                        button: "quay lại",
                    });
                }
            });
            $(document).on('change', '.product_input', function() {
                event.preventDefault();

                var product_id_old = $('.product_input').get();
                var id = [];
                for (var i = 0; i < product_id_old.length; i++) {
                    var id_product = product_id_old[i].value;
                    id.push(parseInt(id_product));
                }
                if (id.length > 1) {
                    var id_change = parseInt($(this).val());

                    var check = id.filter(function(value, index) {
                        return value === id_change;
                    });
                    if (check.length > 1) {
                        return swal({
                            title: 'Có sản phẩm đã bị trùng nhau xin bạn nhập lại!!!',
                            icon: "warning",
                            button: "Sửa",
                        }).then((ok) => {
                            $(this).children('#product_' + id_change).remove();
                        });

                    }
                }
                var token = $('input[name="_token"]').val();
                var vendor_id = $('#nhacungcap').val();
                if (vendor_id) {
                    $.ajax({
                        url: '{{ route('load_input_sheet') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: token,
                            vendor_id: vendor_id,
                            id: id
                        },
                        success: function(data) /*dữ liệu(data) trả về bên function*/ {
                            swal({
                                title: 'Bạn muốn thêm sản phẩm mới không???',
                                text: "OK hoặc không, chọn mẹ nhanh lên ???",
                                icon: "success",
                                buttons: ['không', 'ok'],
                            }).then((ok) => {
                                if (ok) {
                                    var html = '';
                                    html +=
                                        `<tr>
       <td>
       <select class="form-control select2 product_input" name="product_id[]" id="product_input" data-live-search='true'>`;
                                    html += `<option value="${item}">Chọn</option>`;
                                    for (var item in data) {
                                        html +=
                                            `<option value="${item}" id="product_${item}">${data[item]}</option>`;
                                    }
                                    html += `</select>
      </td>
      <td>
      <input type="number" name="quantity[]" class="quantity_input" min="0">
      </td>
      <td>
      <input type="text" name="unit[]" class="unit" min="0">
      </td>
      <td><input type="number" name="price_import[]" class="price_import" min="0"></td>
      <td class="total_amount text-center" name="total_amount"></td>
      <td class="text-center"><a data-href="" class="delete-input" style="cursor:pointer;"><i class="fa fa-times text-danger"></i></a></td>
      </tr>`;
                                    $('.load_input_sheet').append(html);

                                }
                            });
                        }
                    });
                } else {
                    swal({
                        title: 'Bạn phải nhập nhà cung cấp',
                        icon: "warning",
                        button: "quay lại",
                    });
                }
            });


            $(document).on('click', '.delete-input', function() {
                $(this).parent().parent().remove();
            });
            $(document).on('keyup', '.price_import', function() {
                function formatCash(str) {
                    return str.split('').reverse().reduce((prev, next, index) => {
                        return ((index % 3) ? next : (next + ',')) + prev
                    })
                }
                var quantity = $(this).parent().prev().prev().children().val();
                var price_import = $(this).val();


                if (quantity) {
                    var total = quantity * $(this).val() + 'VNĐ';
                    var show_total = $(this).parent().next().text(formatCash(total));
                } else {
                    swal({
                        title: 'Bạn phải nhập số lượng trước!!!',
                        icon: "warning",
                        button: "quay lại",
                    });
                    $(this).val(0);
                }
            });
            $(document).on('keyup', '.quantity_input', function() {
                function formatCash(str) {
                    return str.split('').reverse().reduce((prev, next, index) => {
                        return ((index % 3) ? next : (next + ',')) + prev
                    })
                }
                var price_import = $(this).parent().next().next().children().val();
                var soluong = $(this).val();
                if (soluong) {
                    var total = price_import * $(this).val() + 'VNĐ';
                    var show_total = $(this).parent().next().next().next().text(formatCash(total));
                } else {
                    swal({
                        title: 'Bạn phải nhập số lượng trước!!!',
                        icon: "warning",
                        button: "quay lại",
                    });
                    $(this).val(0);
                }
            });
            $(document).on('change', '#nhacungcap_edit', function() {
                var vendor_id = $(this).val();
                var token = $('input[name="_token"]').val();
                if (vendor_id) {
                    $.ajax({
                        url: '{{ route('load_input_sheet_edit') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: token,
                            vendor_id: vendor_id
                        },
                        success: function(data) /*dữ liệu(data) trả về bên function*/ {
                            var html = '';
                            html += `<option value="${item}">Chọn</option>`;
                            for (var item in data) {
                                html +=
                                    `<option value="${item}" id="product_${item}">${data[item]}</option>`;
                            }
                            $('.product_input_edit').html(html);
                        }
                    });
                } else {
                    swal({
                        title: 'Bạn phải nhập nhà cung cấp',
                        icon: "warning",
                        button: "quay lại",
                    });
                }

            });
            $(document).on('change', '.product_input_edit', function() {
                var product_id_old = $('.product_input_edit').get();
                var id = [];
                for (var i = 0; i < product_id_old.length; i++) {
                    var id_product = product_id_old[i].value;
                    id.push(parseInt(id_product));
                }
                if (id.length > 1) {
                    var id_change = parseInt($(this).val());

                    var check = id.filter(function(value, index) {
                        return value === id_change;
                    });
                    if (check.length > 1) {
                        return swal({
                            title: 'Có sản phẩm đã bị trùng nhau xin bạn nhập lại!!!',
                            icon: "warning",
                            button: "Sửa",
                        }).then((ok) => {
                            $(this).children('#product_' + id_change).remove();
                        });

                    }
                }
            });
            $(document).on('click', '#add_product', function() {
                var vendor_id = $('#nhacungcap_edit').val();
                var token = $('input[name="_token"]').val();
                if (vendor_id) {
                    $.ajax({
                        url: '{{ route('load_input_sheet_edit') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: token,
                            vendor_id: vendor_id
                        },
                        success: function(data) /*dữ liệu(data) trả về bên function*/ {
                            swal({
                                title: 'Bạn muốn thêm sản phẩm mới không???',
                                text: "OK hoặc không, chọn mẹ nhanh lên ???",
                                icon: "success",
                                buttons: ['không', 'ok'],
                            }).then((ok) => {
                                if (ok) {
                                    var html = '';
                                    html +=
                                        `<tr>
         <td>
         <select class="form-control select2 product_input_edit" name="product_edit_id[]" id="product_input" data-live-search='true'>`;
                                    html += `<option value="${item}">Chọn</option>`;
                                    for (var item in data) {
                                        html +=
                                            `<option value="${item}" id="product_${item}">${data[item]}</option>`;
                                    }
                                    html += `</select>
        </td>
        <td>
        <input type="number" name="quantity_edit[]" class="quantity_input" min="0">
        </td>
        <td>
        <input type="text" name="unit_edit[]" class="unit_edit" min="0">
        </td>
        <td><input type="number" name="price_import_edit[]" class="price_import" min="0"></td>
        <td class="total_amount text-center" name="total_amount"></td>
        <td class="text-center"><a data-href="" class="delete-input" style="cursor:pointer;"><i class="fa fa-times text-danger"></i></a></td>
        </tr>`;
                                    $('.load_input_sheet_edit').append(html);

                                }
                            });
                        }
                    });
                } else {
                    swal({
                        title: 'Bạn phải nhập nhà cung cấp',
                        icon: "warning",
                        button: "quay lại",
                    });
                }


            });
        });

    </script>
    {{-- end xử lý phiếu nhập --}}

    {{-- js xử lý feeship --}}
    <script type="text/javascript">
        $(document).ready(function() {
            function fetch_delivery(page, id = '') {
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('load_delivery') }}' + "?page=" + page,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        $("#table_data").empty().html(data);

                    }
                });
            }
            $(document).on('blur', '.feeship_edit', function() {
                var id = $(this).data('id');
                var feeship = $(this).text();
                var page = $('.card-footer-ajax .pagination .active .page-link').text();
                var feeship_o = (feeship.substring(0, feeship.length).trim()).replace(".", "").replace(
                    "đ", '');
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('update_delivery') }}',
                    type: 'POST',
                    data: {
                        _token: token,
                        id: id,
                        feeship: feeship_o,
                        page: page,

                    },
                    /*name:biến var*/
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        fetch_delivery(data);
                    },
                    error: function() {
                        swal({
                            title: 'Lỗi!!!',
                            text: "Nhập không đúng dữ liệu hoặc chưa nhập",
                            icon: "error",
                            button: "quay lại",
                        }).then((ok) => {
                            window.location.href = "{{ route('add_delivery') }}";
                        });
                    }
                });

            });
            $(document).on('click', '.xoa-delivery', function() {
                var id = $(this).data('href');
                var token = $('input[name="_token"]').val();
                var page = $('.card-footer-ajax .pagination .active .page-link').text();
                swal({
                    title: 'Bạn có muốn xóa phí ship không!!!',
                    icon: "warning",
                    buttons: ["không", "ok"],
                }).then((ok) => {
                    if (ok) {
                        $.ajax({
                            url: '{{ route('delete_delivery') }}',
                            type: 'POST',
                            data: {
                                id: id,
                                _token: token,
                                page: page,
                            },
                            /*name:biến var*/
                            success: function(
                                data) /*dữ liệu(data) trả về bên function*/ {
                                    swal('Bạn đã xóa thành công!!', {
                                        icon: 'success',
                                    });
                                    fetch_delivery(data);
                                },
                        });
                    } else {
                        swal('Your feeship is safe!!!', {
                            icon: 'success',
                        });
                        fetch_delivery();
                    }
                });
            });

            $('.add_delivery').click(function() {
                var thanhpho = $('#thanhpho').val();
                var quanhuyen = $('#quanhuyen').val();
                var xaphuong = $('#xaphuong').val();
                var phiship = $('.phiship').val();
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('insert_delivery') }}',
                    type: 'POST',
                    data: {
                        _token: token,
                        name_tp: thanhpho,
                        name_qh: quanhuyen,
                        name_xp: xaphuong,
                        feeship: phiship,

                    },
                    /*name:biến var*/
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        swal({
                            title: 'Thêm phí ship thành công!!!',
                            icon: "success",
                            button: "quay lại",
                        }).then((ok) => {
                            fetch_delivery();
                            $('.reset_op').attr("selected", "selected");
                            $('.phiship').val("");

                        });
                        // alert(data);

                    },
                    error: function() {
                        swal({
                            title: 'Lỗi!!!',
                            text: "Nhập không đúng dữ liệu hoặc chưa nhập",
                            icon: "error",
                            button: "quay lại",
                        }).then((ok) => {
                            window.location.href = "{{ route('add_delivery') }}";

                        });
                    }

                });

            });

            $('.choose').change(function() {
                var action = $(this).attr('id');
                var matp = $(this).val();
                var maqh = $(this).val();
                var token = $('input[name="_token"]').val();
                var result = '';
                if (action == "thanhpho") {
                    result = "quanhuyen";
                } else if (action == "quanhuyen") {
                    result = "xaphuong";
                }
                $.ajax({
                    url: '{{ route('select-delivery') }}',
                    type: 'POST',
                    data: {
                        _token: token,
                        choose: action,
                        name_tp: matp,
                        name_qh: maqh,

                    },
                    /*name:biến var*/
                    success: function(data) /*dữ liệu(data) trả về bên function*/ {
                        $("#" + result).html(data);
                    }

                });
            });

            $(document).on('click', '.card-footer-ajax .pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_delivery(page);
            });

            $(document).on('click', '#search-feeship', function() {
                var query = $(this).val();
                var page = $('.card-footer-ajax .pagination .active .page-link').text();
                page > 1 && query ? page = 1 : '';
                fetch_delivery(page, query);
            });
        });

    </script>
    <script>
        @if(isset($order))
        $(document).ready(function() {
            $(document).on('change', '#status-order', function() {
                var status = $(this).val();
                var order_id =@if(isset($order)) {{ $order->id }} @endif;
                var token = $('input[name="_token"]').val();
                if (status) {
                    swal({
                        title: 'Bạn có muốn thay đổi trạng thái không?!!!',
                        icon: "warning",
                        buttons: ['không', 'ok'],
                    }).then((ok) => {
                        if (ok) {
                            if(status==5)
                            {
                            $.ajax({
                                url: '{{ route('cancel_order') }}',
                                type: 'POST',
                                data: {
                                    _token: token,
                                    id_order: order_id,
                                    cancle_notes:''
                                },
                                success: function(
                                    data) /*dữ liệu(data) trả về bên function*/ {
                                        swal({
                                            title: 'Thay đổi trạng thái thành công!!!',
                                            icon: "success",
                                            button: "quay lại",
                                        }).then((ok) => {
                                            window.location.reload();
                                        });
                                    }
                            });
                            }else{
                                $.ajax({
                                url: '{{ route('change_status_order') }}',
                                type: 'POST',
                                data: {
                                    _token: token,
                                    order_id: order_id,
                                    status: status
                                },
                                success: function(
                                    data) /*dữ liệu(data) trả về bên function*/ {
                                        swal({
                                            title: 'Thay đổi trạng thái thành công!!!',
                                            icon: "success",
                                            button: "quay lại",
                                        }).then((ok) => {
                                            window.location.reload();
                                        });
                                    }
                            });
                            }
                        } 
                        // else {
                        //    // window.location.reload();
                        // }
                    });
                }
            });
        });
        $(document).ready(function() {
            $(document).on('change', '#status-pay-order', function() {
                var status = $(this).val();
                var order_id =@if(isset($order)) {{ $order->id }} @endif;
                var token = $('input[name="_token"]').val();
                if (status) {
                    swal({
                        title: 'Bạn có muốn thay đổi trạng thái không?!!!',
                        icon: "warning",
                        buttons: ['không', 'ok'],
                    }).then((ok) => {
                        if (ok) {
                            $.ajax({
                                url: '{{ route('change_status_pay_order') }}',
                                type: 'POST',
                                data: {
                                    _token: token,
                                    order_id: order_id,
                                    status: status
                                },
                                success: function(
                                    data) /*dữ liệu(data) trả về bên function*/ {
                                        swal({
                                            title: 'Thay đổi trạng thái thành công!!!',
                                            icon: "success",
                                            button: "quay lại",
                                        }).then((ok) => {
                                            window.location.reload();
                                        });
                                    }
                            });
                        }
                        //  else {
                        //     window.location.reload();
                        // }
                    });
                }
            });
        });
        @endif
        // lọc theo trạng thái đơn hàng
        $(document).ready(function() {
            $(document).on('change', '.get-by-product', function() {
            var url= '{{asset('')}}'+'admin/order/get-by-status/'+$('#filter-status').val()+'/'+$('#filter-status-pay').val();
            window.location.href=url;
            });
        });
    </script>
    {{-- end feeship --}}
    <script type="text/javascript">
        $( function() {
         $("#datepicker").datepicker({
           dateFormat: "yy-mm-dd",
           duration: "slow"
         });
         $("#datepicker2").datepicker({
           dateFormat: "yy-mm-dd",
           duration: "slow"
         });
         $("#coupon_date_start").datepicker({
           dateFormat: "yy-mm-dd",
           duration: "slow"
         });
         $("#coupon_date_end").datepicker({
           dateFormat: "yy-mm-dd",
           duration: "slow"
         });
       
       });
       </script>

  <script>

    // Enable pusher logging - don't include this in production
    
    Pusher.logToConsole = true;

    var pusher = new Pusher('8d5cf5e9296597b8a373', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        $("#my-toast").addClass('show');
        $(".count-notification").text(parseInt($(".count-notification").first().text())+1);
        var newNotificationHtml = `
        <div class="dropdown-divider"></div>
                        <a href="admin/order/get-detail/${data.order_id}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>Khách hàng ${data.custommerName} vừa đặt hàng !
                            {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                        </a>
        `;
        $('#drop-notification').prepend(newNotificationHtml);
    });
  </script>
<script>
    $(document).ready(function () {
        $('#close-toast').click(function(){
            $("#my-toast").removeClass('show');
        });
 
    });
</script>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "105017725128905");
    chatbox.setAttribute("attribution", "biz_inbox");
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v10.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
    @yield('script')
</body>

</html>
