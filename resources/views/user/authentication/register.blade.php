@extends('backend.layouts.appAuth')
@section('title', 'Sign Up')
@section('content')
<style>
	.button {
        border: none;
        cursor: pointer;
    }
</style>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" crossorigin="anonymous"></script>
    <div class="align shadow">
        <div>
            {{--@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif--}}
            <form action="{{ route('clientregister.store') }}" method="POST">
                @csrf
                    {{--<div class="row">
                        <h3>Select Your Registration Type</h3>
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <p class="text-start">To begin this journey, tell us what type of account you'd be
                                    opening.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid my-3">
                                <button type="button" class="btn btn-primary next-step py-2">Register With
                                    Email</button>
                                <h6 class="text-center mt-2">or</h6>
                                <a href="#" class="btn btn-outline-primary btn-block text-white py-2">
                                    <i class="fa-brands fa-google float-start "></i>Register with Google
                                </a>
                            </div>
                        </div>
                    </div>--}}
                    {{-- <div class="col-sm-6">
                        <button type="button" class="btn btn-primary prev-step"><i class="fa-solid fa-arrow-left"></i> Back</button>
                    </div> --}}
                    <div>
                        <p class="text-center text-primary fs-4 fw-bolder"><img src="{{asset('public/images/Group1301.png')}}" alt=""></p>
                        <h4 class="text-center mb-3">Create an account to get started!</h4>
                        <div class="form-group">
                            <label class="control-label mb-10 fs-6 fw-bold" for="fname">First Name</label>
                            <input type="text" class="form-control rounded" name="fname"
                                value="{{ old('fname') }}" id="fname" placeholder="Your First Name">
                            @if ($errors->has('fname'))
                                <small class="d-block text-danger">
                                    {{ $errors->first('fname') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10 fs-6 fw-bold" for="middle_name">Middle Name</label>
                            <input type="text" class="form-control rounded" name="middle_name"
                                value="{{ old('middle_name') }}" id="middle_name"
                                placeholder="Your Middle Name">
                            @if ($errors->has('middle_name'))
                                <small class="d-block text-danger">
                                    {{ $errors->first('middle_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10 fs-6 fw-bold" for="last_name">Last Name</label>
                            <input type="text" class="form-control rounded" name="last_name"
                                value="{{ old('last_name') }}" id="last_name"
                                placeholder="Your Last Name">
                            @if ($errors->has('last_name'))
                                <small class="d-block text-danger">
                                    {{ $errors->first('last_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact_no" class="form-label fs-6 fw-bold">Contact Number</label>
                            <input type="text" class="form-control rounded" id="contact_no" name="contact_no" placeholder="+123456789">
                            @if ($errors->has('contact_no'))
                                <small class="d-block text-danger">
                                    {{ $errors->first('contact_no') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label fs-6 fw-bold">Email</label>
                            <input type="email" class="form-control rounded" id="email" name="email" placeholder="example@gmail.com">
                            @if ($errors->has('email'))
                                <small class="d-block text-danger">
                                    {{ $errors->first('email') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label fs-6 fw-bold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control rounded" id="password" name="password" placeholder="Password">
                                <button type="button" class="button" id="togglePassword"><i class="fa fa-eye"></i></button>
                            </div>
                            @if ($errors->has('password'))
                                <small class="d-block text-danger">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="fs-6 fw-bold">Verify Password</label>
                           <div class="input-group">
                                <input type="password" class="form-control rounded" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
                                <button type="button" class="button" id="toggleConfirmPassword"><i class="fa fa-eye"></i></button>
						    </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="control-label mb-10" for="dob">Date Of Birth</label>
                            <input type="date" class="form-control rounded" required="" id="dob" name="dob" value="{{old('dob')}}">
                            @if ($errors->has('dob'))
                                <small class="d-block text-danger">
                                    {{$errors->first('dob')}}
                                </small>
                            @endif
                        </div> --}}
                    </div>
                    <div class="form-group fw-bold">
						<input type="checkbox" name="" id="">
						<span>I agree to the <a href="#" class="text-primary">Terms of Service</a> and <br><a href="#" class="text-primary">Acceptable Use Policy</a></span>
					</div>
                    <div class="d-grid gap-2 mt-1">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    {{-- <button type="button" class="btn btn-danger next-step float-end">Next <i class="fa-solid fa-arrow-right"></i></button> --}}
                    
                    {{-- <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
                        <button type="button" class="btn btn-primary prev-step"><i class="fa-solid fa-arrow-left"></i> Back</button>
                        <div>
                            <h2 class="">Complete Your Profile</h2>
                            <p class="">For the purpose of industry regulation,
                                <br>Your details ar required
                            </p>
                            <div class="">
                                <label class="control-label mb-10" for="ContactNumber_en">Phone Number</label>
                                <div class="mt-1 input-group">
                                    <select class="form-select" id="countryCode" class="w-25">
                                        <option value="+880">+880</option>
                                    </select>
                                    <input type="text" class="form-control rounded w-75" required="" id="contact_no" name="contact_no" value="{{old('contact_no')}}" placeholder="Phone Number">
                                </div>
                                @if ($errors->has('contact_no'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('contact_no')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="control-label mb-10" for="email">Email address</label>
                                <input type="email" class="form-control rounded" required="" id="email" name="email" value="{{old('email')}}" placeholder="Enter email">
                                @if ($errors->has('email'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('email')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="pull-left control-label mb-10" for="password">Password</label>
                                <input type="password" class="form-control rounded" required="" id="password" name="password" placeholder="Enter Password">
                                @if ($errors->has('password'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('password')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="pull-left control-label mb-10" for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control rounded" required="" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger next-step float-end mt-5">Next <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <div class="tab-pane fade" id="step-4" role="tabpanel" aria-labelledby="step-4-tab">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary prev-step"><i class="fa-solid fa-arrow-left"></i> Back</button>
                        </div>
                        <div>
                            <h2 class="">Complete Your Profile</h2>
                            <p class="">For the purpose of industry regulation,
                                <br>Your details ar required
                            </p>
                            <div class="mt-t">
                                <label for="address" class="form-label">Residential address</label>
                                <input type="address_line_1" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address Line 1">
                                <input type="address_line_2"  class="form-control mt-3"  name="address_line_2" id="address_line_2" placeholder="Address Line 2">
                                @if ($errors->has('address_line_2'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('address_line_2')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label for="exampleFormControlInput1" class="form-label mt-1">Country Of Residence</label>
                                <input type="text" class="form-control" name="country_id" id="country_id" placeholder="input your city" >
                                @if ($errors->has('country_id'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('country_id')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="control-label mt-1" for="city">City</label>
                                <input type="text" class="form-control" name="city_id" id="city_id" placeholder="input your city" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label for="state" class="form-label">State/Province</label>
                                        <input type="text" class="form-control" name="state_id" id="state_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label for="zip" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" name="zip_code" id="zip_code">
                                    </div>
                                </div>
                            </div>
                                <p class="text-center mt-2"><i class="fa-solid fa-lock"></i>Your info is already secured</p>
                                <div class="mt-2 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                <label class="form-check-label" for="terms">I agree to the terms & conditions</label>
                            </div>
                            <div class="d-grid gap-2 mt-1">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div> --}}
            </form>
             <p class="mb-0 text-center mt-3">Already have an account? <a href="{{ route('clientlogin') }}" class="text-primary">Sign In</a>
            </p>
            
        </div>
    </div>

   <script>
		const togglePassButton = document.getElementById('togglePassword');
		const inputPass = document.getElementById('password');
		togglePassButton.addEventListener('click', function(){
			const newType = inputPass.type === 'password'?'text':'password';
			inputPass.type = newType;
			togglePassButton.querySelector('i').classList.toggle('fa-solid fa-eye-slash')
		});
	</script>
	<script>
		const toggleConfirmPassButton = document.getElementById('toggleConfirmPassword');
		const inputConfirmPass = document.getElementById('password_confirmation');
		toggleConfirmPassButton.addEventListener('click', function(){
			const newType = inputConfirmPass.type === 'password'?'text':'password';
			inputConfirmPass.type = newType;
			toggleConfirmPassButton.querySelector('i').classList.toggle('fa-solid fa-eye-slash')
		});
	</script>
@endsection
