@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/grouptemplate.css') }}">
@endsection


@section('content')

    <div class="row">
        <div id="divMembreGroup" class="column left">

            <div class="title">
                <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
                <h2> Groupe : {{ $group->name }} </h2>
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




{{--            <div id="divButton">--}}
{{--                <button class="boutonAjouterMembre">Ajouter des membre</button>--}}
{{--            </div>--}}
        </div>
        <div id="#mainDivMembreGroup" class="column right">
            <div id="defautTexte">
                <p>Il n'y aucune fiche pour l'instant</p>
            </div>
        </div>
    </div>
@endsection
