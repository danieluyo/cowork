@extends('layouts.auth')

@section('scripts-header')
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/assets/examples/css/pages/login-v3.css">
@endsection

@section('title',trans('auth.login'))
@section('body-class','page-login-v3')

@section('content')
<div class="panel">
    <div class="panel-body">
        <div class="brand">
            <img class="brand-img" src="/assets/img/cowork_logo_200x80.png" alt="...">
            {{--<h2 class="brand-text font-size-18">{{ trans('strings.app_name') }}</h2>--}}
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

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
            <div class="form-group clearfix">
                <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                    <input type="checkbox" id="inputCheckbox" name="remember">
                    <label for="inputCheckbox">Remember me</label>
                </div>
                <a class="pull-right" href="{{ url('/password/reset') }}">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">{{ trans('auth.login') }}</button>
        </form>
        <p>Still no account? Please go to <a href="{{ url('/register') }}">{{ trans('auth.signup') }}</a></p>
    </div>
</div>
@endsection
