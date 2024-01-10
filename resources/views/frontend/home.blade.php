@extends('frontend.layouts.app')
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
                        <div class="col-md-7 col-sm-6 slider-image">
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
                                    <i class="fas fa-users"></i>
                                    <p>90K+ <br> Users</p>
                                </div>
                                <div class="card">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>200+ <br> Locations</p>
                                </div>
                                <div class="card">
                                    <i class="fas fa-university"></i>
                                    <p>50+ <br> Banks</p>
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
                    <h2>Our Service</h2>
                    <p class="px-5 mb-5">{{$homepage?->service_section_text}}
                        </p>
                </div>
                    <div class="row pt-4">
                        @forelse($services as $value)
                        <div class="col-md-4 mb-4">
                            <a href="{{$value->link}}" class="card-link">
                                <div class="card fixed-size-card">
                                    <img src="{{asset('public/uploads/ourservices/'.$value->image)}}" class="card-img-top" alt="Product Shipping Service">
                                    <hr class="my-3">
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
    <div class="container mt-5 special-offers">
        <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="py-5">Special Offers</h2>
            <p class="px-5">{{$homepage?->special_offer_text}}
            </p>
        </div>
        <div class="container">
            <div class="col-md-12 credit-card">
                <a href="">
                    <img src="{{asset('public/uploads/homepage/'.$homepage?->special_offer_image)}}" alt="" class="w-100 img-fluid">
                </a>
            </div>
        </div>
        </div>
    </div>
    <!-- Special offer end -->

    <!-- Global Network start -->
    <section class="global-network">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 py-5>Huge Global Network</h2>
                    <p class="p-5">{{$homepage?->global_network_text}}
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
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <section class="happy-customer">
                    <h2>Trusted By Thousands of Happy Customer</h2>
                    <p>These are the stories our customers who have joined us with great pleasure when using this crazy feature.</p>
                    <div class="testimonial-slider">
                        <!-- Testimonial 1 -->
                        @foreach($feedback as $value)
                        <div class="card testimonial-item ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="customer-info">
                                            <img src="assets/image/customer-1.jpg" alt="Customer 1" class="rounded-circle customer-image" width="50px">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="customer-details">
                                            <h4>
                                                {{$value->client?->first_name_en}}  
                                                {{$value->client?->middle_name_en}}  
                                                {{$value->client?->last_name_en}}  
                                            </h4>
                                            <p>
                                                {{$value->client?->address_line_1}}
                                            </p>                                 
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="rating">
                                                <span class="rating-number">{{$value->rate}}</span>
                                                <span class="star-icon">&#9733;</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="customer-review">
                                    <p>"{{$value->message}}"</p>
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
                                    
                                    <h5 class="card-title">Subscribe Now To Get Special Offers </h5>
                                    <p class="card-text">Stay with us and find the thrill.</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    
                                    <a href="#" class="btn btn-primary">Subscribe Now</a>
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