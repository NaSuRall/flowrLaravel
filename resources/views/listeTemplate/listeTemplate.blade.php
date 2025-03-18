@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/listeTemplate.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="title">
            <a href="{{ route('group.show', ['code' => $group->code]) }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h2>Liste : {{ $liste->name }}</h2>
        </div>

        <div class="cont">
            <!-- Liste des Templates -->
            <div class="template-list" style="width: 70%; padding: 20px;">
                <h3>Templates existants</h3>
                <ul>
                    @foreach ($templates as $template)
                        <div class="cadeaux">
                        <h2><span>Nom : </span>{{ $template->name }} </h2>
                        <h2><span>Description : </span> {{ $template->description }}</h2>
                        </div>

                    @endforeach
                </ul>
            </div>

            <!-- Formulaire de création -->
            <div class="template-form" style="width: 30%; padding: 20px;">
                @if(auth()->id() == $liste->user_id)
                    <!-- Afficher le formulaire pour ajouter un composant -->
                    <form method="POST" action="{{ route('create.tem.liste', ['id' => $liste->id, 'code' => $group->code]) }}">
                        @csrf
                        <input type="hidden" name="liste_id" value="{{ $liste->id }}">
                        <input type="hidden" name="group_code" value="{{ $group->code }}">

                        <label>Nom de l'idée de cadeaux</label>
                        <input type="text" name="name" required>

                        <label>Description / prix</label>
                        <input type="text" name="description" required>

                        <label>Lien (si possible )</label>
                        <input type="text" name="lien">

                        <button type="submit">Créer</button>
                    </form>
                @else
                    <p>Vous ne pouvez pas ajouter de composants à cette liste.</p>
                @endif

            </div>
        </div>
    </div>


    <div class="tel">
        <div class="img-force">
            <img src="{{ asset('img/bg-tel.png') }}" alt="">
        </div>
    </div>
@endsection
