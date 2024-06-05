@extends('user.layout.base')
@section('title', 'NFC Email Signature')
@push('styles')
    <style>
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
            margin-right: 10px;
            background-color: #fff !important;
            color: #000;
            font-weight: 600;
            padding: 8px 38px;
        }

        .custom-tabs .nav-link.active {
            background-color: #AA86E6 !important;
            color: #fff !important;
        }

        .custom-tabs .nav-link:not(.active):hover {
            background-color: #e0e0e0;
            color: #333;
        }

        .sub-text {
            font-size: 10px;
            text-align: left;
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

        .profile-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
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
            position: absolute;
            margin-top: -104px;
            margin-left: 20px;
            border-left: 2px dotted white;
            z-index: 1;

        }

        .profile-info h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        .step {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .step-number {
            background-color: #e6e6ff;
            color: #4e4ec8;
            font-size: 1rem;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            font-weight: bold;
        }

        .sidebar {
            border-right: 1px solid #ddd;
        }

        .sidebar .btn {}

        .sidebar .btn svg {
            margin-right: 10px;
        }

        .main-content {
            padding: 20px;
        }

        .generate-btn {
            background-color: #4e4ec8;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
            border:none;
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
                        <div class="row gx-0">
                            <!-- Nfc item START -->
                            <div class="col-md-8 offset-md-2">
                                <div class="row gx-2">
                                    @forelse ($nfc_cards as $nfc_card)
                                        <div class="col-6 col-lg-3 position-relative" style="height:200px;">
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
                                </div>
                            </div>
                            <!-- Photo item END -->
                        </div>
                        <!-- Photos of you tab END -->
                    </div>
                    <!-- Album Tab content END -->
                    <!-- Custom tabs START -->
                </div>
                <div class="container px-0">
                    <div class="row">
                        <div class="col-md-9 mt-1 mx-auto">
                            <ul class="nav nav-pills custom-tabs mb-4" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="square-tab" data-bs-toggle="pill"
                                        data-bs-target="#square" type="button" role="tab" aria-controls="square"
                                        aria-selected="true">SQUARE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="qr-code-tab" data-bs-toggle="pill"
                                        data-bs-target="#qr-code" type="button" role="tab" aria-controls="qr-code"
                                        aria-selected="false">QR CODE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-logo-tab" data-bs-toggle="pill"
                                        data-bs-target="#image-logo" type="button" role="tab"
                                        aria-controls="image-logo" aria-selected="false">IMAGE + LOGO</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="logo-tab" data-bs-toggle="pill" data-bs-target="#logo"
                                        type="button" role="tab" aria-controls="logo"
                                        aria-selected="false">LOGO</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="text-tab" data-bs-toggle="pill" data-bs-target="#text"
                                        type="button" role="tab" aria-controls="text"
                                        aria-selected="false">TEXT</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent" style="padding: 0">
                                <div class="tab-pane fade show active" id="square" role="tabpanel"
                                    aria-labelledby="square-tab">
                                    <!-- Content for SQUARE tab -->
                                    <div class="row mx-4">
                                        <div class="col-md-5">
                                            <div class="profile-card">
                                                <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                    alt="Profile Image" class="profile-image">
                                                <div class="profile-info">
                                                    <h2 class="ms-2">{{ $nfc_card->client?->fname ?? '' }}
                                                        {{ $nfc_card->client?->middle_name ?? '' }}
                                                        {{ $nfc_card->client?->last_name ?? '' }}</h2>
                                                    <p class="position ms-2">{{ $nfc_card->client?->designation ?? '' }}</p>
                                                    <p class="company ms-2">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            {!! QrCode::size(220)->generate(
                                                url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                            ) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="qr-code" role="tabpanel" aria-labelledby="qr-code-tab">
                                    <!-- Content for QR CODE tab -->
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img rounded-border-10 border border-white border-3 w-25">
                                                    <div class="ms-2">
                                                        <h4 class="mt-2">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h4>
                                                        <p class="position">{{ $nfc_card->client?->designation ?? '' }}</p>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                            <p class="ms-1 m-0"><i class="fas fa-envelope"></i>
                                                                <span>{{ $nfc_card->client?->email ?? '' }}</span>
                                                            </p>
                                                            <p class="ms-1 m-0"><i class="fas fa-phone"></i>
                                                                <span>{{ $nfc_card->client?->phone ?? '' }}</span>
                                                            </p>
                                                    </div>
                                                    <div class="col-md-4 d-flex justify-content-end">
                                                        {!! QrCode::size(100)->generate(
                                                            url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                                        ) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary border-0 mt-1">Save Contact</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="image-logo" role="tabpanel"
                                    aria-labelledby="image-logo-tab">
                                    <!-- Content for IMAGE + LOGO tab -->
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img rounded-border-10 border border-white border-3 w-25">
                                                    <div class="ms-2">
                                                        <h4 class="mt-2">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h4>
                                                        <p class="position">{{ $nfc_card->client?->designation ?? '' }}</p>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="ms-1 m-0"><i class="fas fa-envelope"></i>
                                                                <span>{{ $nfc_card->client?->email ?? '' }}</span>
                                                            </p>
                                                            <p class="ms-1 m-0"><i class="fas fa-phone"></i>
                                                                <span>{{ $nfc_card->client?->phone ?? '' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary border-0 mt-1">Save Contact</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <!-- Content for LOGO tab -->
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img rounded-border-10 border border-white border-3 w-25">
                                                    <div class="ms-2">
                                                        <h4 class="mt-2">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h4>
                                                        <p class="position">{{ $nfc_card->client?->designation ?? '' }}</p>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="ms-1 m-0"><i class="fas fa-envelope"></i>
                                                                <span>{{ $nfc_card->client?->email ?? '' }}</span>
                                                            </p>
                                                            <p class="ms-1 m-0"><i class="fas fa-phone"></i>
                                                                <span>{{ $nfc_card->client?->phone ?? '' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary border-0 mt-1">Save Contact</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="text" role="tabpanel" aria-labelledby="text-tab">
                                    <!-- Content for TEXT tab -->
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img rounded-border-10 border border-white border-3 w-25">
                                                    <div class="ms-2">
                                                        <h4 class="mt-2">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h4>
                                                        <p class="position">{{ $nfc_card->client?->designation ?? '' }}</p>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="ms-1 m-0"><i class="fas fa-envelope"></i>
                                                                <span>{{ $nfc_card->client?->email ?? '' }}</span>
                                                            </p>
                                                            <p class="ms-1 m-0"><i class="fas fa-phone"></i>
                                                                <span>{{ $nfc_card->client?->phone ?? '' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary border-0 mt-1">Save Contact</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="background-color: #F7FAFC">
                        <div class="col-md-8 offset-md-2">
                            <div class="row">
                                <div class="col-md-3 sidebar pt-3">
                                    <ul class="nav nav-pills d-flex justify-content-center flex-column custom-tabs mb-4"
                                        id="pills-tab" role="tablist">
                                        <li class="nav-item mx-auto" role="presentation">
                                            <button class="nav-link active btn-white rounded-pill d-flex align-items-center"
                                                id="gmail-tab" data-bs-toggle="pill" data-bs-target="#gmail" type="button"
                                                role="tab" aria-controls="gmail" aria-selected="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 48 48">
                                                    <path fill="#4285F4"
                                                        d="M24 9.5c3.9 0 6.6 1.7 8.1 3.1l6-5.8C34.8 3.4 29.8 1 24 1 14.7 1 6.9 6.8 3.7 14.7l6.9 5.4C12.5 14.3 17.8 9.5 24 9.5z" />
                                                    <path fill="#34A853"
                                                        d="M46.5 24.5c0-1.5-.1-2.9-.4-4.3H24v8.3h12.7c-.5 2.7-2 5-4.2 6.5l6.6 5.2c3.9-3.6 6.4-9 6.4-15.7z" />
                                                    <path fill="#FBBC05"
                                                        d="M10.6 28.7c-.5-1.4-.8-2.9-.8-4.7s.3-3.2.8-4.7l-6.9-5.4C2.2 17.6 1.5 20.7 1.5 24s.7 6.4 2.2 9.1l6.9-4.4z" />
                                                    <path fill="#EA4335"
                                                        d="M24 47c6.3 0 11.6-2.1 15.5-5.7l-6.6-5.2c-2.2 1.5-4.9 2.3-8 2.3-6.2 0-11.4-4.2-13.2-9.9l-6.9 4.4C6.9 41.3 14.7 47 24 47z" />
                                                    <path fill="none" d="M0 0h48v48H0z" />
                                                </svg>
                                                <div class="ms-2">
                                                    <div>Gmail</div>
                                                    <div class="text-muted sub-text">Web</div>
                                                </div>
                                            </button>
                                        </li>
    
    
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-auto btn-white rounded-pill d-flex align-items-center"
                                                id="outlook-web-tab" data-bs-toggle="pill" data-bs-target="#outlook-web"
                                                type="button" role="tab" aria-controls="outlook-web"
                                                aria-selected="false">
                                                <span class="fs-4"><i class="fab fa-windows"></i></span>
                                                <div class="ms-2">
                                                    <div>Outlook</div>
                                                    <div class="text-muted sub-text">Web</div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-auto btn-white rounded-pill d-flex align-items-center"
                                                id="outlook-windows-tab" data-bs-toggle="pill"
                                                data-bs-target="#outlook-windows" type="button" role="tab"
                                                aria-controls="outlook-windows" aria-selected="false">
                                                <span class="fs-4"><i class="fab fa-windows"></i></span>
                                                <div class="ms-2">
                                                    <div>Outlook</div>
                                                    <div class="text-muted sub-text">Web</div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-auto btn-white rounded-pill d-flex align-items-center"
                                                id="outlook-mac-tab" data-bs-toggle="pill" data-bs-target="#outlook-mac"
                                                type="button" role="tab" aria-controls="outlook-mac"
                                                aria-selected="false">
                                                <span class="fs-4"><i class="fab fa-windows"></i></span>
                                                <div class="ms-2">
                                                    <div>Outlook</div>
                                                    <div class="text-muted sub-text">Web</div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-auto btn-white rounded-pill d-flex align-items-center"
                                                id="outlook-apple-mac-tab" data-bs-toggle="pill"
                                                data-bs-target="#outlook-apple-mac" type="button" role="tab"
                                                aria-controls="outlook-apple-mac" aria-selected="false">
                                                <span class="fs-4"><i class="fab fa-apple"></i></span>
                                                <div class="ms-2">
                                                    <div>Apple Mail</div>
                                                    <div class="text-muted sub-text">Web</div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-auto btn-white rounded-pill d-flex align-items-center"
                                                id="outlook-apple-mail-tab" data-bs-toggle="pill"
                                                data-bs-target="#outlook-apple-mail" type="button" role="tab"
                                                aria-controls="outlook-apple-mail" aria-selected="false">
                                                <span class="fs-4"><i class="fab fa-apple"></i></span>
                                                <div class="ms-2">
                                                    <div>Apple Mail</div>
                                                    <div class="text-muted sub-text">Web</div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link mx-auto btn-white rounded-pill d-flex align-items-center px-5"
                                                id="other-tab" data-bs-toggle="pill" data-bs-target="#other" type="button"
                                                role="tab" aria-controls="other" aria-selected="false">
                                                <span class="fs-4"><i class="fas fa-envelope"></i></span>
    
    
                                                <div class="ms-2">
                                                    <div>Other</div>
                                                </div>
    
    
    
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9 main-content">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="gmail" role="tabpanel"
                                            aria-labelledby="gmail-tab">
    
                                           
                                            <div class="step">
                                                <div class="step-number">01</div>
                                                <div>Generate and copy your signature's HTML</div>
                                                
                                            </div>
                                            <div class="ms-5 mb-3">
                                                <button id="copyButton" class="generate-btn generate-gmail" onclick="generate()">Generate Signature and Copy</button>
                                            </div>
                                            <div class="step">
                                                <div class="step-number">02</div>
                                                <div>Click the settings gear and click "See all settings"</div>
                                            </div>
                                            <div class="step">
                                                <div class="step-number">03</div>
                                                <div>In the "General" tab, scroll down until you see "Signature"</div>
                                            </div>
                                            <div class="step">
                                                <div class="step-number">04</div>
                                                <div>Click the + button</div>
                                            </div>
                                            <div class="step">
                                                <div class="step-number">05</div>
                                                <div>Give your signature a name</div>
                                            </div>
                                            <div class="step">
                                                <div class="step-number">06</div>
                                                <div>Paste your signature</div>
                                            </div>
                                            <div class="step">
                                                <div class="step-number">07</div>
                                                <div>Click "Save Changes"</div>
                                            </div>
                                        </div>
                            
    
    
    
                           
                                <div class="tab-pane fade" id="outlook-web" role="tabpanel"
                                    aria-labelledby="outlook-web-tab">
                                    Outlook Web Content
                                </div>
                                <div class="tab-pane fade" id="outlook-windows" role="tabpanel"
                                    aria-labelledby="outlook-windows-tab">
                                    Outlook Windows Content
                                </div>
                                <div class="tab-pane fade" id="outlook-mac" role="tabpanel"
                                    aria-labelledby="outlook-mac-tab">
                                    Outlook Mac Content
                                </div>
                                <div class="tab-pane fade" id="outlook-apple-mac" role="tabpanel"
                                    aria-labelledby="outlook-apple-mac-tab">
                                    Outlook Apple Mac Content
                                </div>
                                <div class="tab-pane fade" id="outlook-apple-mail" role="tabpanel"
                                    aria-labelledby="outlook-apple-mail-tab">
                                    Outlook Apple Mail Content
                                </div>
                                <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                    Other Content
                                </div>
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        /*function generate(){
            const profileElement = document.querySelector('#square');
            if (profileElement) {
                const desiredWidth = 400;  // Set the desired width
        const desiredHeight = 180; // Set the desired height
                html2canvas(profileElement).then(canvas => {
                    canvas.toBlob(blob => {
                        const item = new ClipboardItem({ 'image/png': blob });
                        navigator.clipboard.write([item]).then(() => {
                            //alert('Profile copied to clipboard');
                            document.querySelector('.generate-btn.generate-gmail').innerHTML = 'Copy!';;
                        }).catch(err => {
                            console.error('Could not copy image to clipboard', err);
                        });
                    });
                });
            } else {
                console.error('No element found with class .profile');
            }
        }*/
        $('#copyButton').click(function () {
                var signatureHTML = $('#square').html();
                navigator.clipboard.writeText(signatureHTML)
                    .then(function () {
                        alert('Signature copied to clipboard!');
                    })
                    .catch(function (error) {
                        console.error('Could not copy signature to clipboard:', error);
                    });
            });
    </script>
@endpush
