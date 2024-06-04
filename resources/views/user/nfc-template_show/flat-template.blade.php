    <header>
        <div class="header_section">
            <div>
                @if ($nfc_card->client?->image)
                    <img class="display-profile-pic"  src="{{ asset('public/uploads/client/' . $nfc_card->client?->image)}}" alt="" width="350px" height="300px">
                    <!-- <div class="main-img" style="background-image: url({{ asset('public/uploads/client/' . $nfc_card->client?->image)}});"></div> -->
                @else
                    <div class="main-img display-profile-pic" style="background-image: url({{ asset('public/assets/nfc/images/123.png') }}) width:350px;" >
                    </div>
                @endif
            </div>
            <div class="header_text" id="header_text"></div>
        </div>
        <div class="d-none d-sm-block">
            @if ($nfc_card->card_design?->logo)
                <img src="{{ asset($nfc_card->card_design?->logo) }}" alt="abc" width="60px"
                    srcset="" />
            @else
                <img src="{{ asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px"
                    srcset="" />
            @endif
        </div>
    </header>
 <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                     @if ($nfc_card->nfc_info?->prefix)
                        <span class="fs-4    fw-bold">{{ $nfc_card->nfc_info?->prefix }}</span>
                    @else
                        <span class="fs-4 fw-bold">Dr.</span>
                    @endif

                    <span class="fs-4 fw-bold">{{ $nfc_card->client?->fname }}</span>
                    <span class="fs-4 fw-bold">{{ $nfc_card->client?->middle_name }}</span>
                    <span class="fs-4 fw-bold">{{ $nfc_card->client?->last_name }}</span>
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
                    </span>
                    @if ($nfc_card->nfc_info?->accreditations)
                        <span>&nbsp;{{ $nfc_card->nfc_info?->accreditations }}</span>
                    @else
                        <span>&nbsp;FCPS</span>
                    @endif
                </div>
            </div>
            <div class="row">
                @if ($nfc_card->nfc_info?->title)
                    <p class="text-justify">{{ $nfc_card->nfc_info?->title }}</p>
                @else
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda animi alias
                        vitae! Magnam, esse consequatur culpa mollitia officiis at saepe cum iure. Reprehenderit
                        voluptates
                        ratione deserunt hic veritatis fuga quidem!Accusamus placeat dolore quis natus doloremque at
                        incidunt recusandae error maiores autem maxime cupiditate, quasi aliquid cumque iste inventore,
                        ullam fugit a minus blanditiis facere molestiae dicta illo assumenda. Eos?</p>
                @endif
            </div>
            <div class="row">
                <div>
                     @if ($nfc_card->nfc_info?->department)
                        <span class="fs-5 fw-bold">{{ $nfc_card->nfc_info?->department }}</span>
                    @else
                        <span class="fs-5 fw-bold">Software Development</span>
                    @endif
                    @if ($nfc_card->nfc_info?->company)
                        <p class="fs-6 fw-bold">{{ $nfc_card->nfc_info?->company }}</p>
                    @else
                        <p class="fs-6 fst-italic">Muktodhara Technology Limited</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid mt-4">

            @if ($nfc_card->nfc_info?->headline)
                <p class="my-1">{{ $nfc_card->nfc_info?->headline }}</p>
            @else
                <p class="my-1 fs-6 text-secondary">Our Concern</p>
            @endif

            <div class="row">
                <div class="d-flex">
                    <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                        <path fill-rule="evenodd"
                            d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                            clip-rule="evenodd" />
                    </svg>
                     <span class="card_owner">Goes by
                        @if ($nfc_card->nfc_info?->preferred_name)
                            {{ $nfc_card->nfc_info?->preferred_name }}
                        @else
                            Kaisar (sam)
                        @endif
                    </span>
                </div>
            </div>
            <div class="row">
                <ul class="list-group social-user-ul">
                    @foreach ($nfc_card->nfcFields as $nfcField)
                        <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                            <i class="{{ $nfcField->icon }}"></i>
                            <a href="#" class="mx-1">
                                <img src="assets/images/email.png" alt="" srcset="" width="25px">
                            </a>
                            <a href="#" class="social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                        </li>
                    @endforeach
                    <!-- <li class="list-group-item">
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
    </section>
