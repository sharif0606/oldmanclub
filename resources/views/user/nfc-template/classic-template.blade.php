<header>
    <div class="classic_header_image">
        @if ($nfc_card->client?->image)
            <div class="main-img" style="background-image: url({{ asset('public/assets/nfc/images/123.png') }})"></div>
        @else
            <div class="main-img" style="background-image: url({{ asset('public/assets/nfc/images/123.png') }})"></div>
        @endif
        <div class="classic_svg">
            <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 57" xmlns="http://www.w3.org/2000/svg"
                class="css-fxun4i">
                <path clip-rule="evenodd"
                    d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                    fill="white" fill-rule="evenodd"></path>
                <path clip-rule="evenodd"
                    d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                    fill="white" fill-rule="evenodd"></path>
                <path clip-rule="evenodd"
                    d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                    fill="#4A4A4A" fill-rule="evenodd"></path>
            </svg>
            <div class="classic_image d-none d-sm-block">
                @if ($nfc_card->card_design?->logo)
                    <img src="{{ asset($nfc_card->card_design?->logo) }}" alt="abc" width="80px"
                        srcset="" />
                @else
                    <img src="{{ asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="80px"
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
                <span class="fs-3 fw-bold"> {{ $nfc_card->nfc_info?->prefix }} {{ $nfc_card->client?->fname }}
                    {{ $nfc_card->client?->middle_name }} {{ $nfc_card->client?->last_name }}
                    {{ $nfc_card->nfc_info?->suffix }}</span><br />
                <span
                    class="fs-3 fw-bold">({{ $nfc_card->nfc_info?->maiden_name }})</span>&nbsp;{{ $nfc_card->nfc_info?->accreditations }}
            </div>
        </div>
        <div class="row">
            <p>{{ $nfc_card->nfc_info?->title }}</p>
        </div>
        <div class="row">
            <div>
                <span class="fs-5 fw-bold">{{ $nfc_card->nfc_info?->department }}</span><br />
                <span>{{ $nfc_card->nfc_info?->company }}</span>
            </div>
        </div>
    </div>
</section>
<section style="margin-left:20px;">
    <div class="container-fluid">
        <div class="row">
            <p>{{ $nfc_card->nfc_info?->headline }}</p>
        </div>
        <div class="row">
            <div class="d-flex">
                <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                    <path fill-rule="evenodd"
                        d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                        clip-rule="evenodd" />
                </svg>
                <span>Goes by
                    <span class="card_owner mx-1">{{ $nfc_card->nfc_info?->preferred_name }}</span>
                </span>
                <span>({{ $nfc_card->nfc_info?->pronoun }})</span>
            </div>
        </div>
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#" class="mx-1">
                        <img src="assets/images/email.png" alt="" srcset="" width="25px">
                    </a>
                    <a href="#">{{ $nfc_card->client?->email }}</a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="mx-1">
                        <img src="assets/images/phone-call.png" alt="" srcset="" width="25px">
                    </a>
                    <a href="#">{{ $nfc_card->client?->contact_no }}</a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="mx-1">
                        <img src="assets/images/credit-card.png" alt="" srcset="" width="25px">
                    </a>
                    <a href="#">Google</a>
                </li>
            </ul>
        </div>
    </div>
</section>
