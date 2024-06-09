@extends('user.layout.base')
@section('title', 'NFC Card Preview')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
    <style>
        /* Custom CSS to make the modal slide from right */
        .modal.right .modal-dialog {
            position: fixed;
            right: 0;
            margin: auto;
            width: 30%;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
        }

        .modal.right .modal-content {
            height: 75%;
            overflow-y: auto;
        }

        .modal.right .modal-body {
            padding: 15px 15px 80px;
        }

        /* Rotate icon */
        .btn-rotate {
            transition: transform 0.3s ease;
        }

        .btn-rotate.open {
            transform: rotate(90deg);
        }

        .box {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 20px;
            background-color: #f0f0f0;
        }

        .box::before,
        .box::after,
        .box div::before,
        .box div::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: transparent;
        }

        /* Top left border */
        .box::before {
            top: 0;
            left: 0;
            border-top: 5px solid red;
            border-left: 5px solid red;
            border-top-left-radius: 20px;
        }

        /* Top right border */
        .box::after {
            top: 0;
            right: 0;
            border-top: 5px solid blue;
            border-right: 5px solid blue;
            border-top-right-radius: 20px;
        }

        /* Bottom left border */
        .box div::before {
            bottom: 0;
            left: 0;
            border-bottom: 5px solid green;
            border-left: 5px solid green;
            border-bottom-left-radius: 20px;
        }

        /* Bottom right border */
        .box div::after {
            bottom: 0;
            right: 0;
            border-bottom: 5px solid orange;
            border-right: 5px solid orange;
            border-bottom-right-radius: 20px;
        }

        #svg svg {
            margin: 0px auto;
            display: block;
        }

        .social-links span {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            color: #fff;
            display: inline-block;
            line-height: 32px;
            text-align: center;
        }

        .nav-pills .nav-link {
            margin: 0 !important;
            border-radius: 0 !important;
        }

        /* #pills-tab {
                    border: 2px solid #6C31CD;
                    border-radius: 8px;
                }

                #pills-tab .nav-item {
                    border-right: 2px solid #6C31CD;
                } */
        #pills-tab .nav-item:nth-child(1) {
            border: 2px solid #6C31CD;
            border-radius: 8px 0px 0px 8px;
        }

        #pills-tab .nav-item:nth-child(2) {
            border-top: 2px solid #6C31CD;
            border-bottom: 2px solid #6C31CD;
            border-right: 2px solid #6C31CD;
        }

        #pills-tab .nav-item:nth-child(3) {
            border-top: 2px solid #6C31CD;
            border-bottom: 2px solid #6C31CD;
        }

        #pills-tab .nav-item:nth-child(4) {
            border: 2px solid #6C31CD;
            border-radius: 0px 8px 8px 0px;
        }

        #pills-tab .nav-item .nav-link.active {
            background: #6C31CD;
        }

        #pills-tab .nav-item .nav-link.active i {
            color: #fff;
            font-weight: bold;
        }

        #pills-tab .nav-item .nav-link i {
            color: #6C31CD;
            font-weight: bold;
        }

        #pills-tab .nav-item .nav-link.active p {
            color: #fff;
        }

        #pills-tab .nav-item .nav-link p {
            color: #6C31CD;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
