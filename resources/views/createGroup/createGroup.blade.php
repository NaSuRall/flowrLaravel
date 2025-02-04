@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/createGroup.css') }}">
</head>

@include('components.navbar');




<div class="contain">
    <div class="titre">
        <h1>Création de votre Groupe !</h1>
        <form class="form-name-group" method="POST" action="">
            <input type="text" value="" name="NomGroup" id="NomGroup" class="input-Groupe-Name" autocomplete="NomGroup"  placeholder="Veuillez renseignez votre nom de groupe ici......" required autofocus>
            <button class="create-name-groupe-form" type="submit"><i class="fa-regular fa-paper-plane"></i></button>

        </form>

    </div>

</div>

@endsection
