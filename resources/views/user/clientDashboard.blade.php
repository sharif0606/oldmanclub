@extends('user.layout.app')
@section('title', 'User Profile')
@section('page', 'User Profile')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo">
                            @if($client->cover_photo)
                                 <img src="{{ asset('public/uploads/client/' . $client->cover_photo) }}" class="cover"
                                alt="">
                            @else
                               <img src="{{ asset('public/images/profile/cover2.jpg') }}" alt="" class="cover">
                            @endif
                        </div>
                        <div class="profile-photo">
                            @if($client->image)
                            <img src="{{ asset('public/uploads/client/' . $client->image) }}" class="img-fluid rounded-circle"
                                alt="" class="bg-dark">
                            <p class="badge"><img src="{{asset('public/images/varified.png')}}" alt=""></p><!-- Add your badge here -->
                            @else
                             <img src="{{ asset('public/images/download.jpg') }}" class="img-fluid rounded-circle"
                                alt="asdfdf" class="">
                            @endif
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="row justify-content-center">
                            <div class="row flex-nowrap">
                                <div class="col-3 col-sm-3 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h5 class="text-primary"> {{ $client->fname }} {{ $client->middle_name }}
                                            {{ $client->last_name }}</h5>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h5 class="text-primary">Address</h5>
                                        <p>{{ $client->address_line_1 }}&nbsp;<small class="text-warning">(Not
                                                Verified)</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 border-right-1 prf-col">
                                    <div class="profile-email">
                                        <h5 class="text-muted text-primary">{{ $client->email }}</h5>
                                        <p>Email<small class="text-warning">&nbsp;(Not Verified)</small></p>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 prf-col">
                                    <div class="profile-call">
                                        <h5 class="text-muted">(+088) {{ $client->contact_no }}</h5>
                                        <p>Phone No.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                {{-- <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                            class="nav-link active show">Posts</a>
                                    </li> --}}
                                <li class="nav-item"><a style="font-size: 14px !important;" href="#about-me"
                                        data-toggle="tab" class="nav-link active show">Basic Info</a>
                                </li>
                                <li class="nav-item"><a style="font-size: 14px !important;" href="#profile-settings"
                                        data-toggle="tab" class="nav-link">Setting</a>
                                </li>
                                <li class="nav-item"><a style="font-size: 14px !important;" href="#verify_email"
                                        data-toggle="tab" class="nav-link">
                                        Email Verification</a>
                                </li>
                                <li class="nav-item"><a style="font-size: 14px !important;" href="#address-verify"
                                        data-toggle="tab" class="nav-link">
                                        Address Verification</a>
                                </li>
                                <li class="nav-item"><a style="font-size: 14px !important;" href="#password_tab"
                                        data-toggle="tab" class="nav-link">Change
                                        Password</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-4">
                                <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-personal-info">
                                        <h6 class="text-primary mb-4">Personal Information</h6>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $client->fname }}
                                                    {{ $client->middle_name }}{{ $client->last_name }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $client->email }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Contact <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $client->contact_no }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Date Of Birth <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ date('d-F-Y', strtotime($client->dob)) }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Location <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $client->address_line_1 }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h6 class="text-primary">Account Setting</h6>
                                            <form method="post" enctype="multipart/form-data"
                                                action="{{ route('user_save_profile') }}">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->fname }}" class="form-control"
                                                            name="fname">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Middle Name</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->middle_name }}" class="form-control"
                                                            name="middle_name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->last_name}}" class="form-control"
                                                            name="last_name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" placeholder="Email"
                                                            value="{{ $client->email }}"class="form-control"
                                                            name="email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Date Of Birth</label>
                                                        <input type="date" placeholder=""
                                                            value="{{ $client->dob }}" class="form-control"
                                                            name="dob">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Contact No</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->contact_no }}" class="form-control"
                                                            name="contact_no">
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label>Nationality</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->nationality }}" class="form-control"
                                                            name="nationality">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Id No</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->id_no }}" class="form-control"
                                                            name="id_no">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Id Type</label>
                                                        <select name="id_no_type" id=""
                                                            value="{{ $client->id_no_type }}" class="form-control">
                                                            <option value="0"
                                                                @if (old('id_no_type', $client->id_no_type) == 0) selected @endif>
                                                                Passport</option>
                                                            <option value="1"
                                                                @if (old('id_no_type', $client->id_no_type) == 1) selected @endif>
                                                                National ID</option>
                                                            <option value="2"
                                                                @if (old('id_no_type', $client->id_no_type) == 2) selected @endif>
                                                                Driver License</option>
                                                            <option value="3"
                                                                @if (old('id_no_type', $client->id_no_type) == 3) selected @endif>
                                                                Birth Certificate</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Present Address</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->address_line_1 }}" class="form-control"
                                                            name="address_line_1">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Parmanent Address</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->address_line_2 }}" class="form-control"
                                                            name="address_line_2">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Profile Photo</label>
                                                        <input type="file" placeholder="" class="form-control"
                                                            name="image" id="image">

                                                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100px;">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cover Photo</label>
                                                        <input type="file" placeholder="" class="form-control"
                                                            name="cover_photo" id="cover_photo">

                                                        <img id="preview_cover" src="#" alt="preview_cover" style="display: none; max-width: 100px;">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Country</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->country }}" class="form-control"
                                                            name="country">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>city</label>
                                                        <input type="text" placeholder="" value="{{ $client->city }}"
                                                            class="form-control" name="city">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>State</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->state }}" class="form-control"
                                                            name="state">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Zip Code</label>
                                                        <input type="text" placeholder=""
                                                            value="{{ $client->zip_code }}" class="form-control"
                                                            name="zip_code">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="gridCheck">
                                                        <label for="gridCheck" class="form-check-label">Check
                                                            me
                                                            out</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="verify_email" class="tab-pane fade">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Verify Email</h6>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <form action="verify_email.php" method="post">
                                                        <button type="submit" class="btn btn-danger mt-2">Verify Your Email</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="address-verify" class="tab-pane fade">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Verify Address</h6>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-6">
                                                    <form action="{{route('address_verify.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="id_image">Upload Your ID:</label>
                                                            <input type="file" id="id_image" class="form-control"  name="id_image" required>
                                                            <img id="preview_photo_id" src="#" alt="preview_photo_id" style="display: none; max-width: 100px;"> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="documents">Upload Documents (jpg, png, pdf, doc):</label>
                                                            <input type="file" id="document" class="form-control" name="document[]" accept="image/jpeg,image/png,application/pdf,application/txt,application/msword,application/vnd.openxmlformats-officedcoument.wordprocessingml.document" multiple required>
                                                            <div id="preview_container"></div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="">Your Mailling Address</label>
                                                            <textarea name="address_line_1" id="" class="form-control"></textarea>
                                                        </div>
                                                        
                                                        <button type="submit" class="btn btn-danger mt-2">Verify Your Address</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="password_tab" class="tab-pane fade">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Change Password</h6>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-6">
                                                    <form action="{{ route('change_password') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="current_password">Old Password</label>
                                                            <input type="password" name="current_password"
                                                                class="form-control" placeholder="Old password">
                                                            @if ($errors->has('current_password'))
                                                                <small class="d-block text-danger">
                                                                    {{ $errors->first('current_password') }}
                                                                </small>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="password">New Password</label>
                                                            <input type="password" name="password"class="form-control"
                                                                placeholder="new password" required>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" name="password_confirmation"
                                                                class="form-control" placeholder="Confirm password"
                                                                required>

                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Save
                                                            Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @push('scripts')
     <script>
        document.getElementById('id_image').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('preview_photo_id');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview image
                }

                reader.readAsDataURL(input.files[0]); // Convert to data URL
            }
        });
        document.getElementById('document').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('preview_document');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview image
                }

                reader.readAsDataURL(input.files[0]); // Convert to data URL
            }
        });
        document.getElementById('image').addEventListener('change', function(event) {
            var input = event.target;
            var preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
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

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview image
                }

                reader.readAsDataURL(input.files[0]); // Convert to data URL
            }
        });


        document.getElementById('document').addEventListener('change', function(event) {
            var input = event.target;
            var previewContainer = document.getElementById('preview_container');

            // Clear previous previews
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.style.maxWidth = '100px';
                        preview.style.marginRight = '5px'; // Add some space between images
                        previewContainer.appendChild(preview); // Append each preview image
                    }

                    reader.readAsDataURL(input.files[i]); // Convert to data URL
                }
            }
        });
    </script>
    @endpush('scripts')

