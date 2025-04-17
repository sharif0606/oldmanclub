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
    @php
        $formType = isset($nfc_card)? 'edit' : 'create';
    @endphp
    <div class="col-md-12">
        <div class="classic_header_image_show">
                <img class="display-profile-pic"  src="{{ $formType=='edit' ? asset('public/uploads/client/' . $nfc_card->nfc_info?->image) : null }}" alt="" width="350px"
                    height="350px" id="display-profile-pic">

            <div class="classic_svg_show">
                <svg preserveAspectRatio="xMinYMax meet" viewBox="0 0 246 57" xmlns="http://www.w3.org/2000/svg"
                    class="css-fxun4i">
                    @if ($formType=='edit' && $nfc_card->card_type == 1)
                        <path id="forground" clip-rule="evenodd"
                            d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                            fill="white" fill-rule="evenodd"></path>
                        <path id="background" clip-rule="evenodd"
                            d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                            fill="white" fill-rule="evenodd"></path>
                        <path id="wave" clip-rule="evenodd"
                            d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                            fill="{{ $nfc_card->card_design->color ?? '#6785F5'}}" fill-rule="evenodd"></path>
                    @else
                        <path id="forground" clip-rule="evenodd"
                            d="M 214.7168,6.1113281 C 195.65271,5.9023124 172.37742,11.948182 137.87305,32.529297 110.16613,49.05604 86.980345,56.862784 65.015625,57 H 65 v 1 H 246 V 11.453125 C 236.0775,8.6129313 226.15525,6.2367376 214.7168,6.1113281 Z"
                            fill="white" fill-rule="evenodd"></path>
                        <path id="background" clip-rule="evenodd"
                            d="M 0,35.773438 V 58 H 65 L 64.97852,57 C 43.192081,57.127508 22.605139,49.707997 0,35.773438 Z "
                            fill="white" fill-rule="evenodd"></path>
                        <path id="wave" clip-rule="evenodd"
                            d="m 0,16.7221 v 19.052 C 45.4067,63.7643 82.6667,65.4583 137.873,32.5286 193.08,-0.401184 219.54,3.87965 246,11.4535 V 6.51403 C 185.24,-16.8661 135.913,29.331 97.6933,40.8564 59.4733,52.3818 33.6467,44.1494 0,16.7221 Z "
                            fill="{{ $nfc_card->card_design->color ?? '#6785F5'}}" fill-rule="evenodd"></path>
                    @endif
                </svg>
                <div class="classic_image d-none d-sm-block">
                        <img class="logo-image-preview" src="{{ $formType=='edit' ? asset('public/uploads/cards/'. $nfc_card->card_design?->logo ?? '') : asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="50px"
                            id="logo-image-preview" style="margin-top: .8rem" />
                </div>
            </div>
        </div>
    </div>
    <section class="middle" style="padding: 0px !important">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-sm-12">
                    <span class="fs-4 fw-bold prefix-name text-dark" id="prefix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->prefix ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold f-name  text-dark" id="f-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->first_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold m-name  text-dark" id="m-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->middle_name ?? '' : '' }}</span>
                    <span class="fs-4 fw-bold l-name  text-dark" id="l-name">{{ $formType=='edit'  ? $nfc_card->nfc_info?->last_name ?? '' : '' }}</span>

                    <div style="display: contents">
                        <span class="fs-4 fw-bold suffix-name text-dark" id="suffix-name">{{ $formType=='edit' ? $nfc_card->nfc_info?->suffix ?? '' : ''}}</span>
                        <span class="fs-4 fw-bold maiden_name text-dark" id="maiden_name">{{ $formType=='edit' && $nfc_card->nfc_info?->maiden_name ? '('. $nfc_card->nfc_info?->maiden_name.')' ?? '' : '' }}</span>
                            <span class="accreditations" id="accreditations">&nbsp;{{ $formType=='edit' ? $nfc_card->nfc_info?->accreditations ?? '' : ''}}</span>
                    </div>
                    <p>
                        <span class="text-justify field-title text-dark fw-bold" id="field-title">{{ $formType=='edit' ? $nfc_card->nfc_info?->title ?? '' : '' }}</span> <br>
                         <span class="fs-5 fw-bold deprtment active-text-color" id="deprtment">{{ $formType=='edit' ? $nfc_card->nfc_info?->department ?? '' : ''}}</span> <br>
                        <span class="fs-6 company fst-italic fw-light" id="company">{{ $formType=='edit' ? $nfc_card->nfc_info?->company ?? '' : '' }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section style="padding: 0px !important">
        <div class="">
            <div class="row">
                    <p class="my-1 headline fw-light" id="headline">{{ $formType=='edit' ? $nfc_card->nfc_info?->headline ?? '' : ''}}</p>
                    @if ($formType=='edit' && $nfc_card->nfc_info?->pronoun)

                    @endif
                <div class="d-flex my-1">
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
                 <ul class="list-group social-user-ul">
                    @if ($formType=='edit' )
                        @foreach ($nfc_card->nfcFields as $nfcField)
                        {{-- {{ $nfcField}} --}}
                            <li class="list-group-item social-list-item-{{ $nfcField->id }}">
                                <i class="{{ $nfcField->icon . " active-text-color" }} "></i>
                                &nbsp;
                                <a href="{{$nfcField->link.$nfcField->pivot->field_value}}" class="social-item-link-{{$nfcField->id}} text-dark">{{ $nfcField->pivot->field_value }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </section>
</div>
