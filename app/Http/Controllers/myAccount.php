<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
}
