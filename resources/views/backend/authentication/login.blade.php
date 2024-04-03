@extends('backend.layouts.appAuth')
@section('title','Login')
@section('content')
@push('styles')
<style>
	.button {
        border: none;
        cursor: pointer;
    }
	.login{
		color:#FF87A0
	}
</style>
@endpush
<main>
  
  <!-- Container START -->
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100 py-5">
      <!-- Main content START -->
      <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <!-- Sign in START -->
        <div class="card card-body text-center p-4 p-sm-5">
          <!-- Title -->
          <h2 class="mb-2">OLD CLUB MAN </h2>
          <h3 class="mb-2">SIGN IN</h3>
          {{-- <p class="mb-0">Don't have an account?<a href="{{ route('register') }}"> Click here to sign up</a></p> --}}
          <!-- Form START -->
		  <form action="{{route('login.check')}}" method="POST" class="mt-sm-4">
				@csrf
            <!-- Email -->
            <div class="mb-3 input-group-lg">
              <input type="text" class="form-control" name="username" placeholder="Enter email">
			  	@if($errors->has('username'))
					<small class="d-block text-danger fw-bold">
						{{$errors->first('username')}}
					</small>
				@endif
            </div>
            <!-- New password -->
            <div class="mb-3 position-relative">
              <!-- Password -->
              <div class="input-group input-group-lg">
                <input class="form-control fakepassword" type="password" name="password" id="psw-input" placeholder="Enter password">
                <span class="input-group-text p-0">
                  <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                </span>
			</div>
			@if($errors->has('password'))
				<small class="d-block text-danger fw-bold">
					{{$errors->first('password')}}
				</small>
			@endif
            </div>
            <!-- Remember me -->
            <div class="mb-3 d-sm-flex justify-content-between">
              <div>
                <input type="checkbox" class="form-check-input" id="rememberCheck">
                <label class="form-check-label" for="rememberCheck">Remember me?</label>
              </div>
              <a href="{{route('client_forget_password')}}">Forgot password?</a>
            </div>
            <!-- Button -->
            <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Login</button></div>
            <!-- Copyright -->
            <p class="mb-0 mt-3">©{{ date("Y") }} <a target="_blank" href="https://muktomart.com.bd/">OLD CLUB MAN.</a> All rights reserved</p>
          </form>
          <!-- Form END -->
        </div>
        <!-- Sign in START -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>


	{{-- <div class="col-sm-6 col-md-6 col-lg-4 appAuth mx-auto align shadow-lg">
		<div class="head mb-2">
			<p class="fs-2 fw-bolder text-center text-info mb-0">Old Man Club</p>
			<p class="fs-3 fw-bolder text-center mb-0 login">Admin Login</p>
			<!-- <p class="text-center mb-3 text-dark fw-bold">Welcome to Login your account</p> -->
		</div>
		<!-- <p class="text-center text-primary fs-4 fw-bolder"><img src="{{asset('public/images/Group1301.png')}}" alt="" class="img-fluid"></p>
		<h4 class="text-center">Welcome To Admin Login</h4> -->
		<div class="mt-4">
			<form action="{{route('login.check')}}" method="POST">
				@csrf
				<div class="form-group">
					<label class="control-label fs-6 fw-bold text-dark" for="username">Contact Number / Email Address</label>
					<input type="text" class="form-control rounded" id="username" name="username" value="{{ old('username') }}" placeholder="+123456789/example@gmail.com">

					@if($errors->has('username'))
						<small class="d-block text-danger fw-bold">
							{{$errors->first('username')}}
						</small>
					@endif
				</div>
				<div class="form-group">
					<label class="pull-left control-label fs-6 fw-bold text-dark" for="exampleInputpwd_2">Password</label>
					<div class="input-group">
						<input type="password" class="form-control rounded" id="password" name="password" placeholder="..................">

						<button type="button" class="button" id="togglePassword"><i class="fa fa-eye-slash"></i></button>
					</div>
					@if($errors->has('password'))
						<small class="d-block text-danger fw-bold">
							{{$errors->first('password')}}
						</small>
					@endif
				</div>
				<div class="form-group text-center mt-2">
					<a href="#" class="text-danger fw-bold">Forgot Email Or Password?</a>
				</div>

				<div class="form-group">
					<p class="text-center fw-bold ">I Don't have an account?<a href="{{route('register')}}" class="text-primary">Sign Up</a></p>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-block form-control rounded fw-bold">Login</button>
				</div>
			</form>
		</div>
	</div> --}}
@endsection
@push('scripts')
	<script>
		const togglePassButton = document.getElementById('togglePassword');
		const inputPass = document.getElementById('password');
		togglePassButton.addEventListener('click', function(){
			const newType = inputPass.type === 'password'?'text':'password';
			inputPass.type = newType;
			togglePassButton.querySelector('i').classList.toggle('fa-eye-slash')
			togglePassButton.querySelector('i').classList.toggle('fa-eye')
		});
		// const togglePassButton = document.getElementById('togglePassword');
		// const inputPass = document.getElementById('password');
		// togglePassButton.addEventListener('click', function(){
		// 	const newType = inputPass.type === 'password'?'text':'password';
		// 	inputPass.type = newType;
		// 	togglePassButton.querySelector('i').classList.toggle('fa-solid fa-eye-slash')
		// });
	</script>
@endpush
