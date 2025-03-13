<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Models\Group;
use App\Models\Liste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function show(Group $group, $code)
    {

        $group = Group::where('code', $code)->firstOrFail();
        $users = $group->users;
        $AllListes = Liste::where('group_id', $group->id)->get();
        return view('groupTemplate.groupTemplate', ['group' => $group], compact('users', 'AllListes'));
    }


    public function index() {
        // User groups
        $groups = auth()->user()->groups;

        return view('groups.groups', [
            'groups' => $groups
        ]);
    }

    public function save(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer un groupe.');
        }

        $userId = auth()->id();
        $request->validate([
            'name' => 'required|string|max:10|unique:groups,name',
        ]);

        $group = Group::create([
            'name' => $request->input('name'),
            'user_id' => $userId,
            'code' => Group::generateUniqueCode(),
            'group_id' => $request->input('group_id'),
        ]);

        //ajoute l'utilisateur qui a creer le groupe
        $group->users()->attach($userId);

        return redirect()->route('group.show', ['code' => $group->code])
            ->with('success', 'Groupe créé avec succès !');
    }


    public function createListe(Request $request)
    {
        $request->validate([
            'group_id' => 'required|integer|exists:groups,id',
            'name' => 'required|string|max:10',
            'description' => 'required|string|max:255',
            'Lien' => 'required|string|max:255',
        ]);
        $group = Group::where('id', $request->input('group_id'))->firstOrFail();

        if (!$group){
            return redirect()->route('home')->with('error', 'Ce groupe n\existe pas !.');
        }

       Liste::create([
            'group_id' => $request->input('group_id'),
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'Lien' => $request->input('Lien'),
        ]);

        return redirect()->route('group.show', $group->code );
    }


    public function join(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:5',
        ]);

        $group = Group::where('code', $request->code)->first();

        if (!$group) {
            return redirect()->back()->with('error', 'Ce code de groupe est invalide.');
        }

        $user = auth()->user();

        //verifie si l'utilkateur est deja dans le groupe
        if ($group->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà membre de ce groupe.');
        }

        //ajoute l'utilisateur dans le groupe avec la table pivot
        $group->users()->attach($user->id);

        return redirect()->route('group.show', ['code' => $group->code])->with('success', 'Vous avez rejoint le groupe avec succès !');
    }

}
