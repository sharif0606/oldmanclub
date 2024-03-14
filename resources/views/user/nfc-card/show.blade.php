@extends('user.layout.base')
@section('title', 'NFC Card Preview')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <div class="row">
        <div>
            <a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"><i class="fa fa-edit"></i></a>
        </div>
        <div class="col-md-4">
            <div class="card">
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
        </div>
        <div class="col-md-4">
            {!! QrCode::size(300)->generate(url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id))) !!}
        </div>
    </div>
@endsection
