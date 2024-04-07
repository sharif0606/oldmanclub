@extends('frontend.layouts.app')
@section('title','Old Club Man')
@section('content')

    <!-- Hero section start -->
    <div class="container-fluid hero-section">
        <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 hero-slider">
                @foreach($slider as $s)
                    <div class="slider-item-hero">
                        <div class="col-md-5 col-sm-6 slider-text">
                            <h2>{{$s->text_large}}</h2>
                            <p>{{$s->text_small}}</p>
                            <a href="{{$s->link}}" class="btn btn-warning px-5 py-2 mt-4">Get Started</a>
                        </div>
                        <div class="col-md-7 col-sm-6 slider-image d-none d-sm-block">
                                <img src="{{asset('public/uploads/slider/'.$s->image)}}" alt="Slider Image 1" class="img-fluid">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            
            <div class="container user-location">
                <div class="row">
                    <div class="col-md-6">
                        <section class="card-info mt-5">
                            <div class="card-group">
                                <div class="card">
                                    <img src="{{asset('public/images/icon/user.png')}}" class="mx-3 mt-3" width="50px" height="50px" alt="" srcset="">
                                    <p class="location"><b >90K+</b> <br>Users</p>
                                </div>
                                <div class="card">
                                <img src="{{asset('public/images/icon/location.png')}}" class="mx-3 mt-3" width="50px" height="50px" alt="" srcset="">
                                    <p class="location"><b >200+</b> <br> Locations</p>
                                </div>
                                <div class="card">
                                <img src="{{asset('public/images/icon/Server.png')}}" class="mx-3 mt-3" width="50px" height="50px" alt="" srcset="">
                                    <p class="location"><b class="fw-bolder">50+</b><br>Banks</p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero section end -->
     

    <!-- Our Service section start -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">                  
                <div class="our-service-details mt-5 text-center">
                    <h2>OUR SERVICE</h2>
                    <p class="px-5 mb-5">{{$homepage?->service_section_text}}
                        </p>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">  
                <div class="row gx-1 pt-2">
                    @forelse($services as $value)
                    <div class="col-md-4 mb-3">
                        <a href="{{$value->link}}" class="card-link service">
                            <div class="card fixed-size-card">
                                <img src="{{asset('public/uploads/ourservices/'.$value->image)}}" class="card-img-top" alt="Product Shipping Service">
                                <div class="card-body ">
                                    <p class="card-text text-decoration-none">
                                        {{$value->title}}    
                                    </p>
                                </div>
                            </div>
                        </a>                               
                    </div>
                    @empty
                    <h1>No Service Found</h1>
                    @endforelse
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary rounded-pill shadow-lg" style="background-color:#66298b;">Browse All Categories <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Service section end -->

    <!-- Special offer start -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="">SPECIAL OFFERS</h2>
                <p class="px-5">{{$homepage?->special_offer_text}}
                </p>
            </div>
            {{-- <div class="container"> --}}
                <div class="col-md-12">
                    <a href="">
                        <img src="{{asset('public/uploads/homepage/'.$homepage?->special_offer_image)}}" alt="" class="" width="100%" height="300px">
                    </a>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    <!-- Special offer end -->
    <!-- Global Network start -->
    <section class="global-network">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 py-5>HUGE GLOBAL NETWORK</h2>
                    <p class="">{{$homepage?->global_network_text}}
                    </p>
                    <img src="{{asset('public/uploads/homepage/'.$homepage?->global_network_image)}}" alt="Huge Global Network" class="w-100 img-fluid py-3">
                </div>
            </div>
            <div class="row">
                <img src="{{asset('public/frontend/assets/image/Sponsored.png')}}" alt="Sponsored" class="">
            </div>
        </div>
    </section>
    <!-- Global Network end -->
    <!-- Testimonial section starts -->
    <div class="container mb-5 happy">
        <div class="row gx-2">
            <div class="col-md-12 text-center">
                <section class="happy-customer">
                    <h2>TRUSTED BY THOUSANDS OF HAPPY CUSTOMER</h2>
                    <p>These are the stories our customers who have joined us with great pleasure when using this crazy feature.</p>
                    <div class="testimonial-slider">
                        <!-- Testimonial 1 -->
                        @foreach($feedback as $value)
                        <div class="col-sm-4">
                            <div class="card testimonial-item">
                                <div class="card-body h-100">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="customer-info">
                                                <img src="{{asset('public/uploads/client/'.$value->client?->image)}}" alt="Customer 1" class="rounded-circle" width="100px">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="customer-details">
                                                <p class="fw-bold">
                                                    {{$value->client?->fname}}  
                                                    {{$value->client?->middle_name}}  
                                                    {{$value->client?->last_name}}  
                                                </p>
                                                <p>
                                                    {{$value->client?->address_line_1}}
                                                </p>                                 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="rating">
                                                <span class="rating-number">{{$value->rate}}</span>
                                                {{-- <span class="star-icon">&#9733;</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer-review">
                                        <p>"{{$value->message}}"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="slick-prev">Previous</button>
                        <button type="button" class="slick-next">Next</button>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Testimonial section starts -->

    <!-- Subscribe section starts -->
    <section class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 text-start">
                                    <h5 class="card-title">SUBSCRIBE NOW TO GET SPECIAL OFFERS</h5>
                                    <p class="card-text">Stay with us and find the thrill.</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="#" class="btn btn-primary w-100 text-uppercase" style="background-color:#66298b;">Subscribe Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe section ends -->
@endsection