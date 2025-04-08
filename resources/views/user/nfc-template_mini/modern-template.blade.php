<style>
    .modern {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .modern:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        transform: scale(1.05);
    }
    .modern_header {
        height:195px;
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

.design-card-active {
            border: 1px solid {{ $nfc_card->card_design->color ? $nfc_card->card_design->color : 'rgb(0, 247, 255)' }};
        }
        #sleek_header_image,#header_text,#modern_header{
            background: {{ $nfc_card->card_design->color ? $nfc_card->card_design->color : 'rgb(0, 247, 255)' }};
        }

        .active-text-color{
            color: {{ $nfc_card->card_design->color  ? $nfc_card->card_design->color ?? '#9c9a9a' : '#9c9a9a'}};
        }

        .card{
            font-family: {{ $nfc_card->card_design->font ? "$nfc_card->card_design->font" ?? 'nunito' : 'nunito'}}" !important;
        }
        /* .logo-image-preview{
            margin-top: .8rem !important;
        } */

        .f-name,.m-name,.l-name,.field-title, .deprtment,.goes-by{
            font-family: {{ $nfc_card->card_design->font ? "$nfc_card->card_design->font" ?? 'nunito' : 'nunito'}} !important;
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
</a>
