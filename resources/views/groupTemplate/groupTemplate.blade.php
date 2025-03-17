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
                    <dialog id="dialog-membre">
                        <div class="btnc">
                            <button id="btn-close-membre" autofocus> X </button>
                        </div>
                        @foreach($users as $user)
                            <div class="block_user">
                                <h3>{{ $user->firstname }}</h3>
                                <h3>{{ $user->lastname }}</h3>
                            </div>
                        @endforeach
                        <div class="code">
                            <p>Code d'invitation: <span id="tocopy">{{ $group->code }}</span></p>
                            <input type="button" value="Copier" class="js-copy" data-target="#tocopy">
                        </div>
                    </dialog>
                    <button id="membre">
                        <i class="fa-solid fa-circle-user">Membres</i>
                    </button>
                </div>

                <div class="dia">
                    <dialog id="dialog-liste">
                        <div class="btnc">
                            <button id="btn-close-liste" autofocus> X </button>
                        </div>


                        <h2>Créer une nouvelle liste</h2>
                        <form method="POST" action="{{ route('create.Liste') }}">
                            @csrf
                            <input type="hidden" name="group_id" value="{{ $group->id }}">

                            <label>Nom de la liste</label>
                            <input type="text" name="name" required>

                            <label>Description</label>
                            <input type="text" name="description" required>

                            <label>Lien</label>
                            <input type="text" name="Lien" required>

                            <button type="submit">Créer</button>
                        </form>


                    </dialog>
                    <button id="createListe">
                        <i class="fa-solid fa-pencil"> Create List</i>
                    </button>
                </div>
            </div>
        </div>


<div class="section-content">
    <div class="separate-title">
        <h2>Listes Du groupe :</h2>
    </div>
    <div class="contente">
        <div class="section-aff-liste">
            <div class="all-listes">
                @foreach($AllListes as $AllListe)
                    <a href="{{ route('listeTemplate', ['id' => $AllListe->id]) }}" class="card">
                        <h3>{{ $AllListe->name }}</h3>

                        <div class="comple">
                            <h3>{{ $AllListe->description }}</h3>
                            <h3>{{ $AllListe->Lien }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>





    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/copy.js') }}"></script>
    <script src="{{ asset('js/dialog.js') }}"></script>
@endsection
