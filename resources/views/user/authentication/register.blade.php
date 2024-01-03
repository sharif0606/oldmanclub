@extends('backend.layouts.appAuth')
@section('title','Sign Up')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-md-12 col-sm-12 text-end mt-0">
            <p class="mb-0">Already have an account? <a href="{{ route('clientlogin') }}" class="text-primary">Sign In</a></p>
        </div>
    </div>
    <div class="align">       
		<div>
			<form action="{{route('clientregister.store')}}" method="POST">
				@csrf
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
                        <div class="container">
                            <div class="row">
                                <h3>Select Your Registration Type</h3>
                                <div class="col-md-8">      
                                    <div class="col-md-12">
                                            <p class="text-start">To begin this journey, tell us what type of account you'd be opening.</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-grid my-3">
                                        <button type="button" class="btn btn-primary next-step py-2">Register With Email</button>
                                        <small class="text-center">or</small>
                                        <a href="#" class="btn btn-outline-primary btn-block text-white my-2 ">
                                        <i class="fa-brands fa-google float-start p-2"></i>Register with Google
                                        </a>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
                        
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary prev-step m-2"><i class="fa-solid fa-arrow-left"></i> Back</button>
                        </div>
                        <div>
                            <h2 class="">Register Your Account</h2>
                            <p class="">To begin this journey! Tell us what type of account you'd be opening
                            </p>
                            <div class="form-group">
                                <label class="control-label mb-10" for="first_name">First Name</label>
                                <input type="text" class="form-control rounded" name="fname_en" value="{{old('fname_en')}}" required="" id="first_name" placeholder="Your First Name">
                                @if($errors->has('fname_en'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('fname_en')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="Middle_name">Middle Name</label>
                                <input type="text" class="form-control rounded" name="mname_en" value="{{old('mname_en')}}" required="" id="Middle_name" placeholder="Your Middle Name">
                                @if($errors->has('mname_en'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('mname_en')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="last_name">Last Name</label>
                                <input type="text" class="form-control rounded" name="lname_en" value="{{old('lname_en')}}" required="" id="last_name" placeholder="Your Last Name">
                                @if($errors->has('lname_en'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('lname_en')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="DoB">Date Of Birth</label>
                                <input type="date" class="form-control rounded" required="" id="dob" name="dob" value="{{old('date_of_birth')}}">
                                @if($errors->has('dob'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('dob')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger next-step float-end">Next <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
                        <button type="button" class="btn btn-primary prev-step m-2"><i class="fa-solid fa-arrow-left"></i> Back</button>
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
                                    <input type="text" class="form-control rounded w-75" required="" id="contact_no_en" name="ContactNumber_en" value="{{old('ContactNumber_en')}}" placeholder="Phone Number">
                                </div>
                                @if($errors->has('ContactNumber_en'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('ContactNumber_en')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="control-label mb-10" for="EmailAddress">Email address</label>
                                <input type="email" class="form-control rounded" required="" id="EmailAddress" name="EmailAddress" value="{{old('EmailAddress')}}" placeholder="Enter email">
                                @if($errors->has('EmailAddress'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('EmailAddress')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="pull-left control-label mb-10" for="password">Password</label>
                                <input type="password" class="form-control rounded" required="" id="password" name="password" placeholder="Enter Password">
                                @if($errors->has('password'))
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
                            <button type="button" class="btn btn-primary prev-step m-2"><i class="fa-solid fa-arrow-left"></i> Back</button>
                        </div>
                        <div>
                            <h2 class="">Complete Your Profile</h2>
                            <p class="">For the purpose of industry regulation,
                                <br>Your details ar required
                            </p>
                            <div class="mt-t">
                                <label for="address" class="form-label">Residential address</label>
                                <input type="address_line_1" name="PresentAddress" class="form-control" id="address_line_1" placeholder="Address Line 1">
                                <input type="address_line_1"  class="form-control mt-3"  name="ParmanentAddress" id="res. address" placeholder="Address Line 2">
                                @if($errors->has('address_line'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('address_line')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label for="exampleFormControlInput1" class="form-label mt-1">Country Of Residence</label>
                                <input type="text" class="form-control" name="country" id="country" placeholder="input your city" >
                                @if($errors->has('country_id'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('country_id')}}
                                    </small>
                                @endif
                            </div>
                            <div class="">
                                <label class="control-label mt-1" for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="input your city" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label for="state" class="form-label">State/Province</label>
                                        <input type="text" class="form-control" name="state" id="state">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-1">
                                        <label for="zip" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" name="zp" id="zip">
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
                    </div>
                </div> 
			</form>
            <div>
                
            </div>
		</div>
	</div>

    <script>
        $(document).ready(function() {
            $('.next-step').click(function() {
                var currentTab = $(this).closest('.tab-pane').attr('id');
                var nextTab = $(this).closest('.tab-pane').next().attr('id');
                $('#' + currentTab).removeClass('show active');
                $('#' + currentTab + '-tab').removeClass('active');
                $('#' + nextTab).addClass('show active');
                $('#' + nextTab + '-tab').addClass('active');
            });

            $('.prev-step').click(function() {
                var currentTab = $(this).closest('.tab-pane').attr('id');
                var prevTab = $(this).closest('.tab-pane').prev().attr('id');
                $('#' + currentTab).removeClass('show active');
                $('#' + currentTab + '-tab').removeClass('active');
                $('#' + prevTab).addClass('show active');
                $('#' + prevTab + '-tab').addClass('active');
            });
            $('.nav-item a').click(function(e) {
                var currentTab = $(this).attr('href');
                var prevTab = $('.tab-content .tab-pane.show').attr('id');
                
                $('#' + prevTab).removeClass('show active');
                $('#' + prevTab + '-tab').removeClass('active');
                $(currentTab).addClass('show active');
                $(currentTab + '-tab').addClass('active');
                e.preventDefault();
              });

        });
    </script>
@endsection