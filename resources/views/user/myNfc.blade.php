@extends('user.layout.base')
@section('title', 'LIST OF NFC CARD')
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
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">INTRO</h5>
                                    <a class="btn btn-primary-soft icon-sm ms-auto" href="#"><i
                                            class="fa-solid fa-pencil"> </i></a>
                                </div>
                                <p class="text-center pt-2"><small>Full Stack Developer at Test </small><span
                                        class="d-block">{
                                        Laravel,Vue,React }</span></p>
                                <!-- User stat START -->
                                <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                    <!-- User stat item -->
                                    <div>
                                        <h6 class="mb-0">256</h6>
                                        <small>Post</small>
                                    </div>
                                    <!-- Divider -->
                                    <div class="vr"></div>
                                    <!-- User stat item -->
                                    <div>
                                        <h6 class="mb-0">2.5K</h6>
                                        <small>Followers</small>
                                    </div>
                                    <!-- Divider -->
                                    <div class="vr"></div>
                                    <!-- User stat item -->
                                    <div>
                                        <h6 class="mb-0">365</h6>
                                        <small>Following</small>
                                    </div>
                                </div>
                                <!-- User stat END -->
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 vstack gap-2">
                    <!-- Share feed START -->
                    <!-- Card feed item START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">LIST OF NFC CARD</h5>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Album Tab content START -->
                            <div class="mb-0 pb-0">
                                <div class="row">
                                    <!-- Nfc item START -->
                                    @forelse ($nfc_cards as $nfc_card)
                                        <div class="col-6 col-lg-6 position-relative px-2 my-2" style="height:400px;">
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
                    <!-- Card feed item END -->
                </div>
                <!-- Right sidebar START -->
                <div class="col-md-3">
                    <div class="row g-2">
                        @include('user.includes.online-active')
                        <!-- Card START -->
                    </div>

                </div>
            </div> <!-- Row END -->
        </div>
        <!-- Container END -->
    </main>
    <!-- Main content END -->
@endsection
