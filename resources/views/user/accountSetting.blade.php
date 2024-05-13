@extends('user.layout.base')
@push('styles')
    <style>
        #pswmeter {
            height: 8px;
            background-color: #eee;
            position: relative;
            overflow: hidden;
            border-radius: 4px;
        }

        #pswmeter .password-strength-meter-score {
            height: inherit;
            width: 0%;
            transition: .3s ease-in-out;
            background: #dc3545;
        }

        #pswmeter .password-strength-meter-score.psms-25 {
            width: 25%;
            background: #dc3545;
        }

        #pswmeter .password-strength-meter-score.psms-50 {
            width: 50%;
            background: #f7c32e;
        }

        #pswmeter .password-strength-meter-score.psms-75 {
            width: 75%;
            background: #4f9ef8;
        }

        #pswmeter .password-strength-meter-score.psms-100 {
            width: 100%;
            background: #0cbc87;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
    </style>
@endpush
@section('content')

            <div class="row">

                <!-- Sidenav START -->
                <div class="col-lg-3">

                    <!-- Advanced filter responsive toggler START -->
                    <!-- Divider -->
                    <div class="d-flex align-items-center mb-4 d-lg-none">
                        <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                            <span class="h6 mb-0 fw-bold d-lg-none ms-2">Settings</span>
                        </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->

                    <nav class="navbar navbar-light navbar-expand-lg mx-0">
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                            <!-- Offcanvas header -->
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Offcanvas body -->
                            <div class="offcanvas-body p-0">
                                <!-- Card START -->
                                <div class="card w-100">
                                    <!-- Card body START -->
                                    <div class="card-body">

                                        <!-- Side Nav START -->
                                        <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0"
                                            role="tablist" id="myTab">
                                            <li class="nav-item" data-bs-dismiss="offcanvas" role="presentation">
                                                <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-1"
                                                    data-bs-toggle="tab" aria-selected="true" role="tab"> <img
                                                        class="me-2 h-20px fa-fw"
                                                        src="{{ asset('public/user/assets/images/icon/person-outline-filled.svg') }}"
                                                        alt=""><span>Basic Information</span></a>
                                            </li>

                                            <li class="nav-item" data-bs-dismiss="offcanvas" role="presentation">
                                                <a class="nav-link d-flex mb-0" href="#nav-setting-tab-2"
                                                    data-bs-toggle="tab" aria-selected="false" role="tab"
                                                    tabindex="-1"> <img class="me-2 h-20px fa-fw"
                                                        src="{{ asset('public/user/assets/images/icon/shield-outline-filled.svg') }}"
                                                        alt=""><span>Profile Settings</span></a>
                                            </li>
                                            <li class="nav-item" data-bs-dismiss="offcanvas" role="presentation">
                                                <a class="nav-link d-flex mb-0" href="#nav-setting-tab-3"
                                                    data-bs-toggle="tab" aria-selected="false" role="tab"
                                                    tabindex="-1"> <img class="me-2 h-20px fa-fw"
                                                        src="{{ asset('public/user/assets/images/icon/shield-outline-filled.svg') }}"
                                                        alt=""><span>OCM-ID</span></a>
                                            </li>
                                            <li class="nav-item" data-bs-dismiss="offcanvas" role="presentation">
                                                <a class="nav-link d-flex mb-0" href="#nav-setting-tab-4"
                                                    data-bs-toggle="tab" aria-selected="false" role="tab"
                                                    tabindex="-1"> <img class="me-2 h-20px fa-fw"
                                                        src="{{ asset('public/user/assets/images/icon/arrow-boxed-outline-filled.svg') }}"
                                                        alt=""><span>Password Change</span></a>
                                            </li>
                                            {{-- <li class="nav-item" data-bs-dismiss="offcanvas" role="presentation">
                                                <a class="nav-link d-flex mb-0" href="#nav-setting-tab-5" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"> <img class="me-2 h-20px fa-fw" src="{{asset('public/user/assets/images/icon/chat-alt-outline-filled.svg')}}" alt=""><span>Messaging </span></a>
                                            </li>
                                            <li class="nav-item" data-bs-dismiss="offcanvas" role="presentation">
                                                <a class="nav-link d-flex mb-0" href="#nav-setting-tab-6" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"> <img class="me-2 h-20px fa-fw" src="{{asset('public/user/assets/images/icon/trash-var-outline-filled.svg')}}" alt=""><span>Close account </span></a>
                                            </li> --}}
                                        </ul>
                                        <!-- Side Nav END -->

                                    </div>
                                    <!-- Card body END -->
                                    <!-- Card footer -->
                                    <div class="card-footer text-center py-2">
                                        <a class="btn btn-link  btn-sm" href="{{ route('myProfile') }}">View Profile </a>
                                    </div>
                                </div>
                                <!-- Card END -->
                            </div>
                            <!-- Offcanvas body -->
                        </div>
                    </nav>
                </div>
                <!-- Sidenav END -->

                <!-- Main content START -->
                <div class="col-lg-6 vstack gap-4">
                    <!-- Setting Tab content START -->
                    <div class="tab-content py-0 mb-0">

                        <!-- Account setting tab START -->
                        <div class="tab-pane fade active show" id="nav-setting-tab-1" role="tabpanel">
                            <!-- Account settings START -->
                            <div class="card mb-4">
                                <!-- Title START -->
                                <div class="card-header border-0 pb-0">
                                    <h1 class="h5 card-title">Basic Information</h1>
                                    {{-- <p class="text-primary mb-0"><strong>TO MAKE YOUR INFORMATION PUBLIC OR PRIVATE USE TOGGLE
                                            RIGHT AFTER INFORMATION BOX NAME</strong></p> --}}
                                </div>
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Form settings START -->
                                    <form method="post" enctype="multipart/form-data"
                                        action="{{ route('user_save_profile') }}" class="row g-2">
                                        @csrf
                                        <!-- First name -->
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label">First name</label>
                                                {{-- <label class="switch mb-1">
                                                    <input type="checkbox" name="privacySwitch">
                                                    <span class="slider"></span>
                                                </label> --}}
                                            </div>

                                            <input type="text" name="fname" value="{{ $client->fname }}"
                                                class="form-control" placeholder="">

                                        </div>
                                        <!-- Last name -->
                                        <div class="col-sm-6 col-lg-4">
                                            <label class="form-label">Middle name</label>
                                            <input type="text" name="middle_name" value="{{ $client->middle_name }}"
                                                class="form-control" placeholder="" value="Lanson">
                                        </div>
                                        <!-- Additional name -->
                                        <div class="col-sm-6 col-lg-4">
                                            <label class="form-label">Last name</label>
                                            <input type="text" name="last_name" value="{{ $client->last_name }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        <!-- Disply name -->
                                        <div class="col-sm-12">
                                            <label class="form-label">Display name</label>
                                            <input type="text" name="display_name" value="{{ $client->display_name }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        <!-- User name -->
                                        <div class="col-sm-12">
                                            <label class="form-label">User name</label>
                                            <input type="text" name="username" value="{{ $client->username }}"
                                                class="form-control" placeholder="">
                                            @if ($errors->has('username'))
                                                <small class="d-block text-danger fw-bold">
                                                    {{ $errors->first('username') }}
                                                </small>
                                            @endif
                                        </div>
                                        <!-- User name -->
                                        <div class="col-sm-6">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $client->email }}">
                                        </div>
                                        <!-- Birthday -->
                                        <div class="col-lg-6">
                                            <label class="form-label">Birthday </label>
                                            <input type="date" name="dob" class="form-control"
                                                value="{{ $client->dob }}">
                                        </div>
                                        {{-- <div class="col-lg-6">
                                            <label class="form-label">Nationality </label>
                                            <input type="text" name="nationality" class="form-control"
                                                value="{{ $client->nationality }}">
                                        </div> --}}
                                        <div class="col-sm-6 col-lg-4">
                                            <label class="form-label">Nationality</label>
                                            <select name="nationality" class="form-control"
                                                onchange="fetchCountryCode(this.value)">
                                                <option value="">Select country</option>
                                                @foreach ($countries as $value)
                                                    <option value="{{ $value->id }}"
                                                        @if (old('nationality', $client->nationality) == $value->id) selected @endif>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="form-label">Ext.</label>
                                            <input type="text" readonly id="code-dropdown" name="phone_code"
                                                class="form-control" value="{{ $client->phone_code }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Contact </label>
                                            <input type="text" name="contact_no" class="form-control "
                                                value="{{ $client->contact_no }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">PHOTO ID Type </label>
                                            <select name="id_no_type" id="" value="{{ $client->id_no_type }}"
                                                class="form-control">
                                                <option value="">Select</option>
                                                <option value="0" @if (old('id_no_type', $client->id_no_type) == 0) selected @endif>
                                                    Passport</option>
                                                <option value="1" @if (old('id_no_type', $client->id_no_type) == 1) selected @endif>
                                                    National ID</option>
                                                <option value="2" @if (old('id_no_type', $client->id_no_type) == 2) selected @endif>
                                                    Driver License</option>
                                                {{-- <option value="3" @if (old('id_no_type', $client->id_no_type) == 3) selected @endif>
                                                    Birth Certificate</option> --}}
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">PHOTO ID No </label>
                                            <input type="text" name="id_no" class="form-control"
                                                value="{{ $client->id_no }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" name="designation" class="form-control"
                                                value="{{ $client->designation }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Marital Status </label>
                                            <select name="marital_status" id=""
                                                value="{{ $client->marital_status }}" class="form-control">
                                                <option value="1" @if (old('marital_status', $client->marital_status) == 1) selected @endif>
                                                    Unmarried</option>
                                                <option value="2" @if (old('marital_status', $client->marital_status) == 2) selected @endif>
                                                    Married</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">Country</label>
                                            <select name="current_country_id" class="form-control"
                                                onchange="fetchStates(this.value)">
                                                <option value="">Select country</option>
                                                @foreach ($countries as $value)
                                                    <option value="{{ $value->id }}"
                                                        @if (old('current_country_id', $client->current_country_id) == $value->id) selected @endif>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">State</label>
                                            <select name="current_state_id" id="state-dropdown" class="form-control"
                                                onchange="fetchCities(this.value)">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="current_city_id" value="{{$client->current_city_id}}">
                                            {{-- <select name="current_city_id" id="city-dropdown" class="form-control">
                                                <option value="">Select City</option>
                                            </select> --}}
                                        </div>

                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">Zip Code</label>
                                            <input type="text" placeholder="" value="{{ $client->zip_code }}"
                                                class="form-control"name="zip_code">
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">From Country</label>
                                            <select name="from_country_id" class="form-control"
                                                onchange="fetchStatesFrom(this.value)">
                                                <option value="">Select country</option>
                                                @foreach ($countries as $value)
                                                    <option value="{{ $value->id }}"
                                                        @if (old('current_country_id', $client->from_country_id) == $value->id) selected @endif>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">From State</label>
                                            <select name="from_state_id" id="from-state-dropdown" class="form-control"
                                                onchange="fetchCitiesFrom(this.value)">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        {{--<div class="col-sm-6 col-lg-3">
                                            <label class="form-label">From City</label>
                                            <select name="from_city_id" id="from-city-dropdown" class="form-control">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <label class="form-label">Zip Code</label>
                                            <input type="text" placeholder="" value="{{ $client->from_zip_code }}"
                                                class="form-control"name="from_zip_code">
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <label class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" name="address_line_1" value="{{ $client->address_line_1 }}">
                                            {{-- <textarea class="form-control" name="address_line_1" rows="6">{{ $client->address_line_1 }}</textarea> --}}
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" name="address_line_2" value="{{ $client->address_line_2 }}">
                                            {{-- <textarea class="form-control" name="address_line_2" rows="6">{{ $client->address_line_2 }}</textarea> --}}
                                        </div>
                                        <!-- Button  -->
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-sm btn-primary mb-0">Save
                                                changes</button>
                                        </div>
                                    </form>
                                    <!-- Settings END -->
                                </div>
                                <!-- Card body END -->
                            </div>
                             <!-- Card END -->
                            <!-- Account settings END -->
                        </div>
                        <!-- Account setting tab END -->

                        <!-- Notification tab START -->
                        <div class="tab-pane fade" id="nav-setting-tab-2" role="tabpanel">
                            <!-- Notification START -->
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <h1 class="h5 card-title">{{-- Upload Your Document for Account verification --}} Profile Settings</h1>
                                </div>
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data"
                                        action="{{ route('save_cover_profile_photo') }}" class="row g-2">
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label">Profile Photo <small><strong>Recomended Size (128x128)</strong></small></label>
                                            <div class="input-group">
                                                <input type="file" placeholder="" class="form-control" name="image"
                                                    id="image">
                                            </div>
                                            <img id="preview" src="#" alt="Preview"
                                                style="display: none; max-width: 100px;">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Cover Photo <small><strong>Recomended Size (1090x250)</strong></small></label>
                                            <div class="input-group">
                                                <input type="file" placeholder="" class="form-control"
                                                    name="cover_photo" id="cover_photo">
                                               
                                            </div>
                                            <img id="preview_cover" src="#" alt="preview_cover"
                                                style="display: none; max-width: 100px;">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Profile Overview</label>
                                            <textarea class="form-control" rows="4" placeholder="Profile Overview (Required)" name="profile_overview">{{ $client->profile_overview }}</textarea>
                                            <small>Character limit: 300</small>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Tagline</label>
                                            <textarea class="form-control" rows="2" placeholder="Tagline (Required)" name="tagline">{{ $client->tagline }}</textarea>
                                            <small>Character limit: 14</small>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary mb-0">Save Changes</button>
                                    
                                </div>
                            </form>
                                {{-- <form action="{{ route('address_verify.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="documents" class="mb-2">Upload Documents (jpg, png, pdf,
                                                doc):</label>
                                            <input type="file" id="document" class="form-control" name="document[]"
                                                accept="image/jpeg,image/jpg,image/png,application/pdf,application/txt,application/msword,application/vnd.openxmlformats-officedcoument.wordprocessingml.document"
                                                multiple required>
                                            <div id="preview_container"></div>
                                        </div>

                                        <button type="submit" class="btn btn-success mt-2">Verify Your Address</button>
                                    </form> --}}
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Notification tab END -->


                        <!-- Privacy and safety tab START -->
                        <div class="tab-pane fade" id="nav-setting-tab-3" role="tabpanel">
                            <!-- Privacy and safety START -->
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <h1 class="h5 card-title">
                                        @if ($client->verification_request_status == 2 && $client->is_address_verified == 0)
                                            Please Verify Your Address Having Code With Mailing Address
                                        @elseif ($client->verification_request_status == 0)
                                            Your Mailling Address
                                        @else
                                            Verification Status
                                        @endif
                                    </h1>
                                </div>
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body pb-2">
                                    @if ($client->verification_request_status == 0)
                                        @if( $client->address_line_1 && $client->id_no !== null && $client->id_no_type !== null)
                                        <form action="{{ route('address_verify.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="form-label"><strong>Address</strong></label>
                                                    {{-- <textarea class="form-control" name="address_line_2" rows="6">{{ $client->address_line_2 }}</textarea> --}}
                                                    <span class="pe-1">{{ $client->address_line_1 }}</span>
                                                    <span>{{ $client->address_line_2 }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_image" class="mb-2"><strong>Upload Your PHOTO ID</strong> (Mentioned In Basic Information):</label>
                                                    <input type="file" id="id_image" class="form-control" name="id_image"
                                                        required>
                                                    <img id="preview_photo_id" src="#" alt="preview_photo_id"
                                                        style="display: none; max-width: 100px;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_image" class="mb-2"><strong>Upload Address Proof for Address verification
                                                    </strong></label>
                                                    <input type="file" id="address_proof_photo" class="form-control" name="address_proof_photo"
                                                        required>
                                                    <img id="address_proof_photo" src="#" alt="address_proof_photo"
                                                        style="display: none; max-width: 100px;">
                                                </div>
                                            </div>

                                            {{-- <div class="form-group">
                                                <label for="">Your Mailling Address <strong
                                                        class="text-danger">(Unverified)</strong></label>
                                                <textarea name="address_line_1" id="" class="form-control" rows="6" required></textarea>
                                            </div> --}}
                                            <button type="submit" class="btn btn-success mt-2">Verify Now</button>
                                        </form>
                                        @else
                                        <h5 class="h5 card-title text-warning">To Verify Address Please input address and ID No and ID Type from basic information</h5>
                                        @endif
                                    @elseif($client->verification_request_status == 2 && $client->is_address_verified == 0)
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="form-label">Address & PHOTO ID</label>
                                                <span class="pe-1">{{ $client->address_line_1 }}</span>
                                                <span>{{ $client->address_line_2 }}</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <img class="rounded img-fluid"
                                                src="{{asset('public/uploads/verify_image/' . $client->photo_id)}}" alt="">
                                            </div>
                                        </div>
                                        <form class="form" method="post" enctype="multipart/form-data"
                                            action="{{ route('address_verify_saved', encryptor('encrypt', $client->id)) }}">
                                            @csrf
                                            @method('Post')
                                            <input type="hidden" name="uptoken"
                                                value="{{ encryptor('encrypt', $client->id) }}">
                                            <div class="form-group">
                                                <label for="">Verification Code<strong
                                                        class="text-danger"></strong></label>
                                                <input type="text" name="code" class="form-control" rows="6"
                                                    required>
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        <small class="d-block text-danger fw-bold">
                                                            {{ $error }}
                                                        </small>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <button type="submit" class="btn btn-success mt-2">Verify With Code</button>
                                        </form>
                                    @elseif($client->verification_request_status == 2 && $client->is_address_verified == 1)
                                        <h5 class="h5 card-title text-success">Your Address Verification is complete.</h5>
                                    @else
                                        <h5 class="h5 card-title">We Are Reviewing Your Address Verification.</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="form-label"><strong>Address & PHOTO ID</strong></label>
                                                <p>
                                                    <span>{{ $client->address_line_1 }}</span>
                                                    <span>{{ $client->address_line_2 }}</span>
                                                </p>
                                               
                                            </div>
                                            <div class="col-lg-6">
                                                <img class="rounded img-fluid"
                                                src="{{asset('public/uploads/verify_image/' . $client->photo_id)}}" alt="">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label"><strong>Address Verification Document</strong></label>
                                                <img class="rounded img-fluid"
                                                src="{{asset('public/uploads/verify_image/' . $client->address_proof_photo)}}" alt="">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Privacy and safety END -->
                        </div>
                        <!-- Privacy and safety tab END -->

                        <!-- Password Change tab START -->
                        <div class="tab-pane fade" id="nav-setting-tab-4" role="tabpanel">
                            <!-- Change your password START -->
                            <div class="card">
                                <!-- Title START -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">Change your password</h5>
                                </div>
                                <!-- Title START -->
                                <div class="card-body">
                                    <!-- Settings START -->
                                    <form class="row g-3" action="{{ route('change_password') }}" method="post">
                                        @csrf
                                        <!-- Current password -->
                                        <div class="col-12">
                                            <label class="form-label">Current password</label>
                                            <input type="password" class="form-control" placeholder=""
                                                name="current_password">
                                            @if ($errors->has('current_password'))
                                                <small class="d-block text-danger">
                                                    {{ $errors->first('current_password') }}
                                                </small>
                                            @endif
                                        </div>
                                        <!-- New password -->
                                        <div class="col-12">
                                            <label class="form-label">New password</label>
                                            <!-- Input group -->
                                            <div class="input-group">
                                                <input class="form-control fakepassword" type="password" name="password"
                                                    required id="psw-input" placeholder="Enter new password">
                                                <span class="input-group-text p-0">
                                                    <i
                                                        class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                                </span>
                                            </div>
                                            <!-- Pswmeter -->
                                            <div id="pswmeter" class="mt-2 password-strength-meter">
                                                <div class="password-strength-meter-score"></div>
                                            </div>
                                            <div id="pswmeter-message" class="rounded mt-1">Write your password...</div>
                                        </div>
                                        <!-- Confirm password -->
                                        <div class="col-12">
                                            <label class="form-label">Confirm password</label>
                                            <input type="text" class="form-control" placeholder=""
                                                name="password_confirmation" required>
                                        </div>
                                        <!-- Button  -->
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary mb-0">Update password</button>
                                        </div>
                                    </form>
                                    <!-- Settings END -->
                                </div>
                            </div>
                        </div>
                        <!-- Communications tab END -->

                        <!-- Messaging tab START -->
                        {{-- <div class="tab-pane fade" id="nav-setting-tab-5" role="tabpanel">
                            <!-- Messaging privacy START -->
                            <div class="card mb-4">
                                <!-- Title START -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">Messaging privacy settings</h5>
                                    <p class="mb-0">As young ye hopes no he place means. Partiality
                                        diminution gay yet entreaties admiration. In mention perhaps attempt
                                        pointed suppose. Unknown ye chamber of warrant of Norland arrived. </p>
                                </div>
                                <!-- Title START -->
                                <div class="card-body">
                                    <!-- Settings style START -->
                                    <ul class="list-group list-group-flush">
                                        <!-- Message list item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Enable message request notifications</h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="msgSwitchCheckChecked" checked="">
                                            </div>
                                        </li>
                                        <!-- Message list item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Invitations from your network</h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="msgSwitchCheckChecked2" checked="">
                                            </div>
                                        </li>
                                        <!-- Message list item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Allow connections to add you on group</h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="msgSwitchCheckChecked3">
                                            </div>
                                        </li>
                                        <!-- Message list item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Reply to comments</h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="msgSwitchCheckChecked4">
                                            </div>
                                        </li>
                                        <!-- Message list item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Messages from activity on my page or channel
                                                </h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="msgSwitchCheckChecked5" checked="">
                                            </div>
                                        </li>
                                        <!-- Message list item -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Personalise tips for my page</h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="msgSwitchCheckChecked6" checked="">
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- Message END -->
                                </div>
                                <!-- Button save -->
                                <div class="card-footer pt-0 text-end border-0">
                                    <button type="submit" class="btn btn-sm btn-primary mb-0">Save
                                        changes</button>
                                </div>
                            </div>
                            <!-- Messaging privacy END -->
                            <!-- Messaging experience START -->
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">Messaging experience</h5>
                                    <p class="mb-0">Arrived off she elderly beloved him affixed noisier yet.
                                    </p>
                                </div>
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Message START -->
                                    <ul class="list-group list-group-flush">
                                        <!-- Message list item -->
                                        <li
                                            class="list-group-item d-sm-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Read receipts and typing indicators</h6>
                                            </div>
                                            <button class="btn btn-primary-soft btn-sm mt-1 mt-md-0"> <i
                                                    class="bi bi-pencil-square"></i> Change</button>
                                        </li>
                                        <!-- Message list item -->
                                        <li
                                            class="list-group-item d-sm-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Message suggestions</h6>
                                            </div>
                                            <button class="btn btn-primary-soft btn-sm mt-1 mt-md-0"> <i
                                                    class="bi bi-pencil-square"></i> Change</button>
                                        </li>
                                        <!-- Message list item -->
                                        <li
                                            class="list-group-item d-sm-flex justify-content-between align-items-center px-0">
                                            <div class="me-2">
                                                <h6 class="mb-0">Message nudges</h6>
                                            </div>
                                            <button class="btn btn-primary-soft btn-sm mt-1 mt-md-0"> <i
                                                    class="bi bi-pencil-square"></i> Change</button>
                                        </li>
                                    </ul>
                                    <!-- Message END -->
                                </div>
                                <!-- Card body END -->
                                <!-- Button save -->
                                <div class="card-footer pt-0 text-end border-0">
                                    <button type="submit" class="btn btn-sm btn-primary mb-0">Save
                                        changes</button>
                                </div>
                            </div>
                            <!-- Messaging experience END -->
                        </div> --}}
                        <!-- Messaging tab END -->
                        <!-- Close account tab START -->
                        {{-- <div class="tab-pane fade" id="nav-setting-tab-6" role="tabpanel">
                            <!-- Card START -->
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">Delete account</h5>
                                    <p class="mb-0">He moonlights difficult engrossed it, sportsmen.
                                        Interested has all Devonshire difficulty gay assistance joy. Unaffected
                                        at ye of compliment alteration to.</p>
                                </div>
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Delete START -->
                                    <h6>Before you go...</h6>
                                    <ul>
                                        <li>Take a backup of your data <a href="#">Here</a> </li>
                                        <li>If you delete your account, you will lose your all data.</li>
                                    </ul>
                                    <div class="form-check form-check-md my-4">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="deleteaccountCheck">
                                        <label class="form-check-label" for="deleteaccountCheck">Yes, I'd like
                                            to delete my account</label>
                                    </div>
                                    <a href="#" class="btn btn-success-soft btn-sm mb-2 mb-sm-0">Keep my
                                        account</a>
                                    <a href="#" class="btn btn-danger btn-sm mb-0">Delete my account</a>
                                    <!-- Delete END -->
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Card END -->
                        </div> --}}
                        <!-- Close account tab END -->

                    </div>
                    <!-- Setting Tab content END -->
                </div>

            </div> <!-- Row END -->


    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview image
                }

                reader.readAsDataURL(input.files[0]); // Convert to data URL
            }
        });
        document.getElementById('cover_photo').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('preview_cover');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview image
                }

                reader.readAsDataURL(input.files[0]); // Convert to data URL
            }
        });
    </script>
    <script>
        const togglePassButton = document.getElementById('toggleCurrentPassword');
        const inputPass = document.getElementById('currentPassword');
        togglePassButton.addEventListener('click', function() {
            const newType = inputPass.type === 'password' ? 'text' : 'password';
            inputPass.type = newType;
            togglePassButton.querySelector('i').classList.toggle('fa-solid fa-eye-slash')
        });
    </script>
