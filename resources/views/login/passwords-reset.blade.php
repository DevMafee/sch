@extends('layouts.master')

@section('title')
	Login
@endsection

@section('mainContent')

	<h2>{{ __('Reset Password') }}</h2>
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
	<form method="POST" action="{{ route('password.email') }}">
        @csrf
		<div class="username">
			<span class="username">{{ __('E-Mail Address') }}</span>
			<input id="email" type="email" class="name form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			<div class="clearfix"></div>
		</div>
		<div class="login-w3">
				<input type="submit" class="login" value="{{ __('Send Password Reset Link') }}">
		</div>
		<div class="clearfix"></div>
	</form>
@endsection