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
                    <a class="group" href="{{ route('group.show', $group) }}">
                        <h3>{{ $group->name }}</h3>
                        <div class="img-block">
                            <img src="">
                        </div>
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


@endsection
