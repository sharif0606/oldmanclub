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
                            <div class="input-group me-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.657-8.47a5.5 5.5 0 1 1 0 11 5.5 5.5 0 0 1 0-11z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Search cards"
                                    aria-label="Search cards" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-end">
                            <!-- Button modal -->
                            <a class="btn text-black" href="{{ route('nfc_card.create') }}"> <i
                                    class="fa-solid fa-plus pe-1 fs-3"></i> {{-- ADD NFC CARD --}}</a>
                        </div>
                    </div>

                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-0">
                        <div class="row g-1">
                            <!-- Add nfc START -->
                            <div class="col-6 col-lg-2" style="height:200px;">
                                <div
                                    class="border border-2 border-dashed h-100 rounded text-center d-flex align-items-center justify-content-center position-relative">
                                    <a class="stretched-link" href="{{ route('nfc_card.create') }}">
                                        <i class="fa-solid fa-plus fs-1"></i>
                                        <h6 class="mt-2"></h6>
                                    </a>
                                </div>
                            </div>
                            <!-- Add Nfc END -->
                            <!-- Nfc item START -->
                            @forelse ($nfc_cards as $nfc_card)
                                <div class="col-6 col-lg-2 position-relative px-2" style="height:200px;">
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
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
    </div><!-- Row END -->
@endsection
