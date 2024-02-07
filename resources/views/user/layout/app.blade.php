<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', env('APP_NAME')) </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/frontend_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('public/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
    @stack('styles')
</head>

<body>

    <!--**********************************
        Main wrapper start
        ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" style="max-width: 250px;" src="{{ asset('public/assets/images/Group.png') }}"
                    alt="">
                <!-- <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt=""> -->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header pl-0">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <!-- <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('shipping.index') }}">Shipping</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('shipcomment.index') }}">comment</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="#">Link</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </nav> -->
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="{{ route('user_chat') }}" role="button">
                                    <!-- <i class="mdi mdi-bell"></i> -->
                                    <i class="icon-envelope"></i>
                                    <div class="pulse-css"></div>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('clientdashboard') }}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="{{ route('clientlogOut') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav usersidebar">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a class="has-arrow" href="{{ route('clientdashboard') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li>


                    <li><a class="has-arrow" href="{{ route('shipping.index') }}" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Shipping</span></a>
                    </li>
                    <li><a class="has-arrow" href="{{ route('phonebook.index') }}" aria-expanded="false">
                            <i class="icon-phone"></i><span class="nav-text">PhoneBook</span></a>
                    </li>
                    <li><a class="has-arrow" href="{{ route('phonebook.index') }}" aria-expanded="false">
                            <i class="icon-phone"></i><span class="nav-text">Phone-Group</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="{{ route('inbox') }}" aria-expanded="false">
                            <i class="icon-envelope"></i><span class="nav-text">E-mail</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">NFC</span></a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{ route('nfc_card.index') }}">NFC List</a></li>
                        </ul>
                    </li>


                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>@yield('title')</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">@yield('page')</a></li>
                            </ol>
                        </div>
                    </div> -->

                <!-- row -->
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('public/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('public/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('public/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('public/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('public/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('public/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('public/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('public/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('public/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('public/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('public/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('public/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('public/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('public/js/dashboard/dashboard-1.js') }}"></script>
    @stack('scripts')
    <!-- Init JavaScript -->
    <script src="{{ asset('public/dist/js/init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    {!! Toastr::message() !!}

</body>

</html>
