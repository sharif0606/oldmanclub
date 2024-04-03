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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/frontend/assets/styles.css')}}">
    @stack('styles')
</head>
<body @yield('body-attr')>
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
                            
                            {{-- <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li> --}}
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

                            {{-- <li class="nav-item"><a href="#" class="nav-link">Testimonials</a></li> --}}
                            <li class="nav-item"><a href="{{route("contact_create")}}" class="nav-link">Contact Us</a></li>

                            {{-- <li class="nav-item"><a href="#" class="nav-link">Testimonials</a></li> --}}
                            {{-- <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li> --}}

                        </ul>
                        <div class="navbar-right">
                            <a href="{{route('clientlogin')}}" class="btn btn-link ps-0">Sign In</a>
                            <a href="{{route('clientregister')}}" class="btn btn-outline-warning rounded-pill px-4 py-1 m-0 sign-up-btn">Sign Up</a>
                            <a href="{{route('cart_page')}}" class="cart-nav border-0 bg-transparent mx-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.87778 2.51099L2.77634 2.50038C2.40716 2.48688 2.07562 2.74796 2.01087 3.12209L2.00026 3.22354C1.98676 3.59272 2.24784 3.92426 2.62197 3.98901L4.13098 4.25L5.04551 15.1457L5.06443 15.3095C5.24843 16.5519 6.31708 17.486 7.58988 17.486H18.5019L18.6662 17.4808C19.8626 17.4044 20.8545 16.4996 21.0291 15.2978L21.9781 8.73941L21.9945 8.58877C22.0819 7.38969 21.132 6.349 19.9089 6.349H5.81198L5.57725 3.54727L5.55956 3.43641C5.49112 3.14809 5.25673 2.92273 4.95778 2.87099L2.87778 2.51099ZM7.47394 15.9797C6.97867 15.9255 6.58258 15.5277 6.54028 15.0207L5.93798 7.849H19.9089L19.997 7.85548C20.3128 7.90242 20.5409 8.19769 20.4936 8.52465L19.5446 15.0826L19.5208 15.1998C19.4005 15.6584 18.985 15.986 18.5019 15.986H7.58988L7.47394 15.9797ZM5.90828 20.5853C5.90828 19.7492 6.58595 19.0703 7.42228 19.0703C8.25849 19.0703 8.93728 19.7491 8.93728 20.5853C8.93728 21.4216 8.25838 22.0993 7.42228 22.0993C6.58606 22.0993 5.90828 21.4215 5.90828 20.5853ZM17.1597 20.5853C17.1597 19.7491 17.8385 19.0703 18.6747 19.0703C19.5109 19.0703 20.1897 19.7491 20.1897 20.5853C20.1897 21.4216 19.5108 22.0993 18.6747 22.0993C17.8386 22.0993 17.1597 21.4216 17.1597 20.5853ZM17.6484 10.795C17.6484 10.3808 17.3126 10.045 16.8984 10.045H14.1254L14.0236 10.0518C13.6575 10.1015 13.3754 10.4153 13.3754 10.795C13.3754 11.2092 13.7112 11.545 14.1254 11.545H16.8984L17.0001 11.5382C17.3662 11.4885 17.6484 11.1747 17.6484 10.795Z"
                                    fill="#35343E"></path>
                            </svg>
                                <span class="badge bg-primary">{{ count((array) session('cart')) }}</span>
                                <span class="visually-hidden">Items Added</span>
                            </a>
                            <!-- <a href="#" class="btn btn-lg px-4 py-1 mx-1 sign-up-btn"><i class="fa-solid fa-cart-plus"></i></a> -->
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
                <h3 class="footer-heading">PRODUCT</h3>
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
                <h3 class="footer-heading">ENGAGE</h3>
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
                <h3 class="footer-heading">EARN MONEY</h3>
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
