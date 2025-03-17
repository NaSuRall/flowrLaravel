<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function contactFromUser(Request $request)
    {
        $request->validate([
            'object' => 'required|string|max:255',
            'description' => 'required|string',
            'pieceJointe' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('pieceJointe')) {
            $filePath = $request->file('pieceJointe')->store('support_files', 'public');
        }

        Support::create([
            'user_id' => Auth::id(),
            'email'=> Auth::user()->email,
            'object' => $request->input('object'),
            'description' => $request->input('description'),
            'piece_jointe' => $filePath,
        ]);

        return redirect()->back();
    }
}
