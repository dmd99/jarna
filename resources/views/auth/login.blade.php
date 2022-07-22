@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="login-form-container">
            <div class="login-form-body sh-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-form-header">Connexion</div>
                    <div class="login-form-text w-75 mx-auto mb-4">
                        Hey, entrez vos coordonnées pour vous connecter
                        à votre compte <img width="24px" height="24px" src="{{ asset('/images/icons/winking-face.png') }}" alt="winking-face">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror custom-form" id="email" name="email"
                            value="{{ old('email') }}" placeholder="name@example.com" required autocomplete="email"
                            autofocus>
                        <label for="email">Email address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror custom-form" id="password"
                            placeholder="name@example.com" required autocomplete="current-password" name="password">
                        <label for="password">Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div>
                    <button type="submit" class="btn login-form-btn mt-4 mb-3">
                        {{ __('Login') }}
                    </button>
                    <div class="login-divider" >ou</div>
                    <div class="d-flex auth-btn mt-3">
                        <a href="/auth/google" class="btn login-form-btn google">
                            {{ __('Google') }}
                        </a>
                        <a href="/auth/facebook" class="btn login-form-btn facebook">
                            {{ __('Facebook') }}
                        </a>
                    </div>
                    </div>
                    @error('email')
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @enderror

                </form>
            </div>
        </div>
    </div>
@endsection
