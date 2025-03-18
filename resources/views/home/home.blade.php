@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

       <div class="profil">
           @if(auth()->id())
           <div class="gif">
               <a class="round" id="round" href="{{ route('myAccount') }}">
                   <img src="{{ asset(auth()->user()->profile_image ?? 'img/avatars/avatar1.svg') }}" alt="Photo de profil">
               </a>
               <div class="card">
                   <button type="submit" id="cart"><i class="fa-solid fa-cart-shopping"></i></button>
               </div>
           </div>

           @else
           <div class="no-co">
                <a href="{{ url('register') }}" id="jaune">S'inscrire</a>
                <a href="{{ url('login') }}">Se Connecter</a>
            </div>
           @endif
       </div>


    @include('components.navbar')


    <div id="titre" class="block">
        @if( auth()->id())
            <h1>Bienvenue {{ auth()->user()->firstname }} sur <span>FLOWR</span> !</h1>
            <h2><span>Flowr</span></h2>
        @else
            <h1>Bienvenue sur <span>FLOWR</span></h1>
            <h2><span>Flowr</span></h2>
        @endif
        <h3>Le site incontournable pour faire ses listes de cadeaux</h3>
    </div>
    <div id="blockButton">
        <h3>Cliquez sur le bouton d'action que vous souhaitez:</h3>
        <div id="mainButton" class="block">

            <a class="button" href="{{ url('groups') }}">
                <h3>MES GROUPES</h3>
                <div class="img-block">
                    <img src="{{ asset('img/png1.svg')}}">
                </div>
            </a>

            <a class="button jaune" href="{{ url('createGroup') }}">
                <h3>CRÉER UN GROUPE</h3>
                <div class="img-block">
                    <img src="{{ asset('img/png2.svg')}}">
                </div>
            </a>

            <a class="button" id="abonnementButton" href="{{ route('joinGroup') }}">
                <h3>REJOINDRE UN GROUPE</h3>
                <div class="img-block">
                    <img src="{{ asset('img/png3.svg')}}">
                </div>
            </a>

        </div>
    </div>

    <div class="partie-pres">
        <div id="presentation" class="block2">
            <h2>Qui sommes nous</h2>
            <div id="textePrez">
                <h3>Bienvenue sur <span>Flowr</span>, votre allié pour des cadeaux inoubliables !</h3>
                <p>Flowr est une plateforme simple et conviviale qui vous permet de créer, partager et organiser des
                    listes de cadeaux pour toutes les occasions.</p>
                <p>Que ce soit pour un anniversaire, un mariage, une fête de naissance, ou simplement pour faire
                    plaisir, Flowr vous aide à centraliser vos idées et à collaborer avec vos proches.</p>
                <p>Fini les doublons et les hésitations : avec Flowr, chaque cadeau trouve sa place et apporte de la
                    joie à vos moments spéciaux !</p>
            </div>
        </div>

    </div>

    <div id="blockAbonnement" class="block">
        <h2>Nos offres Abonnements</h2>
        <div id="listeAbonnement">
            <div id="abo" class="abonnement">
                <div class="texte">
                    <h3>Standard</h3>
                    <p class="prix">GRATUIT</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> limites de membre : 6</li>
                        <li><i class="fa-solid fa-check"></i> limites de groupes : 2</li>
                        <li><i class="fa-solid fa-check"></i> Accès au catalogue</li>
                        <li id="no">- Création listes ilimiter/pers</li>
                        <li id="no">- Indication Acheter sur liste</li>
                        <li id="no">- Modification theme Groupe</li>
                    </ul>
                    <div class="abonnementPanier">

                        <button type="submit"> Ajouter au Panier <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
            <div id="abo" class="abonnement popular">
                <h4>Le plus populaire</h4>
                <div class="texte">
                    <h3>Famille</h3>
                    <p class="prix">9.99$/ans</p>
                    <h2></h2>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> limites de membres : 15</li>
                        <li><i class="fa-solid fa-check"></i> limites de groupes : 10</li>
                        <li><i class="fa-solid fa-check"></i> Accès au catalogue</li>
                        <li><i class="fa-solid fa-check"></i> Création listes/personnes : 5</li>
                        <li id="no">- Indication Acheter sur liste</li>
                        <li id="no">- Modification theme Groupe</li>
                    </ul>
                    <div class="abonnementPanier">
                        <button type="submit">Ajouter au Panier<i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
            <div id="abo" class="abonnement">
                <div class="texte">
                    <h3>Entreprise</h3>
                    <p class="prix">19.99$/ans</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Aucune limites de membre</li>
                        <li><i class="fa-solid fa-check"></i> Aucune limites de groupes</li>
                        <li><i class="fa-solid fa-check"></i> Accès au catalogue</li>
                        <li><i class="fa-solid fa-check"></i> Création listes ilimiter/pers</li>
                        <li><i class="fa-solid fa-check"></i> Indication Acheter sur liste</li>
                        <li><i class="fa-solid fa-check"></i> Modification theme Groupe</li>
                    </ul>
                    <div class="abonnementPanier">
                        <button type="submit">Ajouter au Panier<i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('components.footer')
@endsection
