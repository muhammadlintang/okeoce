@extends('layouts.master')

@section('content')
<div class="container full-container flex-div mt-3">
    <div class="col-lg-5 col-md-6 col-12 mx-auto">
        <h4 class="text-center"><b>LOGIN</b></h4>
        <div class="row my-4">
            <div class="col-6">
                <a href="{{ URL('social-media/register/facebook') }}" class="btn btn-blue btn-lg btn-block">Facebook</a>
            </div>
            <div class="col-6">
                <a href="{{ URL('social-media/register/google') }}" class="btn btn-danger btn-lg btn-block">Google</a>
            </div>
        </div>
        <p class="text-center">or</p>
        <form method="POST" action="{{ route('login') }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" placeholder="EMAIL" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <small class="form-text text-muted">{{ $errors->first('email') }}</small>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="PASSWORD" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <div class="row no-gutters">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input id="remember_session" type="checkbox" class="custom-control-input" type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember_session">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-blue btn-block btn-lg">LOGIN</button>
        </form>
        <p class="text-center">
            Didn't have an account? <a href="{{ route('register') }}">REGISTER</a>
        </p>
    </div>
</div>
@endsection
