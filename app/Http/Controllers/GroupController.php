<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Mail\groupCreateMail;
use App\Models\Group;
use App\Models\Liste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $group = Group::create([
            'name' => $request->input('name'),
            'user_id' => $userId,
            'code' => Group::generateUniqueCode(),
            'group_id' => $request->input('group_id'),
        ]);

        Mail::to(auth()->user()->email)->send(new groupCreateMail($group));


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




}
