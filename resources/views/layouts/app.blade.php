<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Complaint') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('dist/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('dist/jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Rubik:wght@300&display=swap" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/13427233db.js" crossorigin="anonymous"></script>
</head>
<body class="login_page_bng ">
    @if (Auth::check())
        <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
                    <a href="{{ route('home') }}" class="text-decoration-none ms-3"><h2 class="mb-0 text-dark">E-Complaint</h2></a>
                </div>

                <div>
                    <h4 class="m-auto">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h4>
                    <div class="d-flex justify-content-between">
                        <div class="m-auto me-2">
                            <img src="{{ asset(Auth::user()->GetAvatar()) }}" alt="" width="30px" height="30px" class="rounded-circle">
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <a href="{{ route('home') }}" class="text-decoration-none px-2"><h2 class="text-black text-center">e-Complaint</h2></a>

            <div class="d-flex justify-content-center my-3">
                <div style="width:240px;
                    height:240px;
                    background-image:url('{{ asset(Auth::user()->GetAvatar()) }}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;"
                    class="rounded-circle border border-primary"></div>
            </div>

            <div class="text-center">
                <h4 class="mb-4">Name: {{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h4>
            </div>
            @if (Auth::user()->HasRole())
                <div class="row">
                    <div class="col-12 navigate">
                        @if (Auth::user()->IsHelpDesk())
                            <a data-bs-toggle="collapse" href="#collapseHelpdesk" role="button" aria-expanded="{{ (Request::is('help-desk/*')) ? 'true': 'false' }}" aria-controls="collapseHelpdesk" class="h5 p-2 ps-3 mb-3 rounded nav {{ (Request::is('help-desk/*')) ? 'active': 'collapsed' }}">Help Desk</a>
                            <div id="collapseHelpdesk" class="mb-3 px-2 ps-5 collapse @if(Request::is('help-desk/*')) show @endif">
                                <a href="{{ route('helpdesk.dashboard') }}" class="d-block p-2 rounded nav-child @if(Request::is('help-desk/dashboard')) active @endif">Dashboard</a>
                                <a href="{{ route('helpdesk.complaints.index') }}" class="d-block p-2 rounded nav-child @if(Request::is('help-desk/complaints') || Request::is('help-desk/complaints/*')) active @endif">All Complaints</a>
                                <a href="{{ route('helpdesk.verified_complaints.index') }}" class="d-block p-2 rounded nav-child @if(Request::is('help-desk/verified-complaints') || Request::is('help-desk/verified-complaints/*')) active @endif">Ongoing Complaints</a>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 navigate">
                        @if (Auth::user()->IsExecutive())
                            <a href="{{ route('executive.dashboard') }}" class="h5 p-2 ps-3 mb-3 rounded nav @if(Request::is('executive/*')) active @endif">Executive</a>
                        @endif
                    </div>
                    <div class="col-12 navigate">
                        @if (Auth::user()->IsAdmin())
                            <a data-bs-toggle="collapse" href="#collapseAdmin" role="button" aria-expanded="{{ (Request::is('administrator/*')) ? 'true': 'false' }}" aria-controls="collapseAdmin" class="h5 p-2 ps-3 mb-3 rounded nav {{ (Request::is('administrator/*')) ? 'active': 'collapsed' }}">Administrator</a>
                            <div id="collapseAdmin" class="mb-3 px-2 ps-5 collapse @if(Request::is('administrator/*')) show @endif">
                                <a href="{{ route('users.index') }}" class="d-block p-2 rounded nav-child @if(Request::is('administrator/users') || Request::is('administrator/users/*')) active @endif">User Profile List</a>
                                <a href="{{ route('departments.index') }}" class="d-block p-2 rounded nav-child @if(Request::is('administrator/departments') || Request::is('administrator/departments/*')) active @endif">Department List</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    @endif

    <div id="main" class="py-4">
        @yield('content')
    </div>

    @if (Auth::check())
        <div>
            @include('layouts.footer')
        </div>
    @endif
</body>

</html>
