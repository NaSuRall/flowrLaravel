<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        // User groups
        $groups = auth()->user()->group;

        return view('groups.groups', [
            'groups' => $groups
        ]);
    }

    public function save(StoreGroupRequest $request) {
        Group::create([
            'user_id'   => auth()->user()->id,
            'name'      => $request->name,
        ]);

        return redirect()->back()->with('success', 'Group created.');
    }
}
