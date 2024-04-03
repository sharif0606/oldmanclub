<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>@yield('title',env('APP_NAME')) </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/frontend_logo.png')}}">
        <link rel="stylesheet" href="{{asset('public/vendor/owl-carousel/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
        <link href="{{asset('public/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('styles')
    </head>

    <body>

        <!--*******************
        Preloader start
    ********************-->
        <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
        <!--*******************
        Preloader end
    ********************-->


        <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
            Nav header start
        ***********************************-->
            <div class="nav-header">
                <a href="{{route('frontend')}}" class="brand-logo">
                    <img class="logo-abbr" style="max-width: 250px;" src="{{asset('public/assets/images/Group.png')}}"
                        alt="">
                    <!-- <img class="logo-abbr" src="./images/logo.png" alt=""> -->
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
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                                <div class="search_bar dropdown">
                                    <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                        <i class="mdi mdi-magnify"></i>
                                    </span>
                                    <div class="dropdown-menu p-0 m-0">
                                        <form>
                                            <input class="form-control" type="search" placeholder="Search"
                                                aria-label="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <ul class="navbar-nav header-right">
                                <li class="nav-item dropdown notification_dropdown">
                                    <a class="nav-link" href="{{route('admin_chat')}}" role="button">
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
                                        <a href="./app-profile.html" class="dropdown-item">
                                            <i class="icon-user"></i>
                                            <span class="ml-2">Profile </span>
                                        </a>
                                        <a href="./email-inbox.html" class="dropdown-item">
                                            <i class="icon-envelope-open"></i>
                                            <span class="ml-2">Inbox </span>
                                        </a>
                                        <a href="{{route('logOut')}}" class="dropdown-item">
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
            <div class="quixnav">
                <div class="quixnav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label first">Main Menu</li>
                        <li><a class="has-arrow" href="{{route('dashboard')}}" aria-expanded="false"><i
                                    class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon icon-settings"></i>
                                <span class="nav-text">Settings</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('user.index')}}">Admin</a></li>
                                <li><a href="{{route('role.index')}}">Role</a></li>
                                <li><a href="{{route('client.index')}}">User</a></li>
                                <li><a href="{{route('sms.index')}}">SMS Package Service</a></li>
                                <li><a href="{{route('mailbox.index')}}">Mail Package Service</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa-solid fa-truck-fast"></i>
                                <span class="nav-text">Shipping</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('shipping_list')}}">Shipping List</a></li>
                                <li><a href="{{route('shipstatus.index')}}">Shipping Status</a></li>
                                <li><a href="{{route('shiptrack.index')}}">Shipping Tracking</a></li>
                                <li><a href="{{route('comment_list')}}">Comment List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa-solid fa-address-card"></i>
                                <span class="nav-text">NFC</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('nfc-field.index')}}">NFC Field</a></li>
                                <li><a href="{{route('design_card.index')}}">Design Card</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa-solid fa-print"></i>
                                <span class="nav-text">Printing Service</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('print_service.index')}}">Printing Service List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('order_list')}}" aria-expanded="false">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="nav-text">Order List</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('contact_list')}}" aria-expanded="false">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="nav-text">Contact List</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('company_list')}}" aria-expanded="false">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="nav-text">Company List</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('bank_list')}}" aria-expanded="false">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="nav-text">Bank List</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('post_list')}}" aria-expanded="false">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="nav-text">Post List</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-globe"></i>
                                <span class="nav-text">Website</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="has-arrow" href="javascript:void()">
                                    <i class="fa fa-home"></i> Home</a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('setting.index')}}">Settings</a></li>
                                        <li><a href="{{route('slider.index')}}">Slider</a></li>
                                        <li><a href="{{route('ourservice.index')}}">Our Service</a></li>
                                        <li><a href="{{route('homepage.index')}}">Home Page</a></li>
                                        <li><a href="{{route('cus_feedback.index')}}">Customer Feedback</a></li>
                                        <li><a href="{{route('globalnetwork.index')}}">Global Network</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                        <span class="nav-text">NFC</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('nfccard.index')}}">NFC Business Card</a></li>
                                        <li><a href="{{route('nfcpricesection.index')}}">NFC Price Section</a></li>
                                        <li><a href="{{route('nfccardprice.index')}}">NFC Card Price</a></li>
                                        <li><a href="{{route('subscribesection.index')}}">NFC Subscribe</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                        <span class="nav-text">Shipping Service</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('shippingheader.index')}}">Header Section</a></li>
                                        <li><a href="{{route('shippingservice.index')}}">Service Section</a></li>
                                        <li><a href="{{route('shippingchoice.index')}}">Choice Section</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                        <span class="nav-text">LLC Service</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('llchero.index')}}">Hero Section</a></li>
                                        <li><a href="{{route('llcservice.index')}}">LLC Service</a></li>
                                        <li><a href="{{route('llcpricing.index')}}">LLC Pricing</a></li>
                                        <li><a href="{{route('llccard.index')}}">LLC Card</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                        <span class="nav-text">Phone Number Service</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('phonehero.index')}}">Hero Section</a></li>
                                        <li><a href="{{route('phoneservice.index')}}">Service Section</a></li>
                                        <li><a href="{{route('phonemaps.index')}}">Virtual Maps Section</a></li>
                                        <li><a href="{{route('phonefeedback.index')}}">Customer Feedback</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                        <span class="nav-text">Printing Service</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('printhero.index')}}">Hero Section</a></li>
                                        <li><a href="{{route('printvideo.index')}}">Video Section</a></li>
                                        <li><a href="{{route('printcard.index')}}">Card image Section</a></li>
                                        <li><a href="{{route('printcus_feedback.index')}}">Customer Feedback</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                        <i class="fa fa-globe"></i>
                                        <span class="nav-text">Smart Mail Service</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{route('smartmailhero.index')}}">Hero Section</a></li>
                                        <li><a href="{{route('smartwork.index')}}">Smart Work Section</a></li>
                                        <li><a href="{{route('smartsms.index')}}">Smart SMS Service</a></li>
                                        <li><a href="{{route('smartphonebook.index')}}">Smart PhoneBook Service</a></li>
                                    </ul>
                                </li>
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
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>@yield('title')</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">@yield('page')</a></li>
                            </ol>
                        </div>
                    </div>
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
                    <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Muktodhara Technology
                        Ltd</a>{{ date('Y') }}</p>
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
        <script src="{{asset('public/vendor/global/global.min.js')}}"></script>
        <script src="{{asset('public/js/quixnav-init.js')}}"></script>
        <script src="{{asset('public/js/custom.min.js')}}"></script>


        <!-- Vectormap -->
        <script src="{{asset('public/vendor/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('public/vendor/morris/morris.min.js')}}"></script>


        <script src="{{asset('public/vendor/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{asset('public/vendor/chart.js/Chart.bundle.min.js')}}"></script>

        <script src="{{asset('public/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

        <!--  flot-chart js -->
        <script src="{{asset('public/vendor/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('public/vendor/flot/jquery.flot.resize.js')}}"></script>

        <!-- Owl Carousel -->
        <script src="{{asset('public/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
        <!-- Counter Up -->
        <script src="{{asset('public/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('public/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
        <script src="{{asset('public/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('public/js/dashboard/dashboard-1.js')}}"></script>
        @stack('scripts')
        <!-- Init JavaScript -->
        <script src="{{asset('public/dist/js/init.js')}}"></script>
        
         <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>