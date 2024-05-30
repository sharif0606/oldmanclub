@extends('backend.layouts.appAuth')
@section('title','Sign Up')
@section('content')
@push('styles')
<style>
	.button {
        border: none;
        cursor: pointer;
		/* background-color: white; */
    }
</style>
@endpush
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
            <span class="d-block">Already have an account? <a href="{{ route('login') }}">Sign in here</a></span>
          </div>
          <!-- Form START -->
          <form action="{{ route('register.store') }}" method="POST" id="signupForm" class="mt-4">
                @csrf
            <!-- Name -->
            <div class="row gx-1">
              <div class="col-md-6">
                <div class="mb-3 input-group-md">
                  <input type="text" class="form-control rounded" name="FullName" value="{{old('FullName')}}" id="FullName" placeholder="Your Full Name">
							@if($errors->has('FullName'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('FullName')}}
								</small>
							@endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3 input-group-md">
					<input type="text" class="form-control" id="" name="contact_no" value="{{old('contact_no')}}" placeholder="Enter Contact No">
							@if($errors->has('contact_no'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('contact_no')}}
								</small>
							@endif
                </div>
              </div>
            </div>
            <div class="mb-3 input-group-md">
				<input type="email" class="form-control" id="" name="EmailAddress" value="{{old('EmailAddress')}}" placeholder="Enter email">
							@if($errors->has('EmailAddress'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('EmailAddress')}}
								</small>
							@endif
              <small>We'll never share your email with anyone else.</small>
            </div>
            <!-- New password -->
            <div class="mb-3 position-relative">
              <!-- Input group -->
              <div class="input-group input-group-md">
                <input class="form-control fakepassword" type="password" name="password" id="psw-input" placeholder="Enter new password">
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
                  <i class="bi bi-info-circle ps-1" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Include at least one uppercase, one lowercase, one special character, one number and 8 characters long." data-bs-original-title="" title=""></i>
                </div>
              </div>
            </div>
            <!-- Confirm password -->
            <div class="mb-3 input-group-md">
              <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password">
            </div>
            <!-- Keep me signed in -->
            <div class="mb-3 text-start">
              <input type="checkbox" class="form-check-input" id="keepsingnedCheck">
              <label class="form-check-label" for="keepsingnedCheck"> Keep me signed in</label>
            </div>
            <!-- Button -->
            <div class="d-grid"><button type="submit" class="btn btn-md btn-primary">Sign me up</button></div>
            <!-- Copyright -->
            <p class="mb-0 mt-3 text-center">©{{ date('Y') }} <a target="_blank" href="https://muktomart.com.bd/">OLD CLUB MAN.</a> All rights reserved</p>
          </form>
          <!-- Form END -->
        </div>
        <!-- Sign up END -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>




	{{-- <div class="col-sm-6 col-md-6 col-lg-5 appAuth mx-auto align shadow-lg">
		<div>
				<form action="{{route('register.store')}}" method="POST" id="signupForm">
					@csrf
					<div class="head mb-2">
						<p class="fs-2 fw-bolder text-center text-info mb-0">Old Club Man</p>
						<p class="fs-4 fw-bolder text-center mb-0">Admin Register</p>
						<!-- <p class="fs-2 fw-bolder text-center">SignUp</p> -->
							<!-- <p class="text-center text-primary fs-4 fw-bolder"><img src="{{asset('public/images/Group1301.png')}}" alt="" class="img-fluid"></p> -->
						<!-- <p class="text-center mb-3 text-dark fw-bold">Create an account to get started!</p> -->
					</div>
					<div class="row gx-2">
						<div class="col-sm-6 col-md-4 form-group pb-0">
							<!-- <label class="fs-6 fw-bold" for="FullName">Full Name</label> -->
							<input type="text" class="form-control rounded" name="FullName" value="{{old('FullName')}}" id="FullName" placeholder="Your Full Name">
							@if($errors->has('FullName'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('FullName')}}
								</small>
							@endif
						</div>
						<div class="col-sm-6 col-md-4 form-group pb-0">
							<!-- <label class="control-label fs-6 fw-bold" for="EmailAddress">Email address</label> -->
							<input type="email" class="form-control rounded p-1" id="EmailAddress" name="EmailAddress" value="{{old('EmailAddress')}}" placeholder="admin@gmail.com">
							@if($errors->has('EmailAddress'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('EmailAddress')}}
								</small>
							@endif
						</div>
						<div class="col-sm-6 col-md-4 form-group pb-0">
							<input type="text" class="form-control rounded" id="contact_no_en" name="contact_no" value="{{old('contact_no')}}" placeholder="+123456789">
							@if($errors->has('contact_no'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('contact_no')}}
								</small>
							@endif
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="password" class="form-control rounded" id="password" name="password" placeholder="Enter password">
								<button type="button" class="button rounded" id="togglePassword"><i class="fa fa-eye-slash"></i></button>
							</div>
							@if($errors->has('password'))
								<small class="d-block text-danger fw-bold">
									{{$errors->first('password')}}
								</small>
							@endif
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="password" class="form-control rounded" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
								<button type="button" class="button rounded" id="toggleConfirmPassword"><i class="fa fa-eye-slash"></i></button>
							</div>
						</div>
						<div class="form-group fw-bold text-dark">
							<input type="checkbox" name="" id="terms_agreement">
							<span>I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Acceptable Use Policy</a></span>
						</div>

						<div class="text-center mt-4">
							<button type="submit" class="btn btn-primary btn-block rounded px-4 fw-bold" id="signupButton">Sign Up</button>
						</div>
					</div>
				</form>
				<p class="text-center mt-3 mb-0 text-dark fw-bold">Already have an account?<a href="{{route('login')}}" class="text-primary">Sign In</a></p>
		</div>
	</div> --}}

@endsection
@push('scripts')
	<script>
		// show/hede password
		const togglePassButton = document.getElementById('togglePassword');
		const inputPass = document.getElementById('password');
		togglePassButton.addEventListener('click', function(){
			const newType = inputPass.type === 'password'?'text':'password';
			inputPass.type = newType;
			togglePassButton.querySelector('i').classList.toggle('fa-eye-slash')
			togglePassButton.querySelector('i').classList.toggle('fa-eye')
		});
		// show/hede confirm password
		const toggleConfirmPassButton = document.getElementById('toggleConfirmPassword');
		const inputConfirmPass = document.getElementById('password_confirmation');
		toggleConfirmPassButton.addEventListener('click', function(){
			const newType = inputConfirmPass.type === 'password'?'text':'password';
			inputConfirmPass.type = newType;
			toggleConfirmPassButton.querySelector('i').classList.toggle('fa-eye-slash')
			toggleConfirmPassButton.querySelector('i').classList.toggle('fa-eye')
		});
	//Checked Terms of Condition & Policy
        const signupForm = document.getElementById('signupForm');
        signupForm.addEventListener('submit', function(event) {
            const termsAgreement = document.getElementById('terms_agreement');
            if (!termsAgreement.checked) {
                alert('Please agree to the Terms of Condition & Policy.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endpush

