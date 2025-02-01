@extends('user.layout.base')
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
                    <div class="card">
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
                                        <div class="col-6 col-lg-4 position-relative px-2 mb-2" style="height:360px;">
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
