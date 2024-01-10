@extends('frontend.layouts.app')
@section('content')
<!-- Hero section -->
<div class="container-fluid heading">
        <div class="hero-text">
            <h1 class="hero-heading">{{$nfccardhero->header_text_large}}</h1>
            <p class="hero-description">{{$nfccardhero->header_text_small}}</p>
            <div class="hero-buttons">
                <a href="#" class="btn shop-card-btn">Shop Card</a>
                <a href="#" class="btn see-guide-btn">See Guide</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{asset('public/uploads/nfccard/'.$nfccardhero->header_image)}}" alt="NFC Business Card" class="card-image">
        </div>
    </div>

    <!-- Features Section -->
    <div class="container feature-section">
        <div class="row">
            <div class="col-12">
                <h2 class="feature-heading">Explore Our Features</h2>
                <div class="video-container embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                            src="{{$nfccardhero->video_link}}"
                            frameborder="0"
                            allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- What You Get section -->
    <div class="container what-you-get-section">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-heading">What You Get</h2>
                <ul class="feature-list text-start">
                    @foreach($lists as $list)
                    <li>{{$list}}</li>
                    @endforeach
                    <!-- <li>{{implode(',',$nfccardhero->feature_list)}}
                        NFC Enabled Smart Card</li>
                    <li>Customizable Online Digital Profile</li>
                    <li>NFC Chip</li>
                    <li>Unlimited Taps</li>
                    <li>Digital QR Code</li>
                    <li>Lead generation mode</li>
                    <li>Lifetime validity</li>  -->
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{asset('public/uploads/nfccard/'.$nfccardhero->feature_image)}}" alt="What You Get Image" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Pricing section -->
    <div class="container pricing-section">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-uppercase fw-bold">{{$nfcsection->text_large}}</h2>
                <p class="fw-medium mb-4">{{$nfcsection->text_small}}</p>
            </div>
        </div>
        <div class="row">
            @foreach($nfccardprice as $card)
            <div class="col-md-4 mt-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-start">{{$card->nfc_card_name}}</h5>
                        <h2 class="card-price text-start">${{$card->card_price}}</h2>
                        <p class="card-text text-start">{{$card->payment_type}}</p>
                        <h5 class="card-subtitle text-start mb-3">{{$card->card_title}}</h5>
                        <a href="#" class="btn btn-outline-primary">Buy Now</a>
                        <p class="fw-medium text-start mt-3 mb-3">What's included</p>
                        <ul class="text-start">
                            @if (is_array($card->card_feature_list))
                                @foreach($card->card_feature_list as $feature)
                                    <li>{{$feature}}</li>
                                @endforeach
                            @else
                                <li>{{$card->card_feature_list}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
         </div>
     </div>
    
    <!-- Subscribe Section -->
    <div class="container subscribe-section mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="subscribe-content text-start">
                    <h2 class="subscribe-heading text-uppercase fw-bold">{{$nfcsubscribe->text_large}}</h2>
                    <p class="subscribe-text">{{$nfcsubscribe->text_large}}</p>
                </div>
            </div>
            <div class="col-md-6 subscribe-btn text-center">
                <a href="#" class="btn btn-primary contact-us-btn px-5 py-2">Contact Us</a>
            </div>
        </div>
   </div>
@endsection