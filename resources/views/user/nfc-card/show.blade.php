@extends('user.layout.app')
@section('title', 'NFC Card Preview')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <div class="row">
        <div class="col-5">
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
        <div class="col-3">
            {!! QrCode::size(300)->generate(url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id))) !!}
        </div>
    </div>
@endsection
