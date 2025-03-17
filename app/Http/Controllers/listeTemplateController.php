<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Liste;
use App\Models\listeTemplate;
use Illuminate\Http\Request;

class listeTemplateController extends Controller
{
    public function index($id, $code) {
        $group = Group::where('code', $code)->firstOrFail();
        $liste = Liste::findOrFail($id);
        $templates = listeTemplate::where('liste_id', $id)->get();

        if ($liste->user_id != auth()->id()) {
            // Si ce n'est pas le cas, on ne permet pas d'ajouter un composant
            return view('listeTemplate.listeTemplate', compact('liste','group', 'templates'))->with('error', 'Vous ne pouvez pas ajouter de composants à cette liste.');
        }

        return view('listeTemplate.listeTemplate', compact('liste', 'group', 'templates'));
    }

    public function create(Request $request, $id, $code)
    {
        // Vérifier l'existence du groupe et de la liste
        $group = Group::where('code', $code)->firstOrFail();
        $liste = Liste::findOrFail($id);

        // Créer le template
        listeTemplate::create([
            'liste_id' => $liste->id,
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'lien' => $request->input('lien'),
            'code' => $code,
        ]);

        // Recharger la même page avec les données mises à jour
        return redirect()->route('listeTemplate', ['id' => $liste->id, 'code' => $code])
            ->with('success', 'Template créé avec succès !');
    }


}
