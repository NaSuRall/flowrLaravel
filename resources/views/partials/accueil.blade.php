
<div class="titre">
    <h2>Voici toutes les listes du groupe : </h2>
</div>

<div class="liste-content">
    <!-- Toutes les liste du groupes print -->
    <p>Afficher les listes ici :)</p>

    @foreach($AllListes as $AllListe)
        <a class="group" href="{{ route('group.show', $AllListe) }}">
            <h3>{{ $AllListe->name }}caca</h3>
            <div class="img-block">
            </div>
        </a>
    @endforeach
</div>
