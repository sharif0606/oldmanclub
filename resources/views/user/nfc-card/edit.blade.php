@extends('user.layout.base')
@section('title', 'NFC Card Preview')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
    <style>
        .social-field-title {
            color: #718096;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .color-picker {
            display: flex;
            align-items: center;
        }

        .color-option {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin: 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
        }

        .color-option.active::before {
            content: '\f00c';
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: white;
            font-size: 16px;
            position: absolute;
        }

        .color-option.selected {
            border: 2px solid #1abc9c;
        }

        .color-rainbow {
            background: conic-gradient(red, yellow, lime, aqua, blue, magenta, red);
            padding: 2px;
        }

        .nfc-previewer {
            max-height: 80vh;
            overflow-y: scroll;
        }

        .nfc-data-previewer {
            max-height: 80vh;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .selected {
            box-shadow: 0 0 0 2px white, 0 0 0 4px #64d8cb;
            box-sizing: border-box;
        }

        .upload-container input[type="file"] {
            display: none;
        }

        .upload-container label {
            background-color: #E2E8F0;
            color: white;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            color: #3A292C;
            width: 100px;
            font-size: 12px;
            font-weight: bold;
        }

        label i.fas {
            padding: 3px;
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
                {{-- <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">PREVIEW NFC CARD</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('nfc_card.index') }}"> <i
                        class="fas fa-list pe-1"></i>All NFC CARD</a>
            </div> --}}
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                    <!-- Album Tab content START -->
                    <div class="mb-0 pb-5">
                        <div class="row g-3">
                            <div class="col-md-4 nfc-previewer">
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
                            <div class="col-md-8 nfc-data-previewer">
                                <ul class="nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start"
                                    role="tablist">
                                    <li class="nav-item" role="presentation"> <a class="nav-link active"
                                            data-bs-toggle="tab" href="#tab-1" aria-selected="true"
                                            role="tab">Display</a> </li>
                                    <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                            href="#tab-2" aria-selected="false" tabindex="-1"
                                            role="tab">Information</a></li>
                                    <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                            href="#tab-3" aria-selected="false" tabindex="-1" role="tab">Fields</a>
                                    </li>
                                    <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                            href="#tab-4" aria-selected="false" tabindex="-1" role="tab">Card</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-0 pb-0">

                                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                        <div class="px-2">
                                            <form
                                                action="{{ route('nfc_card.update', encryptor('encrypt', $nfc_card->id)) }}"
                                                method="post" class="row">
                                                @csrf
                                                @method('PATCH')
                                                <div class="col-12 border-bottom">
                                                    <h6>Profile Photo</h6>
                                                    <div class="row">
                                                        <div class="col-2">
                                                                <img class="rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                    alt="profile" id="profile-picture">
                                                        </div>

                                                        <div class="col-4 py-2 offset-3">
                                                            <div class="upload-container">
                                                                <input type="file" id="profile" name="profile"
                                                                    accept="image/*" onchange="previewfile(event,'profile-picture')">
                                                                <label for="profile"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Replace Photo</label>
                                                            </div>
                                                            {{-- <small><strong>Recomended Size (128x128)</strong></small> --}}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Design</h6>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            @if ($client->image)
                                                                <img class="rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/uploads/client/' . $client->image) }}"
                                                                    alt="" id="design-placeholder">
                                                            @else
                                                                <img class="avatar-img rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                    alt="" id="design-placeholder">
                                                            @endif
                                                        </div>

                                                        <div class="col-4 py-2 offset-3">
                                                            <div class="upload-container">
                                                                <input type="file" id="design" name="logo"
                                                                    accept="image/*" onchange="previewfile(event,'design-placeholder')">
                                                                <label for="design"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Add Design</label>
                                                            </div>
                                                            <small><strong>Recomended Size (128x128)</strong></small>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Color</h6>
                                                    <div class="d-flex justify-content-between col-md-6 py-2">
                                                        <div class="color-box"
                                                            style="background-color: rgb(41, 203, 32);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: red;width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(0, 247, 255);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(195, 0, 255);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(255, 0, 183);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(242, 255, 0);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(0, 255, 115);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(25, 0, 255);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: rgb(221, 0, 255);width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                        <div class="color-box"
                                                            style="background-color: red;width:25px;height:25px;border-radius:50%;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Logo</h6>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            @if ($nfc_card->card_design->logo)
                                                                <img class="rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/uploads/client/' . $client->image) }}"
                                                                    alt="" id="logo-placeholder">
                                                            @else
                                                                <img class="avatar-img rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                    alt="" id="logo-placeholder">
                                                            @endif
                                                        </div>
                                                        <div class="col-4 py-2 offset-3">
                                                            <div class="upload-container">
                                                                <input type="file" id="logo" name="logo"
                                                                    accept="image/*" onchange="previewfile(event,'logo-placeholder')">
                                                                <label for="logo"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Add Logo</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 py-2 border-bottom">
                                                    <h6>Badge</h6>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            @if ($nfc_card->card_design->badges)
                                                                <img class="rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/uploads/client/' . $client->image) }}"
                                                                    alt="" id="badge-placeholder">
                                                            @else
                                                                <img class="avatar-img rounded-border-10 border border-white border-3"
                                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                                    alt="" id="badge-placeholder">
                                                            @endif
                                                        </div>
                                                        <div class="col-4 py-2 offset-3">
                                                            <div class="upload-container">
                                                                <input type="file" id="badge" name="logo"
                                                                    accept="image/*"onchange="previewfile(event,'badge-placeholder')" >
                                                                <label for="badge"
                                                                    class="d-flex justify-content-center"><i
                                                                        class="fas fa-images"></i>Add Badge</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="px-2">
                                            <h6 class="border-bottom">Personal</h6>
                                            <div class="row">
                                                <div class="col-8 form-group">
                                                    <label for="">Prefix</label>
                                                    <input type="text" name="prefix"
                                                        value="{{ $nfc_card->nfc_info->prefix }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">First Name</label>
                                                    <input type="text" name="prefix"
                                                        value="{{ $nfc_card->nfc_info->prefix }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" name="prefix"
                                                        value="{{ $nfc_card->nfc_info->prefix }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Last Name</label>
                                                    <input type="text" name="prefix"
                                                        value="{{ $nfc_card->nfc_info->prefix }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Suffix</label>
                                                    <input type="text" name="suffix"
                                                        value="{{ $nfc_card->nfc_info->suffix }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Accreditations</label>
                                                    <input type="text" name="accreditations"
                                                        value="{{ $nfc_card->nfc_info->accreditations }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Preferred Name</label>
                                                    <input type="text" name="preferred_name"
                                                        value="{{ $nfc_card->nfc_info->preferred_name }}" id=""
                                                        class="form-control">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Maiden Name</label>
                                                    <input type="text" name="maiden_name"
                                                        value="{{ $nfc_card->nfc_info->maiden_name }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Pronoun</label>
                                                    <input type="text" name="pronoun"
                                                        value="{{ $nfc_card->nfc_info->pronoun }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <h6 class="border-bottom">Affiliation</h6>
                                            <div class="row">
                                                <div class="col-8 form-group">
                                                    <label for="">Title</label>
                                                    <textarea name="title" id="" class="form-control form-control-sm" name="pronoun">{{ $nfc_card->nfc_info->title }}</textarea>
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Department</label>
                                                    <input type="text" name="department"
                                                        value="{{ $nfc_card->nfc_info->department }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Company</label>
                                                    <input type="text" name="company"
                                                        value="{{ $nfc_card->nfc_info->company }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-8 form-group">
                                                    <label for="">Headline</label>
                                                    <input type="text" name="headline"
                                                        value="{{ $nfc_card->nfc_info->headline }}" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                        <div class="px-2">
                                            <div class="col-12">
                                                <h6 class="border-bottom">NFC Field</h6>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="card bg-primary text-white"
                                                            style="max-height:400px;overflow-y:scroll">
                                                            <div class="card-body" id="selected-fields">
                                                                @forelse ($nfc_card->nfcFields as $value)
                                                                    {{-- $value --}}
                                                                    <div class="selected-field-item px-3 my-1">
                                                                        <label for="{{ $value->name }}"
                                                                            class="form-label d-flex justify-content-between">{{ $value->name }}<span
                                                                                class="delete-btn"><i
                                                                                    class="fa fa-close"></i></span></label>
                                                                        <input type="text" class="form-control"
                                                                            id=""
                                                                            name="field_value[{{ $value->pivot->nfc_field_id }}]"
                                                                            placeholder="{{ $value->name }}"
                                                                            value="{{ $value->pivot->field_value }}">
                                                                        <input type="hidden" class="form-control"
                                                                            value="{{ $value->pivot->nfc_field_id }}"
                                                                            name="nfc_field_id[]">
                                                                    </div>
                                                                @empty
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 pb-2" id="field-gallery"
                                                        style="max-height:400px;overflow-y:scroll;background-color:#8F60DE26;">
                                                        @foreach ($categories as $key => $category)
                                                            @php
                                                                $title = $category;
                                                                $nfcFields = DB::table('nfc_fields')
                                                                    ->where('category', $key)
                                                                    ->get();
                                                            @endphp
                                                            @if ($nfcFields->isEmpty())
                                                                @continue
                                                            @endif
                                                            <h4 class="social-field-title mt-4 mb-2">
                                                                <strong>{{ $title }}</strong> </h4>
                                                            @foreach ($nfcFields as $value)
                                                                @if ($value->type == 1)
                                                                    <button type="button"
                                                                        data-field="{{ $value->name }}"
                                                                        data-id="{{ $value->id }}"
                                                                        style="margin:2px 1px"
                                                                        class="field-item btn btn-primary btn-sm text-white rounded-pill"><span
                                                                            class="mx-1"><i
                                                                                class="{{ $value->icon }}"></i></span>{{ $value->name }}</button>
                                                                @elseif ($value->type == 2)
                                                                    @php
                                                                        $icon = str_replace(
                                                                            '<svg',
                                                                            '<svg style="width:24px; height:20px;"',
                                                                            $value->icon,
                                                                        );
                                                                    @endphp
                                                                    <button type="button"
                                                                        data-field="{{ $value->name }}"
                                                                        data-id="{{ $value->id }}"
                                                                        style="margin:2px 1px"
                                                                        class="field-item btn btn-primary btn-sm text-white rounded-pill"><span
                                                                            class="mx-1">
                                                                            {!! $icon !!}</span>{{ $value->name }}</button>
                                                                @elseif ($value->type == 3)
                                                                    <button type="button"
                                                                        data-field="{{ $value->name }}"
                                                                        data-id="{{ $value->id }}"
                                                                        style="margin:2px 1px"
                                                                        class="field-item btn btn-primary btn-sm text-white rounded-pill"><span
                                                                            class="mx-1">
                                                                            <img src="{{ $value->icon }}" alt="icon"
                                                                                height="50" weight="50">
                                                                        </span>{{ $value->name }}</button>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script>



        const colorBox = document.getElementById('colorBox');

        colorBox.addEventListener('click', function() {
            colorBox.classList.toggle('selected');
        });
    </script>
@endsection
@push('scripts')
<script>

 function previewfile(event, previewimg = 'previewimg') {
			var output = document.getElementById(previewimg);
			output.src = URL.createObjectURL(event.target.files[0]);
		}
</script>
@endpush
