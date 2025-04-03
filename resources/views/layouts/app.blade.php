<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Oct 2023 12:36:23 GMT -->

<head>
    <meta charset="utf-8" />
    <title>AstraVue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('layout_assets') }}/images/favicon.ico">
    @include('layouts.header')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">



                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">

                            </div>
                        </div>


                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>



                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('images') }}/user/{{ Auth::user()->img }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">

                                        </span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                                <a class="dropdown-item" href="{{ route('user.profile', Auth::user()->id) }}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="index-2.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('asset/') }}/logo/AstraVue.png" alt="" height="75">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/') }}/dashbord-logo.png" alt="" height="35px">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        @role('admin')
                            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('home') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                                </a>
                            </li> <!-- end Dashboard Menu -->


                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('user.index') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> Customers
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('front.index') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> Home Pagee
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#user" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-product-hunt-line"></i> <span data-key="t-authentication">Product</span>
                                </a>
                                <div class="collapse menu-dropdown" id="user">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('category.index') }}" class="nav-link"
                                                data-key="t-calendar"> Category </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('sub_category.index') }}" class="nav-link"
                                                data-key="t-calendar"> Sub Category </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('product.index') }}" class="nav-link"
                                                data-key="t-calendar"> Product </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('blog.index') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> Blog Section
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#distributor" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-product-hunt-line"></i> <span
                                        data-key="t-authentication">Distributor</span>
                                </a>
                                <div class="collapse menu-dropdown" id="distributor">
                                    @role('admin')
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('distributor.index') }}" class="nav-link"
                                                    data-key="t-calendar"> Display Distributors </a>
                                            </li>
                                        </ul>
                                    @endrole
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('distributor.add') }}" class="nav-link"
                                                data-key="t-calendar"> Register Distributor </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('distributor.index') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> Distributor
                                </a>
                            </li> --}}
                        @endrole
                        @role('distributor', 'admin')
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#deviceInfo" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-product-hunt-line"></i> <span data-key="t-authentication">Device
                                        Information</span>
                                </a>
                                <div class="collapse menu-dropdown" id="deviceInfo">
                                    @role('admin')
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('device_info.product_index') }}" class="nav-link"
                                                    data-key="t-calendar"> Device Products </a>
                                            </li>
                                        </ul>
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('device_info.product_config_index') }}" class="nav-link"
                                                    data-key="t-calendar"> Device Configuration </a>
                                            </li>
                                        </ul>
                                    @endrole
                                    @role('distributor')
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('device_info.add') }}" class="nav-link"
                                                    data-key="t-calendar"> Register New Device </a>
                                            </li>
                                        </ul>
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('device_info.index') }}" class="nav-link"
                                                    data-key="t-calendar"> Registration History </a>
                                            </li>
                                        </ul>
                                    @endrole
                                </div>
                            </li>
                        @endrole
                        @role('admin')
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('about.index') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#contact" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-product-hunt-line"></i> <span data-key="t-authentication">Contact</span>
                                </a>
                                <div class="collapse menu-dropdown" id="contact">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('contact.index') }}" class="nav-link"
                                                data-key="t-calendar"> Contact Page </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('contact.comments') }}" class="nav-link"
                                                data-key="t-calendar"> Contact Comments </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('user.complain') }}" role="button"
                                    aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-account-circle-line"></i> Complaints Box
                                </a>
                            </li>
                        @endrole
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Gexton.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                <a href="https://gexton.com/">Design & Develop by Gexton Inc</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    <!-- JAVASCRIPT -->
    @include('layouts.footer')
</body>

</html>
