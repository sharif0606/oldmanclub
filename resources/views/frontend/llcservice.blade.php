@extends('frontend.layouts.app')
@section('title','Shipping Service')
@section('content')
      <!-- hero section start -->
      <section class="llc-hero">
            <img src="{{asset('public/uploads/llcservice/'.$llcherosection->background_image)}}" alt="" class="llc-hero-image">
        <div class="llc-hero-text">
            <h2 class="fw-bold fs-1">{{$llcherosection?->text_large}}</h2>
            <p class="py-3 fw-medium">{{$llcherosection?->text_small}}</p>
            <div class="llc-hero-content mt-4">
                <div class="row">
                    <div class="col-md-8">
                        <form action="#">                      
                            <div class="llc-search-box mb-3">
                                    <span class="llc-search-icon">&#128269;</span>
                                    <input type="text" class="form-control py-3 px-5" placeholder="Company Name Search">
                                    <span class="llc-arrow-icon">&#10148;</span>
                                </div>    
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="btn llc-register-btn fw-medium mx-3 px-5 py-1">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->
    <!-- service section start -->
    @foreach($llcservice as $llcserve)
    <section class="llc-service">
        <div class="container">
            
            <div class="row">
                <div class="col-md-4 llc-service-text">
                    <h2 class="py-2">{{$llcserve?->title}}</h2>
                    <ul>
                    
                        @if(is_array($llcserve?->feature_list))
                        
                            @foreach($llcserve?->feature_list as $feature)
                                <li class="py-2 fw-medium">{{$feature}}</li>
                            @endforeach
                        @else
                            <li class="py-2 fw-medium">{{$llcserve?->feature_list}}</li>
                        @endif
                        <!-- <li class="py-2 fw-medium">A Fully-Formed LLC</li>
                        <li class="py-2 fw-medium">Registred Agent service</li>
                        <li class="py-2 fw-medium">Business Address</li>
                        <li class="py-2 fw-medium">Bank Account and Cards</li>
                        <li class="py-2 fw-medium">Mail Forwarding</li>
                        <li class="py-2 fw-medium">Privacy by default</li>
                        <li class="py-2 fw-medium">Corporate Guide Service</li> -->
                    </ul>
                    <button class="btn llc-get-started-btn fw-medium mb-5 ms-3 px-5 py-2">Get Started</button>
                </div>
                <div class="col-md-8 llc-service-image">
                    <img src="{{asset('public/uploads/llcservice/'.$llcserve->image)}}" alt="" width="100%">
                </div>
                
            </div>
        </div>
    </section>

    <div class="container work-section">
        <div class="row">
            <div class="col-12">
                <h2 class="llc-work-heading text-center pb-5">How It's Work</h2>
                <div class="llc-video-container embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/{{$llcserve?->video_link}}"
                            frameborder="0"
                            allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- service section end -->
    
    <!-- pricing section start -->

    <div class="container llc-pricing-section">
        <div class="row text-center llc-pricing-content">
             <h2>We offer great price plans for the LLC</h2>
            <p class="py-2">Objectively market driven intellectual capital rather than covalent best practices facilitate strategic information before innovation.</p>
        </div>
        <div class="row">
            @foreach($llcpricing as $llcprice)
            <div class="col-md-3">
                <div class="llc-pricing-card mb-3">
                    <div class="card-body">
                        <h5>{{$llcprice?->llcpricing_plan}}</h5>
                        <h2>${{$llcprice?->llcprice}}</h2>
                        <p class="text-secondary">{{$llcprice?->llcpricing_package}} </p>
                        <hr>
                        <ul>
                            @if(is_array($llcprice?->llcpricingfeature_list))
                                @foreach($llcprice?->llcpricingfeature_list as $pricefeature)
                                <li class="fw-medium"><i class="fa-regular fa-circle-check me-2"></i>{{$pricefeature}}</li>
                                @endforeach
                            @else
                                <li class="fw-medium"><i class="fa-regular fa-circle-check me-2"></i>{{$llcprice?->llcpricingfeature_list}}</li>
                            @endif
                        </ul>
                        <button class="btn px-5 py-2">Buy Now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- pricing section end -->


    <!-- card section start -->
    <section class="llc-our-card">
        <div class="container">
            <div class="row">
                <div class="col-md-5 llc-our-card-text">
                    <h2 class="text-capitalize">{{$llccardsection?->text_large}}</h2>
                    <p class="text-start py-2 fw-medium">{{$llccardsection?->text_small}} </p>
                    <button class="btn llc-get-started-btn fw-medium mb-3 px-5 py-2">Get Started</button>
                </div>
                <div class="col-md-7 llc-our-card-image">
                    <img src="{{asset('public/uploads/llcservice/'.$llccardsection->image)}}" alt="card-image" class="h-100">
                </div>
            </div>
        </div>
    </section>

    <section class="llc-contact-us" style="background: url({{asset('public/frontend/llcservice/contact-image.png')}}) no-repeat;">
        <div class="llc-contact-us-content">
            <h2 class="fs-2">{{$llccardsection?->contact_text_large}}</h2>
            <p class="text-secondary ">{{$llccardsection?->contact_text_small}}</p>
            <button class="btn btn-info">Contact With Us</button>
        </div>
   </section>
   <!-- card section end -->
   
@endsection