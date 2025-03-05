<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function show(Group $group)
    {

        return view('groupTemplate.groupTemplate', ['group' => $group]);
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


    public function loadContent($section): View|string
    {
        if ($section === "accueil") {
            return view('partials.accueil')->render();
        } elseif ($section === "creation-liste") {
            return view('partials.creation-liste')->render();
        } else {
            return "<p>Section introuvable</p>";
        }
    }




}
