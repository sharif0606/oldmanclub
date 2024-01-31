<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',env('APP_NAME')) </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/frontend_logo.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/frontend/assets/styles.css')}}">
    @stack('styles')
    
</head>
<body>
    <!-- header start-->
    <div class="col-md-12">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-white">
                <div class="container">
                    <img src="{{asset('public/uploads/setting/'.$setting?->header_logo)}}" alt="Logo" class="logo">
                    <h4 class="text company">{{$setting?->company_name}}</h4>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a href="{{route('frontend')}}" class="nav-link">Home</a></li>
                            
                            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
                            <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Service</a>
                                <ul class="dropdown-menu" id="service-dropdown">
                                    <li class="m-0 p-0"><a class="dropdown-item" href="{{route('shippingservice')}}">Product Shipping</a></li>
                                    <li class="m-0 p-0"><a class="dropdown-item" href="{{route('nfccard')}}">NFC Card</a></li>
                                    <li class="m-0 p-0"><a class="dropdown-item" href="{{route('printservice')}}">Printing Service</a></li>
                                    <li class="m-0 p-0"><a class="dropdown-item" href="{{route('smartmailservice')}}">Smart Mail Service</a></li>
                                    <li class="m-0 p-0"><a class="dropdown-item" href="{{route('llcservice')}}">LLC Service</a></li>
                                    <li class="m-0 p-0"><a class="dropdown-item" href="{{route('phoneservice')}}">Phone Service</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">Testimonials</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
                        </ul>
                        <div class="navbar-right">
                            <a href="{{route('clientlogin')}}" class="btn btn-link ps-0">Sign In</a>
                            <a href="{{route('clientregister')}}" class="btn btn-outline-warning rounded-pill px-4 py-1 m-0 sign-up-btn">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- header end-->
    @yield('content')

    <!-- Footer section start-->
    <footer class="footer">
        <div class="container">
            <div class="col-md-3 footer-column">
                <!-- 1st Column -->
                <img src="{{asset('public/uploads/setting/'.$setting?->footer_logo)}}" alt="Logo" class="logo">
                <p>{{$setting?->footer_text}}</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-light rounded-circle me-2" href="{{$setting?->twitter_icon}}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-light rounded-circle me-2" href="{{$setting?->facebook_icon}}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-light rounded-circle me-2" href="{{$setting?->instagram_icon}}"><i  class="fa-brands fa-square-instagram"></i></a>
                    <a class="btn btn-square btn-light rounded-circle me-2" href="{{$setting?->linkedln_icon}}"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-md-3 footer-column">
                <!-- 2nd Column -->
                <h3 class="footer-heading">Product</h3>
                <ul class="footer-links">
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Server</a></li>
                    <li><a href="#">Countries</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <div class="col-md-3 footer-column">
                <!-- 3rd Column -->
                <h3 class="footer-heading">Engage</h3>
                <ul class="footer-links">
                    <li><a href="#">Old Club Man</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Tutorials</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>

            <div class="col-md-3 footer-column">
                <!-- 4th Column -->
                <h3 class="footer-heading">Earn Money</h3>
                <ul class="footer-links">
                    <li><a href="#">Affiliate</a></li>
                    <li><a href="#">Become a Partner</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer section start-->
  
   

        
   <!-- Add jQuery before Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- Slick Carousel script -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.testimonial-slider').slick({
               infinite: true,
                slidesToShow: 3,
                slidesToScroll: 2,
                arrows: true,
                dots: true,
            //    autoplay: true,
              autoplaySpeed: 2000,
              responsive:[
                {
                    breakpoint:600,
                    settings:{
                        slidesToShow:1,
                        slidesToScroll:2
                    }
                },
                {
                    breakpoint:768,
                    settings:{
                        slidesToShow:1,
                        slidesToScroll:2
                    }
                }
              ]
            });
            $('.hero-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                // autoplay: true,
                // autoplaySpeed: 2000,
            });
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</html>
