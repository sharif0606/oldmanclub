@extends('user.layout.base')
@section('title', 'NFC Card Preview')
<?php
    // ? Controls the form type.
    $formType = !empty($nfc_card) ? 'edit' : 'create';
?>
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
    <style>
        .design-group {
            display: grid;
            /* grid-template-columns: repeat(auto-fit, minmax(25%, 1fr)); */
            grid-template-columns: 6rem 6rem 6rem 6rem;
            text-align: center;
            gap: .5rem;
            align-items: center;
        }

        .design-card {
            cursor: pointer;
            color: #171923;

            border-radius: 20px;
        }

        .design-card-active {
            border: 1px solid {{ $formType=='edit' ? $nfc_card->card_design->color : 'rgb(0, 247, 255)' }};
        }
        #sleek_header_image,#header_text,#modern_header{
            background: {{ $formType=='edit' ? $nfc_card->card_design->color : 'rgb(0, 247, 255)' }};
        }

        .design-card svg {
            box-shadow: 2px 5px 22px #cacaca;
            border-radius: 20px;
            height: auto;
            margin: .5rem;
        }

        .image-container {
            display: inline-block;
            position: relative;
            margin: 5px;
        }

        .image-container img {
            width: 100px;
            height: 100px;
        }

        .input-group-prepend {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 0 .5rem;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: .5rem;
        }

        .btn-nfc {
            background: transparent;
            color: #2D3748 !important;
            border: 1px solid;
            border-top-color: currentcolor;
            border-right-color: currentcolor;
            border-bottom-color: currentcolor;
            border-left-color: currentcolor;
            border-color: #8F60DE;
            border-radius: .5rem;
            cursor: pointer;
            gap: .5rem;
            opacity: 1;

        }

        /* .btn-nfc span{

                        color:#718096;
                } */
        .btn-nfc:hover {
            background-color: #8F60DE26 !important;
            color: #2D3748 !important;
            border-color: #8F60DE !important;
        }

        .card-dragger-header {}

        .remove-button {
            position: absolute;
            top: 2px;
            right: 2px;
            background: rgb(100, 98, 98);
            color: rgb(232, 227, 227);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            width: 15px;
            height: 15px;
            text-align: center;
            line-height: 18px;
        }

        .edit-nav-profile {
            position: sticky;
            top: 0;
            background: white;
        }

        .social-field-title {
            color: #718096;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .color-picker {
            display: flex;
            align-items: center;
        }

        .color-option {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin: 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
        }

        .color-option.active::before {
            content: '\f00c';
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: white;
            font-size: 16px;
            position: absolute;
        }

        .color-option.selected {
            border: 2px solid #1abc9c;
        }

        .color-rainbow {
            background: conic-gradient(red, yellow, lime, aqua, blue, magenta, red);
            padding: 2px;
        }

        .nfc-previewer {
            max-height: 80vh;
            overflow-y: scroll;
        }

        .nfc-data-previewer {
            max-height: 80vh;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .selected {
            box-shadow: 0 0 0 2px white, 0 0 0 4px #64d8cb;
            box-sizing: border-box;
        }

        .upload-container input[type="file"] {
            display: none;
        }

        .upload-container label {
            background-color: #E2E8F0;
            color: white;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            color: #3A292C;
            width: 100px;
            font-size: 12px;
            font-weight: bold;
        }

        .color-box {
            outline: transparent;
            border: transparent;
            background-color: rgb(41, 203, 32);
            width: 25px;
            height: 25px;
            border-radius: 50%;
        }

        label i.fas {
            padding: 3px;
        }
    </style>
@endpush
@section('content')
    <div class="row g-4">
        <div class="col-lg-12 vstack gap-4">
            <!-- My profile START -->
            @include('user.includes.profile')
            <!-- My profile END -->
        </div>
        <!-- Sidenav END -->
        <!-- Main content START -->
        <div class="col-md-12">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                {{-- <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">PREVIEW NFC CARD</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i
                        class="fas fa-list pe-1"></i>All NFC CARD</a>
            </div> --}}
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    @if ($formType=='edit')
                        <form action="{{ route('nfc_card.update', encryptor('encrypt', $nfc_card->id)) }}" method="post"
                            class="row" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                    @else
                        <form action="{{ route('nfc_card.store') }}" method="post"
                            class="row" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                    @endif
                        <input type="hidden" name="design_card_id" id=""
                            value="{{ $formType=='edit' ? $nfc_card->card_design?->design_card_id :'' }}">
                        <!-- Album Tab content START -->
                        <div class="mb-0 pb-5">
                            <div class="row g-3">
                                <div class="col-md-4 nfc-previewer">
                                    {{-- @if ($nfc_card->card_design?->design_card_id == 1)
                                        @include('user.nfc-template_show.classic-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 2)
                                        @include('user.nfc-template_show.flat-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 3)
                                        @include('user.nfc-template_show.modern-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 4)
                                        @include('user.nfc-template_show.sleek-template')
                                    @endif --}}
                                    <div class="{{  $formType=='create' || ($formType=='edit' && $nfc_card->card_type == 1) ? 'd-block' : 'd-none' }}"
                                        id="design-card-id-1">
                                        @include('user.nfc-template_show.classic-template')
                                    </div>
                                    <div class="{{ $formType=='edit'  && $nfc_card->card_type == 2 ? 'd-block' : 'd-none' }}"
                                        id="design-card-id-2">
                                        @include('user.nfc-template_show.modern-template')
                                    </div>
                                    <div class="{{ $formType=='edit'  && $nfc_card->card_type == 3 ? 'd-block' : 'd-none' }}"
                                        id="design-card-id-3">
                                        @include('user.nfc-template_show.sleek-template')
                                    </div>
                                    <div class="{{ $formType=='edit'  && $nfc_card->card_type == 4 ? 'd-block' : 'd-none' }}"
                                        id="design-card-id-4">
                                        @include('user.nfc-template_show.flat-template')
                                    </div>
                                </div>
                                <div class="col-md-8 nfc-data-previewer">
                                    <ul style="z-index: 4;"
                                        class="edit-nav-profile nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start"
                                        role="tablist">
                                        <li class="nav-item" role="presentation"> <a class="nav-link active"
                                                data-bs-toggle="tab" href="#tab-1" aria-selected="true"
                                                role="tab">Display</a> </li>
                                        <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                                href="#tab-2" aria-selected="false" tabindex="-1"
                                                role="tab">Information</a></li>
                                        <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                                href="#tab-3" aria-selected="false" tabindex="-1"
                                                role="tab">Fields</a>
                                        </li>
                                        <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                                href="#tab-4" aria-selected="false" tabindex="-1" role="tab">Card</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mb-0 pb-0">

                                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                            <div class="px-2">

                                                <div class="col-12 border-bottom">
                                                    <h6>Profile Photo</h6>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <img class="rounded-border-10 border border-white border-3"
                                                                src="{{ $formType=='edit' ? asset('public/uploads/client/' . $client->image) : asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                alt="profile" id="profile-picture">
                                                        </div>

                                                        <div class="col-4 py-2 offset-3">
                                                            <div class="upload-container">
                                                                <input type="file" id="profile" name="profile"
                                                                    accept="image/*"
                                                                    onchange="changeProfilePicture(event);">
                                                                <label for="profile"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Replace Photo</label>
                                                            </div>
                                                            {{-- <small><strong>Recomended Size (128x128)</strong></small> --}}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Design</h6>
                                                    <input type="hidden" name="card_type"
                                                        value="{{ $formType=='edit' ? $nfc_card->card_type : '' }}" id="nfcDesign">
                                                    <div class="design-group">
                                                        <div class="design-card {{ $formType=='edit' && $nfc_card->card_type == 1 ? 'design-card-active' : '' }}"
                                                            onclick="changeDesign(event,'1')">
                                                            <span>
                                                                <svg viewBox="0 0 72 72" focusable="false"
                                                                    class="chakra-icon chakra-icon css-5nx6ny">
                                                                    <g clip-path="url(#clip0_1931_53838)">
                                                                        <path class="svg-color"
                                                                            fill="{{ $formType=='edit' ? $nfc_card->card_design->color : '#000000' }}"
                                                                            d="M0 -24H72V54H0V-24Z" fill="currentColor">
                                                                        </path>
                                                                        <path
                                                                            d="M72 72.5V39.18C44.16 29.9533 29.568 63.3176 0 41.7337V72.5H72Z"
                                                                            fill="whitesmoke"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1931_53838">
                                                                            <rect fill="white" height="72"
                                                                                rx="16" width="72"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <p class="mt-2">Classic</p>
                                                        </div>
                                                        <div class="design-card {{ $formType=='edit' &&  $nfc_card->card_type == 2 ? 'design-card-active' : '' }}"
                                                            onclick="changeDesign(event,'2')">
                                                            <span>
                                                                <svg viewBox="0 0 72 72" focusable="false"
                                                                    class="chakra-icon chakra-icon css-5nx6ny">
                                                                    <g clip-path="url(#clip0_805_62524)">
                                                                        <rect fill="white" height="72"
                                                                            rx="16" width="72"></rect>
                                                                        <g clip-path="url(#clip1_805_62524)">
                                                                            <path class="svg-color"
                                                                                fill="{{ $formType=='edit' ? $nfc_card->card_design->color : '#000000' }}"
                                                                                d="M0 -16.875H72V30.3333L0 55.637V-16.875Z"
                                                                                fill="url(#paint0_linear_805_62524)">
                                                                            </path>
                                                                            <circle cx="53" cy="27.125"
                                                                                fill="#ddd" r="14"></circle>
                                                                        </g>
                                                                    </g>
                                                                    <defs>
                                                                        <linearGradient gradientUnits="userSpaceOnUse"
                                                                            id="paint0_linear_805_62524" x1="36"
                                                                            x2="36" y1="-16.875" y2="55.637">
                                                                            <stop offset="0"
                                                                                stop-color="currentColor"></stop>
                                                                            <stop offset="0.75" stop-color="currentColor"
                                                                                stop-opacity="0.75"></stop>
                                                                        </linearGradient>
                                                                        <clipPath id="clip0_805_62524">
                                                                            <rect fill="white" height="72"
                                                                                rx="16" width="72"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="clip1_805_62524">
                                                                            <rect fill="white" height="72.576"
                                                                                transform="translate(0 -16.875)"
                                                                                width="72"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <p class="mt-2">Modern</p>
                                                        </div>
                                                        <div class="design-card {{ $formType=='edit' && $nfc_card->card_type == 3 ? 'design-card-active' : '' }}"
                                                            onclick="changeDesign(event,'3')">
                                                            <span>
                                                                <svg viewBox="0 0 72 72" focusable="false"
                                                                    class="chakra-icon chakra-icon css-5nx6ny">
                                                                    <g clip-path="url(#a)">
                                                                        <rect fill="#F5F5F5" height="72"
                                                                            rx="16" width="72"></rect>
                                                                        <circle cx="36" cy="-6.75"
                                                                            class="svg-color"
                                                                            fill="{{ $formType=='edit' ? $nfc_card->card_design->color : '#000000' }}"
                                                                            r="59.625"></circle>
                                                                        <path fill="white"
                                                                            d="M15.75 42.75h41.625v13.5H15.75z"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="a">
                                                                            <rect fill="#fff" height="72"
                                                                                rx="16" width="72"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <p class="mt-2">Sleek</p>
                                                        </div>
                                                        <div class="design-card {{ $formType=='edit' && $nfc_card->card_type == 4 ? 'design-card-active' : '' }}"
                                                            onclick="changeDesign(event,'4')">
                                                            <span>
                                                                <svg viewBox="0 0 72 72" focusable="false"
                                                                    class="chakra-icon chakra-icon css-5nx6ny">
                                                                    <g clip-path="url(#a)">
                                                                        <rect fill="white" height="72"
                                                                            rx="16" width="72"></rect>
                                                                        <g clip-path="url(#b)" fill="currentColor">
                                                                            <path class="svg-color"
                                                                                fill="{{ $formType=='edit' ? $nfc_card->card_design->color : '#000000' }}"
                                                                                d="M0-29.25h72v72.512H0z"></path>
                                                                            <path class="svg-color"
                                                                                fill="{{ $formType=='edit' ? $nfc_card->card_design->color : '#000000' }}"
                                                                                d="M0 32.184v4.88c13.344 7.171 24 7.605 40.224-.83 16.224-8.436 24-7.34 31.776-5.4V29.57c-17.856-5.99-32.352 5.845-43.584 8.798C17.184 41.319 9.888 39.21 0 32.184Z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="a">
                                                                            <rect fill="#fff" height="72"
                                                                                rx="16" width="72"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="b">
                                                                            <path d="M0-29.25h72v72.576H0z" fill="#fff">
                                                                            </path>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <p class="mt-2">Flat</p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Color</h6>
                                                    <div class="d-flex justify-content-between col-md-6 py-2">
                                                        <input type="hidden" name="display_nfc_color"
                                                            value="{{ $formType=='edit' ? $nfc_card->card_design->color : '#000000' }}"
                                                            id="displayNfcColor">
                                                        <button type="button" onclick="setWaveColor('rgb(255, 0, 0)')"
                                                            class="color-box"
                                                            style="background-color: red;width:25px;height:25px;border-radius:50%;">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(0, 247, 255)')"
                                                            class="color-box" style="background-color: rgb(0, 247, 255);">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(195, 0, 255)')"
                                                            class="color-box" style="background-color: rgb(195, 0, 255);">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(255, 0, 183)')"
                                                            class="color-box" style="background-color: rgb(255, 0, 183);">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(242, 255, 0)')"
                                                            class="color-box" style="background-color: rgb(242, 255, 0);">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(0, 255, 115)')"
                                                            class="color-box" style="background-color: rgb(0, 255, 115);">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(25, 0, 255)')"
                                                            class="color-box" style="background-color: rgb(25, 0, 255);">
                                                        </button>
                                                        <button type="button" onclick="setWaveColor('rgb(221, 0, 255)');"
                                                            class="color-box" style="background-color: rgb(221, 0, 255);">
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Logo</h6>
                                                    <div class="row">
                                                        <div class="col-2">
                                                                <img class="rounded-border-10 border border-white border-3"
                                                                    src="{{ $formType=='edit' ? asset('public/uploads/cards/' . $nfc_card->card_design?->logo ?? '') : asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                    alt="" id="logo-placeholder">
                                                        </div>
                                                        <div class="col-4 py-2 offset-3">
                                                            <div class="upload-container">
                                                                <input type="file" id="logo" name="logo"
                                                                    accept="image/*"
                                                                    onchange="previewfile(event,'logo-placeholder'); previewfile(event,'logo-image-preview');">
                                                                <label for="logo"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Add Logo</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Badge</h6>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <span id="badge-image-group" class="d-flex ">
                                                                @if ($formType=='edit')
                                                                    @foreach ($nfc_card->badges as $bagde)
                                                                        <div class="image-container "
                                                                            id="image-container-{{ $bagde->id }}">
                                                                            <img class="avatar-img rounded-border-10 border border-white border-3"
                                                                                src="{{ asset('public/uploads/cards/badges/' . $bagde->badge_image ?? '') }}"
                                                                                alt="" id="badge-placeholder">
                                                                            <input type="file"
                                                                                style="visibility: hidden; width: 1px;"
                                                                                name="badge_images[]"
                                                                                value="{{ $bagde->badge_image ?? '' }}">
                                                                            <button type="button" class="remove-button"
                                                                                onclick="removeBadgeImage('{{ $bagde->id }}',`asset('public/uploads/cards/badges/'. $bagde->badge_image ?? '')`)">X</button>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="image-container">
                                                                        <img class="avatar-img rounded-border-10 border border-white border-3"
                                                                            src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                            alt="" id="badge-placeholder">
                                                                    </div>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="col-4 py-2 fload-end">
                                                            <div class="upload-container">
                                                                <input type="file" id="badge" name="badge"
                                                                    accept="image/*"
                                                                    onchange="previewMultipleBadgeFile(event);">
                                                                <label for="badge"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Add Badge</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                            <div class="px-2">
                                                <h6 class="border-bottom">Personal</h6>
                                                <div class="row">
                                                    <div class="col-8 form-group">
                                                        <label for="">Prefix</label>
                                                        <input type="text" name="prefix"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info?->prefix ?? '' : '' }}"
                                                            class="form-control form-control-sm mb-2 mb-2"
                                                            onkeyup="$('.prefix-name').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" name="f_name"
                                                            value="{{ $formType=='edit'  ? $nfc_card->client?->fname ?? '' : ''}}"
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.f-name').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Middle Name</label>
                                                        <input type="text" name="middle_name"
                                                            value="{{ $formType=='edit' ? $nfc_card->client?->middle_name ?? '' :''}}"
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.m-name').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" name="l_name"
                                                            value="{{ $formType=='edit' ? $nfc_card->client?->last_name ?? '' :'' }}"
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.l-name').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Suffix</label>
                                                        <input type="text" name="suffix"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info?->suffix ?? '' :''}}"
                                                            id="" class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.suffix-name').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Accreditations</label>
                                                        <input type="text" name="accreditations"
                                                            value="{{ $formType=='edit'  ? $nfc_card->nfc_info->accreditations ?? '' :'' }}"
                                                            id="" class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.accreditations').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Preferred Name</label>
                                                        <input type="text" name="preferred_name"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info->preferred_name ?? '' :'' }}"
                                                            id="" class="form-control"
                                                            onkeyup="$('.preferred_name').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Maiden Name</label>
                                                        <input type="text" name="maiden_name"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info->maiden_name ?? '' : ''}}" id=""
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.accreditations').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Pronoun</label>
                                                        <input type="text" name="pronoun"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info->pronoun ?? '' : '' }}" id=""
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.pronoun').text($(this).val());">
                                                    </div>
                                                </div>
                                                <h6 class="border-bottom py-4">Affiliation</h6>
                                                <div class="row">
                                                    <div class="col-8 form-group">
                                                        <label for="">Title</label>
                                                        <textarea name="title" onkeyup="$('.field-title').text($(this).val());" class="form-control form-control-sm mb-2"
                                                            name="pronoun">{{ $formType=='edit' ? $nfc_card->nfc_info->title ?? '' : '' }}</textarea>
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Department</label>
                                                        <input type="text" name="department"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info->department ?? '' : '' }}"
                                                            id="" class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.deprtment').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Company</label>
                                                        <input type="text" name="company"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info->company ?? '' : ''}}"
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.company').text($(this).val());">
                                                    </div>
                                                    <div class="col-8 form-group">
                                                        <label for="">Headline</label>
                                                        <input type="text" name="headline"
                                                            value="{{ $formType=='edit' ? $nfc_card->nfc_info->headline ?? '' : '' }}"
                                                            class="form-control form-control-sm mb-2"
                                                            onkeyup="$('.headline').text($(this).val());">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                            <div class="px-2">
                                                <div class="col-12">
                                                    {{-- <h6 class="border-bottom">NFC Field</h6> --}}
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div id="draggable" class="card p-3 text-white"
                                                                style="max-height:auto;z-index:1;overflow-y:scroll;background-color:#E2E8F0;border: 2px white dashed;">
                                                                @if ($formType=='edit' )
                                                                @php
                                                                    $ncfCardNfcFields = DB::table('nfc_card_nfc_field')
                                                                        ->join(
                                                                            'nfc_fields',
                                                                            'nfc_fields.id',
                                                                            'nfc_card_nfc_field.nfc_field_id',
                                                                        )
                                                                        ->where(
                                                                            'nfc_card_nfc_field.nfc_card_id',
                                                                            $nfc_card->id,
                                                                        )
                                                                        ->get();
                                                                @endphp
                                                                    @foreach ($ncfCardNfcFields as $item)
                                                                        <div id="draggerContent" class="card px-4 py-2">
                                                                            <div class="card-dragger-header d-flex items-center"
                                                                                style="gap: 0 0.5rem;justify-content: space-between;">
                                                                                <span id="dragger"
                                                                                    class="d-flex items-center"
                                                                                    style="gap: 0 0.5rem;align-items: center;">
                                                                                    <span class=""
                                                                                        style="cursor: pointer">
                                                                                        <svg style="height: 24px"
                                                                                            viewBox="0 0 24 24"
                                                                                            focusable="false"
                                                                                            class="chakra-icon chakra-icon css-1wuln1z">
                                                                                            <path
                                                                                                d="M2 19.2838H22V17.0031H2V19.2838ZM2 13.5821H22V11.3014H2V13.5821ZM2 5.59961V7.88031H22V5.59961H2Z"
                                                                                                fill="currentColor"></path>
                                                                                        </svg>

                                                                                    </span>
                                                                                    <h4 class="mt-1">{{ $item->name }}
                                                                                    </h4>
                                                                                </span>
                                                                                <button type="button"
                                                                                    onclick="removeDraggableContent(this,'{{ $item->id }}')"
                                                                                    class="remove-btn btn btn-sm fload-end fs-5 items-center">x</button>
                                                                            </div>
                                                                            <div class="">
                                                                                <div class="form-group">
                                                                                    <div class="col-auto">
                                                                                        <label class="sr-only"
                                                                                            for="inlineFormInputGroup">Phone</label>
                                                                                        <div
                                                                                            class="input-group mb-2  bg-white">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="">
                                                                                                    @if ($item->type == '1')
                                                                                                        <span class="mx-1"><i
                                                                                                                class="{{ $item->icon }}"></i></span>
                                                                                                        @elseif($item->type == '2')
                                                                                                        @php
                                                                                                            $icon = str_replace(
                                                                                                                '<svg',
                                                                                                                '<svg style="width:24px; height:20px;"',
                                                                                                                $item->icon,
                                                                                                            );
                                                                                                        @endphp
                                                                                                        {{ $icon }}
                                                                                                        @elseif($item->type == '3')
                                                                                                        <img src="{{ asset('public/uploads/client/' . $item->icon) }}"
                                                                                                            style="width:24px; height:20px;" />
                                                                                                        @endif
                                                                                                </div>
                                                                                                <input type="hidden"
                                                                                                    name="nfc_id[]"
                                                                                                    value="{{ $item->id }}" />
                                                                                                <input
                                                                                                    style="border:transparent"
                                                                                                    name="nfc_user_name[]"
                                                                                                    value="{{ $item->field_value }}"
                                                                                                    type="text"
                                                                                                    class="form-control "
                                                                                                    onchange="updateSocialItemLink({{ $item->id }}, this.value, '{{ $item->display_text}}');"
                                                                                                    placeholder="Username">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <select
                                                                                        class="form-select form-control-sm mb-2 bg-white"
                                                                                        name="nfc_label[]">
                                                                                        <option value="">No Label
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $item->display_text == 'personal' ? 'selected' : '' }}
                                                                                            value="personal">personal</option>
                                                                                        <option
                                                                                            {{ $item->display_text == 'work' ? 'selected' : '' }}
                                                                                            value="work">work</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pb-2" id="field-gallery"
                                                            style="max-height:auto;/*overflow-y:scroll*/;background-color:#8F60DE26;">
                                                            @foreach ($categories as $key => $category)
                                                                @php
                                                                    $title = $category;
                                                                    $nfcFields = DB::table('nfc_fields')
                                                                        ->where('category', $key)
                                                                        ->get();
                                                                @endphp
                                                                @if ($nfcFields->isEmpty())
                                                                    @continue
                                                                @endif
                                                                <h4 class="social-field-title mt-4 mb-2">
                                                                    <strong>{{ $title }}</strong>
                                                                </h4>
                                                                @foreach ($nfcFields as $value)
                                                                    @if ($value->type == 1)
                                                                        <button type="button"
                                                                            onclick="addDraggableContent(`<span class='{{ $value->icon }}'></i></span>`,'{{ $value->name }}','{{ $value->id }}')"
                                                                            data-field="{{ $value->name }}"
                                                                            data-id="{{ $value->id }}"
                                                                            style="margin:2px 1px"
                                                                            class="field-item btn btn-nfc btn-sm rounded-md"><span
                                                                                class="mx-1"><i
                                                                                    class="{{ $value->icon }}"></i></span>{{ $value->name }}</button>
                                                                    @elseif ($value->type == 2)
                                                                        @php
                                                                            $icon = str_replace(
                                                                                '<svg',
                                                                                '<svg style="width:14px; height:14px;"',
                                                                                $value->icon,
                                                                            );
                                                                        @endphp
                                                                        <button type="button"
                                                                            onclick="addDraggableContent('{{ $icon }}','{{ $value->name }}','{{ $value->id }}')"
                                                                            data-field="{{ $value->name }}"
                                                                            data-id="{{ $value->id }}"
                                                                            style="margin:2px 1px"
                                                                            class="field-item btn btn-nfc btn-sm rounded-md">
                                                                            <span class="mx-1">
                                                                                {!! $icon !!}</span>{{ $value->name }}</button>
                                                                    @elseif ($value->type == 3)
                                                                        @php
                                                                            $icon =
                                                                                "<img src='" .
                                                                                asset(
                                                                                    'public/uploads/client/' .
                                                                                        $value->icon,
                                                                                ) .
                                                                                " style='width:24px; height:20px;'/>";
                                                                        @endphp

                                                                        <button type="button"
                                                                            onclick="addDraggableContent('{{ $icon }}','{{ $value->name }}','{{ $value->id }}')"
                                                                            data-field="{{ $value->name }}"
                                                                            data-id="{{ $value->id }}"
                                                                            style="margin:2px 1px"
                                                                            class="field-item btn btn-nfc btn-sm rounded-md"><span
                                                                                class="mx-1">
                                                                                <img src="{{ $value->icon }}"
                                                                                    alt="icon" height="50"
                                                                                    weight="50">
                                                                            </span>{{ $value->name }}</button>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-4" role="tabpanel">
                                            <div class="px-2">
                                                <div class="col-12">
                                                    <div class="col-8 form-group">
                                                        <div style="background: #E2E8F0;color:#718096 border:transparent;"
                                                            class="alert" role="alert">
                                                            <svg style="width: 20px;height:20px" viewBox="0 0 14 15"
                                                                focusable="false"
                                                                class="chakra-icon chakra-icon css-l30hbq">
                                                                <g fill="currentColor" stroke="currentColor"
                                                                    stroke-linecap="square" stroke-width="2">
                                                                    <circle cx="12" cy="12" fill="none"
                                                                        r="11" stroke="currentColor"></circle>
                                                                    <line fill="none" x1="11.959" x2="11.959"
                                                                        y1="11" y2="17"></line>
                                                                    <circle cx="11.959" cy="7" r="1"
                                                                        stroke="none"></circle>
                                                                </g>
                                                            </svg>
                                                            This field does not appear on the card.
                                                        </div>
                                                        <label for="">Card Name</label>
                                                        <input type="text" name="card_name"
                                                        required
                                                            value="{{ $formType=='edit' ? $nfc_card->card_name ?? '' :'' }}" id="card-name"
                                                            class="form-control form-control-sm"
                                                            onkeyup="$('#card-name').text($(this).val());">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Photos of you tab END -->
                        </div>
                        <div class=""
                            style="position: sticky;bottom: 0;float: right;display: flex;justify-content: end;gap: 1rem;">
                            @if ($formType=='edit')
                            <a href="{{ route('nfc_card.show', $id) }}" class="btn btn-light">Cancel</a>
                            @else
                            <button type="reset" class="btn btn-warning">Reset</button>
                            @endif
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                    <!-- Album Tab content END -->
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
    </div><!-- Row END -->
    <script>
        const colorBox = document.getElementById('colorBox');

        colorBox.addEventListener('click', function() {
            colorBox.classList.toggle('selected');
        });

        function changeDesign(event, id) {
            var design = document.getElementById('nfcDesign');
            var color = document.getElementById('displayNfcColor');
            var allDesignCards = document.querySelectorAll('.design-card');
            allDesignCards.forEach(function(card) {
                card.style.border = '2px solid transparent';
                card.classList.remove('design-card-active');
            });
            if (design && color) {
                design.value = id;
                var designCard = event.target.closest('.design-card');
                if (designCard) {
                    designCard.style.border = '2px solid ' + color.value;
                    designCard.classList.add('design-card-active');
                }
            } else {
                console.error("Element not found: nfcDesign or displayNfcColor");
            }

            // Change template
            var nfcPreviewer = document.querySelector('.nfc-previewer');
            var previewTemplates = nfcPreviewer.children;
            Array.from(previewTemplates).forEach(function(template) {
                template.classList.add('d-none');
                template.classList.remove('d-block');
            });

            var activeTemplate = nfcPreviewer.querySelector(`#design-card-id-${id}`);
            if (activeTemplate) {
                activeTemplate.classList.add('d-block');
                activeTemplate.classList.remove('d-none');
            }

        }
    </script>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
         $("#draggable").sortable();
        function changeProfilePicture(event) {
            var outputs = document.querySelectorAll('.display-profile-pic');
            outputs.forEach((output) => {
                output.src = URL.createObjectURL(event.target.files[0]);
            });

            var output = document.getElementById('profile-picture');
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewfile(event, previewimg = 'previewimg') {
            var output = document.getElementById(previewimg);
            output.src = URL.createObjectURL(event.target.files[0]);

            // var button = document.createElement("button");
            // button.classList.add("remove-button");
            // button.innerHTML = "X";
            // output.insertAdjacentElement('afterend', button);
        }
    </script>
    <script>
        function Confirm(text) {
            if (confirm(`Are you sure you want to ${text}?`)) {
                return true;
            } else {
                return false;
            }
        }

        function addDraggableContent(icon, text, id) {
            var draggableContent = `
            <div id="draggerContent" class="draggable-item card px-4 py-2">
                <div class="card-dragger-header d-flex items-center" style="gap: 0 0.5rem;justify-content: space-between;">
                    <span id="dragger" class="d-flex items-center" style="gap: 0 0.5rem;align-items: center;">
                        <span class="" style="cursor: pointer">
                            <svg style="height: 24px" viewBox="0 0 24 24"
                                focusable="false"
                                class="chakra-icon chakra-icon css-1wuln1z">
                                <path
                                    d="M2 19.2838H22V17.0031H2V19.2838ZM2 13.5821H22V11.3014H2V13.5821ZM2 5.59961V7.88031H22V5.59961H2Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <h4 class="mt-1">${text.toUpperCase()}</h4>
                    </span>
                    <button type="button" onclick="removeDraggableContent(this,${id});" class="remove-btn btn btn-sm fload-end fs-5 items-center">x</button>
                </div>
                <div class="">
                    <div class="form-group">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2  bg-white">
                                <div class="input-group-prepend">
                                    <div class="">
                                        ${icon}
                                    </div>
                                    <input type="hidden" name="nfc_id[]" value="${id}">
                                    <input style="border:transparent" name="nfc_user_name[]" type="text" class="form-control " placeholder="Username" onchange="updateSocialItemLink( ${id}, this.value, '${text}')">
                                </div>
                            </div>
                        </div>
                        <select class="form-select form-control-sm mb-2 bg-white" name="nfc_label[]">
                            <option value="">No Label</option>
                            <option value="personal">personal</option>
                            <option value="work">work</option>
                        </select>
                    </div>
                </div>
            </div>`;
            AddLeftsideSocialUser(icon, text, id);
            $("#draggable").append(draggableContent);
            $("#draggable:last-child").sortable();
            // $("#draggerContent:last-child").sortable();
        }

        function AddLeftsideSocialUser(icon, text, id){
            var socialContent = document.querySelectorAll(".social-user-ul") // ul
            // var socialItem = document.getElementById(`social-list-item-${id}`); //li

            var content = `<li class="list-group-item social-list-item-${id}">
                            ${icon}
                            <a class="social-item-link-${id}" style="margin-left:1rem" id="social-item-link-${id}" href="#">${text}</a>
                        </li>`;
            socialContent.forEach((socialContent) => {
                socialContent.insertAdjacentHTML('beforeend', content);
            });
        }

        function removeDraggableContent(btn,id) {
             if (confirm(`Do you want to remove this content?`)) {
                $(btn).closest("#draggerContent").remove();
                var socialItem = document.querySelectorAll(`.social-list-item-${id}`); //li
                socialItem.forEach((socialItem) => {
                    socialItem.remove();
                });
            } else {
                return false;
            }
        }

        function updateSocialItemLink(id, value, displayText) {
            if(!displayText || displayText.length == 0){
               displayText = value;
            }
            console.log("Updating social item link:", id, value, displayText);
            if (id && value !== undefined && displayText) {
                $('.social-item-link-' + id).text(value).attr('href', value);
            } else {
                console.error("Invalid parameters passed to updateSocialItemLink:", id, value, displayText);
            }
        }




        // });
    </script>
    <script>
        function setWaveColor(color) {
            var wave = document.getElementById('wave');
            var background = document.getElementById('background');
            var forground = document.getElementById('forground');
            wave.setAttribute('fill', color);
            // background.setAttribute('fill', color);
            // forground.setAttribute('fill', color);

            document.getElementById("displayNfcColor").value = color;
            var activeDesignCards = document.querySelectorAll(".design-card-active");
            activeDesignCards.forEach(function(card) {
                card.style.border = '2px solid ' + color;
            });

            var activeDesignCards = document.querySelectorAll(".svg-color");
            activeDesignCards.forEach(function(card) {
                card.style.fill = color;
            });

            document.getElementById("modern_header").style.background = color;
            document.getElementById("header_text").style.background = color;
            document.getElementById("sleek_header_image").style.background = color;
            // document.getElementById("header_sleek").style.background = color;
        }
        const badgeImages = [];

        function isPlaceholderImage(imgSrc) {
            return imgSrc.endsWith('/public/user/assets/images/avatar/placeholder.jpg');
        }

        function removeDefaultBadgeImage() {
            var controlOutput = document.getElementById('badge-image-group');
            var existingPlaceholders = controlOutput.querySelectorAll("img");
            existingPlaceholders.forEach(function(img) {
                if (isPlaceholderImage(img.src)) {
                    var container = img.closest(".image-container");
                    if (container && controlOutput.contains(container)) {
                        controlOutput.removeChild(container);
                    }
                }
            });
        }

        function previewMultipleBadgeFile(event) {
            var previewOutput = document.getElementById('badge-preview');
            var controlOutput = document.getElementById('badge-image-group');

            removeDefaultBadgeImage();
            var file = event.target.files[0];
            console.log(file);
            if (file) {
                var imgSrc = URL.createObjectURL(file);

                var previewDiv = document.createElement("div");
                previewDiv.classList.add("image-container");
                var previewImg = document.createElement("img");
                previewImg.src = imgSrc;
                previewImg.classList.add("rounded-border-10", "border", "border-white", "border-3");
                previewDiv.appendChild(previewImg);
                var badgeImgInput = document.createElement("input");
                badgeImgInput.type = "file";
                badgeImgInput.style.visibility = "hidden";
                badgeImgInput.style.width = "1px";
                badgeImgInput.name = "badge_images[]";
                badgeImgInput.files = event.target.files;

                previewOutput.appendChild(previewDiv);

                var controlDiv = document.createElement("div");
                controlDiv.classList.add("image-container");
                var controlImg = document.createElement("img");
                controlImg.src = imgSrc;
                controlImg.classList.add("rounded-border-10", "border", "border-white", "border-3");
                controlDiv.appendChild(controlImg);
                controlDiv.appendChild(badgeImgInput);
                controlOutput.append(controlDiv);
                addRemoveBtn(controlDiv, previewDiv, controlOutput, previewOutput, imgSrc);
                badgeImages.push(imgSrc);
            }
        }

        function addRemoveBtn(controlDiv, previewDiv, controlOutput, previewOutput, imgSrc) {
            var button = document.createElement("button");
            button.classList.add("remove-button");
            button.innerHTML = "X";
            button.onclick = function() {
                controlOutput.removeChild(controlDiv);
                previewOutput.removeChild(previewDiv);
                const index = badgeImages.indexOf(imgSrc);
                if (index > -1) {
                    badgeImages.splice(index, 1);
                }
            };
            controlDiv.appendChild(button);
        }

        function removeBadgeImage(id, imgSrc) {
            const previewOutput = document.getElementById(`badge-preview-${id}`).remove();
            const controlOutput = document.getElementById(`image-container-${id}`).remove();

            // previewOutput.removeChild(previewDiv);
            // controlOutput.removeChild(controlDiv);

            const index = badgeImages.indexOf(imgSrc);
            if (index > -1) {
                badgeImages.splice(index, 1);
            }
        }
    </script>
@endpush
