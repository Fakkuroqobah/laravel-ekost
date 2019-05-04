<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kos'E - Pemilik</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('css/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

</head>

<body>

    {{-- alert --}}
    @include('partials.alert')
    
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Kos'E</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3>{{-- /.menu-title --}}
                    <li>
                        <a href="{{ route('dash.pemilik') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ route('get.kos') }}"> <i class="menu-icon fa fa-plus-square"></i>Tambah Kosan </a>
                    </li>
                    <li>
                        <a href="{{ route('pesan.kos') }}"> <i class="menu-icon fa fa-envelope"></i>Pesan </a>
                    </li>
                    <li>
                        <a href="{{ route('get.booking.kos') }}"> <i class="menu-icon fa fa-bed"></i>Booking </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                    </li>
                </ul>
            </div>{{-- /.navbar-collapse --}}
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        {{-- Header--}}
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    {{-- <div class="header-left">
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="col-sm-5">
                    <div class="float-right" style="margin-top: 7px;">
                        {{ Auth::guard('pemilik-kos')->user()->nama }}
                    </div>
                </div>
            </div>

        </header>
        {{-- Header--}}

        <div class="content">

            @yield('content')

            @include('partials.alert')

        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    @yield('script')

</body>

</html>
