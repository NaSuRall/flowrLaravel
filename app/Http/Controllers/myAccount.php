<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\UpdateAccountMail;
use Illuminate\Support\Facades\Mail;


class myAccount extends Controller
{
    public function index()
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
        // Trouve l'utilisateur
        $user = auth::user();

        // Validation des données
        $validatedData = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'max:255',
        ]);

        // Mise à jour de l'utilisateur
        \App\Models\User::whereId($id)->update($validatedData);

        // Envoi de l'email avec l'utilisateur mis à jour
        Mail::to($user->email)->send(new UpdateAccountMail($user));

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
