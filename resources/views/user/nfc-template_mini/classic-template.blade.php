<style>
    .classic_svg_show {
        bottom: 0px;
        /* left: 0px; */
        /* right: 0px; */
        position: absolute;
        width: calc(100% + 0px);

    }

    .classic {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .classic:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        /* Stronger box-shadow on hover */
        transform: scale(1.05);
        /* Zoom effect on hover */
    }
</style>
<a href="{{ route('nfc_card.show', encryptor('encrypt', $nfc_card->id)) }}">
    <div class="classic">
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
                        <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 100" xmlns="http://www.w3.org/2000/svg"
                            class="css-fxun4i">
                            @if ($nfc_card->card_type == 1)
                                <path clip-rule="evenodd"
                                    d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 43 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                                    fill="white" fill-rule="evenodd"></path>
                                <path clip-rule="evenodd"
                                    d="M 0,35.773438 V 100 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z"
                                    fill="white" fill-rule="evenodd"></path>
                                <path clip-rule="evenodd"
                                    d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z"
                                    fill="#4A4A4A" fill-rule="evenodd"></path>
                            @else
                                <path clip-rule="evenodd"
                                    d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 43 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                                    fill="white" fill-rule="evenodd"></path>
                                <path clip-rule="evenodd"
                                    d="M 0,35.773438 V 100 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z"
                                    fill="white" fill-rule="evenodd"></path>
                                <path clip-rule="evenodd"
                                    d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z"
                                    fill="#6785F5" fill-rule="evenodd"></path>
                            @endif
                            <text x="123" y="85" font-family="Arial" font-size="28" fill="#676A79" text-anchor="middle">
                                @if ($nfc_card->card_type == 1)
                                    Work
                                @else
                                    Personal
                                @endif
                            </text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
