<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myAccount extends Controller
{
    public function index()
    {
        return view('myAccount.myAccount');
    }
}
