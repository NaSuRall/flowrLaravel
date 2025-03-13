<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class createGroup extends Controller
{
    public function index()
    {

        return view('createGroup.createGroup');
    }

}
