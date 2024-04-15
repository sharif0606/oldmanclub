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
	<div class="col-sm-6 col-md-6 col-lg-5 appAuth mx-auto align shadow-lg">
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
	</div>
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

