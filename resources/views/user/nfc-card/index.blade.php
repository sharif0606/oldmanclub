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
                                    {{$nfc_card->card_type}} --}}
                                        <div class="col-6 col-lg-4 position-relative px-2 mb-2" style="height:360px;">
                                            @if ($nfc_card->card_type == 1)
                                                @include('user.nfc-template_mini.classic-template')
                                            @elseif($nfc_card->card_type == 2)
                                                @include('user.nfc-template_mini.modern-template')
                                            @elseif($nfc_card->card_type == 3)
                                                @include('user.nfc-template_mini.sleek-template')
                                            @elseif($nfc_card->card_type == 4)
                                                @include('user.nfc-template_mini.flat-template')
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
