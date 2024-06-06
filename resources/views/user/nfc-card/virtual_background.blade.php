@extends('user.layout.base')
@section('title', 'NFC Email Signature')
@push('styles')
    <style>
        .profile-info {

            margin-left: 20px;
            border-left: 2px dotted white;

        }

        .profile-info h6,
        p {
            color: white;
        }

        .upload-container input[type="file"] {
            display: none;
        }

        .upload-container label {
            background-color: #fff;
            color: white;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            color: #3A292C;
            font-size: 16px;
            font-weight: bold;
            height: 150px;
            align-items: center;
        }
    </style>
@endpush

@section('content')

    <div class="row g-4">
        <!-- Main content START -->
        <div class="col-lg-12 vstack gap-4">
            <!-- My profile START -->
            @include('user.includes.profile')
            <!-- My profile END -->
        </div>
        <!-- NFC Card START -->
        <div class="col-md-12 vstack gap-4">
            <!-- Card START -->
            <div class="card">
                <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                    {{-- <h1 class="card-title h4">NFC CARD</h1> --}}
                    <div class="row">
                        <div class="col-md-10">

                        </div>
                    </div>

                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-0">
                        <div class="row gx-0">
                            <!-- Nfc item START -->
                            <div class="col-md-12">
                                <div class="row gx-2">
                                    @forelse ($nfc_cards as $nfc_card)
                                        <div class="col-6 col-lg-2 position-relative" style="height:200px;">
                                            @if ($nfc_card->card_design?->design_card_id == 1)
                                                @include('user.nfc-template_mini.classic-template')
                                            @elseif($nfc_card->card_design?->design_card_id == 2)
                                                @include('user.nfc-template_mini.flat-template')
                                            @elseif($nfc_card->card_design?->design_card_id == 3)
                                                @include('user.nfc-template_mini.modern-template')
                                            @elseif($nfc_card->card_design?->design_card_id == 4)
                                                @include('user.nfc-template_mini.sleek-template')
                                            @endif
                                        </div>
                                    @empty
                                        No Card Made Yet
                                    @endforelse
                                </div>
                            </div>
                            <!-- Photo item END -->
                        </div>
                        <!-- Photos of you tab END -->
                    </div>
                    <!-- Album Tab content END -->

                    <div class="container px-0 mt-3">

                        <div style="background-color: #F7FAFC" class="p-3">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6">
                                    <div class="card d-flex w-100 profile"
                                        style="background-image: url({{ asset('public/uploads/client/' . $nfc_card->client?->image) }});height:250px;background-position: center center;
                                            background-size: cover;" id="profile-picture">
                                        <div class="row mt-5">
                                            <div class="col-md-9">
                                                <div class="profile-info">
                                                    <h6 class="ms-2">{{ $nfc_card->client?->fname ?? '' }}
                                                        {{ $nfc_card->client?->middle_name ?? '' }}
                                                        {{ $nfc_card->client?->last_name ?? '' }}</h6>
                                                    <p class="position ms-2">{{ $nfc_card->client?->designation ?? '' }}</p>
                                                    <p class="company ms-2">{{ $nfc_card->nfc_info?->company ?? '' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                {!! QrCode::size(100)->generate(
                                                    url('nfcqrurl/' . encryptor('encrypt', $nfc_card->id) . '/' . $nfc_card->client_id),
                                                ) !!}
                                            </div>
                                        </div>






                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-column justify-content-center">
                                    <button type="button" class="btn btn-primary mx-auto" onclick="download()">Download</button>
                                    <p class="text-center text-black">Your custom background will save as a 1920x1080 image.
                                    </p>
                                    <a href="" class="text-center">How do I use my HiHello background in Zoom™?</a>
                                </div>

                                <h4 class="mt-3 fs-5">Use Your Own</h4>
                                <div class="col-md-3">

                                    <div class="upload-container">
                                        <input type="file" id="profile" name="profile" accept="image/*"
                                            onchange="changeProfilePicture(event);">
                                        <label for="profile" class="d-flex justify-content-center"><i
                                                class="fas fa-images me-2"></i>Upload Image</label>
                                    </div>

                                </div>
                                <div class="col-md-9"></div>
                                @forelse ($nfc_virtual_categories as $cat)
                                @if($cat->backgrounds->count() > 0)
                                <h4 class="mt-3">{{$cat->category_name}}</h4> 
                                @forelse ($cat->backgrounds as $virtual)
                                <div class="col-md-3">
                                    <img src="{{asset('public/'.$virtual->image)}}" class="img-fluid">
                                </div>
                                
                                @empty
                                    
                                @endforelse
                               
                                @endif
                                @empty
                                    
                                @endforelse
                                


                            </div>


                        </div>
                    </div>


                </div>
            </div>



        </div>



        <!-- Card body END -->
    </div>
    <!-- Card END -->
    </div>
    </div><!-- Row END -->
@endsection
@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function changeProfilePicture(event) {
            var output = document.getElementById('profile-picture');
            var file = event.target.files[0];
            if (file) {
                var imageUrl = URL.createObjectURL(file);
                output.style.backgroundImage = 'url(' + imageUrl + ')';
            }
        }
        function download(){
            html2canvas(document.querySelector('.profile')).then(canvas => {
                var link = document.createElement('a');
                link.href = canvas.toDataURL('image/jpeg');
                link.download = 'virtual_bg.jpg';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        }
    </script>
@endpush
