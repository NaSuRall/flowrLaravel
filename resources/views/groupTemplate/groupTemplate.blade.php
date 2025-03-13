@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/groupTemplateV2.css') }}">
@endsection


@section('content')
    <input type="hidden" value="{{ $group->id }}" id="groupID">
    <div class="container">
        <div class="icon"><i class="fa-solid fa-comment"></i></div>

        <div class="header">
            <div class="title">
                <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
                <h2>{{ $group->name }} </h2>
            </div>

        </div>

        <div class="section">
            <div class="btn-class-itr">
                <div class="dia">
                    <dialog>
                        <button autofocus>Fermer</button>
                        @foreach($users as $user)
                            <div class="block_user">
                                <h3>{{ $user->firstname }}</h3>
                                <h3>{{ $user->lastname }}</h3>
                            </div>
                        @endforeach
                        <button> Ajouter membre</button>
                    </dialog>
                   <button><i class="fa-solid fa-circle-user">Membres</i></button>
                </div>


                <i class="fa-solid fa-pencil" id="createListe">Create List</i>


            </div>
        </div>

        <div class="dia">
            <dialog>
                <button autofocus>Fermer</button>
                <div class="code">
                    <p>Code du groupe: <span id="tocopy">{{$group->code }}</span></p>
                    <input type="button" value="Copier" class="js-copy" data-target="#tocopy">
                </div>
            </dialog>
            <button>Ajouter au groupe !</button>
        </div>


        <div class="separate-title">
            <h2>Listes Du groupe :</h2>
        </div>
        <div class="contente">

            <div class="section-aff-liste">
                <div class="all-listes">
                    @foreach($AllListes as $AllListe)
                        <div class="card">
                            <h3>{{ $AllListe->name }}</h3>
                        </div>
                    @endforeach
                </div>
                <div class="addButton">
                    <a href="{{route('createGroup')}}"><i class="fa-solid fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/copy.js') }}"></script>
    <script src="{{ asset('js/dialog.js') }}"></script>
@endsection
