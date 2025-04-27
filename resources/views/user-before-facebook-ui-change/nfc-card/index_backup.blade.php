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
    </style>
@endpush
@section('content')
    <div class="row g-4">
        <!-- Sidenav START -->
        <div class="col-lg-3">
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
        </div>
        <!-- Sidenav END -->
        <!-- Main content START -->
        <div class="col-md-8 col-lg-6 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                    <h1 class="card-title h4">NFC CARD</h1>
                    <!-- Button modal -->
                    <a class="btn btn-primary-soft" href="{{ route('nfc_card.create') }}"> <i
                            class="fa-solid fa-plus pe-1"></i> ADD NFC CARD</a>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-0">
                        <div class="row g-3">
                            <!-- Add nfc START -->
                            <div class="col-6 col-lg-3">
                                <div
                                    class="border border-2 border-dashed h-100 rounded text-center d-flex align-items-center justify-content-center position-relative">
                                    <a class="stretched-link" href="{{ route('nfc_card.create') }}">
                                        <i class="fa-solid fa-id-card fs-1"></i>
                                        <h6 class="mt-2">ADD NFC CARD</h6>
                                    </a>
                                </div>
                            </div>
                            <!-- Add Nfc END -->
                            <!-- Nfc item START -->
                            @forelse ($nfc_cards as $nfc_card)
                            <div class="col-6 col-lg-3 position-relative">
                                <div class="position-absolute bottom-0 end-0">
                                    <!-- Dropdown START -->
                                    <div class="dropdown mb-2 me-3">
                                        <a href="#" class="icon-sm bg-primary text-white rounded-circle show"
                                            id="photoActionEdit" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <!-- Dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="photoActionEdit">
                                           
                                        {{-- asset('public/user/assets/images/albums/01.jpg') --}}
                                            <li><a class="dropdown-item"> 
                                                @if ($nfc_card->card_type == 1)
                                                {{ __('Work') }}
                                                @else
                                                {{ __('Personal') }}
                                                @endif</a>
                                            </li>
                                            <li><a class="dropdown-item"> 
                                                <span class="fs-6 fw-bold">{{ $nfc_card->client?->fname }}</span>
                                                <span class="fs-6 fw-bold">{{ $nfc_card->client?->middle_name }}</span>
                                                <span class="fs-6 fw-bold">{{ $nfc_card->client?->last_name }}</span>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"> <i
                                                        class="bi bi-tag fa-fw pe-1"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}"> <i
                                                        class="bi bi-download fa-fw pe-1"></i> Download </a></li>
                                            {{--<li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-person fa-fw pe-1"></i> Make Profile Picture</a></li> 
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-person-bounding-box fa-fw pe-1"></i> Make Cover
                                                    Photo</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-flag fa-fw pe-1"></i> Report photo</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <!-- Dropdown END -->
                                @if($client->image)
                                <img class="rounded img-fluid" src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                alt="">
                                @else
                                <img class="avatar-img" src="{{asset('public/user/assets/images/avatar/03.jpg')}}" alt="">
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
