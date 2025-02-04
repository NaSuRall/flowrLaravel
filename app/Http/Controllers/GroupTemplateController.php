<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupTemplateController extends Controller
{
    public function index()
    {
        return view('groupTemplate.groupTemplate');
    }
}
