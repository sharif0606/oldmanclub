     @php
        $formType = isset($nfc_card)? 'edit' : 'create';
    @endphp
    <header>
        <div class="header_section">
            <div>
                    <img class="display-profile-pic"  src="{{ $formType=='edit' ? asset('public/uploads/client/' . $nfc_card->client?->image) : asset('public/assets/nfc/images/123.png')}}" alt="" width="350px" height="300px">
                    {{-- <div class="main-img" style="background-image: url({{ asset('public/uploads/client/' . $nfc_card->client?->image)}});"></div> }}
                    {{-- <div class="main-img display-profile-pic" style="background-image: url({{ asset('public/assets/nfc/images/123.png') }}) width:350px;" >
                    </div> --}}
            </div>
            <div class="header_text" id="header_text"></div>
        </div>
        <div class="d-none d-sm-block">
                <img src="{{ $formType=='edit' ? asset($nfc_card->card_design?->logo) : asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="60px"
                    srcset="" />
        </div>
    </header>
 <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <span class="fs-4 fw-bold prefix-name">{{  $formType=='edit' ? $nfc_card->nfc_info?->prefix ?? '' : '' }}</span>

                    <span class="fs-4 fw-bold f-name">{{ $formType=='edit' ? $nfc_card->client?->fname ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold m-name">{{ $formType=='edit' ? $nfc_card->client?->middle_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold l-name">{{ $formType=='edit' ? $nfc_card->client?->last_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold suffix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->suffix ?? '' : '' }}</span>
                    <span class="fs-2 fw-bold maiden_name">
                            ({{ $formType=='edit' ? $nfc_card->nfc_info?->maiden_name ?? '' : '' }})
                    </span>
                    <span class="accreditations">&nbsp;{{ $formType=='edit' ? $nfc_card->nfc_info?->accreditations : '' }}</span>
                </div>
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
        </div>
    </section>
    <section>
        <div class="container-fluid mt-4">
                <p class="my-1 headline">{{ $formType=='edit' ? $nfc_card->nfc_info?->headline ?? '': '' }}</p>

            <div class="row">
                <div class="d-flex">
                    <svg class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        focusable="false" fill="currentColor" viewBox="0 0 24 24" width="25px">
                        <path fill-rule="evenodd"
                            d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                            clip-rule="evenodd" />
                    </svg>
                     <span class="card_owner">Goes by
                           <span class="preferred_name"> {{ $formType=='edit' ? $nfc_card->nfc_info?->preferred_name ?? '' : '' }} </span>
                    </span>
                </div>
            </div>
            <div class="row">
                <ul class="list-group social-user-ul">
                    @if ($formType=='edit' )
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
    </section>
