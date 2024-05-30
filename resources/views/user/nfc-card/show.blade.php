@extends('user.layout.base')
@section('title', 'NFC Card Preview')
@push('styles')
<link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
<style>
    /* Custom CSS to make the modal slide from right */
.modal.right .modal-dialog {
    position: fixed;
    right: 0;
    margin: auto;
    width: 30%;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
    -ms-transform: translate3d(0%, 0, 0);
    -o-transform: translate3d(0%, 0, 0);
    transform: translate3d(0%, 0, 0);
}

.modal.right .modal-content {
    height: 75%;
    overflow-y: auto;
}

.modal.right .modal-body {
    padding: 15px 15px 80px;
}

/* Rotate icon */
.btn-rotate {
    transition: transform 0.3s ease;
}

.btn-rotate.open {
    transform: rotate(90deg);
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
            <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">PREVIEW NFC CARD</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i
                        class="fas fa-list pe-1"></i>All NFC CARD</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Album Tab content START -->
                <div class="mb-0 pb-5">
                    <div class="row g-3">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}" class="fs-4"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="fs-4" data-bs-toggle="modal" data-bs-target="#cogModal"><i class="fas fa-cog"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-copy"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-share"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-envelope"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-image"></i></a>
<<<<<<< HEAD
                                    <a href="{{url('nfcqrurl-download/' . encryptor('encrypt', $nfc_card->id).'/'.$nfc_card->client_id)}}" class="fs-4"><i class="fas fa-download"></i></a>

                                    <a href="" class="fs-4"><i class="fas fa-download"></i></a>
                                    <a href="{{ route('email_signature', encryptor('encrypt', $nfc_card->id)) }}" class="fs-4"><i class="fas fa-envelope"></i></a>
>>>>>>> f82ef104228a1123f28d4b67abaeb7e3b7215015
                                    <a href="" class="fs-4"><i class="fas fa-file-pdf"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="col-md-8"></div>
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
                                {!! QrCode::size(300)->generate(url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id).'/'.$nfc_card->client_id)) !!}
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
<!-- Modal START -->
<div class="modal right fade" id="cogModal" tabindex="-1" aria-labelledby="cogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cogModalLabel">Card settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Pause card
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-lock me-2"></i>Personalized link</span>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-lock me-2"></i>QR code logo</span>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Renew link
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-lock me-2"></i>Add tracking code</span>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Modal END -->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@endpush
