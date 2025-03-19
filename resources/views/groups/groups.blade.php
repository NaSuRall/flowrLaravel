@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/MyGroup.css') }}">
@endsection

@section('content')


    <div class="container">
        @include('components.navbar')
        <div class="titre">
            <h1>MES GROUPES</h1>


            <div class="mainContent">
                @foreach($groups as $group)
                    <a class="group" href="{{ route('group.show', ['code' => $group->code]) }}">
                        <h3>{{ $group->name }}</h3>
                        <div class="img-block">
                         <h2>Code d'invitation :  {{ $group->code}}</h2>
                        </div>

                        @if ($group->user_id === auth()->id())
                            <form action="{{ route('group.delete', $group->id) }}" method="POST" onsubmit=" return confirm('Voulez-vous vraiment supprimer ce groupe ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Supprimer le groupe</button>
                            </form>
                        @endif

                    </a>
                @endforeach
                <div class="but">
                    <div class="addButton">
                        <a href="{{route('createGroup')}}"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tel">
        <div class="img-force">
            <img src="{{ asset('img/bg-tel.png') }}" alt="">
        </div>
    </div>

@endsection
