@extends('frontend.layouts.app')
@section('title','Printing Service')
@section('content')
<!-- printing service hero start -->
    <div class="container">
      <div class="row">
        <div class="col-md-12 print-hero-section">
          <div class="col-md-6 print-hero-content">
            <h1 class="fw-bold py-2">{{$printinghero?->text_large}}</h1>
            <p class="fw-normal pt-1 pb-3">{{$printinghero?->text_small}}
              
            </p>
            <a href="#" class="print-btn print-contact-btn me-3">Contact Us</a>
            <a href="#" class="print-btn print-learn-more-btn">Learn More</a>
          </div>
          <div class="col-md-6 print-hero-image">
            <img src="{{asset('public/uploads/printservice/'.$printinghero?->hero_image)}}" alt="Hero Image" />
          </div>
        </div>
      </div>
      <div class="row py-4">
        <div class="col-md-12">
          <h2 class="text-capitalize fw-bold text-center py-3">Trusted By</h2>
          <img src="assets/image/Sponsor.png" alt="" />
        </div>
      </div>
    </div>
    <hr />
<!-- printing service hero end -->
<!-- printing service choose start -->
    <section class="print-why-choose-us">
      <div class="container">
        <div class="row py-3">
          <div class="col-md-7 col-sm-12 px-2">
            <!-- Full-width on small devices -->
            <h2 class="fw-bold py-2">{{$printvideo?->text_large}}</h2>
            <p class="py-2">{{$printvideo?->text_small}}.
            </p>
          </div>
          <div class="col-md-5 col-sm-12">
            <!-- Full-width on small devices -->
            <div
              class="print-video-container embed-responsive embed-responsive-16by9"
            >
              <iframe
                class="embed-responsive-item"
                src="https://www.youtube.com/embed/{{$printvideo?->video_link}}"
                frameborder="0"
                allowfullscreen
              ></iframe>
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
          @foreach($printfeature as $feature)
          <div class="col-md-4 feature-item py-2">
            <img
              src="{{asset('public/uploads/printservice/'.$feature?->image)}}"
              alt="Feature-Image-1"
              width="90px"
            />
            <p class="print-feature-text pt-2">{{$feature?->title}}</p>
          </div>
          @endforeach
        </div>
      </div>
    </section>
<!-- printing service feature end -->
<!-- printing service product start -->
    <section class="print-product-section py-5">
      <div class="container-fluid">
        <div class="row py-3">
          <h3 class="product-heading text-capitalize fw-bold">
            Our Best Selling Products
          </h3>
          <p class="product-text">Explore our latest and greatest products.</p>

          <div class="print-product-cards py-3">
            <div class="print-product-card m-3 col-lg-3 col-md-6 col-sm-12">
              <img
                src="assets/image/product-1.jpg"
                alt="Product 1"
                class="print-product-image"
              />
              <h3 class="print-product-name">Product 1</h3>
              <p class="print-product-price">$29.99</p>
              <div class="print-product-review">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="print-product-card m-3 col-lg-3 col-md-6 col-sm-12">
              <img
                src="assets/image/product-2.jpg"
                alt="Product 2"
                class="print-product-image"
              />
              <h3 class="print-product-name">Product 2</h3>
              <p class="print-product-price">$39.99</p>
              <div class="print-product-review">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="print-product-card m-3 col-lg-3 col-md-6 col-sm-12">
              <img
                src="assets/image/product-3.jpg"
                alt="Product 3"
                class="print-product-image"
              />
              <h3 class="print-product-name">Product 3</h3>
              <p class="print-product-price">$49.99</p>
              <div class="print-product-review">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="print-product-card m-3 col-lg-3 col-md-6 col-sm-12">
              <img
                src="assets/image/product-4.jpg"
                alt="Product 4"
                class="print-product-image"
              />
              <h3 class="print-product-name">Product 4</h3>
              <p class="print-product-price">$59.99</p>
              <div class="print-product-review">⭐⭐⭐⭐⭐</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="print-product-section py-5">
      <div class="container-fluid">
        <div class="row py-3">
          <h3 class="product-heading text-capitalize fw-bold">
            Our Best Services
          </h3>
          <div class="print-product-cards py-3">
            @foreach($printservices as $value)
            <div class="print-product-card m-3 col-lg-3 col-md-6 col-sm-12">
                @foreach($value->printing_service_image as $v)
                    <div class="product-image-container">
                        <img width="100%" src="{{ asset('public/uploads/printimages/'.$v->image) }}" alt="">
                        <div class="hover-buttons d-flex">
                          
                           <a href="{{route('addto_cart', $value->id)}}"
                                    class=" btn btn-lg btn-info me-1"><i class="fa-solid fa-cart-plus"></i></a>
                            <!-- <button class="cart-button"><i class="fa-solid fa-cart-plus"></i></button> -->
                            <button class="btn btn-lg btn-warning wish-button"><i class="fa-regular fa-heart"></i></button>
                        </div>
                    </div>
                @endforeach
                <h3 class="print-product-name">{{$value->service_name}}</h3>
                <p class="print-product-price">${{$value->price}}</p>
                <div class="print-product-review">⭐⭐⭐⭐⭐</div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </section>
    
<!-- printing service product end -->
<!-- printing service feedback start -->
    <section class="our-customer pt-2 pb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="carousel-controls">
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#testimonialCarousel"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#testimonialCarousel"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <h2 class="text-center">Customer Reviews</h2>
            <p class="text-center">Some introductory text about customer reviews.</p>
          </div>
        </div>

        <div
          id="testimonialCarousel"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                @foreach($printfeedback as $feedback)
                <div class="print-custom-card testimonial-item col-md-4 me-1">
                  <div class="print-card-body">
                    <div class="customer-review">
                      <p>"{{$feedback?->customer_message}}"
                      </p>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-3">
                        <div class="customer-image">
                          <img src="{{asset('public/uploads/client/'.$feedback->client?->image)}}" class="img-fluid rounded-circle" alt="">
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="customer-details">
                          <h4>{{$feedback->client?->first_name_en}}  
                              {{$feedback->client?->middle_name_en}}  
                              {{$feedback->client?->last_name_en}}
                            </h4>
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
      </div>
    </section>
<!-- printing service feedback end -->
<!-- printing service subscribe start -->
    <div class="container print-subscribe-section mt-3">
      <div class="row">
        <div class="col-md-6">
          <div class="print-subscribe-content text-start">
            <h3 class="subscribe-heading fw-bold">
              Take action now to stay compliant. Grow your business without
              tension.
            </h3>
          </div>
        </div>
        <div class="col-md-6 print-subscribe-btn text-center">
          <a
            href="#"
            class="print-btn btn-primary print-contact-us-btn px-5 py-2"
            >Contact Us</a
          >
        </div>
      </div>
    </div>
<!-- printing service subscribe start --> 
@endsection
