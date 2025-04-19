 @php
        $formType = isset($nfc_card)? 'edit' : 'create';
    @endphp
    <div class="header_body">
        <header class="modern_header" id="modern_header">
            <div class="">
                    <img  src="{{ $formType=='edit' && $nfc_card->card_design?->logo ? asset('public/uploads/cards/' .$nfc_card->card_design?->logo) : asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px" id="diplay-profile-pic" class="logo-image-preview"
                    />
                <!-- <img src="assets/images/header_image.png" alt="abc" width="100px" srcset="" /> -->
            </div>
            <div class="col-sm-12 p-0 m-0">
                    <span class="fs-4 fw-bold prefix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->prefix ?? '' : ''}}</span>
                <span class="fs-4 fw-bold f-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->fname ?? '' : '' }}</span>
            <span class="fs-5 fw-bold m-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->middle_name ?? '' : '' }}</span>
            <span class="fs-4 fw-bold l-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->last_name ?? '' : '' }}</span>
            <span class="fs-4 fw-bold suffix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->suffix ?? '' : '' }}</span>
            <span class="fs-2 fw-bold maiden_name">
                    {{ $formType=='edit' && $nfc_card->nfc_info?->maiden_name ? '('. $nfc_card->nfc_info?->maiden_name.')' ?? '' : '' }}
            </span>
            <span class="accreditations">&nbsp;{{ $formType=='edit' ? $nfc_card->nfc_info?->accreditations : '' }}</span>
            </div>
            <div class="">
                <div class="">
                    <p>
                    <span class="">{{ $formType=='edit' ? $nfc_card->nfc_info?->title : '' }}</span> <br>
                        <span class="fs-5 fw-bold deprtment " id="deprtment">{{ $formType=='edit' ? $nfc_card->nfc_info?->department ?? '' : ''}}</span> <br>
                    <span class="company" id="company">{{ $formType=='edit' ? $nfc_card->nfc_info?->company ?? '' : '' }}</span>
                    </p>
                </div>
            </div>
        </header>
                    <div class="CardAvatar">
                            <img src="{{ $formType=='edit' && $nfc_card->nfc_info?->image ? asset('public/uploads/client/' . $nfc_card->nfc_info?->image) : asset('public/assets/nfc/images/123.png') }}"
                        class=" img-fluid display-profile-pic" alt="" width="200px" height="200px"  />
                    </div>
                <div class="CardBox css-19niztd">
                    <div class="css-qcxc6v px-4 pb-3">
                            <p class="my-1 headline">{{ $formType=='edit' ? $nfc_card->nfc_info?->headline ?? '' : '' }}</p>
                    </div>
                </div>
                <div>
                    <div class="d-flex px-4 pb-3">
                         <svg class="text-gray-800 dark:text-white msg-icon {{ $formType=='edit' && $nfc_card->nfc_info?->preferred_name ? 'show' : 'hide' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        focusable="false" fill="currentColor" viewBox="0 0 24 24" width="15px">
                        <path fill-rule="evenodd"
                            d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                            clip-rule="evenodd" />
                    </svg>
                        <span class="card_owner">
                       <span class=" fw-light goes-by {{ $formType=='edit' && $nfc_card->nfc_info?->preferred_name ? ' show' : 'hide'}} ">&nbsp; Goes by</span>   <span class=" fw-light fw-bold preferred_name" id="preferred_name">{{ $formType=='edit' && $nfc_card->nfc_info?->preferred_name ? $nfc_card->nfc_info?->preferred_name ?? '' : ''}} </span> <span class="text-muted pronoun">{{ $formType=='edit' && $nfc_card->nfc_info?->pronoun ? '('. $nfc_card->nfc_info?->pronoun.')' ?? '' : ''}}</span>
                    </span>
                    </div>
                </div>
            </div>
    <section>
        <div class="container-fluid">

            <div class="row">
                <div id="badge-preview" class="badge-preview">
                    @if ($formType=='edit' )
                        @foreach ( $nfc_card->badges as $bagde)
                            <div class="image-container " id="badge-preview-{{ $bagde->id }}">
                                    <img class="avatar-img rounded-border-10 border border-white border-3"
                                        src="{{ asset('public/uploads/cards/badges/'. $bagde->badge_image ?? '') }}"
                                        alt="" class="badge-placeholder-{{ $bagde->id }}" id="badge-placeholder-{{ $bagde->id }}" width="50px" height="50px">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="modern_card">
                    <ul class="list-group social-user-ul">
                    @if ($formType=='edit')
                        @foreach ($nfc_card->nfcFields as $nfcField)
                            <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                <i class="{{ $nfcField->icon }} active-text-color"></i>
                                &nbsp;
                                <a href="#" class="social-item-link-{{$nfcField->id}}">{{ $nfcField->pivot->field_value }}</a>
                            </li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
