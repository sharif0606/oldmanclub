@extends('user.layout.auth')
@section('title','Login')
@section('content')
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
          <p class="mb-0">Don't have an account?<a href="{{ route('clientregister') }}"> Click here to sign up</a></p>
          <!-- Form START -->
		  <form action="{{route('clientlogin.check')}}" method="POST" class="mt-sm-4">
				@csrf
            <!-- Email -->
            <div class="mb-3 input-group-lg">
              <input type="email" class="form-control" name="username" placeholder="Enter email">
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
				@if($errors->has('password'))
					<small class="d-block text-danger fw-bold">
						{{$errors->first('password')}}
					</small>
				@endif
              </div>
            </div>
            <!-- Remember me -->
            <div class="mb-3 d-sm-flex justify-content-between">
              <div>
                <input type="checkbox" class="form-check-input" id="rememberCheck">
                <label class="form-check-label" for="rememberCheck">Remember me?</label>
              </div>
              <a href="forgot-password.html">Forgot password?</a>
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
@endsection
