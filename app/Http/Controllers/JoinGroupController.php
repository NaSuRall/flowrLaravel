<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class JoinGroupController extends Controller
{

    public function index(){
        return view('joinGroup');
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

        if ($group->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà membre de ce groupe.');
        }

        $group->users()->attach($user->id);

        return redirect()->route('group.show', ['code' => $group->code])->with('success', 'Vous avez rejoint le groupe avec succès !');
    }
}
