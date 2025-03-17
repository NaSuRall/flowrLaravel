<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class myAccount extends Controller
{
    public function index()
    {
        return view('myAccount.myAccount');
    }

    public function myAccount()
    {
        $user = Auth::user();
        return view('myAccount.myAccount', compact('user'));
    }

    public function edit($id)

    {
        $users = users::findOrFail($id);

        return view('edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'tel'=> 'required|max:255',
        ]);

        \App\Models\User::whereId($id)->update($validatedData);

        return redirect('/myAccount');
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|string',
        ]);

        $user = Auth::user();
        $user->profile_image = $request->profile_image;
        $user->save();

        return redirect()->back();
    }

}
