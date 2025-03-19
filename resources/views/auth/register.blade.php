@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="column left">
                <div class="titre">
                    <h1>Welcolme to Flowr !</h1>

                </div>
            </div>
            <div class="column right">
                <img src="{{ asset('img/FlowrLogo.png') }}" alt="">
                <h1 class="text-center">S'inscrire</h1>

                <div class="formulaire">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus maxlength="15" required autofocus>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Nom de Famille') }}</label>

                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus maxlength="20" required autofocus>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer Mot de Passe') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div>
                            <a href="{{ asset('img/PolitiqueConfidentiel.pdf') }}" download="PolitiqueDeConfidentialité.pdf">
                                <button class="Politiquebutton" type="button">Politique de confidentialité <span>*</span></button>
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>

                        <a href="{{ url('login') }}" id="btn">Deja un compte ? Connecte toi !</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="tel">
        <div class="img-force">
            <img src="{{ asset('img/bg-tel.png') }}" alt="">
        </div>
    </div>
@endsection
