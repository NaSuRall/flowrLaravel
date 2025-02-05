@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/grouptemplate.css') }}">
@endsection


@section('content')

    <div class="row">
        <div id="divMembreGroup" class="column left">
            <h2> nom du groupe: </h2>
            <div id="listeMembreGroup">
                <p>Aucun membre</p>
            </div>
            <div id="divButton">
                <button class="boutonAjouterMembre">Ajouter des membre</button>
            </div>
        </div>
        <div id="#mainDivMembreGroup" class="column right">
            <div id="defautTexte">
                <p>Il n'y aucune fiche pour l'instant</p>
            </div>
        </div>
    </div>
@endsection
