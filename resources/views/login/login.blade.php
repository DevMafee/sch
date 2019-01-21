@extends('layouts.master')

@section('title')
	Login
@endsection

@section('mainContent')
	<h2>Sign In</h2>
	<form method="POST" action="{{ route('login') }}">
    @csrf
		<div class="username">
			<span class="name">{{ __('E-Mail Address') }}</span>
			<input id="email" type="email" class="name form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			<div class="clearfix"></div>
		</div>
		<div class="password-agileits">
			<span class="name">{{ __('Password') }}</span>
			<input id="password" type="password" class="name form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			<div class="clearfix"></div>
		</div>
		<div class="rem-for-agile">
			<div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
			@if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
		</div>
		<div class="login-w3">
			<input type="submit" class="login" value="{{ __('Login') }}">
		</div>
		<div class="clearfix"></div>
	</form>
	<div class="back">
		<a href="{{ url( './register' ) }}">Register Here</a>
	</div>
@endsection