<style>
    .modern {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .modern:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        transform: scale(1.05);
    }
    .modern_header {
        height:200px;
        padding: 50px;
        position: relative;
        color: #8F60DE;
        /* background: linear-gradient(-190deg, rgb(19, 18, 18) 90%, #CAC4C4 0%); */
        clip-path: polygon(0px 0px, 100% 0px, 100% calc(100% - 7rem), 0px 100%);
        background: linear-gradient(251.74deg, rgb(4, 4, 5) -20.73%, rgb(5, 4, 5) 127.58%);
    }

    .header_body {
        background-color: #CAC4C4;
        height:200px
    }
    .modern_card_image_show {
        height: var(--chakra-sizes-full);
        max-height: 6rem;
        max-width: var(--chakra-sizes-full);
        object-fit: contain;
        object-position: left center;
        width: var(--chakra-sizes-full);
        position: relative;
    }
    .CardAvatar img {
    border-radius: 50%;
    width: 100%;
}
</style>
<a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}">
    <div class="modern">
        <div class="card">
            <div class="col-md-12">
                <header class="modern_header">
                    <div class="">
                        @if ($nfc_card->client?->image)
                        <div class="CardAvatar">
                            <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image)}}"
                                class="modern_card_image_show img-fluid" alt="" />
                        </div>
                        @else
                        <div class="CardAvatar">
                            <img src="{{ asset('public/assets/nfc/images/123.png')}}"
                                class="modern_card_image img-fluid" alt="" />
                        </div>
                        @endif
                    </div>
                </header>
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
</a>
