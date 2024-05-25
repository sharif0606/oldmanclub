@extends('user.layout.base')
@section('title', 'NFC Card')
@push('styles')
    <style>
        .card {
            /* background-color: #f0f0f0; */
            /*transition: transform 0.3s ease;*/

        }

        .card:hover {
            /*transform: scale(1.05);*/
            /* Adjust the value to change the amount of upward flow */
        }

        .addNew {
            /*border: 1px dashed black;*/
        }

        .card-custom {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .card-custom img {
            width: 100%;
            height: auto;
        }

        .card-custom .card-body {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            text-align: center;
        }

        .wave {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
            background: #fff;
            border-radius: 100% 100% 0 0;
            transform: translateY(50%);
        }

/* tab css  start*/
        .custom-tabs .nav-link {
            border-radius: 20px;
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #f0f0f0;
            color: #333;
        }

        .custom-tabs .nav-link.active {
            background-color: #AA86E6;
            color: #fff !important;
        }

        .custom-tabs .nav-link:not(.active):hover {
            background-color: #e0e0e0;
            color: #333;
        }
/*tab css end */
    .profile-card {
        /* display: flex; */
        align-items: center;
        background-color: rgb(255, 255, 255);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 400px;
        margin: auto;
        position: relative;
        /* padding: 10px; */
    }

    .profile-image {
        width: 100%;
        /* height: 100px; */
        /* border-radius: 50%; */
        object-fit: cover;
        margin-right: 15px;
    }

    .profile-info {
        color: white;
        position:absolute;
        margin-top: -104px;
        margin-left: 20px;
        border-left: 2px dotted white;
        
    }

     .profile-info h2 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
        color: white;
    } 
    .save_button{
        background-color: #6C31CD;
        padding: 3px;
        color: #fff;
        border-radius: 10px 0px 10px 0px;
    }
    </style>
@endpush

@section('content')

    <div class="row g-4">
        <!-- Sidenav START -->
        {{-- <div class="col-lg-3">
            <!-- Advanced filter responsive toggler START -->
            <div class="d-flex align-items-center d-lg-none">
                <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                    <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                    <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
                </button>
            </div>
            <!-- Advanced filter responsive toggler END -->
            <!-- Navbar START-->
            @include('user.includes.profile-navbar')
            <!-- Navbar END-->
        </div> --}}
        <!-- Sidenav END -->
        <!-- Main content START -->
        <div class="col-lg-12 vstack gap-4">
            <!-- My profile START -->
            @include('user.includes.profile')
            <!-- My profile END -->
        </div>
        <!-- NFC Card START -->
        <div class="col-md-12 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                    {{-- <h1 class="card-title h4">NFC CARD</h1> --}}
                    <div class="row">
                        <div class="col-md-10">
                            
                        </div>
                    </div>

                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-0">
                        <div class="row g-1">
                            <!-- Nfc item START -->
                            @forelse ($nfc_cards as $nfc_card)
                                <div class="col-6 col-lg-2 position-relative px-2 mx-auto" style="height:200px;">
                                    @if ($nfc_card->card_design?->design_card_id == 1)
                                        @include('user.nfc-template_mini.classic-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 2)
                                        @include('user.nfc-template_mini.flat-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 3)
                                        @include('user.nfc-template_mini.modern-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 4)
                                        @include('user.nfc-template_mini.sleek-template')
                                    @endif
                                </div>
                            @empty
                                No Card Made Yet
                            @endforelse
                            <!-- Photo item END -->
                        </div>
                        <!-- Photos of you tab END -->
                    </div>
                    <!-- Album Tab content END -->
                    <!-- Custom tabs START -->
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mt-1 mx-auto">
                            <ul class="nav nav-pills custom-tabs mb-4" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="square-tab" data-bs-toggle="pill" data-bs-target="#square" type="button" role="tab" aria-controls="square" aria-selected="true">SQUARE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="qr-code-tab" data-bs-toggle="pill" data-bs-target="#qr-code" type="button" role="tab" aria-controls="qr-code" aria-selected="false">QR CODE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-logo-tab" data-bs-toggle="pill" data-bs-target="#image-logo" type="button" role="tab" aria-controls="image-logo" aria-selected="false">IMAGE + LOGO</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="logo-tab" data-bs-toggle="pill" data-bs-target="#logo" type="button" role="tab" aria-controls="logo" aria-selected="false">LOGO</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="text-tab" data-bs-toggle="pill" data-bs-target="#text" type="button" role="tab" aria-controls="text" aria-selected="false">TEXT</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="square" role="tabpanel" aria-labelledby="square-tab">
                                    <!-- Content for SQUARE tab -->
                                    <div class="row mx-4">
                                        <div class="col-md-5">
                                            <div class="profile-card">
                                                <img src="{{ asset('public/uploads/client/2091707728463.jpg') }}" alt="Profile Image" class="profile-image">
                                                <div class="profile-info">
                                                    <h2 class="ms-2">asdfdsaf</h2>
                                                    <p class="position ms-2">dsfasdfsda</p>
                                                    <p class="company ms-2">sadfsadfsad</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="profile-card">
                                                <img src="{{ asset('public/uploads/client/2091707728463.jpg') }}" alt="Profile Image" class="profile-image">
                                                <div class="profile-info">
                                                    <h2 class="ms-2">asdfdsaf</h2>
                                                    <p class="position ms-2">dsfasdfsda</p>
                                                    <p class="company ms-2">sadfsadfsad</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="qr-code" role="tabpanel" aria-labelledby="qr-code-tab">
                                    <!-- Content for QR CODE tab -->
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="card" style="border-radius: 10px">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/2091707728463.jpg') }}" alt="Profile Image" class="" style="border-radius: 10px 0px 10px 0px;">
                                                    <div class="px-2">
                                                        <h2 class="">asdfdsaf</h2>
                                                        <p class="position">dsfasdfsda</p>
                                                        <p class="company">sadfsadfsad</p>
                                                    </div>
                                                </div>
                                                    <div class="row p-3">
                                                        <div class="col-md-4">
                                                            <div class="d-flex">
                                                                <a href="" class=""><i class="fas fa-envelope "></i></a>
                                                                <span>admin@yahoo.com</span>
                                                            </div>
                                                            <div class="d-flex">
                                                                <a href="" class=""><i class="fas fa-phone"></i></a>
                                                                <span>admin@yahoo.com</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 ms-auto">
                                                            <img src="{{ asset('public/uploads/client/2091707728463.jpg') }}" alt="Profile Image" class="">
                                                        </div>
                                                    </div>
                                                    <div class="" style="text-align: right">
                                                            <span class="save_button px-4">Save Contact</span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="image-logo" role="tabpanel" aria-labelledby="image-logo-tab">
                                    <!-- Content for IMAGE + LOGO tab -->
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <!-- Content for LOGO tab -->
                                </div>
                                <div class="tab-pane fade" id="text" role="tabpanel" aria-labelledby="text-tab">
                                    <!-- Content for TEXT tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
    </div><!-- Row END -->
@endsection
