<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function create()
    {
        return view('groupTemplate.groupTemplate');
    }


    public function index() {
        // User groups
        $groups = auth()->user()->group;

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

        Group::create([
            'name' => $request->input('name'),
            'user_id' => $userId,
        ]);
        return redirect()->route('group.create')->with('success', 'Groupe créé avec succès !');
    }



}
