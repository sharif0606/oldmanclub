 <div class="header_body">
        <header class="modern_header" id="modern_header" style="background: {{ $nfc_card->card_design?->color }}">
            <div class="">
                    <img  src="{{ $nfc_card->card_design?->logo ? asset('public/uploads/cards/' .$nfc_card->card_design?->logo) : asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px" id="diplay-profile-pic" class="logo-image-preview"
                    />
                <!-- <img src="assets/images/header_image.png" alt="abc" width="100px" srcset="" /> -->
            </div>
            <div class="col-sm-12 p-0 m-0">
                    <span class="fs-4 fw-bold prefix-name">{{ $nfc_card->nfc_info?->prefix ?? ''}}</span>
                <span class="fs-4 fw-bold f-name">{{ $nfc_card->nfc_info?->first_name ?? '' }}</span>
            <span class="fs-5 fw-bold m-name">{{ $nfc_card->nfc_info?->middle_name ?? '' }}</span>
            <span class="fs-4 fw-bold l-name">{{ $nfc_card->nfc_info?->last_name ?? '' }}</span>
            <span class="fs-4 fw-bold suffix-name">{{ $nfc_card->nfc_info?->suffix ?? '' }}</span>
            <span class="fs-2 fw-bold maiden_name">
                    {{ $nfc_card->nfc_info?->maiden_name ? '('. $nfc_card->nfc_info?->maiden_name.')' ?? '' : '' }}
            </span>
            <span class="accreditations">&nbsp;{{ $nfc_card->nfc_info?->accreditations }}</span>
            </div>
            <div class="">
                <div class="">
                    <p>
                    <span class="">{{ $nfc_card->nfc_info?->title }}</span> <br>
                        <span class="fs-5 fw-bold deprtment " id="deprtment">{{ $nfc_card->nfc_info?->department ?? '' }}</span> <br>
                    <span class="company" id="company">{{ $nfc_card->nfc_info?->company ?? '' }}</span>
                    </p>
                </div>
            </div>
        </header>
                    <div class="CardAvatar">
                            <img src="{{ $nfc_card->nfc_info?->image ? asset('public/uploads/client/' . $nfc_card->nfc_info?->image) : asset('public/assets/nfc/images/123.png') }}"
                        class=" img-fluid display-profile-pic" alt="" width="200px" height="200px"  />
                    </div>
                <div class="CardBox css-19niztd">
                    <div class="css-qcxc6v px-4 pb-3">
                            <p class="my-1 headline">{{ $nfc_card->nfc_info?->headline ?? '' }}</p>
                    </div>
                </div>
                <div>
                    <div class="d-flex px-4 pb-3">
                         <svg class="text-gray-800 dark:text-white msg-icon {{ $nfc_card->nfc_info?->preferred_name ? 'show' : 'hide' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        focusable="false" fill="currentColor" viewBox="0 0 24 24" width="15px">
                        <path fill-rule="evenodd"
                            d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                            clip-rule="evenodd" />
                    </svg>
                        <span class="card_owner">
                       <span class=" fw-light goes-by {{ $nfc_card->nfc_info?->preferred_name ? ' show' : 'hide'}} ">&nbsp; Goes by</span>   <span class=" fw-light fw-bold preferred_name" id="preferred_name">{{ $nfc_card->nfc_info?->preferred_name ? $nfc_card->nfc_info?->preferred_name ?? '' : ''}} </span> <span class="text-muted pronoun">{{  $nfc_card->nfc_info?->pronoun ? '('. $nfc_card->nfc_info?->pronoun.')' ?? '' : ''}}</span>
                    </span>
                    </div>
                </div>
            </div>
    <section>
        <div class="container-fluid">

            <div class="row">
                <div id="badge-preview" class="badge-preview">

                        @foreach ( $nfc_card->badges as $bagde)
                            <div class="image-container " id="badge-preview-{{ $bagde->id }}">
                                    <img class="avatar-img rounded-border-10 border border-white border-3"
                                        src="{{ asset('public/uploads/cards/badges/'. $bagde->badge_image ?? '') }}"
                                        alt="" class="badge-placeholder-{{ $bagde->id }}" id="badge-placeholder-{{ $bagde->id }}" width="50px" height="50px">
                            </div>
                        @endforeach
                </div>
            </div>
            <div class="row">
                <div class="modern_card">
                    <ul class="list-group social-user-ul">

                        @foreach ($nfc_card->nfcFields  as $nfcField)
                        <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                            <i style="color:{{ $nfc_card->card_design->color }}" class="{{ $nfcField->icon }} "></i>
                            &nbsp;
                            <a href="{{ $nfcField->link.$nfcField->pivot->field_value }}" class="social-item-link-{{$nfcField->id}}"  target="_blank">{{ $nfcField->pivot->field_value }}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
