@extends('layouts.app')


@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')



    <div class="row">
        <div class="column left">
            <div class="titre">
                <h1>Flowr</h1>

            </div>
        </div>
        <div class="column right">
            <img src="{{ asset('img/FlowrLogo.png') }}" alt="">
            <h1 class="text-center">Se Connecter</h1>

            <div class="formulaire">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

{{--                    <div class="mb-3">--}}
{{--                        You are logged in as {{ auth()->user()->firstname}}, <a href="{{ url('logout') }}">Logout</a>--}}
{{--                    </div>--}}

                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <a href="{{ url('register') }}" id="btn">Pas de compte ? Inscrit toi !</a>
                </form>
            </div>

        </div>
    </div>
@endsection
