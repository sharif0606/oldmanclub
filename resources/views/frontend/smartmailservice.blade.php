@extends('frontend.layouts.app')
@section('title','Smart Mail Service')
@section('content')

    <section class="smart-mail-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-5">
                    <div class="left-content">
                        <h2 class="fw-bold text-uppercase pb-2">{{$smartmailhero?->text_large}} </h2>
                        <p class="fw-medium">{{$smartmailhero?->text_small}}</p>
                       <div class="row py-3">
                            <div class="col-md-7">
                                <form action="#">
                                <div class="smart-search-box mb-3">
                                    <input type="text" class="form-control py-3 px-5" placeholder="City, State & Address">
                                </div>
                        </form>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn smart-btn-claim-now py-3 px-4">Claim Now</button>
                            </div>
                       </div>
                    </div>
                </div>
                <div class="col-md-6 smart-mail-hero-image">
                    <img src="{{asset('public/uploads/smartmailservice/'.$smartmailhero?->image)}}" alt="Postman" class="w-100">
                </div>
            </div>
        </div>
    </section>


    <section class="mail-works py-5">
        <h2 class="text-center text-uppercase fw-bold py-5"> How does it work?</h2>
        <div class="container">
            <div class="row text-center">
                @foreach($smartworkservice as $smartwork)
                <div class="col-md-4 mail-content">
                    <div class="mail-image text-center">
                         <img src="{{asset('public/uploads/smartmailservice/'.$smartwork?->image)}}" alt="work-image-1" width="90px">
                    </div>
                    <div class="mail-text px-2">
                        <h3 class="py-2 text-center">{{$smartwork?->text_large}}</h3>
                        <p>{{$smartwork?->text_small}} </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

     <section class="sign-up my-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 sign-up-content text-center">
                    <div class="col-md-3 white-shape">
                        <img src="{{asset('public/frontend/smartmailservice/white-shape.png')}}" alt="shape" class="w-100">
                    </div>
                    <div class="col-md-9 sign-up-text">
<<<<<<< HEAD
                    <h2 class="text-capitalize pb-4 pt-2">Sign up for a virtual mail box</h2>
                    <a href="{{ route('contact_create') }}" class="btn smart-btn-contact-us fw-medium text-uppercase">Contact With Us</a>
=======
                    <h2 class=" pb-4 pt-2 text-uppercase">Sign up for a virtual mail box</h2>
                    <button class="btn smart-btn-contact-us fw-medium text-uppercase">Contact With Us</button>
>>>>>>> 66b64afa7ee90268d99fb0f21fa127bf965595c8
                    </div> 
                </div>
            </div>
        </div>
     </section>

     <section class="sms py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center text-uppercase fw-bold pt-3 pb-5">We have a SMS service</h2>
                <div class="col-md-6 pt-5">
                    <h3 class="px-2 text-uppercase">{{$smartsmsservice?->text_large}}</h3>
                   <p class="p-2">{{$smartsmsservice?->text_small}}</p>
                     <div class="d-inline">
                        <button type="submit" class="btn btn-view-plan mx-2 px-4 text-uppercase">View Plan</button>
                        <a href="{{ route('contact_create') }}" class="btn smart-btn-contact-us mx-2 px-4 text-uppercase">Contact Us</a>
                        
                    </div>
                </div>
                <div class="col-md-6 sms-image text-end">
                    <img src="{{asset('public/uploads/smartmailservice/'.$smartsmsservice?->image)}}" alt="SMS Service" width="400px" class="h-100">
                </div>
            </div>
        </div>
     </section>

     <section class="phonebook py-5 mb-5">
        <div class="container">
            <div class="row">
                <h2 class="text-uppercase text-center fw-bold pt-3 pb-5">We have a PhoneBook Service</h2>
                <div class="col-md-6 phonebook-image">
                    <img src="{{asset('public/uploads/smartmailservice/'.$smartphonebook?->image)}}" alt="PhoneBook Service" width="400px" class="h-100">
                </div>
                <div class="col-md-6 pt-5">
                    <h3 class="text-uppercase px-2">{{$smartphonebook?->text_large}}</h3>
                    <p class="p-2">{{$smartphonebook?->text_small}}</p>
                    <div class="d-inline">
                        {{-- <button type="submit" class="btn btn-sign-up mx-2 px-4">Sign Up</button> --}}
                        <a href="{{ route('clientlogin') }}" class="btn btn-sign-up mx-2 px-4 text-uppercase">Sign in</a>
                        <a href="{{ route('contact_create') }}" class="btn smart-btn-contact-us mx-2 px-4 text-uppercase">Contact Us</a>
                       {{-- <button type="submit" class="btn smart-btn-contact-us mx-2 px-4">Contact Us</button> --}}
                    </div>
                </div>
            </div>
        </div>
     </section>
   
@endsection
