@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/MyGroup.css') }}">
@endsection

@section('content')

    @include('components.navbar')
    <div class="container">
        <div class="titre">
            <h1>MES GROUPES</h1>


            <div class="mainContent">
                @foreach($groups as $group)
                    <a class="group" href="{{ route('group.show', ['code' => $group->code]) }}">
                        <h3>{{ $group->name }}</h3>
                        <div class="img-block">
                         <h2>Code d'invitation :  {{ $group->code}}</h2>
                        </div>
                    </a>
                @endforeach
                <div class="but">
                    <div class="addButton">
                        <a href="{{route('createGroup')}}"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="joinGroup">
                <h3>Rejoindre un groupe</h3>
                <form action="{{ route('group.join') }}" method="POST">
                    @csrf
                    <input type="text" name="code" placeholder="Entrez le code du groupe" required>
                    <button type="submit">Rejoindre</button>
                </form>
            </div>

        </div>
    </div>


@endsection