@endsection
@push('scripts')
    <script>
        // Function to fetch states based on selected Country
        function fetchStates(countryId) {
            $.ajax({
                url: "{{ route('getStatesByCountry') }}",
                type: 'GET',
                data: {
                    countryId: countryId,
                },
                success: function(response) {
                    // Update UI with states data
                    // Example: Display states in a dropdown
                    $('#state-dropdown').empty();
                    $.each(response, function(index, state) {
                        $('#state-dropdown').append('<option value="' + state.id + '">' + state.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        // Function to fetch cities based on selected States
        function fetchCities(stateId) {
            $.ajax({
                url: "{{ route('getCitiesByStates') }}",
                type: 'GET',
                data: {
                    stateId: stateId,
                },
                success: function(response) {
                    // Update UI with cities data
                    // Example: Display cities in a dropdown
                    $('#city-dropdown').empty();
                    $.each(response, function(index, city) {
                        $('#city-dropdown').append('<option value="' + city.id + '">' + city.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        // Function to fetch Phone Code based on selected Country
        function fetchCountryCode(countryId) {
            $.ajax({
                url: "{{ route('getCodesByCountry') }}",
                type: 'GET',
                data: {
                    countryId: countryId,
                },
                success: function(response) {
                    // Update UI with states data
                    // Example: Display states in a dropdown
                    $('#code-dropdown').empty();
                    $('#code-dropdown').val(response.phonecode);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        var currentCountryId = "{{ $client->current_country_id }}";
        var currentStateId = "{{ $client->current_state_id }}";
        var currentCityId = "{{ $client->current_city_id }}";

        if (currentCountryId) {
            $.ajax({
                url: "{{ route('getStatesByCountry') }}",
                type: 'GET',
                data: {
                    countryId: currentCountryId,
                },
                success: function(response) {
                    // Update UI with states data
                    // Example: Display states in a dropdown
                    $('#state-dropdown').empty();
                    $.each(response, function(index, state) {
                        var option = $('<option value="' + state.id + '">' + state.name + '</option>');
                        if (state.id == currentStateId) {
                            option.prop('selected', true);
                        }
                        $('#state-dropdown').append(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        if (currentStateId) {
            $.ajax({
                url: "{{ route('getCitiesByStates') }}",
                type: 'GET',
                data: {
                    stateId: currentStateId,
                },
                success: function(response) {
                    // Update UI with cities data
                    // Example: Display cities in a dropdown
                    $('#city-dropdown').empty();
                    $.each(response, function(index, city) {
                        var option = $('<option value="' + city.id + '">' + city.name + '</option>');
                        if (city.id == currentCityId) {
                            option.prop('selected', true);
                        }
                        $('#city-dropdown').append(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Function to fetch states based on selected Country
        function fetchStatesFrom(countryId) {
            $.ajax({
                url: "{{ route('getStatesByCountry') }}",
                type: 'GET',
                data: {
                    countryId: countryId,
                },
                success: function(response) {
                    // Update UI with states data
                    // Example: Display states in a dropdown
                    $('#from-state-dropdown').empty();
                    $.each(response, function(index, state) {
                        $('#from-state-dropdown').append('<option value="' + state.id + '">' + state
                            .name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        // Function to fetch cities based on selected States
        function fetchCitiesFrom(stateId) {
            $.ajax({
                url: "{{ route('getCitiesByStates') }}",
                type: 'GET',
                data: {
                    stateId: stateId,
                },
                success: function(response) {
                    // Update UI with cities data
                    // Example: Display cities in a dropdown
                    $('#from-city-dropdown').empty();
                    $.each(response, function(index, city) {
                        $('#from-city-dropdown').append('<option value="' + city.id + '">' + city.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        var formCountryId = "{{ $client->from_country_id }}";
        var formStateId = "{{ $client->from_state_id }}";
        var formCityId = "{{ $client->from_city_id }}";

        if (formCountryId) {
            $.ajax({
                url: "{{ route('getStatesByCountry') }}",
                type: 'GET',
                data: {
                    countryId: formCountryId,
                },
                success: function(response) {
                    // Update UI with states data
                    // Example: Display states in a dropdown
                    $('#from-state-dropdown').empty();
                    $.each(response, function(index, state) {
                        var option = $('<option value="' + state.id + '">' + state.name + '</option>');
                        if (state.id == formStateId) {
                            option.prop('selected', true);
                        }
                        $('#from-state-dropdown').append(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        if (formStateId) {
            $.ajax({
                url: "{{ route('getCitiesByStates') }}",
                type: 'GET',
                data: {
                    stateId: formStateId,
                },
                success: function(response) {
                    // Update UI with cities data
                    // Example: Display cities in a dropdown
                    $('#from-city-dropdown').empty();
                    $.each(response, function(index, city) {
                        var option = $('<option value="' + city.id + '">' + city.name + '</option>');
                        if (city.id == formCityId) {
                            option.prop('selected', true);
                        }
                        $('#from-city-dropdown').append(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>
    @if(old('tab'))
    <script>
        $(function() {
            $('#myTab .nav-link').removeClass('active');
            $('.tab-content .tab-pane').removeClass('in active show');
            var selectedTab = '{{ old("tab") }}';
            // Show the selected tab
            if (selectedTab) {
                $('#myTab a[href="#' + selectedTab + '"]').addClass('active').tab('show');
                $('#' + selectedTab).addClass('in active show');
            }
        });
    </script>
    @endif
@endpush
