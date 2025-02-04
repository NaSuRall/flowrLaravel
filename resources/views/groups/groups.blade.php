@extends('layouts.app')

@section('content')

    @include('components.navbar')
    <div class="container">
        <div class="titre">
            <h1>Mes Groupes :</h1>

            @foreach($groups as $group)
                <p>{{ $group->name }}</p>
            @endforeach
        </div>
    </div>


@endsection
