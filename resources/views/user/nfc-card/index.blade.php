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
            <div class="col-4">
                <!-- Change the 'd' attribute to modify the shape -->
                <path d="M0 -24H72V54H0V-24Z" fill="blue"></path>
                <!-- Change the 'd' attribute to modify the shape -->
                <!-- Change the 'fill' attribute to change the color -->
                <path d="M72 72.5V39.18C44.16 29.9533 29.568 63.3176 0 41.7337V72.5H72Z" fill="red"></path>
                    <a href="{{ route('nfc_card.create') }}">
                        <svg viewBox="0 0 72 72" focusable="false" class="chakra-icon chakra-icon css-1uz6nvy" width="100%" height="100%" preserveAspectRatio="xMidYMid meet">
                            <g clip-path="url(#clip0_1931_53838)">
                               
                            </g>
                            <defs>
                                <clipPath id="clip0_1931_53838">
                                    <rect fill="white" height="72" rx="16" width="72"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                            <svg viewBox="0 0 72 72" focusable="false" class="chakra-icon chakra-icon"
                                width="100%" height="200px" preserveAspectRatio="xMidYMid meet">
                                <g clip-path="url(#clip0_1931_53838)">
                                    <!-- Change the 'd' attribute to modify the shape -->
                                    <path d="M0 -24H72V54H0V-24Z" fill="blue"></path>
                                    <!-- Change the 'd' attribute to modify the shape -->
                                    <!-- Change the 'fill' attribute to change the color -->
                                    <path d="M72 72.5V39.18C44.16 29.9533 29.568 63.3176 0 41.7337V72.5H72Z" fill="red">
                                    </path>
                                </g>
                                <defs>
                                    {!! $nfc_card->card_design?->design_card?->svg !!}
                                </defs>
                            </svg>
                       
                    </a>
              
            </div>
        @empty
            No Card Found
        @endforelse
    </div>
@endsection
