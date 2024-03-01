<div class="background">
    <div class="header_sleek">
        <div class="sleek_header_image">
            <div class="css-79elbk">
                @if ($nfc_card->client?->image)
                <img src="{{ asset('public/uploads/client/' . $nfc_card->client?->image)}}" alt="" srcset="" class="" width="100%">
                @else
                <img src="{{ asset('public/assets/nfc/images/123.png')}}" alt="" srcset="" class="" width="100%">
                @endif
            </div>
        </div>
        <div class="css-1fbwa35">
            <div class="card sleek_card mx-auto mb-3">
                <div class="card_img">
                @if ($nfc_card->card_design?->logo)
                 <img src="{{ asset($nfc_card->card_design?->logo) }}" alt="abc" width="50px"
                     />
                @else
                    <img src="{{ asset('public/assets/nfc/images/logo.png') }}" alt="abc" width="50px"
                        srcset="" />
                @endif
                    <!-- <img src="assets/images/header_image.png" width="50px" alt="" srcset=""> -->
                </div>
                <div class="CardBox mx-auto">
                    <p class="text-center fs-4 fw-bold">
                        @if($nfc_card->card_type==1){{__('Work')}}
                        @else
                            {{__('Personal')}}
                        @endif
                    </p>
                    <!-- <span class="css- fs-6 fw-bold">Dr. Md Kaisar Uddin FCP <br>
                    <span class="css-1oyqnxm">(shuvo)</span>
                    </span> -->
                </div>
            </div>
        </div>
    </div>
    
    {{--<div class="container">
        <div class="row">
            <p class="ps-4">Our Concern</p>
            <div class="d-flex ps-4">
                <svg class="text-gray-800 dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" focusable="false" fill="currentColor" viewBox="0 0 24 24"
                width="25px">
                <path
                    fill-rule="evenodd"
                    d="M3 6c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 1.9h-6.6l-2.9 2.7c-1 .9-2.5.2-2.5-1v-1.7H5a2 2 0 0 1-2-2V6Zm5.7 3.8a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Zm2.6 0a1 1 0 1 1 0 1.4 1 1 0 0 1 0-1.4Zm5.4 0a1 1 0 1 0-1.4 1.4 1 1 0 1 0 1.4-1.4Z"
                    clip-rule="evenodd"/>
                </svg>
                <span
                >Goes by
                <span class="card_owner mx-1">Kaiser</span>
                </span>
                <span>(Sam)</span>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <ul class="list-group">
                <li class="list-group-item">
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
                </li>
            </ul>
            </div>
            
        </div>
    </div>--}}
    {{--<div class="">
        <div class="header_sleek">
            <div class="sleek_header_image">
                <div class="css-79elbk">
                    <img src="{{ asset('public/assets/nfc/images/123.png') }}" alt="" srcset="">
                </div>
            </div>
            <div class="css-1fbwa35">
                <div class="card sleek_card">
                    <div class="card_img mx-auto">
                        <img src="{{ asset('public/assets/nfc/images/header_image.png') }}" width="100px"
                            alt="" srcset="">
                    </div>
                    <div class="CardBox mx-auto">
                        <span class="CardName CardName--full css- fs-3 fw-bold">Dr. Md Kaisar Uddin FCP <br>
                            <span class="CardName CardName--maiden css-1oyqnxm">(shuvo)</span>
                        </span>
                    </div>
                    <div class="CardBox mx-auto">
                        <span class="CardName CardName--accreditations css-19tw5ve">FCPS</span>
                    </div>
                    <div class="CardBox">
                        <p class="CardTitle css-70iv32 mx-auto">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged.</p>
                    </div>
                    <div class="fs-6 fw-bold">Software Development</div>
                    <div class="CardCompany css-ikxe0g" variant="italic">Muktodhara Technology Limited</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
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
    <div class="card">
        <div class="card-body">
            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item">
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
                    </li>
                </ul>
            </div>

        </div>
    </div>--}}
</div>
