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

    public function show(Group $group)
    {
        $users = User::all();
        return view('groupTemplate.groupTemplate', ['group' => $group], compact('users'));
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
            'name' => 'required|string|max:255|unique:groups,name',
        ]);

        $group = Group::create([
            'name' => $request->input('name'),
            'user_id' => $userId,
        ]);

        return redirect()->route('group.show', $group)->with('success', 'Groupe créé avec succès !');
    }


    public function loadContent($section, $groupId): View|string
    {
        if ($section === "accueil") {
            $group = Group::findOrFail($groupId);
            $AllListes = Liste::where('group_id', $groupId)->get();
            return view('partials.accueil', compact('AllListes', 'group'))->render();
        } elseif ($section === "creation-liste") {
            return view('partials.creation-liste', compact('groupId'))->render();
        } else {
            return "<p>Section introuvable</p>";
        }
    }

    public function createListe(Request $request)
    {
        $request->validate([
            'group_id' => 'required|integer|exists:groups,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'lien' => 'required|string|max:255',
        ]);

        Liste::create([
            'group_id' => $request->input('group_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'lien' => $request->input('lien'),
        ]);

        return redirect()->route('loadContent', ['section' => 'accueil', 'groupId' => $request->input('group_id')])
            ->with('success', 'Liste créée avec succès !');
    }





}
