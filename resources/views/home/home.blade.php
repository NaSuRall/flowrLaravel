@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

       <div class="profil">
           @if(auth()->id())
           <div class="gif">
               <div class="round" id="round">
                   <img src="{{ asset('img/profil.svg') }}">
               </div>
               <div class="card">
                   <button type="submit" id="cart"><i class="fa-solid fa-cart-shopping"></i></button>
               </div>
           </div>

           @else
           <div class="no-co">
                <a href="{{ url('app_register') }}" id="jaune">S'inscrire</a>
                <a href="{{ url('app_login') }}">Se Connecter</a>
            </div>
           @endif
       </div>


    @include('components.navbar');


    <div id="titre" class="block">
        @if( auth()->id())
            <h1>Bienvenue, {{ auth()->user()->name }} sur <span>FLOWR</span> !</h1>

        @else
            <h1>Bienvenue sur <span>FLOWR</span></h1>
        @endif
        <h2>Le site incontournable pour faire ses listes de cadeaux</h2>
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

            <a class="button" id="abonnementButton">
                <h3>ABONNEMENT</h3>
                <div class="img-block">
                    <img src="{{ asset('img/png3.svg')}}">
                </div>
            </a>

        </div>
    </div>

    <div id="info">
        <button id="boutonInfo" class="openOverlay"><img src="{{ asset('img/info.png') }}"></button>
    </div>

    <div id="overlay1" class="overlay">
        <div class="overlay-content">
            <div class="bandeBleu">
                <button class="button-close">Fermer</button>
            </div>
            <div class="overlay-content2">
                <h2 class="modal-title">Créer un groupe</h2>
                <img src="{{ asset('img/image1.png') }}">
                <p>Cliquez sur ce bouton pour créer un groupe et y inviter vos potes.</p>
                <button id="precedent1" class="precedent">Précédent</button>
                <button id="suivant1" class="suivant">Suivant</button>
            </div>
        </div>
    </div>

    <div id="overlay2" class="overlay">
        <div class="overlay-content">
            <div class="bandeBleu">
                <button class="button-close">Fermer</button>
            </div>
            <div class="overlay-content2">
                <h2 class="modal-title">Vos groupes</h2>
                <img src="{{ asset('img/image2.png') }}">
                <p>En cliquant sur ce bouton, vous pouvez accéder aux groupes dont vous faites partie.</p>
                <button id="precedent2" class="precedent">Précédent</button>
                <button id="suivant2" class="suivant">Suivant</button>
            </div>
        </div>
    </div>

    <div id="overlay3" class="overlay">
        <div class="overlay-content">
            <div class="bandeBleu">
                <button class="button-close">Fermer</button>
            </div>
            <div id="contentOverlay3" class="overlay-content2">
                <h2 class="modal-title">Notre catalogue</h2>
                <img src="{{ asset('img/image3.png') }}">
                <p>En cliquant sur ce bouton, vous pouvez accéder à notre catalogue proposant des offres et idées de
                    cadeaux.</p>
                <button id="precedent3" class="precedent">Précédent</button>
                <button id="suivant3" class="suivant">Suivant</button>
            </div>
        </div>
    </div>

    <div id="overlay4" class="overlay">
        <div class="overlay-content">
            <div class="bandeBleu">
                <button class="button-close">Fermer</button>
            </div>
            <div id="contentOverlay4" class="overlay-content2">
                <h2 class="modal-title">profil</h2>
                <img src="{{ asset('img/image4.png') }}">
                <p>En glissant votre souris sur le cadre a droite, vous aurez accès a votre profil et bien plus de
                    fonctionnalité</p>
                <button id="precedent4" class="precedent">Précédent</button>
                <button id="termine" class="button-close">Terminé</button>
            </div>
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
        <div class="gauche"></div>
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

@endsection
