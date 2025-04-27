@extends('user.layout.auth')
@section('title', 'Sign Up')
@section('content')
    <main>

        <!-- Container START -->
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100 py-5">
                <!-- Main content START -->
                <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                    <!-- Sign up START -->
                    <div class="card card-body rounded-3 p-4 p-sm-5">
                        <div class="text-center">
                            <!-- Title -->
                            <h2 class="mb-2">OLD CLUB MAN </h2>
                            <h3 class="mb-2">SIGN UP</h3>
                            <span class="d-block">Already have an account? <a href="{{ route('clientlogin') }}">Sign in
                                    here</a></span>
                        </div>
                        <!-- Form START -->
                        <form action="{{ route('clientregister.store') }}" method="POST" id="signupForm" class="mt-4">
                            @csrf
                            <!-- Name -->
                            <div class="row gx-1">
                                <div class="col-md-6">
                                    <div class="mb-3 input-group-md">
                                        <input type="text" id="fname" name="fname" class="form-control"
                                            placeholder="Your First Name" value="{{ old('fname') }}">
                                          
                                        @if ($errors->has('fname'))
                                            <small class="d-block text-danger fw-bold">
                                                {{ $errors->first('fname') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- <div class="mb-3 input-group-md">
                  <input type="text" name="middle_name" class="form-control" placeholder="Your Middle Name">
                    @if ($errors->has('middle_name'))
                        <small class="d-block text-danger fw-bold">
                            {{ $errors->first('middle_name') }}
                        </small>
                    @endif
                </div> --}}
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Your Last Name"
                                        value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                        <small class="d-block text-danger fw-bold">
                                            {{ $errors->first('last_name') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="mb-3 input-group-md">
                                <input type="text" name="contact_or_email" class="form-control"
                                    placeholder="Enter email Or Contact" value="{{ old('contact_or_email') }}">
                                @if ($errors->has('contact_or_email'))
                                    <small class="d-block text-danger fw-bold">
                                        {{ $errors->first('contact_or_email') }}
                                    </small>
                                @endif

                            </div>
                            <div class="form-group mb-3">
                                <small>Birthday</small>
                                <div class="d-flex">
                                    <select id="birthDay" name="birthDay" class="form-control">
                                        <option value="">Day</option>
                                    </select>
                                    <select id="birthMonth" name="birthMonth" class="form-control mx-1">
                                        <option value="">Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select id="birthYear" name="birthYear" class="form-control">
                                        <option value="">Year</option>
                                    </select>
                                </div>
                                <div id="birthdate-error" class="invalid-feedback d-block"></div>
                            </div>
                            {{-- <div class="mb-3 input-group-md">
              <input type="date" name="dob" class="form-control" value="{{old('dob')}}">
            </div>
            <!-- Email -->
             <div class="mb-3 input-group-md">
              <input type="text" name="last_name" class="form-control" placeholder="Your Last Name">
                @if ($errors->has('last_name'))
                    <small class="d-block text-danger fw-bold">
                        {{ $errors->first('last_name') }}
                    </small>
                @endif
            </div> 
            <div class="mb-3 input-group-md">
              <input type="email" name="email" class="form-control" placeholder="Enter email">
                @if ($errors->has('email'))
                    <small class="d-block text-danger fw-bold">
                        {{ $errors->first('email') }}
                    </small>
                @endif
              <small>We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3 input-group-md">
              <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact No">
                @if ($errors->has('contact_no'))
                    <small class="d-block text-danger fw-bold">
                        {{ $errors->first('contact_no') }}
                    </small>
                @endif
              <small>We'll never share your email with anyone else.</small>
            </div> --}}
                            <!-- New password -->
                            <div class="mb-3 position-relative">
                                <!-- Input group -->
                                <div class="input-group input-group-md">
                                    <input class="form-control fakepassword" type="password" name="password" id="psw-input"
                                        placeholder="Enter new password">
                                    <span class="input-group-text p-0">
                                        <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <small class="d-block text-danger fw-bold">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                                <!-- Pswmeter -->
                                <div id="pswmeter" class="mt-2"></div>
                                <div class="d-flex mt-1">
                                    <div id="pswmeter-message" class="rounded"></div>
                                    <!-- Password message notification -->
                                    <div class="ms-auto">
                                        <i class="bi bi-info-circle ps-1" data-bs-container="body" data-bs-toggle="popover"
                                            data-bs-placement="top"
                                            data-bs-content="Include at least one uppercase, one lowercase, one special character, one number and 8 characters long."
                                            data-bs-original-title="" title=""></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Confirm password -->
                            <div class="mb-3 input-group-md">
                                <input class="form-control" id="password_confirmation" name="password_confirmation"
                                    type="password" placeholder="Confirm password">
                            </div>
                            <!-- Keep me signed in -->
                            <div class="mb-3 text-start">
                                <input type="checkbox" class="form-check-input" id="keepsingnedCheck">
                                <label class="form-check-label" for="keepsingnedCheck"> Keep me signed in</label>
                            </div>
                            <!-- Button -->
                            <div class="d-grid"><button type="submit" class="btn btn-md btn-primary">Sign me up</button>
                            </div>
                            <!-- Copyright -->
                            <p class="mb-0 mt-3 text-center">©{{ date('Y') }} <a target="_blank"
                                    href="https://muktomart.com.bd/">OLD CLUB MAN.</a> All rights reserved</p>
                        </form>
                        <!-- Form END -->
                    </div>
                    <!-- Sign up END -->
                </div>
            </div> <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
@endsection
