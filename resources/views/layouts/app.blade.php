<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- <script type="module" src="/pwabuilder-sw-register.js"></script> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HIMTI Dashboard') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/cssua.min.js') }}"></script> --}}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('fonts/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="sidebar-toggled">
    {{-- Top Bar --}}
    <nav class="navbar navbar-expand navbar-light bg-white topbar shadow fixed-top"
        style="background-color: #014B7D !important; color:#FAFAFA!important">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars" id="IconBar"></i>
        </button>
        <div class="d-flex flex-column">
            <h3 class="WelcomeText m-0 fw-bold">Welcome to HIMTI KIT</h3>
            <p class="WelcomeText m-0">The perfect starter kit for your study in day-to-day basis</p>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            @if (Session::get('NIM') == null)
                <li class="nav-item">
                    <a class="nav-link" body class="sidebar-toggled" href="/login">
                        <button class="btn btn-primary bg-white text-black fw-bold">
                            <i class="fas fa-sign-in-alt fa-sm fa-fw"></i>
                            Log In
                        </button>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <button class="btn btn-primary bg-white text-black fw-bold">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                            Log Out
                        </button>
                    </a>
                </li>
            @endif

        </ul>

    </nav>
    {{-- Top Bar End --}}
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div>
                <div class="card mx-auto CardWelcome my-4" style="width: 90%;">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Hello, {{ Session::get('Name') }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{ Session::get('NIM') }}</h6>
                    </div>
                </div>
            </div>
            <style>


            </style>
            @if (Session::get('ListModule') != null || Session::get('isAdmin') != null)
                @foreach (Session::get('ListModule') as $module)
                    <li class="nav-item ListItem">
                        <div class="@if (session()->get('activemenu') == $module->ModuleName) active @endif">
                            <a class="nav-link d-flex gap-2 align-items-center" href="{{ $module->ModuleLink }}">
                                <i class="fas fa-fw fa-dice-d6"></i>
                                <span class="fw-bold">{{ $module->ModuleName }}</span></a>
                        </div>
                    </li>
                @endforeach
                @if (Session::get('isAdmin') == true)
                    <li class="nav-item ListItem">
                        <div class="@if (session()->get('activemenu') == 'Admin') active @endif">
                            <a class="nav-link d-flex gap-2 align-items-center" href="/admin">
                                <i class="fas fa-fw fa-tools"></i>
                                <span class="fw-bold">Manage Course</span></a>
                        </div>
                    </li>
                    <li class="nav-item ListItem">
                        <div class="@if (session()->get('activemenu') == 'AdminSoftware') active @endif">
                            <a class="nav-link d-flex gap-2 align-items-center" href="/adminsoftware">
                                <i class="fas fa-fw fa-tools"></i>
                                <span class="fw-bold">Manage Software</span></a>
                        </div>
                    </li>
                @endif
            @else
                <li class="nav-item ListItem">
                    <div>
                        <a class="nav-link d-flex gap-2 align-items-center" href="/admin">
                            <i class="fas fa-fw fa-calendar"></i>
                            <span class="fw-bold">No Module</span></a>
                    </div>
                </li>
            @endif
        </ul>
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <div id="content-wrapper" class="d-flex flex-column justify-content-between">

            <div class="container my-4">@yield('content')</div>

            <!-- Footer -->
            <footer class="footer-wrapper fixed-bottom">
                <span class="fw-bold">HIMTI KIT @2022</span>
            </footer>
            <!-- End of footer -->
        </div>
        <!-- End of Content Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog p-3 border-0" role="document"
                style="background-color: #015791; border-radius: 10px; width: 400px;">
                <div class="modal-content border-0" style="background-color: #015791">
                    <div class="modal-body border-0 pb-4" style="color: white" class="d-flex" style="text-center">
                        <div class="text-center h5">Are you sure want to Logout from this site?
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0" style="justify-content: center !important">
                        <button type="button" class="btn btn-secondary h3" data-dismiss="modal"
                            style="font-weight: 800; padding: 10px 20px; margin: 1vw; color: black; background-color: #E8F1F5; border-radius: 15px;">NO</button>
                        <form id="logout-form" action="/Logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary h3"
                                style="font-weight: 800; padding: 10px 20px; margin: 1vw; color: black; background-color: #E8F1F5; border-radius: 15px;">YES</button>
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

</body>

</html>
