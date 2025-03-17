@extends('layouts.app')


@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/myAccount.css') }}">
@endsection

@section('content')
@include('components.navbar');

<div class="container">
    <div class="logo"><img src="{{ asset('img/FlowrLogo.png') }}" alt=""></div>
    <div class="head-picture-name">
        <div class="left-picture column-picture-name">
            <div class="round-picture">
                <img src="{{ asset('img/profil.svg') }}" alt="">
            </div>
            <form action="" method="post" class="form-upload">
                <input type="file" name="image" id="image" required>
                <button>Changer de Photo de Profil</button>
            </form>
        </div>

        <div class="right-name column-picture-name">
            <div class="renseignements-personnels">
                <h2><i class="fa-solid fa-house"></i> Information du Compte : </h2>

                <div class="information-compte">
                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>Prénom :</h1>
                            <div class="btn-user">
                                <h2>{{  $user->firstname }}</h2>
                                <dialog id="dialog-editName">
                                    <div class="btnc">
                                        <button id="btn-close-editName" autofocus> X </button>
                                    </div>
                                    <div class="updateName">
                                        <form method="post" action="{{ route('myAccount.update', $user->id ) }}">
                                            @csrf
                                            @method('PUT')
                                            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $user->firstname) }}" required autocomplete="firstname" autofocus maxlength="15">

                                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Nom de Famille') }}</label>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $user->lastname) }}" required autocomplete="lastname" autofocus>

                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                            <label for="tel" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>
                                            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('firstname', $user->tel) }}" required autocomplete="tel" autofocus maxlength="10">

                                            <button type="submit">Modifier</button>
                                        </form>
                                    </div>
                                </dialog>
                            </div>
                        </div>
                    </div>

                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>Nom :</h1>
                            <div class="btn-user">
                                <h2>{{  $user->lastname }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>email :</h1>
                            <div class="btn-user">
                                <h2>{{  $user->email }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>Téléphone :</h1>
                            <div class="btn-user">
                               <h2>{{  $user->tel }}</h2>
                            </div>
                        </div>
                    </div>
                    <button id="editName">
                        Modifier<i class="fa-solid fa-pencil"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/dialog.js') }}"></script>
@endsection
