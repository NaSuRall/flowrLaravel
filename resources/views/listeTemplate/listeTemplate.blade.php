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
            <div class="template-list" >
                <h3>Cadeaux existants</h3>
                <ul>
                    @foreach ($templates as $template)
                        <div class="cadeaux">
                        <h2><span>Nom : </span>{{ $template->name }} </h2>
                        <h2><span>Prix : </span> {{ $template->description }}</h2>
                        <h2><span>Lien : </span> {{ $template->lien }}</h2>
                        </div>

                    @endforeach
                </ul>
            </div>

            <!-- Formulaire de création -->
            <div class="template-form" >
                @if(auth()->id() == $liste->user_id)
                    <form method="POST" action="{{ route('create.tem.liste', ['id' => $liste->id, 'code' => $group->code]) }}">
                        @csrf
                        <input type="hidden" name="liste_id" value="{{ $liste->id }}">
                        <input type="hidden" name="group_code" value="{{ $group->code }}">

                        <label>Nom de l'idée de cadeaux</label>
                        <input type="text" name="name" required>

                        <label>Prix</label>
                        <input type="text" name="description" maxlength="10" required>

                        <label>Lien (si possible )</label>
                        <input type="text" name="lien">

                        <button type="submit">Créer</button>
                    </form>

                    <div class="img">
                        <img src="{{ asset('img/FlowrLogo.png') }}" alt="">
                        <h2>Flowr</h2>
                    </div>
                @else
                    <p>Vous ne pouvez pas ajouter de composants à cette liste.</p>
                @endif

            </div>
        </div>
    </div>


@endsection
