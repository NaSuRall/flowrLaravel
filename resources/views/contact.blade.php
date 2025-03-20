@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

    @include('components.navbar')
    @include('components.navbarMobile')
    <div class="titreContact">
        <h1>Besoins de nous contacter ?</h1>
    </div>

    <div class="formContact">
        <form id="contactForm" action="{{ route('contact.form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="inputUser" type="text" name="object" placeholder="Entrer le sujet de votre demande" required>
            <textarea class="inputUser" name="description" placeholder="Écrivez votre demande" required></textarea>
            <input id="pieceJointe" class="inputUser" type="file" name="pieceJointe">
            <button type="submit">Envoyer</button>
        </form>
    </div>

@endsection
