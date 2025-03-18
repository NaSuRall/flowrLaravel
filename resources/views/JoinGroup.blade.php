@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/createGroup.css') }}">
@endsection

@section('content')

    <div class="container">
        @include('components.navbar')

        <div class="contain">
            <div class="titre">
                <h1>Rejoindre un Groupe !</h1>
                <form action="{{ route('group.join') }}" method="POST" class="form-name-group">
                    @csrf
                    <input type="text" name="code" placeholder="Entrez le code du groupe" class="input-Groupe-Name" maxlength="11" required>
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
