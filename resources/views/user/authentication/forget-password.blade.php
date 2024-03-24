@extends('user.layout.auth')
@section('title','Forget Password')
@section('content')
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
  #pswmeter .password-strength-meter-score.psms-25 {width: 25%; background: #dc3545;}
  #pswmeter .password-strength-meter-score.psms-50 {width: 50%; background: #f7c32e;}
  #pswmeter .password-strength-meter-score.psms-75 {width: 75%; background: #4f9ef8;}
  #pswmeter .password-strength-meter-score.psms-100 {width: 100%; background: #0cbc87;}</style>
  <main>
  
    <!-- Container START -->
    <div class="container">
      <div class="row justify-content-center align-items-center vh-100 py-5">
        <!-- Main content START -->
        <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
          <!-- Forgot password START -->
          <div class="card card-body rounded-3 text-center p-4 p-sm-5">
            <!-- Title -->
            <h1 class="mb-2">Forgot password?</h1>
            <p>Enter the email address associated with account.</p>
            <!-- form START -->
            <form class="mt-3">
              <!-- New password -->
              <div class="mb-3">
                <!-- Input group -->
                <div class="input-group input-group-lg">
                  <input class="form-control fakepassword" type="password" id="psw-input" placeholder="Enter new password">
                  <span class="input-group-text p-0">
                    <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                  </span>
                </div>
                <!-- Pswmeter -->
                <div id="pswmeter" class="mt-2 password-strength-meter"><div class="password-strength-meter-score"></div></div>
                <div class="d-flex mt-1">
                  <div id="pswmeter-message" class="rounded">Write your password...</div>
                  <!-- Password message notification -->
                  <div class="ms-auto">
                    <i class="bi bi-info-circle ps-1" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Include at least one uppercase, one lowercase, one special character, one number and 8 characters long." data-bs-original-title="" title=""></i>
                  </div>
                </div>
              </div>
              <!-- Back to sign in -->
              <div class="mb-3">
                <p>Back to <a href="{{route('clientlogin')}}">Sign in</a></p>
              </div>
              <!-- Button -->
              <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Reset password</button></div>
              <!-- Copyright -->
              <p class="mb-0 mt-3">©2024 <a target="_blank" href="https://muktomart.com.bd/">OLD CLUB MAN.</a> All rights reserved</p>
            </form>
            <!-- form END -->
          </div>
          <!-- Forgot password END -->
        </div>
      </div> <!-- Row END -->
    </div>
    <!-- Container END -->
  
  </main>
@endsection
