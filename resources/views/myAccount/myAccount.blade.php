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
                                <h2>{{  auth()->user()->name }}</h2>
                                <button>Modifier <i class="fa-solid fa-pencil"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>Nom :</h1>
                            <div class="btn-user">
                                <h2>{{  auth()->user()->name }}</h2>
                                <button>Modifier <i class="fa-solid fa-pencil"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>email :</h1>
                            <div class="btn-user">
                                <h2>{{  auth()->user()->email }}</h2>
                                <button>Modifier <i class="fa-solid fa-pencil"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="bloc-renseignement">
                        <div class="colum-rens">
                            <h1>Téléphone :</h1>
                            <div class="btn-user">
                               <h2>{{  auth()->user()->name }}</h2>
                                <button>Modifier <i class="fa-solid fa-pencil"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
