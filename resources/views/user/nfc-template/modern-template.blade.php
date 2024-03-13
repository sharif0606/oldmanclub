   <style>
    .modern_header {
        /* background-color: #414141; */
        /* margin-bottom: 1.5rem; */
        /* min-height: 6rem; */
        /* padding: 2rem 2rem 0px; */
        height:360px;
        padding: 50px;
        position: relative;
        color: #8F60DE;
        /* background: linear-gradient(-190deg, rgb(19, 18, 18) 90%, #CAC4C4 0%); */
        clip-path: polygon(0px 0px, 100% 0px, 100% calc(100% - 7rem), 0px 100%);
        background: linear-gradient(251.74deg, rgb(4, 4, 5) -20.73%, rgb(5, 4, 5) 127.58%);
    }

    .header_body {
        background-color: #CAC4C4;
        height:400px
    }
    .modern_card_image_show {
        height: var(--chakra-sizes-full);
        max-height: 6rem;
        max-width: var(--chakra-sizes-full);
        object-fit: contain;
        object-position: left center;
        width: var(--chakra-sizes-full);
        margin-top: -263px;
        position: relative;
    }
   </style>
   <div class="header_body">
        <header class="modern_header">
            <div class="">
                @if ($nfc_card->card_design?->logo)
                 <img src="{{ asset($nfc_card->card_design?->logo) }}" alt="abc" width="60px"
                     />
                @else
                    <img src="{{ asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px"
                        srcset="" />
                @endif
            </div>
            <div class="col-sm-12 p-0">
                @if ($nfc_card->nfc_info?->prefix)
                    <span class="fs-4    fw-bold">{{ $nfc_card->nfc_info?->prefix }}</span>
                @else
                    <span class="fs-4 fw-bold">Dr.</span>
                @endif
                <span class="fs-3 fw-bold">{{ $nfc_card->client?->fname }}
                    {{ $nfc_card->client?->middle_name }}
                    {{ $nfc_card->client?->last_name }}
                </span><br />
                @if ($nfc_card->nfc_info?->suffix)
                    <span class="fs-4 fw-bold">{{ $nfc_card->nfc_info?->suffix }}</span>
                @else
                    <span class="fs-4 fw-bold">FCP</span>
                @endif
                <span class="fs-2 fw-bold">
                    @if ($nfc_card->nfc_info?->maiden_name)
                        ({{ $nfc_card->nfc_info?->maiden_name }})
                    @else
                        (Shuvo)
                    @endif
                </span><br>
                @if ($nfc_card->nfc_info?->accreditations)
                    <span>&nbsp;{{ $nfc_card->nfc_info?->accreditations }}</span>
                @else
                    <span>&nbsp;FCPS</span>
                @endif
            </div>
            
            <div>
                <!-- <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's
                </p> -->
            </div>
        </header>
        {{--<div class="CardBox css-19niztd">
            <div class="css-qcxc6v px-4 pb-3">Our Concern</div>
        </div>
        <div>
            <div class="d-flex px-4 pb-3">
                <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                    <path fill-rule="evenodd"
                    d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                    clip-rule="evenodd" />
                </svg>
                <span>Goes by
                <span class="card_owner mx-1">Kaiser</span>
                </span>
                <span>(Sam)</span>
            </div>
        </div>--}}
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
        <div style="margin-top:-60px">
            <p class="text-center fs-6 fw-bold mx-auto">
                @if($nfc_card->card_type==1){{__('Work')}}
                @else
                    {{__('Personal')}}
                @endif
            </p>
        </div>
    </div>
    {{--<div class="header_body">
         <header class="modern_header w-100">
            <div class="">
                <img src="{{ asset('public/assets/nfc/images/header_image.png') }}" alt="abc" width="100px"
                     />
            </div>
            <div class="col-sm-12">
                <span class="fs-3 fw-bold"> Dr. Md. Kaiser Uddin FCP </span><br />
                <span class="fs-3 fw-bold">(Shuvo)</span>FCPs
            </div>
            <div class="">
                <div class="CardAvatar">
                    <img src="{{ asset('public/assets/nfc/images/123.png') }}"
                        class="modern_card_image img-fluid" alt="" />
                </div>
                <div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not
                        only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged.
                        Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not
                        only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged.
                    </p>
                </div>
        </header>
        <div class="CardBox css-19niztd">
            <div class="css-qcxc6v px-4 pb-3">Our Concern</div>
        </div>
        <div>
            <div class="d-flex px-4 pb-3">
                <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                    <path fill-rule="evenodd"
                        d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                        clip-rule="evenodd" />
                </svg>
                <span>Goes by
                    <span class="card_owner mx-1">Kaiser</span>
                </span>
                <span>(Sam)</span>
            </div>
        </div>
    </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="card modern_card">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#" class="mx-1">
                                <img src="assets/images/email.png" alt="" srcset=""
                                    width="25px">
                            </a>
                            <a href="#">kaiser@gmail.com</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="mx-1">
                                <img src="assets/images/phone-call.png" alt="" srcset=""
                                    width="25px">
                            </a>
                            <a href="#">018581111111</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="mx-1">
                                <img src="assets/images/credit-card.png" alt="" srcset=""
                                    width="25px">
                            </a>
                            <a href="#">Google</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>--}}
