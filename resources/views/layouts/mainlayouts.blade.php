<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GoRent Mobil - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/touch-icon.png') }}" type="image/x-icon" />
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script src="{{('https://kit.fontawesome.com/4b63060847.js')}}" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.min.css') }}" />
    
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="dashboard" class="logo">
                        <img src="{{ asset('assets/img/kaiadmin/Logo_Bfiverent1.png') }}" alt="navbar brand"
                            class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    {{-- Navbar Untuk Admin --}}
                    <ul class="nav nav-secondary">
                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                                <a href="/dashboard" class="collapsed">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('car*') ? 'active' : '' }}">
                                <a href="/car">
                                    <i class="fas fa-car-alt"></i>
                                    <p>List Mobil</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('brand*') ? 'active' : '' }}">
                                <a href="/brand">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Brand</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                                <a href="/users">
                                    <i class="fas fa-user-alt"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Alat</h4>
                            </li>
                            <li class="nav-item {{ Request::is('mobil-rent*') ? 'active' : '' }}">
                                <a href="/mobil-rent">
                                    <i class="fas fa-cart-plus"></i>
                                    <p>Sewa Mobil</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('rent-logs*') ? 'active' : '' }}">
                                <a href="/rent-logs">
                                    <i class="fas fa-file-alt"></i>
                                    <p>Catatan Sewa</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('returncar*') ? 'active' : '' }}">
                                <a href="/returncar">
                                    <i class="fas fa-recycle"></i>
                                    <p>Kembalikan Mobil</p>
                                </a>
                            </li>
                        @else
                            {{-- Navbar Untuk Client --}}
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Components</h4>
                            </li>
                            <li class="nav-item {{ Request::is('dashboarduser*') ? 'active' : '' }}">
                                <a href="/dashboarduser">
                                    <i class="fa-solid fa-house"></i>
                                    <p>home</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('profile*') ? 'active' : '' }}">
                                <a href="profile">
                                    <i class="fas fa-user-alt"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="">
                                    <i class="fas fa-car-alt"></i>
                                    <p>List Mobil</p>
                                </a>
                            </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        {{-- search --}}
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            @yield('search')
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="/logout" id="messageDropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </a>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        @if (Auth::user()->foto != '')
                                        <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt=""
                                        class="avatar-img rounded-circle">
                                    @else
                                        <img src="{{ asset('img/profil-kosong.jpg') }}" alt="" 
                                        class="avatar-img rounded-circle">
                                    @endif
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{ Auth::user()->username }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    @if (Auth::user()->foto != '')
                                                    <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt=""
                                                    class="avatar-img rounded">
                                                @else
                                                    <img src="{{ asset('img/profil-kosong.jpg') }}" alt="" 
                                                    class="avatar-img rounded">
                                                @endif
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->username }}</h4>
                                                    <p class="text-muted">{{ Auth::user()->phone }}</p>
                                                    <a href=""
                                                        class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/logout">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>



            {{-- ======= Dashboard ========= --}}
            <div class="container">
                @yield('content')
            </div>
            {{-- ======= End Dashboard ========= --}}

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link"> Help </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"> Licenses </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="">Brian Saputra</a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End Custom template -->
    </div>

    {{-- Sweet Alerts --}}
    @include('sweetalert::alert')
    <!--   Core JS Files   -->
    <script src="{{('https://code.jquery.com/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
</body>

</html>
