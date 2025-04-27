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
                        <img
                            src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}">
                    @else
                        <img
                            src="{{ asset('public/assets/nfc/images/123.png') }})">
                    @endif
                    <div class="classic_svg_show">
                        <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 70" xmlns="http://www.w3.org/2000/svg" class="css-fxun4i">
                            @if ($nfc_card->card_type == 1)
                                <rect width="246" height="100" fill="white"></rect>
                            @else
                                <rect width="246" height="100" fill="white"></rect>
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


