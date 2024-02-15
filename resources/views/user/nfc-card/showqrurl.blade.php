@extends('user.layout.nfc')
@section('title', 'NFC Card Preview')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                @if ($nfc_card->card_design?->design_card_id == 1)
                    @include('user.nfc-template.classic-template')
                @elseif($nfc_card->card_design?->design_card_id == 2)
                    @include('user.nfc-template.flat-template')
                @elseif($nfc_card->card_design?->design_card_id == 3)
                    @include('user.nfc-template.modern-template')
                @elseif($nfc_card->card_design?->design_card_id == 4)
                    @include('user.nfc-template.sleek-template')
                @endif
            </div>
        </div>
        <div class="col-md-4 offset-md-4">
            {{-- {!! QrCode::size(300)->generate(Request::url()) !!} --}}
            <button id="openDrawer" class="btn btn-secondary my-2">Save Contact</button>
            <div class="modal fade bottom px-0" id="drawerModal" tabindex="-1" aria-labelledby="drawerTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="drawerTitle">Save Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <a href="{{ route('save_contact', encryptor('encrypt', $nfc_card->id)) }}"
                                class="btn btn-primary">Save Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
