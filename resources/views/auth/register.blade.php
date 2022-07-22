@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="login-form-container">
            <div class="login-form-body sh-1">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form-header">Inscription</div>
                    <div class="login-form-text w-75 mx-auto mb-4">
                        Hey, entrez vos coordonnées pour vous connecter
                        à votre compte <img width="24px" height="24px" src="{{ asset('/images/icons/winking-face.png') }}"
                            alt="winking-face">
                    </div>
                    <div class="form-floating mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Ndiagua Ndiaye"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">Nom <span class="opacity-50">(complet)</span></label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">email</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="name@example.com"  name="password" required autocomplete="new-password">
                            <label for="password">Mot de passe</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="name@example.com"  required autocomplete="new-password">
                            <label for="password-confirm">Confirmation mot de passe</label>
                    </div>
                    <div class="">
                        <button type="submit" class="btn login-form-btn mt-4 mb-3">
                            {{ __('Register') }}
                        </button>
                    </div>
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
                </form>
            </div>
        </div>
    @endsection
