@extends('user.layout.base')
@section('title', 'NFC Card')
@section('content')
@push('styles')
<style>
    .card {
        /* background-color: #f0f0f0; */
        transition: transform 0.3s ease;
        
    }
    .card:hover {
        transform: scale(1.05); /* Adjust the value to change the amount of upward flow */
    }
    .addNew{
        border:1px dashed black;
    }
</style>
@endpush
    <!-- Bordered table start -->
    {{--<div class="row">
        <div class="col-3">
            <div class="card">
                <a href="{{ route('nfc_card.create') }}">
                    <div class="card-body">
                        <i class="fa fa-plus"></i>
                        Add Card
                    </div>
                </a>
            </div>
        </div>
    </div>--}}
    <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <a href="{{ route('nfc_card.create') }}">
                    <div class="card addNew" style="height: 400px; overflow:hidden; width: 320px;">
                        <div class="card-body text-center" style="padding-top: 175px">
                            <i class="fa fa-plus"></i>
                            Add Card
                        </div>
                    </div>
                </a>
            </div>
            @forelse ($nfc_cards as $nfc_card)
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card" style="height: 400px; overflow:hidden; width: 320px;">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}">  
                            @if ($nfc_card->card_design?->design_card_id == 1)
                                @include('user.nfc-template.classic-template')
                            @elseif($nfc_card->card_design?->design_card_id == 2)
                                @include('user.nfc-template.flat-template')
                            @elseif($nfc_card->card_design?->design_card_id == 3)
                                @include('user.nfc-template.modern-template')
                            @elseif($nfc_card->card_design?->design_card_id == 4)
                                @include('user.nfc-template.sleek-template')
                            @endif
                        </a>
                        {{--<a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"></a>--}}
                    </div>
                    
                </div>
                
            </div>
        @empty
            No Card Found
        @endforelse
    </div>
@endsection
