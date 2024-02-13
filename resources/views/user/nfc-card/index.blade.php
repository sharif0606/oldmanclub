@extends('user.layout.app')
@section('title', 'NFC Card')
@section('content')
    <!-- Bordered table start -->
    <div class="row">
        <div class="col-3">
            <div class="card">
                <a href="{{ route('nfc_card.create') }}">
                    <div class="card-body">
                        <i class="fa fa-plus"></i>
                        Add New
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($nfc_cards as $nfc_card)
            <div class="col-md-4" style="max-height: 490px;overflow:hidden">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}"><i
                            class="fas fa-eye"></i></a>
                    <a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"><i
                            class="fas fa-edit"></i></a>
                </div>
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

        @empty
            No Card Found
        @endforelse
    </div>
@endsection
