@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/createGroup.css') }}">
@endsection

@section('content')

    @include('components.navbar')

    <div class="contain">
        <div class="titre">
            <h1>Création de votre Groupe !</h1>
            <form method="POST" action="{{ route('group.save') }}">
                @csrf
                <input type="text" name="name" id="NomGroup" class="input-Groupe-Name" placeholder="Veuillez renseigner votre nom de groupe ici..." required autofocus>
                <button class="create-name-groupe-form" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

@endsection
