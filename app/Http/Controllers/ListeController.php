<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use Illuminate\Http\Request;

class ListeController extends Controller
{

    public function showCreateForm($groupId)
    {
        return view('create-liste', ['group_id' => $groupId]);
    }
    public function createListe(Request $request)
    {
        $request->validate([
            'group_id' => 'required|integer|exists:groups,id',
            'name' => 'required|string|max:255|unique:groups,name',
            'description' => 'required|string|max:255',
            'lien' => 'required|string|max:255',
        ]);

        $liste = Liste::create([
            'group_id' => $request->input('group_id'),
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'lien' => $request->input('lien'),
        ]);

        return redirect()->route('create.Liste')->with('success', 'Groupe créé avec succès !');
    }



}