@endpush
@section('content')
    <div class="row g-4">
        <div class="col-lg-12 vstack gap-4">
            <!-- My profile START -->
            @include('user.includes.profile')
            <!-- My profile END -->
        </div>
        <!-- Sidenav END -->
        <!-- Main content START -->
        <div class="col-md-12">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                    <h4 class="card-title h4">PREVIEW NFC CARD</h4>
                    <!-- Button modal -->
                    <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i class="fas fa-list pe-1"></i>All
                        NFC CARD</a>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-5">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between mb-2">
                                    <a href="{{ route('nfc_card.edit', encryptor('encrypt', $nfc_card->id)) }}"
                                        class="ms-4 fs-4"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="fs-4" title="Card Settings" data-bs-toggle="modal"
                                        data-bs-target="#cogModal"><i class="fas fa-cog"></i></a>
                                    <a href="{{ route('duplicate', encryptor('encrypt', $nfc_card->id)) }}" class="fs-4"
                                        title="Duplicate"><i class="fas fa-copy"></i></a>
                                    {{-- <a href="#" class="fs-4" data-bs-toggle="modal" data-bs-target="#shareModal"
                                        title="Transfer"><i class="fas fa-share"></i></a> --}}
                                    <a href="{{ route('virtual_background', encryptor('encrypt', $nfc_card->id)) }}"
                                        title="Virtual Background" class="fs-4"><i class="fas fa-image"></i></a>
                                    <a href="#" class="fs-4" onclick="downloadSVG()" title="Download Qr Code"><i
                                            class="fas fa-download"></i></a>
                                    <a href="{{ route('email_signature', encryptor('encrypt', $nfc_card->id)) }}"
                                        title="Email Signature" class="fs-4"><i class="fas fa-envelope"></i></a>
                                    <a href="{{ route('downloadPdf', [encryptor('encrypt', $nfc_card->id), $nfc_card->client_id]) }}"
                                        title="Download PDF" class="fs-4"><i class="fas fa-file-pdf"></i></a>
                                    {{-- <a href="#" onclick="generatePDF()" title="Download PDF" class="fs-4"><i class="fas fa-file-pdf"></i></a> --}}
                                    <a href="" class="fs-4" title="Delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="row" id="my_img_to_pdf">


                                <div class="col-md-4">
                                    @if ($nfc_card->card_design?->design_card_id == 1)
                                        @include('user.nfc-template_show.classic-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 2)
                                        @include('user.nfc-template_show.flat-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 3)
                                        @include('user.nfc-template_show.modern-template')
                                    @elseif($nfc_card->card_design?->design_card_id == 4)
                                        @include('user.nfc-template_show.sleek-template')
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="card p-3">
                                        <div class="tab-content" id="pills-tabContent" style="padding: 0">
                                            <h4 class="my-3 fs-5 text-center">Send Card</h4>
                                            <div class="tab-pane fade show active" id="code" role="tabpanel"
                                                aria-labelledby="code-tab">
                                                <a class="box"
                                                    href="{{ url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id) }}"
                                                    style="display:block;width:200px;padding: 20px;margin:0px auto;">
                                                    <div id="svg">
                                                        {!! QrCode::size(160)->generate(
                                                            url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                                        ) !!}

                                                    </div>
                                                </a>
                                                <small class="mt-1 text-center d-block">Scan Or Click to Preview</small>
                                                <div class="social-links mt-2"
                                                    style="width:220px; margin:0px auto;display: flex;
                                            justify-content: center;">
                                                    <a
                                                        href="https://www.facebook.com/sharer/sharer.php?u={{ url('fb-share', [encryptor('encrypt', $nfc_card->id), $nfc_card->client_id]) }}&display=popup">
                                                        <span class="fs-5 me-1" style="background-color: #3B5998"><i
                                                                class="fa-brands fa-facebook-f"></i></span>
                                                    </a>
                                                    <a href="https://x.com/intent/tweet?url={{ url('x-share', [encryptor('encrypt', $nfc_card->id), $nfc_card->client_id]) }}&text=Check%20out%20this%20property!">
                                                        <span class="fs-5 me-1" style="background-color: #000"><i
                                                                class="fa-brands fa-xing"></i></span>
                                                    </a>
                                                    <a href="">
                                                    <span class="fs-5 me-1" style="background-color: #007FB1"><i
                                                            class="fa-brands fa-linkedin"></i></span>
                                                    </a>
                                                    <a href="">
                                                    <span class="fs-5 me-1" style="background-color: #25D366"><i
                                                            class="fa-brands fa-whatsapp"></i></span>
                                                    </a>
                                                    <a href="">
                                                    <span class="fs-5" style="background-color: #7F7F7F"><i
                                                            class="fas fa-envelope"></i></span>
                                                    </a>
                                                </div>
                                                <div style="width:220px; margin:0px auto;text-align:center;">
                                                    <button class="btn btn-sm my-2 btn-outline-primary w-75"><i
                                                            class="me-2 fas fa-copy"></i>Copy Link</button>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="email" role="tabpanel"
                                                aria-labelledby="email-tab">
                                                <p>Email your Work card to:</p>
                                                <form method="post">
                                                    <input type="text" name="name" class="form-control mb-2"
                                                        placeholder="Name">
                                                    <input type="text" name="email" class="form-control mb-2"
                                                        placeholder="Email">
                                                    <textarea name="message" class="form-control mb-2" placeholder="Message" rows="8"></textarea>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="text" role="tabpanel"
                                                aria-labelledby="text-tab">
                                                <p class="m-0 text-center">
                                                    You'll need a text message application installed on your computer to
                                                    send your card via SMS.
                                                </p>
                                                <h6>Text your Work card to:</h6>
                                                <form method="post">
                                                    <input type="text" name="name" class="form-control mb-2"
                                                        placeholder="Name">
                                                    <div class="row gx-1">
                                                        <div class="col-md-3">
                                                            <select name="country" class="form-control">
                                                                <option value="">Select</option>
                                                                @foreach ($countries as $value)
                                                                    <option value="{{ $value->id }}"
                                                                        @if (old('nationality', $client->nationality) == $value->id) selected @endif>
                                                                        {{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" name="phone"
                                                                class="form-control mb-2" placeholder="Phone Number">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="apple" role="tabpanel"
                                                aria-labelledby="apple-tab">
                                                <a class="box"
                                                    href="{{ url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id) }}"
                                                    style="display:block;width:200px;padding: 20px;margin:0px auto;">
                                                    <div id="svg">
                                                        {!! QrCode::size(160)->generate(
                                                            url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                                        ) !!}

                                                    </div>
                                                </a>
                                                <small class="mt-1 text-center d-block">Scan Or Click to Preview</small>
                                                <div class="social-links mt-2"
                                                    style="width:220px; margin:0px auto;display: flex;
                                    justify-content: center;">
                                                    <span class="fs-5 me-1" style="background-color: #3B5998"><i
                                                            class="fa-brands fa-facebook-f"></i></span>
                                                    <span class="fs-5 me-1" style="background-color: #000"><i
                                                            class="fa-brands fa-xing"></i></span>
                                                    <span class="fs-5 me-1" style="background-color: #007FB1"><i
                                                            class="fa-brands fa-linkedin"></i></span>
                                                    <span class="fs-5 me-1" style="background-color: #25D366"><i
                                                            class="fa-brands fa-whatsapp"></i></span>
                                                    <span class="fs-5" style="background-color: #7F7F7F"><i
                                                            class="fas fa-envelope"></i></span>

                                                </div>
                                                <div style="width:220px; margin:0px auto;text-align:center;">
                                                    <button class="btn btn-sm my-2 btn-outline-primary w-75"><i
                                                            class="me-2 fas fa-copy"></i>Copy Link</button>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav nav-pills custom-tabs mb-4 mx-auto" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="code-tab" data-bs-toggle="pill"
                                                    data-bs-target="#code" type="button" role="tab"
                                                    aria-controls="code" aria-selected="true"><i
                                                        class="fa-solid fa-qrcode"></i>
                                                    <p class="m-0">Code</p>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="email-tab" data-bs-toggle="pill"
                                                    data-bs-target="#email" type="button" role="tab"
                                                    aria-controls="email" aria-selected="false">
                                                    <i class="fas fa-envelope"></i>
                                                    <p class="m-0">Email</p>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="text-tab" data-bs-toggle="pill"
                                                    data-bs-target="#text" type="button" role="tab"
                                                    aria-controls="text" aria-selected="false">
                                                    <i class="fa-solid fa-message"></i>
                                                    <p class="m-0">Text</p>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="apple-tab" data-bs-toggle="pill"
                                                    data-bs-target="#apple" type="button" role="tab"
                                                    aria-controls="apple" aria-selected="false">
                                                    <i class="fab fa-apple"></i>
                                                    <p class="m-0">Apple</p>
                                                    {{-- <p class="m-0">Wallet</p> --}}
                                                </button>
                                            </li>
                                        </ul>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <!-- Photos of you tab END -->
                    </div>
                    <!-- Album Tab content END -->
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card END -->
        </div>
    </div><!-- Row END -->
    <!-- Modal Cog START -->
    <div class="modal right fade" id="cogModal" tabindex="-1" aria-labelledby="cogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cogModalLabel">Card settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pause card
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-lock me-2"></i>Personalized link</span>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-lock me-2"></i>QR code logo</span>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Renew link
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-lock me-2"></i>Add tracking code</span>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal END -->



    <!-- Modal Share Start-->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Card Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Transfer card to?</strong>
                    <p>
                        If you initiate a card transfer, you will no longer be able to view or edit the card once it has a
                        new owner. If you still wish to transfer this card to someone else, enter their email or phone
                        number and press Continue.
                    </p>
                    <ul class="nav nav-pills custom-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="email-tab" data-bs-toggle="pill" data-bs-target="#email"
                                type="button" role="tab" aria-controls="email" aria-selected="true">Email</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="text-tab" data-bs-toggle="pill" data-bs-target="#text"
                                type="button" role="tab" aria-controls="text" aria-selected="false">Text</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent" style="padding: 0 !important">
                        <div class="tab-pane fade show active" id="email" role="tabpanel"
                            aria-labelledby="email-tab">
                            <input name="email" type="text" class="form-control " placeholder="Enter an Email">
                        </div>
                        <div class="tab-pane fade" id="text" role="tabpanel" aria-labelledby="text-tab">
                            <div class="row gx-1">
                                <div class="col-sm-3">
                                    <select name="nationality" class="form-control"
                                        onchange="fetchCountryCode(this.value)">
                                        <option value="">Country</option>
                                        @foreach ($countries as $value)
                                            <option value="{{ $value->id }}"
                                                @if (old('nationality', $client->nationality) == $value->id) selected @endif>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <input name="email" type="text" class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary">Continue</button>
                    <!-- Add your action button here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        function downloadSVG() {
            const svgElement = document.getElementById('svg').querySelector('svg');
            const svgString = new XMLSerializer().serializeToString(svgElement);

            // Create a canvas element
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");

            // Set the canvas size to the SVG size
            const svgSize = svgElement.getBoundingClientRect();
            canvas.width = svgSize.width;
            canvas.height = svgSize.height;

            // Create an image element
            const img = new Image();

            // Create a blob from the SVG string
            const blob = new Blob([svgString], {
                type: "image/svg+xml;charset=utf-8"
            });
            const url = URL.createObjectURL(blob);

            img.onload = function() {
                // Draw the SVG onto the canvas
                ctx.drawImage(img, 0, 0);

                // Create a PNG data URL from the canvas
                const pngDataUrl = canvas.toDataURL("image/png");

                // Create a download link and click it
                const element = document.createElement("a");
                element.download = "qr_code.png";
                element.href = pngDataUrl;
                element.click();

                // Clean up
                URL.revokeObjectURL(url);
                element.remove();
            };

            // Set the source of the image to the blob URL
            img.src = url;
        }

        function generatePDF() {
            var element = document.getElementById('my_img_to_pdf');

            html2canvas(element).then(canvas => {
                var imgData = canvas.toDataURL('image/jpeg');
                var pdf = new jsPDF();
                pdf.addImage(imgData, 'JPEG', 0, 0);
                pdf.save('content_to_pdf.pdf');
            });
        }
    </script>
@endpush
