@extends('layouts.master')

@section('title')
	Login
@endsection

@section('mainContent')

	<h2>{{ __('Reset Password') }}</h2>

	<form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="username">
            <span class="email">{{ __('E-Mail Address') }}</span>
            <input id="email" type="email" class="name form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="clearfix"></div>
        </div>

        <div class="password-agileits">
            <span class="username">{{ __('Password') }}</span>
            <input id="password" type="password" class="name form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="clearfix"></div>
        </div>

        <div class="password-agileits">
            <span class="username">{{ __('Confirm Password') }}</span>
            <input id="password-confirm" type="password" class="name form-control" name="password_confirmation" required>
            <div class="clearfix"></div>
        </div>

        <div class="login-w3">
			<input type="submit" class="login" value="{{ __('Reset Password') }}">
		</div>
    </form>
@endsection