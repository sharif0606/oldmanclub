@extends('user.layout.base')

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

        /* .sleek_card{
            min-height: 15rem;
        } */


    </style>
@endpush
@section('content')
    <!-- Main content START -->
    <main>
        <!-- Container START -->
        <div class="container-fluid">
            <div class="row g-2">
                <div class="col-lg-12 vstack gap-2">
                    <!-- My profile START -->
                    @include('user.includes.profile')
                    <!-- My profile END -->
                </div>
                <!-- Left sidebar START -->
                <div class="col-lg-3">
                    <div class="row g-2">
                    @include('user.includes.intro')
                    </div>
                </div>

                <!-- NFC Card START -->
                <div class="col-md-6 vstack gap-2">
                    <!-- Card START -->
                    <div class="card" style="background-color: #F7FAFC">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            {{-- <h1 class="card-title h4">NFC CARD</h1> --}}
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between align-items-center">
                                    <h4>LIST OF NFC CARD</h4>
                                    <!-- Button modal -->
                                    <a class="btn btn-primary-soft square-circle icon-md ms-auto" href="{{ route('nfc_card.create') }}"><i class="fa-solid fa-plus"> </i></a>
                                </div>
                            </div>

                        </div>
                        <!-- Card header START -->
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Album Tab content START -->
                            <div class="mb-0 pb-0">
                                <div class="row g-1">
                                    <!-- Add Nfc END -->
                                    <!-- Nfc item START -->
                                    @forelse ($nfc_cards as $nfc_card)
                                    {{-- {{$nfc_card->card_design?->design_card_id }}
                                     --}}
                                     {{-- {{$nfc_card->card_type}} --}}
                                        <div  class="col-6 col-lg-4 position-relative px-2 mb-2 gap-5" >
                                            @if ($nfc_card->card_type == 1)
                                            {{-- CLASISC Design --}}
                                                <a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}" class="design-card-link">

                                                <div class="card">
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
                <!-- Right sidebar START -->
                <div class="col-md-3">
                    <div class="row g-2">
                        @include('user.includes.online-active')
                    </div>
                </div>
            </div> <!-- Row END -->
        </div>
        <!-- Container END -->
    </main>
    <!-- Main content END -->
@endsection
