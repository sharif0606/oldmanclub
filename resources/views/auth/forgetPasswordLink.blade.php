@extends('user.layout.auth')
@section('siteTitle', 'Reset Forget Password')   
@section('content')
<main>
  
    <!-- Container START -->
    <div class="container">
      <div class="row justify-content-center align-items-center vh-100 py-5">
        <!-- Main content START -->
        <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
          <!-- Forgot password START -->
          <div class="card card-body rounded-3 text-center p-4 p-sm-5">
            <!-- Title -->
            <h1 class="mb-2">Reset Password</h1>
            <p>Enter the email address associated with account.</p>
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
              </div>
            @endif
            <!-- form Start -->
            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3">
                    <!-- Input group -->
                    <div class="input-group input-group-lg">
                      <input class="form-control" type="email" name="email" placeholder="Enter Email" required>
                      @if ($errors->has('email'))
                        <p><span class="text-danger">{{ $errors->first('email') }}</span></p>
                      @endif
                    </div>
                </div>
                <div class="mb-3">
                    <!-- Input group -->
                    <div class="input-group input-group-lg">
                      <input class="form-control" type="text" name="password" placeholder="Enter Pasword" required>
                      @if ($errors->has('password'))
                        <p><span class="text-danger">{{ $errors->first('password') }}</span></p>
                      @endif
                    </div>
                </div>
                <div class="mb-3">
                    <!-- Input group -->
                    <div class="input-group input-group-lg">
                      <input class="form-control" type="text" name="password_confirmation" placeholder="Enter Confirm Pasword" required>
                      @if ($errors->has('password_confirmation'))
                        <p><span class="text-danger">{{ $errors->first('password_confirmation') }}</span></p>
                      @endif
                    </div>
                </div>
            </form>
            <!-- form END -->
          </div>
          <!-- Forgot password END -->
        </div>
      </div> <!-- Row END -->
    </div>
    <!-- Container END -->
  
  </main>
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header"><h4 class="text-center">Reset Password</h4></div>
                  <div class="card-body">
  
                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>
  

                        <!-- Button -->
                        <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Reset Password</button></div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection