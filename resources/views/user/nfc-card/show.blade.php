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
                    <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i class="fas fa-list pe-1"></i>All
                        NFC CARD</a>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-5">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"
                                        class="fs-4"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="fs-4" data-bs-toggle="modal" data-bs-target="#cogModal"><i
                                            class="fas fa-cog"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-copy"></i></a>
                                    <a href="#" class="fs-4" data-bs-toggle="modal" data-bs-target="#shareModal"
                                        title="Transfer"><i class="fas fa-share"></i></a>
                                    <a href="{{ route('virtual_background', encryptor('encrypt', $nfc_card->id)) }}" class="fs-4"><i class="fas fa-image"></i></a>
                                    <a href="{{ url('nfcqrurl-download/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id) }}"
                                        class="fs-4"><i class="fas fa-download"></i></a>
                                    <a href="{{ route('email_signature', encryptor('encrypt', $nfc_card->id)) }}"
                                        class="fs-4"><i class="fas fa-envelope"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-file-pdf"></i></a>
                                    <a href="" class="fs-4"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
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
                                {!! QrCode::size(300)->generate(
                                    url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                ) !!}
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
    <!-- Modal Cog START -->
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



    <!-- Modal Share Start-->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Card Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Transfer card to?</strong>
                    <p>
                        If you initiate a card transfer, you will no longer be able to view or edit the card once it has a
                        new owner. If you still wish to transfer this card to someone else, enter their email or phone
                        number and press Continue.
                    </p>
                    <ul class="nav nav-pills custom-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="email-tab" data-bs-toggle="pill" data-bs-target="#email"
                                type="button" role="tab" aria-controls="email" aria-selected="true">Email</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="text-tab" data-bs-toggle="pill" data-bs-target="#text"
                                type="button" role="tab" aria-controls="text" aria-selected="false">Text</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent" style="padding: 0 !important">
                            <div class="tab-pane fade show active" id="email" role="tabpanel"
                                aria-labelledby="email-tab">
                                <input name="email" type="text" class="form-control " placeholder="Enter an Email">
                            </div>
                            <div class="tab-pane fade" id="text" role="tabpanel" aria-labelledby="text-tab">
                                <div class="row gx-1">
                                    <div class="col-sm-3">
                                        <select name="nationality" class="form-control"
                                            onchange="fetchCountryCode(this.value)">
                                            <option value="">Country</option>
                                            @foreach ($countries as $value)
                                                <option value="{{ $value->id }}"
                                                    @if (old('nationality', $client->nationality) == $value->id) selected @endif>
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                    <input name="email" type="text" class="form-control">
                                    </div>
                                </div>
                               
                            </div>
                       
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary">Continue</button>
                    <!-- Add your action button here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@endpush
