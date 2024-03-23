@extends('user.layout.base')
@section('title', 'NFC Card Preview')
@push('styles')
<link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
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
                <h4 class="card-title h4">Preview NFC Card</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i
                        class="fas fa-list pe-1"></i>All NFC Card</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Album Tab content START -->
                <div class="mb-0 pb-5">
                    <div class="row g-3">
                            <div>
                                <a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="col-md-4">
                                    @if ($nfc_card->card_design?->design_card_id == 1)
                                        @include('user.nfc-template_show.classic-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 2)
                                        @include('user.nfc-template_show.flat-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 3)
                                        @include('user.nfc-template_show.modern-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 4)
                                        @include('user.nfc-template_show.sleek-template')
                                    @endif
                            </div>
                            <div class="col-md-4">
                                {!! QrCode::size(300)->generate(url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id))) !!}
                            </div>
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
