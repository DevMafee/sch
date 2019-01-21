@extends('layouts.master')

@section('title')
	Register
@endsection

@section('mainContent')
	<h2>{{ __('Register') }}</h2>
	<form method="POST" action="{{ route('register') }}">
        @csrf
		<div class="username">
			<span class="name">{{ __('Name') }}</span>
			<input id="name" type="text" class="name form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
			<div class="clearfix"></div>
		</div>
		<div class="username">
			<span class="name">{{ __('E-Mail Address') }}</span>
			<input id="email" type="email" class="name form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
		<div class="password-agileits">
			<span class="name">{{ __('Confirm Password') }}</span>
			<input id="password-confirm" type="password" class="name form-control" name="password_confirmation" required>
			<div class="clearfix"></div>
		</div>
		<div class="login-w3">
				<input type="submit" class="login" value="{{ __('Register') }}">
		</div>
		<div class="clearfix"></div>
	</form>
	<div class="back">
		<a href="{{ route('login') }}">Login Here</a>
	</div>
@endsection