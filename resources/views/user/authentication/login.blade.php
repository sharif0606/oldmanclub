@extends('backend.layouts.appAuth')
@section('title','Sign Up')
@section('content')
    <div class="align">
		<h2 class="">Welcome To Login Your Account</h2>
		<p class="">For the purpose of industry regulation,
			<br>Your details ar required
		</p>
		<div class="">
			<form action="{{route('clientlogin.check')}}" method="POST">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="username">Contact Number / Email Address</label>
					<input type="text" class="form-control rounded" id="username" name="username" value="{{ old('username') }}" placeholder="Phone Number/Email Address">

					@if($errors->has('username'))
						<small class="d-block text-danger">
							{{$errors->first('username')}}
						</small>
					@endif
				</div>
				<div class="form-group">
					<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
					<input type="password" class="form-control rounded" id="password" name="password" placeholder="..................">
					@if($errors->has('password'))
						<small class="d-block text-danger">
							{{$errors->first('password')}}
						</small>
					@endif
				</div>
				<div class="form-group text-center mt-5">
					<a href="#" class="text-danger fw-bold">Forgot Email Or Password?</a>
				</div>

				<div class="form-group">
					<p class="text-center">I Don't have an account?<a href="{{route('clientregister')}}" class="text-primary">Sign Up</a></p>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-block form-control rounded">Login</button>
				</div>
			</form>
		</div>
	</div>
    @endsection
