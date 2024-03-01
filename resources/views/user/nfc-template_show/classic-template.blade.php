<style>
    .classic_svg_show{
        bottom: 0px;
        /* left: 0px; */
        /* right: 0px; */
        position: absolute;
        width: calc(100% + 0px);
    }
</style>
<div>
    <header>
        <div class="classic_header_image">
            @if ($nfc_card->client?->image)
                <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image)}}" alt="" width="350px" height="350px">
                <!-- <div class="main-img" style="background-image: url({{ asset('public/uploads/client/' . $nfc_card->client?->image) }})"></div> -->
            @else
                <img src="{{ asset('public/assets/nfc/images/123.png')}}" alt="" width="100%">
                <!-- <div class="main-img" style="background-image: url({{ asset('public/assets/nfc/images/123.png') }})">
                </div> -->
            @endif
            
            <div class="classic_svg_show">
                <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 57" xmlns="http://www.w3.org/2000/svg"
                    class="css-fxun4i">
                    @if($nfc_card->card_type==1)
                        <path clip-rule="evenodd"
                            d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                            fill="white" fill-rule="evenodd"></path>
                        <path clip-rule="evenodd"
                            d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                            fill="white" fill-rule="evenodd"></path>
                        <path clip-rule="evenodd"
                            d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                            fill="#4A4A4A" fill-rule="evenodd"></path>
                    @else
                        <path clip-rule="evenodd"
                            d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                            fill="white" fill-rule="evenodd"></path>
                        <path clip-rule="evenodd"
                            d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                            fill="white" fill-rule="evenodd"></path>
                        <path clip-rule="evenodd"
                            d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                            fill="#6785F5" fill-rule="evenodd"></path>
                    @endif
                </svg>
                <div class="classic_image d-none d-sm-block">
                    @if ($nfc_card->card_design?->logo)
                        <img src="{{ asset($nfc_card->card_design?->logo) }}" alt="abc" width="60px"
                            srcset="" />
                    @else
                        <img src="{{ asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px"
                            srcset="" />
                    @endif
                </div>
            </div>
        </div>
    </header>
    <section class="middle">
        <div class="container-fluid mt-5">
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

                    <div>
                        @if ($nfc_card->nfc_info?->suffix)
                            <span class="fs-4 fw-bold">{{ $nfc_card->nfc_info?->suffix }}</span>
                        @else
                            <span class="fs-4 fw-bold">FCP</span>
                        @endif
                        <span class="fs-4 fw-bold">
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
        <div class="container-fluid px-3">
            <div class="row">
                @if ($nfc_card->nfc_info?->headline)
                    <p class="my-1">{{ $nfc_card->nfc_info?->headline }}</p>
                @else
                    <p class="my-1 fs-6 text-secondary">Our Concern</p>
                @endif

                <div class="d-flex my-1">
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
</div>
