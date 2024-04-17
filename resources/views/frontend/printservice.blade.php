@extends('frontend.layouts.app')
@section('title', 'Printing Service')
@section('content')
@push('styles')
<style>
/* Our Best Selling Products start*/
/* .animate-left {
    opacity: 0;
    transform: translateX(-100%);
    transition: opacity 1 ease-out, transform 0.7s ease-out;
}

.animate-right {
    opacity: 0;
    transform: translateX(100%);
    transition: opacity 1 ease-out, transform 0.7s ease-out;
}

.animate-left.show, .animate-right.show {
    opacity: 1;
    transform: translateX(0);
} */

.animate-left {
    animation: slideInLeft 0.7s ease-out;
}

.animate-right {
    animation: slideInRight 0.7s ease-out;
}

@keyframes slideInLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
/* Our Best Selling Products end*/
/* Our Best Services start */
@keyframes slideInFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInFromRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.animate-slide {
    animation-duration: 0.7s;
    animation-fill-mode: both;
}

@media (min-width: 768px) {
    /* Slide in from left for even-indexed cards */
    .print-product-card:nth-child(even).animate-slide {
        animation-name: slideInFromLeft;
    }

    /* Slide in from right for odd-indexed cards */
    .print-product-card:nth-child(odd).animate-slide {
        animation-name: slideInFromRight;
    }
}
/* Our Best Services end  */
.card {
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-10px);
}
</style>
@endpush
    <!-- printing service hero start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 print-hero-section">
                <div class="col-md-6  print-hero-content animate-right">
                    <h1 class="fw-bold py-2 text-uppercase">{{ $printinghero?->text_large }}</h1>
                    <p class="fw-normal pt-1 pb-3">{{ $printinghero?->text_small }}

                    </p>
                    <a href="{{ route('contact_create') }}" class="print-btn print-contact-btn me-3 text-uppercase">Contact Us</a>
                    <a href="#" class="print-btn print-learn-more-btn text-uppercase">Learn More</a>
                </div>
                <div class="col-md-6 print-hero-image animate-left">
                    <img src="{{ asset('public/uploads/printservice/' . $printinghero?->hero_image) }}" alt="Hero Image" />
                </div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-md-12">
                <h2 class="fw-bold text-center py-3 text-uppercase">Trusted By</h2>
                <img src="{{ asset('public/frontend/assets/image/Sponsored.png') }}" alt="" />
            </div>
        </div>
    </div>
    <hr />
    <!-- printing service hero end -->
    <!-- printing service choose start -->
    <section class="print-why-choose-us">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-7 col-sm-12 px-2 animate-right">
                    <!-- Full-width on small devices -->
                    <h2 class="fw-bold py-2 text-uppercase">{{ $printvideo?->text_large }}</h2>
                    <p class="py-2">{{ $printvideo?->text_small }}.
                    </p>
                </div>
                <div class="col-md-5 col-sm-12 animate-left">
                    <!-- Full-width on small devices -->
                    <div class="print-video-container embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/{{ $printvideo?->video_link }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- printing service choose end -->
    <!-- printing service feature start -->
    <section class="print-features">
        <div class="container">
            <div class="row">
                @foreach ($printfeature as $feature)
                    <div class="col-md-4 feature-item py-2">
                        <img src="{{ asset('public/uploads/printservice/' . $feature?->image) }}" alt="Feature-Image-1"
                            width="90px" />
                        <p class="print-feature-text pt-2">{{ $feature?->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- printing service feature end -->
    <!-- printing service product start -->
    <section class="print-product-section py-4">
        <div class="container-fluid">
            <div class="row py-3">
                <h3 class="product-heading  fw-bold text-uppercase">
                    Our Best Selling Products
                </h3>
                <p class="product-text">Explore our latest and greatest products.</p>

                <div class="print-product-cards py-3">
                    <div class="card print-product-card mx-1 mb-3 col-lg-3 col-md-6 col-sm-12 shadow animate-left">
                        <img src="{{ asset('public/frontend/assets/image/product-1.jpg') }}" alt="Product 1"
                            class="print-product-image" />
                        <h3 class="print-product-name">Product 1</h3>
                        <p class="print-product-price">$29.99</p>
                        <div class="print-product-review">⭐⭐⭐⭐⭐</div>
                    </div>

                    <div class="card print-product-card mx-1 mb-3 col-lg-3 col-md-6 col-sm-12 shadow animate-right">
                        <img src="{{ asset('public/frontend/assets/image/product-2.jpg') }}" alt="Product 2"
                            class="print-product-image" />
                        <h3 class="print-product-name">Product 2</h3>
                        <p class="print-product-price">$39.99</p>
                        <div class="print-product-review">⭐⭐⭐⭐⭐</div>
                    </div>

                    <div class="card print-product-card mx-1 mb-3 col-lg-3 col-md-6 col-sm-12 shadow animate-left">
                        <img src="{{ asset('public/frontend/assets/image/product-3.jpg') }}" alt="Product 3"
                            class="print-product-image" />
                        <h3 class="print-product-name">Product 3</h3>
                        <p class="print-product-price">$49.99</p>
                        <div class="print-product-review">⭐⭐⭐⭐⭐</div>
                    </div>

                    <div class="card print-product-card mx-1 mb-3 col-lg-3 col-md-6 col-sm-12 shadow animate-right">
                        <img src="{{ asset('public/frontend/assets/image/product-4.jpg') }}" alt="Product 4"
                            class="print-product-image" />
                        <h3 class="print-product-name">Product 4</h3>
                        <p class="print-product-price">$59.99</p>
                        <div class="print-product-review">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="print-product-section py-2">
        <div class="container-fluid">
            <div class="row py-3">
                <h3 class="product-heading text-uppercase fw-bold">
                    Our Best Services
                </h3>
                <div class="print-product-cards py-4">
                    @foreach ($printservices as $value)
                        <div class="card product-image-container print-product-card mx-1 mb-3 col-lg-3 col-md-6 col-sm-12 shadow animate-slide">
                            @foreach ($value->printing_service_image as $v)
                                @if ($v->is_featured)
                                    <img src="{{ asset('public/uploads/printimages/' . $v->image) }}" alt=""
                                        class="img-fluid w-100 h-75">
                                    <div class="hover-buttons d-flex">

                                        <a href="{{ route('addto_cart', $value->id) }}"
                                            class=" btn btn-lg btn-info me-1"><i class="fas fa-cart-plus"></i></a>
                                        <!-- <button class="cart-button"><i class="fa-solid fa-cart-plus"></i></button> -->
                                        {{-- <button class="btn btn-lg btn-warning wish-button"><i
                                                class="fa-regular fa-heart"></i></button> --}}
                                    </div>
                                @endif
                            @endforeach
                            <h3 class="print-product-name">{{ $value->service_name }}</h3>
                            <p class="print-product-price">${{ $value->price }}</p>
                            <!-- <div class="print-product-review">⭐⭐⭐⭐⭐</div> -->
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- printing service product end -->
    <!-- printing service feedback start -->
    <section class="our-customer pt-2">
         <div class="container mb-5 happy">
            <div class="row gx-2">
                    <section class="happy-customer">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center text-uppercase">Customer Reviews</h2>
                                <p class="text-center">Some introductory text about customer reviews.</p>
                            </div>
                        </div>
                        <div class="testimonial-slider">
                            <!-- Testimonial 1 -->
                            @foreach($printfeedback as $value)
                            <div class="col-md-4 col-sm-6">
                                <div class="card testimonial-item print-testimonial" style="background-color: #2F0549; color:#fff">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <img src="{{ asset('public/frontend/assets/image/quat.png') }}" alt="" width="25px" class="text-white">
                                        </div>
                                        {{-- <div class="row"> --}}
                                        <div class="customer-review">
                                            <p>"{{ $value?->customer_message }}"</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <div class="d-flex">
                                            <img src="{{asset('public/uploads/client/'.$value->client?->image)}}" alt="Customer 1" class="rounded-circle" width="70px" height="70px">
                                            <p class="fw-bold  text-center mx-auto mt-2">
                                                {{$value->client?->fname}}  
                                                {{$value->client?->middle_name}}  
                                                {{$value->client?->last_name}} <br>  
                                                <span class="rating-number ms-auto">{{$value->client?->designation}}</span>  
                                            </p>
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
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-uppercase">Customer Reviews</h2>
                    <p class="">Some introductory text about customer reviews.</p>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

           <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="container carousel-item active">
                        <div class="row">
                            @foreach ($printfeedback as $feedback)
                            <div class="print-custom-card testimonial-item col-md-4 rounded">
                                <div class="print-card-body">
                                    <div class="customer-review">
                                        <p>"{{ $feedback?->customer_message }}"</p>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="customer-image">
                                                <img src="{{ asset('public/uploads/client/' . $feedback->client?->image) }}" class="img-fluid rounded-circle" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="customer-details">
                                                <h4>{{ $feedback->client?->f_name }} {{ $feedback->client?->middle_name }} {{ $feedback->client?->last_name }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>

        </div> --}}
    </section>
    <!-- printing service feedback end -->
    <!-- printing service subscribe start -->
    <div class="container print-subscribe-section mb-4">
        <div class="row">
            <div class="col-md-8">
                {{-- <div class="print-subscribe-content text-start"> --}}
                    <h4 class="subscribe-heading  text-uppercase mt-4">
                        Take action now to stay compliant. Grow your business without
                        tension.
                    </h4>
                {{-- </div> --}}
            </div>
            <div class="col-md-4 print-subscribe-btn text-end">
                <a href="{{ route('contact_create') }}" class="print-btn btn-primary print-contact-us-btn px-5 text-uppercase">Contact Us</a>
            </div>
        </div>
    </div>
    <!-- printing service subscribe start -->
@endsection
@push('scripts')
<script>
    
   
</script>
@endpush

