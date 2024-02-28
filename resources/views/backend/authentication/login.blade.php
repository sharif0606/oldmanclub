@extends('backend.layouts.appAuth')
@section('title','Login')
@section('content')
<style>
	.button {
        border: none;
        cursor: pointer;
    }
</style>
	<div class="align shadow">
		<p class="text-center text-primary fs-4 fw-bolder"><img src="{{asset('public/images/Group1301.png')}}" alt=""></p>
		<h4 class="text-center">Welcome To Admin Login</h4>
		<div class="mt-4">
			<form action="{{route('login.check')}}" method="POST">
				@csrf
				<div class="form-group">
					<label class="control-label fs-6 fw-bold" for="username">Contact Number / Email Address</label>
					<input type="text" class="form-control rounded" required="" id="username" name="username" value="{{ old('username') }}" placeholder="+123456789/example@gmail.com">
					
					@if($errors->has('username'))
						<small class="d-block text-danger">
							{{$errors->first('username')}}
						</small>
					@endif
				</div>
				<div class="form-group">
					<label class="pull-left control-label fs-6 fw-bold" for="exampleInputpwd_2">Password</label>
					<div class="input-group">
						<input type="password" class="form-control rounded" required="" id="password" name="password" placeholder="..................">
						<button type="button" class="button" id="togglePassword"><i class="fa fa-eye"></i></button>
						@if($errors->has('password'))
							<small class="d-block text-danger">
								{{$errors->first('password')}}
							</small>
						@endif
					</div>
				</div>
				<div class="form-group text-center mt-2">
					<a href="#" class="text-danger fw-bold">Forgot Email Or Password?</a>
				</div>

				<div class="form-group">
					<p class="text-center">I Don't have an account?<a href="{{route('register')}}" class="text-primary">Sign Up</a></p>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-block form-control rounded">Login</button>
				</div>
			</form>
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
@endsection

@section('scripts')
	
@endsection
