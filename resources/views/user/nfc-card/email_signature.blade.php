@extends('user.layout.base')
@section('title', 'NFC Email Signature')
@push('styles')

<link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        .card-custom {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .card-custom img {
            width: 100%;
            height: auto;
        }
        .signature-card{
            background-color: rgb(255, 255, 255);
            border: 0.0625rem solid rgba(0, 0, 0, 0.38);
            border-radius: 0.75rem;
            box-sizing: border-box;
            max-width: 30rem;
            min-width: 20rem;
            object-position: center top;
            overflow: hidden;
            position: relative;
            font-family: "Inter", sans-serif;
            color: #1A202c;
        }
        .signature-card svg{
            height: 80px;
        }
        .signature-card-btn{
            border-radius:10px 0px 10px 0px;
            lign-self: flex-end;
            background-color: rgb(108, 49, 205);
            border: medium;
            /* border-top-left-radius: 0.75rem; */
            color: rgb(255, 255, 255);
            cursor: pointer;
            font-family: Inter, sans-serif;
            font-size: 0.625rem;
            font-weight: 300;
            max-height: 2rem;
            padding: 0.5rem;
            text-transform: uppercase;
            width: 8rem;
        }

        .company{
            font-weight: 300;
            font-size: .876rem;
            color: #1A202c;
            line-height: 1rem;
        }
        .card-name{
            font-family: "Inter", sans-serif;
            color: #1A202c;
            font-weight: 600;
            padding: 0px;
            margin: 5px 0px 0 0;
                margin-top: 5px;
            line-height: 12px;
        }
        .card-info i{
            background: rgb(108, 49, 205);
            margin: 0.3rem;
            border-radius: 30px;
            color: white;
            padding: .3rem;
            font-size: .678rem;
        }
        .position{

        }

        .signature-card-img{
            border-radius:10px 0px 10px 0px;
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
            border-radius: 5px 0 5px 0;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
            border:none;
        }
         .profile-info {

            margin-left: 20px;
            border-left: 2px dotted white;

        }

        .profile-info h6,
        p {
            color: white;
        }

        .upload-container input[type="file"] {
            display: none;
        }

        .upload-container label {
            background-color: #fff;
            color: white;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            color: #3A292C;
            font-size: 16px;
            font-weight: bold;
            height: 150px;
            align-items: center;
        }

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
            border: 1px solid rgb(0, 247, 255) ;
        }
        #sleek_header_image,#header_text,#modern_header{
            background: rgb(0, 247, 255);
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


        /* .logo-image-preview{
            margin-top: .8rem !important;
        } */

        .f-name,.m-name,.l-name,.field-title, .deprtment,.goes-by{
            font-family: 'nunito' !important;
            font-size: 12px !important;
        }

        .prefix-name,.suffix-name,.maiden_name,.accreditations,.field-title,.deprtment,.company{
            font-size: 12px !important;
        }

        .card-dragger-header {}

        .remove-button {
            position: absolute;
            top: 2px;
            right: 2px;
            background: rgb(255, 23, 67);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            width: 15px;
            height: 15px;
            text-align: center;
            line-height: 18px;
            font-size: .55555rem;
            display: flex;
            align-items: center;
            font-weight: 600;
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
        .classic{
            background-color: white;
            overflow: hidden;
        }

        .color-box {
            outline: transparent;
            border: transparent;
            background-color: rgb(41, 203, 32);
            width: 25px;
            height: 25px;
            border-radius: 50%;
        }
        .CardAvatar {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 6rem;
            height: 10rem;
            z-index: 10000;
            top: 50px;
            }

            .modern_header {
                background-color: #414141;
                margin-bottom: 1.5rem;
                height: 10rem;
                padding:
                2rem 2rem 0px;
                padding:
                20px;
                position: relative;
                color: #ffffff;
                background:
                linear-gradient(-190deg, rgb(19, 18, 18) 90%, #CAC4C4 0%);
                clip-path: polygon(0px 0px, 100% 0px, 100% calc(100% - 7rem), 0px 100%);
                background:
                linear-gradient(251.74deg, rgb(4, 4, 5) -20.73%, rgb(5, 4, 5) 127.58%);
            }

            .header_sleek {
                background-color: white;
                border:none;
                width: unset !important;
                height: unset !important;
            }

            .design-card-link{
                background: white;
                overflow: hidden;
                display: block;
            }

            .classic_svg_show{
                /* height: 210px; */
            }

            .classic_svg_show svg{
                /* position: absolute;
                top: 80px; */
                margin-top: -45px;
            }

        label i.fas {
            padding: 3px;
        }
        .sleek_header_image img {
            height: 20rem !important;
            object-fit: cover;
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
                 {{-- <div class="card-body">
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
                </div> --}}
                <div class="container my-5" style="max-height: 800px;overflow:scroll">
                    <div class="row gx-0">
                        <!-- Nfc item START -->
                        <div class="col-md-12">
                            <div class="row gx-2">
                                @forelse ($nfc_cards as $nfc_card)
                                {{-- {{$nfc_card->card_design?->design_card_id }}
                                    --}}
                                    {{-- {{$nfc_card->card_type}} --}}
                                    <div  class=" col-md-3 position-relative px-2 mb-2 gap-5" >
                                        @if ($nfc_card->card_type == 1)
                                        {{-- CLASISC Design --}}
                                            <a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}" class="design-card-link">

                                            <div class="card" style="height: 20rem">
                                                <div class="col-md-12">
                                                    <div class="classic_header_image_show">
                                                            <img class="display-profile-pic"  src="{{ $nfc_card->client?->image? asset('public/uploads/client/' . $nfc_card->client?->image) : null }}" alt="" width="350px"
                                                                height="350px" id="display-profile-pic">

                                                        <div class="classic_svg_show">
                                                            <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 57" xmlns="http://www.w3.org/2000/svg"
                                                                class="css-fxun4i">
                                                                    <path id="forground" clip-rule="evenodd"
                                                                        d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                                                                        fill="white" fill-rule="evenodd"></path>
                                                                    <path id="background" clip-rule="evenodd"
                                                                        d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                                                                        fill="white" fill-rule="evenodd"></path>
                                                                    <path id="wave" clip-rule="evenodd"
                                                                        d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                                                                        fill="{{ $nfc_card->card_design->color ?? '#6785F5'}}" fill-rule="evenodd"></path>

                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="middle" style="padding: 0px !important">
                                                    <div class="container-fluid mt-2">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <span class="fs-4 fw-bold prefix-name text-dark" id="prefix-name">{{ $nfc_card->nfc_info?->prefix ?? ''  }}</span>
                                                                <span class="fs-4 fw-bold f-name  text-dark" id="f-name">{{ $nfc_card->client?->fname ?? ''  }}</span>
                                                                <span class="fs-4 fw-bold m-name  text-dark" id="m-name">{{  $nfc_card->client?->middle_name ?? ''  }}</span>
                                                                <span class="fs-4 fw-bold l-name  text-dark" id="l-name">{{ $nfc_card->client?->last_name ?? ''  }}</span>

                                                                <div style="display: contents">
                                                                    <span class="fs-4 fw-bold suffix-name text-dark" id="suffix-name">{{  $nfc_card->nfc_info?->suffix ?? ''}}</span>
                                                                    <span class="fs-4 fw-bold maiden_name text-dark" id="maiden_name">{{  $nfc_card->nfc_info?->maiden_name ? '('. $nfc_card->nfc_info?->maiden_name.')' ?? '' : '' }}</span>
                                                                        <span class="accreditations" id="accreditations">&nbsp;{{  $nfc_card->nfc_info?->accreditations ?? '' }}</span>
                                                                </div>
                                                                <span>
                                                                    <span class="text-justify field-title text-dark fw-bold" id="field-title">{{  $nfc_card->nfc_info?->title ?? ''  }}</span> <br>
                                                                    <span class="fs-5 fw-bold deprtment active-text-color" id="deprtment">{{ $nfc_card->nfc_info?->department ?? '' }}</span> <br>
                                                                    <span class="fs-6 company fst-italic fw-light" id="company">{{  $nfc_card->nfc_info?->company ?? '' }}</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <ul class="p-2">
                                                            @foreach ($nfc_card->nfcFields->take(2)  as $nfcField)
                                                                <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                                                    <i style="color:{{ $nfc_card->card_design->color }}" class="{{ $nfcField->icon }} "></i>
                                                                    &nbsp;
                                                                    <a href="#" class=" text-dark social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                                                                </li>
                                                            @endforeach

                                                    </ul>
                                                </div>
                                                    <div class="border-top card-footer p-2 m-0">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span style="font-size:10px;font-weight:600">{{ $nfc_card->card_name}}</span>
                                                        <small style="font-size: 10px;">{{  $nfc_card->created_at->format('M d, Y')  }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        @elseif($nfc_card->card_type == 2)
                                            {{-- Modern Design --}}
                                            <a class="design-card-link" href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}" class="design-card">

                                            <div class="card header_body" style="height: 20rem">
                                            <header class="modern_header" id="modern_header">
                                                <div class="col-sm-12 p-0 m-0">
                                                        <span class="fs-4 fw-bold prefix-name">{{  $nfc_card->nfc_info?->prefix ?? ''}}</span>
                                                    <span class="fs-4 fw-bold f-name">{{  $nfc_card->client?->fname ?? ''  }}</span>
                                                <span class="fs-5 fw-bold m-name">{{  $nfc_card->client?->middle_name ?? ''  }}</span>
                                                <span class="fs-4 fw-bold l-name">{{  $nfc_card->client?->last_name ?? ''  }}</span>
                                                <span class="fs-4 fw-bold suffix-name">{{  $nfc_card->nfc_info?->suffix ?? ''  }}</span>
                                                <span class="fs-2 fw-bold maiden_name">
                                                        {{ $nfc_card->nfc_info?->maiden_name ? '('. $nfc_card->nfc_info?->maiden_name.')' ?? ''  : '' }}
                                                </span>
                                                <span class="accreditations">&nbsp;{{  $nfc_card->nfc_info?->accreditations  }}</span>
                                                </div>
                                                <div class="">
                                                    <div class="">
                                                        <p>
                                                        <span class="">{{  $nfc_card->nfc_info?->title  }}</span> <br>
                                                            <span class="fs-5 fw-bold deprtment " id="deprtment">{{  $nfc_card->nfc_info?->department ?? '' }}</span> <br>
                                                        <span class="company" id="company">{{  $nfc_card->nfc_info?->company ?? ''  }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </header>
                                            <div>
                                                    <div class="CardAvatar">
                                                        <img src="{{ $nfc_card->client?->image ? asset('public/uploads/client/' . $nfc_card->client?->image) : asset('public/assets/nfc/images/123.png') }}"
                                                            class=" img-fluid display-profile-pic" alt="" width="100%" height="350px"  />
                                                    </div>
                                                    <div class="CardBox css-19niztd">
                                                        <ul class="list-group social-user-ul">
                                                            @foreach ($nfc_card->nfcFields->take(2)  as $nfcField)
                                                                <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                                                    <i style="color:{{ $nfc_card->card_design->color }}" class="{{ $nfcField->icon }} "></i>
                                                                    &nbsp;
                                                                    <a href="#" class="social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                            </div>
                                                <div class="border-top card-footer p-2 m-0">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span style="font-size:10px;font-weight:600">{{ $nfc_card->card_name}}</span>
                                                        <small style="font-size: 10px;">{{  $nfc_card->created_at->format('M d, Y')  }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @elseif($nfc_card->card_type == 3)
                                            {{-- SLEEK DESIGN --}}
                                            <a  href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}" class="design-card-link">
                                                <div class="card" style="height: 20rem">
                                                    <div class="header_sleek">

                                                    <div class="sleek_header_image" id="sleek_header_image">
                                                        <div class="css-79elbk">
                                                            <img class="display-profile-pic"  src="{{ $nfc_card->client?->image ?  asset('public/uploads/client/' . $nfc_card->client?->image) : asset('public/assets/nfc/images/123.png')}}"}}" alt="" srcset="" class="" width="100%"  style="height: 20rem">
                                                        </div>
                                                    </div>
                                                    <div class="css-1fbwa35 " style="background: white">
                                                        <div class="card sleek_card mx-auto mb-3">
                                                            <div class="CardBox mx-auto">
                                                                <span class="fs-4 fw-bold prefix-name">{{  $nfc_card->nfc_info?->prefix ?? '' }}</span>
                                                            <span class="fs-4 fw-bold f-name">{{  $nfc_card->client?->fname ?? '' }}</span>
                                                            <span class="fs-4 fw-bold l-name">{{  $nfc_card->client?->middle_name ?? '' }}</span>
                                                            <span class="fs-4 fw-bold suffix-name">{{  $nfc_card->client?->last_name ?? '' }}</span>

                                                            <div>
                                                                    <span class="fs-4 fw-bold suffix-name">{{  $nfc_card->nfc_info?->suffix ?? ''}}</span>
                                                                <span class="fs-4 fw-bold maiden_name">
                                                                        {{ $nfc_card->nfc_info?->maiden_name ? '('.$nfc_card->nfc_info?->maiden_name.')' ?? '' : '' }}
                                                                </span>
                                                                    <span class="accreditations">&nbsp;{{  $nfc_card->nfc_info?->accreditations  ?? '' }}</span>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <ul class="p-2">
                                                                    @foreach ($nfc_card->nfcFields->take(2)  as $nfcField)
                                                                        <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                                                            <i style="color:{{ $nfc_card->card_design->color }}" class="{{ $nfcField->icon }} "></i>
                                                                            &nbsp;
                                                                            <a href="#" class=" text-dark social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                                                                        </li>
                                                                    @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="border-top card-footer p-2 m-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span style="font-size:10px;font-weight:600">{{ $nfc_card->card_name}}</span>
                                                            <small style="font-size: 10px;">{{  $nfc_card->created_at->format('M d, Y')  }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                        @elseif($nfc_card->card_type == 4)
                                            {{-- FLAT DESIGN --}}
                                            <a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}" class="design-card-link">

                                                <div style="overflow:hidden"  class="card flat" style="height: 20rem">
                                                            <header>
                                                                <div class="header_section">
                                                                    <div>
                                                                            <img class="display-profile-pic"  src="{{ $nfc_card->client?->image ? asset('public/uploads/client/' . $nfc_card->client?->image) :null }}" alt="" width="350px" height="300px">
                                                                            {{-- <img class="display-profile-pic"  src="{{  asset('public/uploads/client/' . $nfc_card->client?->image) : asset('public/assets/nfc/images/123.png')}}" alt="" width="350px" height="300px"> --}}
                                                                    </div>
                                                                    <div class="header_text" id="header_text"></div>
                                                                </div>
                                                            </header>
                                                            <div class="section">
                                                            <div class="container-fluid mt-2">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <span class="fs-4 fw-bold prefix-name text-dark" id="prefix-name">{{  $nfc_card->nfc_info?->prefix ?? ''}}</span>
                                                                        <span class="fs-4 fw-bold f-name  text-dark" id="f-name">{{  $nfc_card->client?->fname ?? ''}}</span>
                                                                        <span class="fs-4 fw-bold m-name  text-dark" id="m-name">{{  $nfc_card->client?->middle_name ?? ''}}</span>
                                                                        <span class="fs-4 fw-bold l-name  text-dark" id="l-name">{{  $nfc_card->client?->last_name ?? ''}}</span>

                                                                        <div style="display: contents">
                                                                            <span class="fs-4 fw-bold suffix-name text-dark" id="suffix-name">{{  $nfc_card->nfc_info?->suffix ?? '' }}</span>
                                                                            <span class="fs-4 fw-bold maiden_name text-dark" id="maiden_name">{{ $nfc_card->nfc_info?->maiden_name ? '('. $nfc_card->nfc_info?->maiden_name.')' ?? '' : ''}}</span>
                                                                                <span class="accreditations" id="accreditations">&nbsp;{{  $nfc_card->nfc_info?->accreditations ?? '' }}</span>
                                                                        </div>
                                                                        <span>
                                                                            <span class="text-justify field-title text-dark fw-bold" id="field-title">{{  $nfc_card->nfc_info?->title ?? ''}}</span> <br>
                                                                            <span class="fs-5 fw-bold deprtment active-text-color" id="deprtment">{{  $nfc_card->nfc_info?->department ?? '' }}</span> <br>
                                                                            <span class="fs-6 company fst-italic fw-light" id="company">{{  $nfc_card->nfc_info?->company ?? '' }}</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="container-fluid">
                                                                    {{-- <p class="my-1 headline">{{  $nfc_card->nfc_info?->headline ?? '' }}</p> --}}
                                                                <div class="row">
                                                                    <ul class="p-2">
                                                                            @foreach ($nfc_card->nfcFields->take(2)  as $nfcField)
                                                                                <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                                                                    <i style="color:{{ $nfc_card->card_design->color }}" class="{{ $nfcField->icon }} "></i>
                                                                                    &nbsp;
                                                                                    <a href="#" class="text-dark social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-top card-footer p-2 m-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span style="font-size:10px;font-weight:600">{{ $nfc_card->card_name}}</span>
                                                            <small style="font-size: 10px;">{{  $nfc_card->created_at->format('M d, Y')  }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
                <div class="container px-0 my-5">
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
                                        <div class="col-md-5 mx-auto">
                                            <div class="signature-card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img w-25 signature-card-img">
                                                    <article class="ms-2">
                                                        <h6 class="mt-2 card-name">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h6>
                                                        <span class="position">{{ $nfc_card->client?->designation ?? 'CEO' }}</span>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </article>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8 card-info">
                                                            <p class="ms-1 m-0"><i class="fas fa-envelope"></i>
                                                                <span>{{ $nfc_card->client?->email ?? '' }}</span>
                                                            </p>
                                                            <p class="ms-1 m-0"><i class="fas fa-phone"></i>
                                                                <span>{{ $nfc_card->client?->phone ?? '' }}</span>
                                                            </p>
                                                    </div>
                                                    <div class="col-md-4 d-flex justify-content-end p-2">
                                                        {!! QrCode::size(100)->generate(
                                                            url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                                        ) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button class="btn signature-card-btn border-0 mt-1">Save Contact</button>
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
                                        <div class="col-md-5 mx-auto">
                                            <div class="signature-card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img w-25 signature-card-img">
                                                    <div class="ms-2">
                                                        <h6 class="mt-2 card-name">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h6>
                                                        <span class="position">{{ $nfc_card->client?->designation ?? '' }}</span>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="d-flex justify-content-between card-info">
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
                                                        <button class="btn signature-card-btn border-0 mt-1">Save Contact</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <!-- Content for LOGO tab -->
                                    <div class="row">
                                        <div class="col-md-5 mx-auto">
                                            <div class="signature-card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img w-25 signature-card-img">
                                                    <div class="ms-2">
                                                        <h6 class="mt-2 card-name">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h6>
                                                        <span class="position">{{ $nfc_card->client?->designation ?? '' }}</span>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="d-flex justify-content-between card-info">
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
                                                        <button class="btn signature-card-btn border-0 mt-1">Save Contact</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="text" role="tabpanel" aria-labelledby="text-tab">
                                    <!-- Content for TEXT tab -->
                                    <div class="row">
                                        <div class="col-md-5 mx-auto">
                                            <div class="signature-card">
                                                <div class="d-flex mb-1">
                                                    <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                                        alt="Profile Image" class="avatar-img w-25 signature-card-img">
                                                    <div class="ms-2">
                                                        <h6 class="card-name mt-2">{{ $nfc_card->client?->fname ?? '' }}  {{ $nfc_card->client?->middle_name ?? '' }}   {{ $nfc_card->client?->last_name ?? '' }}</h6>
                                                        <span class="position">{{ $nfc_card->client?->designation ?? '' }}</span>
                                                        <p class="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="d-flex justify-content-between card-info">
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
                                                        <button class="btn signature-card-btn border-0 mt-1">Save Contact</button>
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
                                                <button class="generate-btn generate-gmail" onclick="generate()">Generate Signature and Copy</button>
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

       function generate() {

        const imageUrl = "{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}";
        const profileLink = "{{  route('client.show', encryptor('encrypt', $nfc_card->client_id)) }}";
        const altText = "{{ $nfc_card->client?->name }}";

        if (imageUrl) {

            const htmlString = `
                <a href="${profileLink}" rel="noopener" target="_blank" style="display: flex;gap:.5rem;width:600px; text-decoration: none;">
                    <img alt="${altText}" src="${imageUrl}" width="200" height="100"/>
                    <div class="col-md-4 d-flex justify-content-end p-2">
                        {!! QrCode::size(100)->generate(
                            url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                        ) !!}
                    </div>
                </a>
            `;

            copyToClipboard(htmlString);
        } else {
            console.error('Image URL not found');
        }
    }

    function copyToClipboard(htmlString) {
        const blob = new Blob([htmlString], { type: 'text/html' });
        const item = new ClipboardItem({ 'text/html': blob });
        navigator.clipboard.write([item]).then(() => {
            document.querySelector('.generate-btn.generate-gmail').innerHTML = 'Copy!';
        }).catch(err => {
            console.error('Could not copy HTML to clipboard', err);
        });
    }


    </script>
@endpush
