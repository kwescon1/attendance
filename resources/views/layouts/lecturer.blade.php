<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lecturers | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">

</head>

<body>

    <div class="dashboard-main-wrapper">

        <!-- navbar -->
      <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Smart Attendance</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    @if(Auth::check())
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }} </h5>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-unlock mr-2"></i>Logout</a>
                                    @endif

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end of navbar -->


        <!-- left panel of the dashboard -->

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ url('/dashboard') }}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">Dashboard <span class="badge badge-success">6</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" ><i class="fas fa-user-circle" aria-controls="submenu-2"></i>Students </a>
                                    <div id="submenu-2" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                 <a class="nav-link" href="{{ url( '/dashboard/registeredstudents' ) }}">Registered Students</a>
                                        </li>
                                     </ul>
                                  </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" ><i class="fas fa-qrcode" aria-controls="submenu-2"></i>QR Codes </a>
                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route( 'showQrcode' ) }}">Generate</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route( 'qrcodes.list' ) }}">List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>

                            </li>
                        </ul>
                    </div>



                </nav>
            </div>
        </div>
        <!-- end of left panel -->

        <!-- wrapper -->
           <div class="dashboard-wrapper">

           <div class="dashboard-ecommerce">
                @yield('body')
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                             Copyright © 2019 All rights reserved.
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>

    </div>
        <!-- end of wrapper -->





<!-- Bootstrap core JavaScript
================================================== -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}"></script>

    @yield('js')

</body>
</html>
