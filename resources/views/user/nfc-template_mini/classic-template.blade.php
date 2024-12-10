<style>
    .classic_header_image_show {
        height: 325px;
    }

    .classic_svg_show {
        top: 140px;
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
                        <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}" class="img-fluid">
                        </img>
                    @else
                        <img
                            src="{{ asset('public/assets/nfc/images/123.png') }}">
                    @endif
                    <div class="classic_svg_show">
                        <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 70" xmlns="http://www.w3.org/2000/svg"
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
                        </svg>
                        <div class="container-fluid mt-2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-flex">
                                        <div style="border-left: 1px dashed black;"></div>
                                        <div class="ps-2">
                                            @if ($nfc_card->nfc_info?->prefix)
                                                <span
                                                    class="me-2 fs-6 fw-bold">{{ $nfc_card->nfc_info?->prefix }}</span>
                                            @else
                                                {{-- <span class="fs-4 fw-bold">Dr.</span> --}}
                                            @endif
                                            <span class="fs-6 fw-bold">{{ $nfc_card->client?->fname }}</span>
                                            <span class="fs-6 fw-bold">{{ $nfc_card->client?->middle_name }}</span>
                                            <span class="fs-6 fw-bold">{{ $nfc_card->client?->last_name }}</span>
                                            <div>
                                                @if ($nfc_card->nfc_info?->suffix)
                                                    <span class="fs-6">{{ $nfc_card->nfc_info?->suffix }}</span>
                                                @else
                                                    {{-- <span class="fs-4 fw-bold">FCP</span> --}}
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div>
                                                    @if ($nfc_card->nfc_info?->department)
                                                        <small>{{ $nfc_card->nfc_info?->department }}</small>
                                                    @else
                                                        {{-- <span class="fs-5 fw-bold">Software Development</span> --}}
                                                    @endif
                                                    @if ($nfc_card->nfc_info?->company)
                                                        <small>{{ $nfc_card->nfc_info?->company }}</small>
                                                    @else
                                                        {{-- <p class="fs-6 fst-italic">Muktodhara Technology Limited</p> --}}
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 border-top">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <span class="fw-bold fs-6">Work</span>
                                <small style="font-size: 10px;">December 01,2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</a>
