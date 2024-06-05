<style>
    @font-face {
        font-family: 'FontAwesome';
        src: url('{{ public_path('user/assets/vendor/font-awesome/webfonts/fa-brands-400.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    .classic_svg_show {
        bottom: 0px;
        /* left: 0px; */
        /* right: 0px; */
        position: absolute;
        width: calc(100% + 0px);
    }
</style>

<div class="card p-3">
    <div class="col-md-12">
        <div class="classic_header_image_show">
            @if ($nfc_card->client?->image)
                <img class="display-profile-pic"  src="{{ asset('public/uploads/client/' . $nfc_card->client?->image) }}" alt="" width="350px"
                    height="350px" id="display-profile-pic">
                <!-- <div class="main-img" style="background-image: url({{ asset('public/uploads/client/' . $nfc_card->client?->image) }})"></div> -->
            @else
                <img class="display-profile-pic"  src="{{ asset('public/assets/nfc/images/123.png') }}" alt="" width="100%" id="diplay-profile-pic">
                <!-- <div class="main-img" style="background-image: url({{ asset('public/assets/nfc/images/123.png') }})" id="diplay-profile-pic">
                </div> -->
            @endif

            <div class="classic_svg_show">
                <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 57" xmlns="http://www.w3.org/2000/svg"
                    class="css-fxun4i">
                    @if ($nfc_card->card_type == 1)
                        <path id="forground" clip-rule="evenodd"
                            d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                            fill="white" fill-rule="evenodd"></path>
                        <path id="background" clip-rule="evenodd"
                            d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                            fill="white" fill-rule="evenodd"></path>
                        <path id="wave" clip-rule="evenodd"
                            d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                            fill="{{ $nfc_card->card_design->color ?? ''}}" fill-rule="evenodd"></path>
                    @else
                        <path id="forground" clip-rule="evenodd"
                            d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                            fill="white" fill-rule="evenodd"></path>
                        <path id="background" clip-rule="evenodd"
                            d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                            fill="white" fill-rule="evenodd"></path>
                        <path id="wave" clip-rule="evenodd"
                            d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                            fill="#6785F5" fill-rule="evenodd"></path>
                    @endif
                </svg>
                <div class="classic_image d-none d-sm-block">
                        <img src="{{ asset('public/uploads/cards/'. $nfc_card->card_design?->logo ?? 'public/assets/nfc/images/logo.png') }}" alt="abc" width="60px"
                            id="logo-image-preview" />
                </div>
            </div>
        </div>
    </div>
    <section class="middle" style="padding: 0px !important">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-sm-12">
                    <span class="fs-4 fw-bold" id="prefix-name">{{ $nfc_card->nfc_info?->prefix ?? '' }}</span>
                    <span class="fs-4 fw-bold" id="f-name">{{ $nfc_card->client?->fname ?? '' }}</span>
                    <span class="fs-4 fw-bold" id="m-name">{{ $nfc_card->client?->middle_name ?? '' }}</span>
                    <span class="fs-4 fw-bold" id="l-name">{{ $nfc_card->client?->last_name ?? '' }}</span>

                    <div>
                        <span class="fs-4 fw-bold" id="suffix-name">{{ $nfc_card->nfc_info?->suffix ?? ''}}</span>
                        <span class="fs-4 fw-bold" id="maiden_name">{{ $nfc_card->nfc_info?->maiden_name ?? '' }}</span>
                            <span id="accreditations">&nbsp;{{ $nfc_card->nfc_info?->accreditations ?? '' }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                    <p class="text-justify" id="field-title">{{ $nfc_card->nfc_info?->title ?? '' }}</p>
            </div>
            <div class="row">
                <div>
                    <span class="fs-5 fw-bold" id="deprtment">{{ $nfc_card->nfc_info?->department ?? ''}}</span>
                        <p class="fs-6 fw-bold" id="company">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                        <span class="fs-5 fw-bold" >{{ $nfc_card->nfc_info?->department ?? ''}}</span>
                </div>
            </div>
        </div>
    </section>
    <section style="padding: 0px !important">
        <div class="container-fluid px-3">
            <div class="row">
                    <p class="my-1" id="headline">{{ $nfc_card->nfc_info?->headline ?? '' }}</p>

                <div class="d-flex my-1">
                    <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                        <path fill-rule="evenodd"
                            d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="card_owner">
                            Goes by <span class="text-dark" id="preferred_name">{{ $nfc_card->nfc_info?->preferred_name ?? ''}}</span>
                    </span>
                </div>
            </div>
            <div class="row">
                <div id="badge-preview">
                    @foreach ( $nfc_card->badges as $bagde)
                        <div class="image-container " id="badge-preview-{{ $bagde->id }}">
                                <img class="avatar-img rounded-border-10 border border-white border-3"
                                    src="{{ asset('public/uploads/cards/badges/'. $bagde->badge_image ?? '') }}"
                                    alt="" id="badge-placeholder-{{ $bagde->id }}">
                        </div>
                    @endforeach
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
</div>
