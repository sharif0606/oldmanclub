@extends('frontend.layouts.app')
@section('title','Phone Service')
@section('content')
    <!-- phone hero start -->
    
    <section class="phn-hero">
        <img src="{{asset('public/uploads/phoneservice/'.$phonehero?->background_image)}}" alt="" class="phn-hero-image">
        <div class="phn-hero-text">
            <h2 class="fw-bold fs-1 text-uppercase">{{$phonehero?->text_large}}</h2>
            <p class="py-3 fw-medium">{{$phonehero?->text_small}}</p>
            <div class="phn-hero-content mt-4">
                <div class="row">
                    <div class="col-md-8">
                        <form action="#">                      
                            <div class="phn-search-box mb-3">
                                    <span class="phn-search-icon">&#128269;</span>
                                    <input type="text" class="form-control py-3 px-5" placeholder="Enter Country & City">
                                    <span class="phn-arrow-icon">&#10148;</span>
                            </div>   
                        </form>
                    </div>
                    <div class="col-md-4">
                        <button class="btn phn-search-btn fw-medium mx-3 py-3 px-5">Search</button>
                    </div>
                </div>
                <div class="row">
                     <div class="text-center col-12">
                         <p> ${{$phonehero?->price}} Per Month</p>
                     </div> 
                </div>
            </div>
        </div>
    </section>
    <section class="phn-our-service">
        <div class="container">
            <div class="row">
                <div class="col-md-5 phn-our-service-text">
                    <h2 class="text-uppercase">{{$phoneservice?->text_heading}}</h2>
                    <p class="text-start py-2 fw-medium">{{$phoneservice?->text_small}}</p>
                    <button class="btn phn-pricing-btn fw-medium mb-3 px-5 py-2">Pricing</button>
                </div>
                <div class="col-md-7 phn-our-service-image text-center">
                    <img src="{{asset('public/uploads/phoneservice/'.$phoneservice?->image)}}" alt="service-image" class="h-100">
                </div>
            </div>
        </div>
    </section>
    <!-- phone service end -->
    <!-- virtual maps start -->
    <section class="our-coverage">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2 class="fw-bold text-uppercase">{{$phonemaps?->text_large}}</h2>
                    <p class="py-2 fw-medium">{{$phonemaps?->text_small}}</p>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                     <img src="{{asset('public/uploads/phoneservice/'.$phonemaps?->image)}}" alt="our-coverage" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <!-- virtual maps end -->
   
    <!-- customre feedback start -->
    <section class="phn-our-customer py-5">
        <h2 class="fw-bold text-center py-4 text-uppercase">Trusted by millions of customers worldwide</h2>
        <div class="container phn">
            <div class="row">
                <div class="phn-testimonial-slider-container">
                     <div class="phn-testimonial-slider">
                        @foreach($phonefeedback as $feedback)
                        <div class="phn-custom-card phn-testimonial-item col-md-4">
                            <div class="phn-card-body">
                                <div class="customer-review">
                                    <p>{{$feedback?->customer_message}}.</p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="customer-image">
                                            @if($feedback->client->image)
                                                <img src="{{asset('public/uploads/client/'.$feedback?->client?->image)}}"  alt="Customer 1" class="rounded-circle img-fluid">
                                            @else
                                                <img class="avatar-img rounded-circle border border-white border-3" src="{{asset('public/images/download.jpg')}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                   <div class="col-md-9">
                                        <div class="customer-details">
                                            <h4>{{$feedback?->client?->fname}}
                                                {{$feedback?->client?->middle_name}}
                                            </h4>
                                            <div class="phn-star-rating">
                                                <span class="phn-star">&#9733;</span>
                                                <span class="phn-star">&#9733;</span>
                                                <span class="phn-star">&#9733;</span>
                                                <span class="phn-star">&#9733;</span>
                                                <span class="phn-star">&#9733;</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="slick-prev">Previous</button>
                        <button type="button" class="slick-next">Next</button>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <!-- customre feedback end -->
     <div class="container phn-subscribe-section mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="phn-subscribe-content text-start">
                    <h2 class="subscribe-heading text-uppercase fw-bold">Subscribe for Updates</h2>
                    <p class="subscribe-text">Stay informed about our latest news and updates. Subscribe now!</p>
                </div>
            </div>
            <div class="col-md-6 phn-subscribe-btn text-start">
                <a href="{{ route('contact_create') }}" class="btn btn-primary phn-contact-us-btn px-5 py-2 text-uppercase">Contact Us</a>
            </div>
        </div>
     </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
    $('.phn-testimonial-slider').slick({
      infinite: true,
      slidesToShow: 3, 
    //slidesToScroll: 1,
      arrows: false,
      dots: false,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
         {
            breakpoint: 992,
            settings: {
               slidesToShow: 2, 
               slidesToScroll: 1,
            },
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 2,
            },
         },
         {
            breakpoint: 768,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 2,
            },
         },
      ],
   });
});
   </script>
@endpush