@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center text-light" style="background-color: #006699;">
                    <h1 style="font-family: Goldman;">Welcome to <br>Honda Motor</h1>
                    <div style="font-family: 'Marck Script'; font-size: 1.5em;">Enter your infomation below to log in</div>
                </div>
                <div class="card-body px-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699;">
                            <label for="email" class="text-light">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="px-3 form-control form-control-plaintext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com" style="box-shadow: none;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699">
                            <label for="password" class="text-light">{{ __('Password') }}</label>

                            <input id="password" type="password" placeholder="your password" class="px-3 form-control form-control-plaintext @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="box-shadow: none;">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="form-check">
                                <div class="custom-control custom-switch">
                                    <input checked class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="row pt-3">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link mr-auto" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                            <a class="btn btn-link ml-auto" href="/register" target="_self">Not sign up yet? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
