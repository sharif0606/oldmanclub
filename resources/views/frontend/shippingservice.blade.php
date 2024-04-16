@extends('frontend.layouts.app')
@section('title','Shipping Service')
@section('content')
    <div class="shipping container mt-5">
        <div class="row">
                <div class="col-md-6">
                    <h1 class="fw-bold py-2">{{$heading?->text_large}}</h1>
                    <p class="fw-normal pt-1 pb-3">{{$heading?->text_small}}</p>
                    <a href="{{route('contact_create')}}" class="btn contact-btn me-3 text-uppercase">Contact Us</a>
                    <a href="#" class="btn learn-more-btn text-uppercase">Learn More</a>
                </div>
                <div class="col-md-6">
                     <img width="400px" height="450px" class="ms-3 shipping-head-img" src="{{asset('public/uploads/shipping/'.$heading?->header_image)}}" alt="Shipping Image">
                </div>
           
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{asset('public/frontend/shippinservice/Sponsor.png')}}" alt="dfsdafdsaf">
            </div>
        </div>
    </div>
    <hr>
    <section class="shipping service-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="pb-3">HOW IT'S WORK</h2>
                    <div class="row pt-4">
                    @foreach($service as $value)
                        <div class="col-md-4 service-item">
                        <img width="50px" src="{{asset('public/uploads/shipping/'.$value->service_image)}}" alt="">
                            <i class={{$value->service_icon}}></i>
                            <h4 class="service-title py-2">{{$value->id}}. {{$value->service_title}}Get a Business Address</h4>
                            <p class="service-content pt-2"> {{$value->service_description}}
                            
                            </p>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
        
    {{-- <section class="shipping shipping-section">
        <div class="shipping container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row shipping-row">
                        <div class="col-md-3">
                            <label for="shipping_from" class="d-block fw-medium">Shipping From:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="input-group-text fa fa-truck"></i>
                                </div>
                                <select name="shipping_from" id="shipping_from" class="d-block form-select form-select-lg">
                                    <option value="1">Address 1</option>
                                    <option value="2">Address 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="delivery_to" class="d-block fw-medium">Delivery To:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="input-group-text fas fa-map-marker-alt"></i>
                                </div>
                                <select name="delivery_to" id="delivery_to" class="d-block form-select form-select-lg">
                                    <option value="1">Address 2</option>
                                    <option value="2">Address 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="weight" class="d-block fw-medium">Package Weight:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="input-group-text fas fa-weight"></i>
                                </div>
                                <input type="text" name="weight" id="weight" class="d-block form-control form-select-lg">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class=" btn btn-primary get-rate-btn">Get My Rate</button>
                        </div>
                    </div>
                    <div class="row shipping-row">
                        <div class="offset-md-3 col-md-3">
                            <label for="state" class="d-block fw-medium">State:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="input-group-text fas fa-map"></i>
                                </div>
                                <select name="state" id="state" class="d-block form-select form-select-lg">
                                    <option value="1">New York</option>
                                    <option value="2">Michigan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    --}}
    <section class="shipping why-choose-us">
        <div class="shipping container">
            <div class="row">
                 <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="video-container embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                        src="https://www.youtube.com/embed/{{$choice?->video_link}}"
                                frameborder="0"
                                allowfullscreen
                        ></iframe>
                    </div>
                 </div>
                 <div class="col-md-5 col-sm-5 col-xs-5 offset-xs-4 benefits">
                    <h2>WHY CHOICE US</h2>
                    <ol class="py-2">
                        @foreach($featureList as $list)
                        <li class="">{{$list}}</li>
                        @endforeach
                    </ol>
                 </div>
            </div>
        </div>
    </section>

    
    <div class="shipping container help mb-2">
        <div class="row">
            <div class="col-md-12 help-content text-center">
                <div class="col-md-2">
                    <img src="{{asset('public/frontend/shippinservice/shape.png')}}" alt="shape" class="shape" width="150px">
                </div>
                <div class="col-md-10 help-text">
                    <h2>CAN I HELP?</h2>
                <p>Our Team is waiting to hear from you.</p>
                <a href="{{ route('contact_create') }}" class="btn btn-info btn-contact fw-medium text-uppercase">Contact With Us</a>
                </div> 
            </div>
        </div>
    </div>
@endsection