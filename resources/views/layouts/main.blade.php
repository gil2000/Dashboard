<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Agricity</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/fontawesome/css/all.min.css') }}">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""></script>
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    @livewireStyles

</head>

<body>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo ">
                <a href="" class="app-brand-link">
                    <span class="app-brand-logo demo"></span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Agricity</span>
                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i style="color: white" class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">
                <!-- Apps & Pages -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Admin Core</span>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <i class="fa-solid fa-users fa-xl"></i>
                        <div class="m-2">Users</div>
                    </a>
                </li>

                <!-- Components -->
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
                <li class="menu-item">
                    <a href="{{ route('dashboard', 1) }}" class="menu-link">
                        <i class="fa-solid fa-square-poll-vertical fa-xl"></i>
                        <div class="m-2">Dashboard</div>
                    </a>
                </li>
                <!-- Components -->
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Parameters</span></li>
                <li class="menu-item">
                    <a href="{{ route('outdoortemperature') }}" class="menu-link">
                        <i class="fa-solid fa-temperature-three-quarters fa-xl"></i>
                        <div class="m-2">Outdoor Temperature</div>
                    </a>
                    <a href="{{ route('outdoorhumidity') }}" class="menu-link">
                        <i class="fa-solid fa-droplet fa-xl"></i>
                        <div class="m-2">Outdoor Humidity</div>
                    </a>
                    <a href="{{ route('precipitation') }}" class="menu-link">
                        <i class="fa-solid fa-cloud-rain fa-xl"></i>
                        <div class="m-2">Precipitation</div>
                    </a>
                    <a href="{{ route('barometricpressure') }}" class="menu-link">
                        <i class="fa-solid fa-gauge fa-xl"></i>
                        <div class="m-2">Barometric Pressure</div>
                    </a>
                    <a href="" class="menu-link">
                        <i class="fa-solid fa-faucet-drip fa-xl"></i>
                        <div class="m-2">Soil Humidity</div>
                    </a>
                    <a href="" class="menu-link">
                        <i class="fa-solid fa-temperature-three-quarters fa-xl"></i>
                        <div class="m-2">Soil Temperature</div>
                    </a>
                    <a href="" class="menu-link">
                        <i class="fa-solid fa-sun fa-xl"></i>
                        <div class="m-2">Sun Light UVI</div>
                    </a>
                    <a href="" class="menu-link">
                        <i class="fa-regular fa-sun fa-xl"></i>
                        <div class="m-2">Sun Light Visible</div>
                    </a>
                    <a href="" class="menu-link">
                        <i class="fa-solid fa-wind fa-xl"></i>
                        <div class="m-2">Wind Speed</div>
                    </a>
                    <a href="{{ route('winddirection') }}" class="menu-link">
                        <i class="fa-solid fa-location-arrow fa-xl"></i>
                        <div class="m-2">Wind Direction</div>
                    </a>
                </li>

            </ul>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="navbar navbar-expand bg-white">
                <div class="layout-menu-toggle navbar-nav mx-3 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                </div>
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    @if (Route::has('login'))
                        <div class="nav-link">
                            @auth
                                <a href="{{ route('user.profile') }}" class="">Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </ul>
            </nav>
            <!-- / Navbar -->
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-lg pt-5">
                    @include('partials.alerts')
                    @yield('content')
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->


<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('libs/fontawesome/js/all.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@livewireScripts
@stack('scripts')
@stack('scripts1')
</body>
</html>
