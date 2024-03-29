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
                        <!-- <img src="assets/images/header_image.png" alt="abc" width="100px" srcset="" /> -->
                    </div>
                    <div class="col-sm-12 p-0">
                        @if ($nfc_card->nfc_info?->prefix)
                            <span class="fs-4    fw-bold">{{ $nfc_card->nfc_info?->prefix }}</span>
                        @else
                            <span class="fs-4 fw-bold">Dr.</span>
                        @endif
                        <span class="fs-3 fw-bold"> 
                            {{ $nfc_card->client?->fname }}
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
                    <div class="">
                    @if ($nfc_card->client?->image)
                        <div class="CardAvatar">
                            <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image)}}"
                        class="modern_card_image img-fluid" alt="" />
                    </div>
                    @else
                    <div class="CardAvatar">
                        <img src="{{ asset('public/assets/nfc/images/123.png')}}"
                            class="modern_card_image img-fluid" alt="" />
                    </div>
                    @endif
                <div>
                    @if ($nfc_card->nfc_info?->title)
                        <p class="text-justify">{{ $nfc_card->nfc_info?->title }}</p>
                    @else
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda animi alias
                            vitae! Magnam, esse consequatur culpa mollitia officiis at saepe cum iure. Reprehenderit
                            voluptates
                        </p>
                    @endif
                </div>
                </header>
                <div class="CardBox css-19niztd">
                    <div class="css-qcxc6v px-4 pb-3">
                        @if ($nfc_card->nfc_info?->headline)
                            <p class="my-1">{{ $nfc_card->nfc_info?->headline }}</p>
                        @else
                            <p class="my-1 fs-6 text-secondary">Our Concern</p>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="d-flex px-4 pb-3">
                        <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                            <path fill-rule="evenodd"
                            d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                            clip-rule="evenodd" />
                        </svg>
                        <span>Goes by
                        <span class="card_owner mx-1">{{ $nfc_card->client?->fname }}</span>
                        </span>
                        <span>({{ $nfc_card->nfc_info?->pronoun }})</span>
                    </div>
                </div>
            </div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="modern_card">
                            <ul class="list-group">
                                 @foreach ($nfc_card->nfcFields as $nfcField)
                                <li class="list-group-item">
                                    <i class="{{$nfcField->icon}}"></i>
                                    <a href="#" class="mx-1">
                                        <img src="assets/images/email.png" alt="" srcset="" width="25px">
                                    </a>
                                    <a href="#">{{ $nfcField->pivot->field_value}}</a>
                                </li>
                                @endforeach
                                <!-- <li class="list-group-item">
                                <a href="#" class="mx-1">
                                    <img src="assets/images/email.png" alt="" srcset="" width="25px">
                                </a>
                                <a href="#">kaiser@gmail.com</a>
                                </li>
                                <li class="list-group-item">
                                <a href="#" class="mx-1">
                                    <img src="assets/images/phone-call.png" alt="" srcset="" width="25px">
                                </a>
                                <a href="#">018581111111</a>
                                </li>
                                <li class="list-group-item">
                                <a href="#" class="mx-1">
                                    <img src="assets/images/credit-card.png" alt="" srcset="" width="25px">
                                </a>
                                <a href="#">Google</a>
                                </li> -->
                            </ul>
                        </div> 
                    </div>
                </div>
            </section>

{{--<header class="modern_header">
    <div class="">
        <img src="{{ asset('public/assets/nfc/images/header_image.png') }}" alt="abc" width="100px"
            srcset="" />
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