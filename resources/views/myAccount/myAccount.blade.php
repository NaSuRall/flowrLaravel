@extends('layouts.app')


@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/myAccount.css') }}">
@endsection

@section('content')


<div class="container">

    @include('components.navbar')
    @include('components.navbarMobile')
    <div class="logo"><img src="{{ asset('img/FlowrLogo.png') }}" alt=""></div>
    <div class="containerEnfant">

        <div class="img">
            <div class="imageProfile">
                <img src="{{ asset($user->profile_image ?? 'img/avatars/avatar1.svg') }}" alt="Photo de profil">
            </div>

            <form action="{{ route('update.profile.image') }}" method="POST" class="formProfileAvatar">
                @csrf
                <label for="profileImage">Choisir une photo :</label>
                <select name="profileImage" id="profileImage">
                    <option value="img/avatars/avatar1.svg">-- Choisissez une photo de profil</option>
                    <option value="img/avatars/avatar1.svg">Avatar 1</option>
                    <option value="img/avatars/avatar2.svg">Avatar 2</option>
                    <option value="img/avatars/avatar3.svg">Avatar 3</option>
                    <option value="img/avatars/avatar4.svg">Avatar 4</option>
                    <option value="img/avatars/avatar5.svg">Avatar 5</option>
                    <option value="img/avatars/avatar6.svg">Avatar 6</option>
                </select>
                <button type="submit">Changer</button>
            </form>
        </div>



        <div class="rightName columnPictureName">
            <div class="renseignementsPersonnels">
                <h2><i class="fa-solid fa-house"></i> Information du Compte : </h2>

                <div class="information-compte">
                    <div class="blocRenseignement">
                        <div class="columRens">
                            <h1>Prénom :</h1>
                            <div class="btnUser">
                                <h2>{{  $user->firstname }}</h2>
                                <dialog id="dialogModifNom">
                                    <div class="btnc">
                                        <button id="btnCloseModifNom" autofocus> X </button>
                                    </div>
                                    <div class="updateName">
                                        <form class="formUpadte" method="post" action="{{ route('myAccount.update', $user->id ) }}">
                                            @csrf
                                            @method('PUT')
                                            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $user->firstname) }}" required autocomplete="firstname" autofocus maxlength="15">

                                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Nom de Famille') }}</label>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $user->lastname) }}" required autocomplete="lastname" autofocus>

                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                            <label for="tel" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>
                                            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('firstname', $user->tel) }}" autofocus maxlength="10">

                                            <button type="submit">Modifier</button>
                                        </form>
                                    </div>
                                </dialog>
                            </div>
                        </div>
                    </div>

                    <div class="blocRenseignement">
                        <div class="columRens">
                            <h1>Nom :</h1>
                            <div class="btnUser">
                                <h2>{{  $user->lastname }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="blocRenseignement">
                        <div class="columRens">
                            <h1>email :</h1>
                            <div class="btnUser">
                                <h2>{{  $user->email }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="blocRenseignement">
                        <div class="columRens">
                            <h1>Téléphone :</h1>
                            <div class="btnUser">
                               <h2>{{  $user->tel }}</h2>
                            </div>
                        </div>
                    </div>
                    <button id="modifNom">
                        Modifier<i class="fa-solid fa-pencil"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/dialog.js') }}"></script>
@endsection
