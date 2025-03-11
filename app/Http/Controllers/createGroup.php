<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class createGroup extends Controller
{
    public function index()
    {
        return view('createGroup.createGroup');
    }

}
