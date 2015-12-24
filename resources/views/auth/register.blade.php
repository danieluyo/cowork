@extends('layouts.auth')

@section('scripts-header')
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/assets/examples/css/pages/register-v3.css">
@endsection

@section('title',trans('auth.login'))
@section('body-class','page-register-v3')

@section('content')
<div class="panel">
    <div class="panel-body">
        <div class="brand">
            <img class="brand-img" src="{{config('cache.static_files_root')}}/assets//images/logo-blue.png" alt="...">
            <h2 class="brand-text font-size-18">{{ trans('strings.app_name') }}</h2>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} form-material floating">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" />
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <label class="floating-label">Username</label>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-material floating">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <label class="floating-label">Email</label>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating">
                <input type="password" class="form-control" name="password" />
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label class="floating-label">Password</label>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-material floating">
                <input type="password" class="form-control" name="PasswordCheck" />
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
                <label class="floating-label">Re-enter Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">{{ trans('auth.signup') }}</button>
        </form>
        <p>Have account already? Please go to <a href="{{ url('/login') }}">{{ trans('auth.login') }}</a></p>
    </div>
</div>
@endsection
