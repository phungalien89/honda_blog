@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header text-center text-light" style="background-color: #006699">
                    <h1 style="font-family: Goldman;">Welcome to <br>Honda Motor</h1>
                    <div style="font-family: 'Marck Script'; font-size: 1.5em;">Enter your information to register</div>
                </div>

                <div class="card-body shadow px-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699;">
                            <label for="name" class="text-white">{{ __('Name') }}</label>
                            <input id="name" type="text" placeholder="your name" class="px-3 form-control form-control-plaintext @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus style="box-shadow: none;">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699;">
                            <label for="displayName" class="text-white">{{ __('Display name') }}</label>
                            <input id="displayName" type="text" placeholder="your displayName" class="px-3 form-control form-control-plaintext @error('displayName') is-invalid @enderror" name="displayName" value="{{ old('displayName') }}" autocomplete="displayName" autofocus style="box-shadow: none;">
                            @error('displayName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699">
                            <label for="email" class="text-light">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" placeholder="your@email.com" class="px-3 form-control form-control-plaintext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699">
                            <label for="password" class="text-center text-light">{{ __('Password') }}</label>
                            <input placeholder="your password" id="password" type="password" class="px-3 form-control form-control-plaintext @error('password') is-invalid @enderror" name="password" autocomplete="new-password" style="box-shadow: none;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row rounded-lg p-2" style="background-color: #006699;">
                            <label for="password-confirm" class="text-center text-light">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" placeholder="re-enter your password" type="password" class="px-3 form-control-plaintext form-control" name="password_confirmation" autocomplete="new-password" style="box-shadow: none;">
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="row pt-3">
                            <a class="mr-auto" href="/login">Already sign up? Login</a>
                            <a href="{{ route('password.request') }}" class="ml-auto">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
