<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class JoinGroupController extends Controller
{

    public function index(){
        return view('JoinGroup');
    }

    // Permet d'ajouter l'utilisateur au groupe a partir du code transmis par l'utilisateur
    public function join(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:5',
        ]);

        // recupere le groupe associé au code transmis
        $group = Group::where('code', $request->code)->first();

        //verifie si le groupe existe
        if (!$group) {
            return redirect()->back()->with('error', 'Ce code de groupe est invalide.');
        }

        $user = auth()->user();

        // verifie que l'utilisateur n'est pas deja dans le groupe
        if ($group->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà membre de ce groupe.');
        }

        // ajoute l'utilisateur au groupe
        $group->users()->attach($user->id);

        return redirect()->route('group.show', ['code' => $group->code])->with('success', 'Vous avez rejoint le groupe avec succès !');
    }
}
