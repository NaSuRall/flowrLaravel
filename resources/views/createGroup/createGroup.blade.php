@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/createGroup.css') }}">
@endsection

@section('content')

    <div class="container">
        @include('components.navbar')
        <div class="contain">
            <div class="titre">
                <h1>Création de votre Groupe !</h1>
                <form method="POST" action="{{ route('group.save') }}" class="form-name-group">
                    @csrf
                    <input type="hidden" value="{{ $group->id ?? '' }}" id="groupID">
                    <input type="text" name="name" id="NomGroup" class="input-Groupe-Name" placeholder="Veuillez renseigner votre nom de groupe ici..." maxlength="11" required autofocus>
                    <button class="create-name-groupe-form" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>


    <div class="tel">
        <div class="img-force">
            <img src="{{ asset('img/bg-tel.png') }}" alt="">
        </div>
    </div>
@endsection
