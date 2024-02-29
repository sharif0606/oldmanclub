@extends('backend.layouts.appAuth')
@section('title','Sign Up')
@section('content')
@push('styles')
<style>
	.button {
        border: none;
        cursor: pointer;
    }
</style>
@endpush
	<div class="align shadow-lg">
		<div>
			<p class="text-center text-primary fs-4 fw-bolder"><img src="{{asset('public/images/Group1301.png')}}" alt="" class="img-fluid"></p>
			<h4 class="text-center mb-3">Create an account to get started!</h4>
				<form action="{{route('register.store')}}" method="POST" id="signupForm">
					@csrf
					<div class="form-group">
						<label class="fs-6 fw-bold" for="FullName">Full Name</label>
						<input type="text" class="form-control rounded" name="FullName" value="{{old('FullName')}}" id="FullName" placeholder="Your Full Name">
						@if($errors->has('FullName'))
							<small class="d-block text-danger">
								{{$errors->first('FullName')}}
							</small>
						@endif
					</div>
					<div class="form-group">
						<label class="control-label fs-6 fw-bold" for="EmailAddress">Email address</label>
						<input type="email" class="form-control rounded" id="EmailAddress" name="EmailAddress" value="{{old('EmailAddress')}}" placeholder="example@gmail.com">
						@if($errors->has('EmailAddress'))
							<small class="d-block text-danger">
								{{$errors->first('EmailAddress')}}
							</small>
						@endif
					</div>
					<div class="form-group">
						<label class="control-label fs-6 fw-bold" for="contact_no_en">Contact Number</label>
						<input type="text" class="form-control rounded" id="contact_no_en" name="contact_no" value="{{old('contact_no')}}" placeholder="+123456789">
						@if($errors->has('contact_no'))
							<small class="d-block text-danger">
								{{$errors->first('contact_no')}}
							</small>
						@endif
					</div>
					<div class="form-group">
						<label class="pull-left control-label fs-6 fw-bold" for="password">Password</label>
						<div class="input-group">
                            <input type="password" class="form-control rounded" id="password" name="password" placeholder="Enter password">
                            <button type="button" class="button" id="togglePassword"><i class="fa fa-eye"></i></button>
                        </div>
						@if($errors->has('password'))
							<small class="d-block text-danger">
								{{$errors->first('password')}}
							</small>
						@endif
					</div>
					<div class="form-group">
						<label class="pull-left control-label fs-6 fw-bold" for="password_confirmation">Confirm Password</label>
						<div class="input-group">
							<input type="password" class="form-control rounded" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
							<button type="button" class="button" id="toggleConfirmPassword"><i class="fa fa-eye"></i></button>
						</div>
					</div>
					<div class="form-group fw-bold">
						<input type="checkbox" name="" id="terms_agreement">
						<span>I agree to the <a href="#" class="text-primary">Terms of Service</a> and <br><a href="#" class="text-primary">Acceptable Use Policy</a></span>
					</div>
					
					<div class="text-center mt-4">
						<button type="submit" class="btn btn-primary btn-block form-control rounded" id="signupButton">Sign Up</button>
					</div>
				</form>
				<p class="text-center mt-3 mb-0">Already have an account?<a href="{{route('login')}}" class="text-primary">Sign In</a></p>
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
			togglePassButton.querySelector('i').classList.toggle('fa-solid fa-eye-slash')
		});
		// show/hede confirm password
		const toggleConfirmPassButton = document.getElementById('toggleConfirmPassword');
		const inputConfirmPass = document.getElementById('password_confirmation');
		toggleConfirmPassButton.addEventListener('click', function(){
			const newType = inputConfirmPass.type === 'password'?'text':'password';
			inputConfirmPass.type = newType;
			toggleConfirmPassButton.querySelector('i').classList.toggle('fa-solid fa-eye-slash')
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

