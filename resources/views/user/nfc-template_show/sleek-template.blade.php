     @php
        $formType = isset($nfc_card)? 'edit' : 'create';
    @endphp
    <div class="">
        <div class="header_sleek">
            <div class="sleek_header_image" id="sleek_header_image">
                <div class="css-79elbk">
                    <img class="display-profile-pic"  src="{{ $formType=='edit' ?  asset('public/uploads/client/' . $nfc_card->client?->image) : asset('public/assets/nfc/images/123.png')}}"}}" alt="" srcset="" class="" width="100%">
                </div>
            </div>
            <div class="css-1fbwa35">
                <div class="card sleek_card mx-auto mb-3">
                    <div class="card_img">
                    <img src="{{ $formType=='edit' ? asset($nfc_card->card_design?->logo) :  asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="50px"
                        />
                        <!-- <img src="assets/images/header_image.png" width="50px" alt="" srcset=""> -->
                    </div>
                    <div class="CardBox mx-auto">
                        <p class="text-center fs-4 fw-bold">
                           {{ $formType=='edit' ? $nfc_card->client?->fname ?? '' : '' }}
                        </p>
                        <!-- <span class="css- fs-6 fw-bold">Dr. Md Kaisar Uddin FCP <br>
                        <span class="css-1oyqnxm">(shuvo)</span>
                        </span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
                <div class="col-sm-12">
                        <span class="fs-4    fw-bold">{{ $formType=='edit' ? $nfc_card->nfc_info?->prefix ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold">{{ $formType=='edit' ? $nfc_card->client?->fname ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold">{{ $formType=='edit' ? $nfc_card->client?->middle_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold">{{ $formType=='edit' ? $nfc_card->client?->last_name ?? '' : '' }}</span>

                    <div>
                            <span class="fs-4 fw-bold">{{ $formType=='edit' ? $nfc_card->nfc_info?->suffix ?? '' : ''}}</span>
                        <span class="fs-4 fw-bold">
                                ({{ $formType=='edit' ? $nfc_card->nfc_info?->maiden_name ?? '' : '' }})
                        </span>
                            <span>&nbsp;{{ $formType=='edit' ? $nfc_card->nfc_info?->accreditations  ?? '' : ''}}</span>
                    </div>
                </div>
            </div>
    </div>
    <div class="container" style="margin-top: 0px;
  position: relative;
  background-color: lightgray;">
        <div class="row">
            <p class="ps-4">Our Concern</p>
            <div class="d-flex ps-4">
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
    <div class="">
        <div class="">
            <div class="container">
                <ul class="list-group social-user-ul">
                    @if ($formType=='edit')
                        @foreach ($nfc_card->nfcFields as $nfcField)
                            <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                <i class="{{ $nfcField->icon }}"></i>
                                <a href="#" class="mx-1">
                                    <img src="assets/images/email.png" alt="" srcset="" width="25px">
                                </a>
                                <a href="#" class="social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                            </li>
                        @endforeach
                    @endif
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

