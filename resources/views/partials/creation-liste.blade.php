<h2>Créer une nouvelle liste</h2>
<form method="POST" action="{{ route('create.Liste') }}">
    @csrf
    <input type="hidden" name="group_id" value="{{ $groupId }}">

    <label>Nom de la liste</label>
    <input type="text" name="name" required>

    <label>Description</label>
    <input type="text" name="description" required>

    <label>Lien</label>
    <input type="text" name="Lien" required>

    <button type="submit">Créer</button>
</form>
