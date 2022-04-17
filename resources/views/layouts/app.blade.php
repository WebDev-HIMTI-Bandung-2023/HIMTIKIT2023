<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script type="module" src="/pwabuilder-sw-register.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HIMTI Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/cssua.min.js') }}"></script>
    <script>
        function adjustDate(element) {
            // Localize date and time
            var eventDate = document.getElementById(element);
            var date = new Date(Date.parse(eventDate.textContent + "Z"));

            eventDate.textContent = date.toLocaleString();
        }
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('fonts/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body class="sidebar-toggled">
    {{-- Top Bar --}}
    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow sticky-top"
        style="background-color: #7C99AC !important; color:#000000!important">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars" id="IconBar"></i>
        </button>
        <h3 class="WelcomeText">Welcome to HIMTI KIT,</h3>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            @if (Session::get('NIM') == null)
                <li class="nav-item">
                    <a class="nav-link" hbody class="sidebar-toggled" ref="/login">Login</a>
                </li>
            @else
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white small">{{ Session::get('Name') }}</span>
                        <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        {{-- <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div> --}}
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            @endif

        </ul>

    </nav>
    {{-- Top Bar End --}}
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/HIMTI.svg') }}" alt="" width="50px">
                </div>
                <div class="sidebar-brand-text mx-3">HIMTI</div>
            </a> --}}
            <div>
                <div class="card mx-auto CardWelcome my-2" style="width: 90%;">
                    <div class="card-body">
                        <h6 class="card-title">Hello, {{ Session::get('Name') }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{ Session::get('NIM') }}</h6>
                    </div>
                </div>
            </div>
            <style>


            </style>
            @if (Session::get('ListModule') != null || Session::get('isAdmin') != null)
                @foreach (Session::get('ListModule') as $module)
                    <li class="ListItem nav-item">
                        <div class="@if (session()->get('activemenu') == $module->ModuleName) active @endif">
                            <a class="nav-link" href="{{ $module->ModuleLink }}">
                                <i class="fas fa-fw fa-calendar"></i>
                                <span class="fw-bold">{{ $module->ModuleName }}</span></a>
                        </div>
                    </li>
                @endforeach
                @if (Session::get('isAdmin') == 'True')
                    <li class="nav-item ListItem">
                        <div class="@if (session()->get('activemenu') == 'Admin') active @endif">
                            <a class="nav-link" href="/admin">
                                <i class="fas fa-fw fa-calendar"></i>
                                <span class="fw-bold">Admin</span></a>
                        </div>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/calendar">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>No Module</span></a>
                </li>
            @endif
        </ul>
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container mt-5">@yield('content')</div>

            </div>
        </div>
        <!-- End of Content Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form id="logout-form" action="/Logout" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('fonts/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('fonts/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('fonts/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('fonts/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
