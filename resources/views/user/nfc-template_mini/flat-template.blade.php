<style>
    .flat {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .flat:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        /* Stronger box-shadow on hover */
        transform: scale(1.05);
        /* Zoom effect on hover */
    }
</style>
<a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}">
    <div class="flat">
        <div class="card">
            <div class="col-md-12">
                <div class="classic_header_image_show">
                    @if ($nfc_card->client?->image)
                        <div
                            style="background-image: url({{ asset('public/uploads/client/' . $nfc_card->client?->image) }});width:100%;height:200px;background-position: center center;
                background-size: cover;">
                        </div>
                    @else
                        <div
                            style="background-image: url({{ asset('public/assets/nfc/images/123.png') }});width:100%;height:200px;background-position: center center;
            background-size: cover;">
                        </div>
                    @endif
                    <div class="classic_svg_show">
                        <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 70" xmlns="http://www.w3.org/2000/svg" class="css-fxun4i">
                            @if ($nfc_card->card_type == 1)
                                <rect width="246" height="100" fill="white"></rect>
                            @else
                                <rect width="246" height="100" fill="white"></rect>
                            @endif
                            <text x="123" y="50" font-family="Arial" font-size="28" fill="#676A79" text-anchor="middle">
                                {{$nfc_card->card_name}}
                                {{-- @if ($nfc_card->card_type == 1)
                                    Work
                                @else
                                    Personal
                                @endif --}}
                            </text>
                        </svg>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>


