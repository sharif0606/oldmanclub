<style>
    .header_sleek {
    border: none;
    width: 100%;
    height: 200px;
}

.sleek_header_image {
    background: rgb(74, 74, 74);
    clip-path: circle(100% at 50% 0%);
    padding-top: 100%;
    position: relative;
}
.css-79elbk {
    height: var(--chakra-sizes-full);
    position: absolute;
    top: 0;
    width: 100%;
    /* right: -60px; */
    /* width: var(--chakra-sizes-full); */
}
.sleek {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .sleek:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        /* Stronger box-shadow on hover */
        transform: scale(1.05);
        /* Zoom effect on hover */
    }


</style>
<a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}">
    <div class="sleek">
        <div class="card">
            <div class="col-md-12">
                <div class="header_sleek">
                    <div class="sleek_header_image mb-2">
                        <div class="css-79elbk">
                            @if ($nfc_card->client?->image)
                                <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}"
                                    alt="" srcset="" class="" width="100%">
                            @else
                                <img src="{{ asset('public/assets/nfc/images/123.png') }}" alt="" srcset=""
                                    class="" width="100%">
                            @endif
                        </div>
                    </div>
                    <p class="text-center" style="font-size:18px;color:#676A79">
                        @if ($nfc_card->card_type == 1)
                                Work
                            @else
                                Personal
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</a>
