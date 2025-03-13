@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/groupTemplateV2.css') }}">
@endsection


@section('content')
<div class="container">
    <div class="icon"><i class="fa-solid fa-comment"></i></div>

    <div class="header">
        <div class="title">
            <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <h2>GroupName </h2>
        </div>

    </div>

    <div class="section">
       <div class="btn-class-itr">
           <i class="fa-solid fa-circle-user">Membres</i>
           <i class="fa-solid fa-pencil" id="createListe">Create List</i>
       </div>
    </div>

    <div class="separate-title">
        <h2>Listes Du groupe :</h2>
    </div>
    <div class="contente">

        <div class="section-aff-liste">
            <div class="all-listes">

                    <div class="card">
                        <h3>Nom de la liste</h3>
                    </div>

            </div>
            <div class="addButton">
                <a href="{{route('createGroup')}}"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>


    </div>





</div>
@endsection
