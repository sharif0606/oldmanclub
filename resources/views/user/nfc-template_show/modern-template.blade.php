 @php
        $formType = isset($nfc_card)? 'edit' : 'create';
    @endphp
    <div class="header_body">
                <header class="modern_header" id="modern_header">
                    <div class="">
                            <img  src="{{ $formType=='edit' ? asset($nfc_card->card_design?->logo) : asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px" id="diplay-profile-pic"
                            />
                        <!-- <img src="assets/images/header_image.png" alt="abc" width="100px" srcset="" /> -->
                    </div>
                    <div class="col-sm-12 p-0">
                            <span class="fs-4 fw-bold prefix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->prefix ?? '' : ''}}</span>
                        <span class="fs-4 fw-bold f-name">{{ $formType=='edit' ? $nfc_card->client?->fname ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold m-name">{{ $formType=='edit' ? $nfc_card->client?->middle_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold l-name">{{ $formType=='edit' ? $nfc_card->client?->last_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold suffix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->suffix ?? '' : '' }}</span>
                    <span class="fs-2 fw-bold maiden_name">
                            ({{ $formType=='edit' ? $nfc_card->nfc_info?->maiden_name ?? '' : '' }})
                    </span>
                    <span class="accreditations">&nbsp;{{ $formType=='edit' ? $nfc_card->nfc_info?->accreditations : '' }}</span>
                    </div>
                    <div class="">
                        <div class="CardAvatar">
                            <img src="{{ $formType=='edit' ? asset('public/uploads/client/' . $nfc_card->client?->image) : asset('public/assets/nfc/images/123.png') }}"
                        class="modern_card_image img-fluid display-profile-pic" alt="" />
                    </div>
                 <div class="row">
                    <p class="text-justify field-title">{{ $formType=='edit' ? $nfc_card->nfc_info?->title : '' }}</p>
            </div>
            <div class="row">
                <div>
                    <span class="fs-5 fw-bold deprtment" id="deprtment">{{ $formType=='edit' ? $nfc_card->nfc_info?->department ?? '' : ''}}</span>
                        <p class="fs-6 fw-bold company" id="company">{{ $formType=='edit' ? $nfc_card->nfc_info?->company ?? '' : '' }}</p>
                        <span class="fs-5 fw-bold deprtment" >{{ $formType=='edit' ? $nfc_card->nfc_info?->department ?? '' : ''}}</span>
                </div>
            </div>
                </header>
                <div class="CardBox css-19niztd">
                    <div class="css-qcxc6v px-4 pb-3">
                            <p class="my-1 headline">{{ $formType=='edit' ? $nfc_card->nfc_info?->headline ?? '' : '' }}</p>
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
                        <span class="card_owner mx-1">{{ $formType=='edit' ? $nfc_card->client?->fname ?? '' : '' }}</span>
                        </span>
                        <span class="pronoun">({{ $formType=='edit' ? $nfc_card->nfc_info?->pronoun ?? '' : '' }})</span>
                    </div>
                </div>
            </div>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="modern_card">
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
