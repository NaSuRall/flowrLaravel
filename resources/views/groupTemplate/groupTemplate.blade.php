@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/grouptemplate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/accueil-grp.css') }}">
@endsection


@section('content')

    <div class="row">
        <div id="divMembreGroup" class="column left">
            <input type="hidden" value="{{ $group->id }}" id="groupID">
            <div class="title">
                <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
                <h2>{{ $group->name }} </h2>
            </div>

            <div id="listeMembreGroup">

                <div class="separate">
                    <h3> Listes des membres :</h3>
                </div>
                <div class="block_user">
                    <h3>{{ auth()->user()->firstname }}</h3>
                    <h3>{{ auth()->user()->lastname }}</h3>
                </div>


            </div>

<div class="dia">
    <dialog>
        <button autofocus>Fermer</button>
        <div class="code">
            <p>Code du groupe: <span id="tocopy">{{$group->code }}</span></p>
            <input type="button" value="Copier" class="js-copy" data-target="#tocopy">
        </div>
    </dialog>
    <button>Ajouter au groupe !</button>
</div>

        </div>
        <div id="#mainDivMembreGroup" class="column right">
            <div class="navbar">
                <div class="onglets">
                    <a href="#" class="nav-link" data-target="accueil">Accueil</a>
                    <a href="#" class="nav-link" data-target="creation-liste">Création liste</a>
                </div>
            </div>
           <div id="contentArea">

           </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/copy.js') }}"></script>
    <script src="{{ asset('js/dialog.js') }}"></script>
@endsection
