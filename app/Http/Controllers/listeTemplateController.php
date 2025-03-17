<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Liste;
use Illuminate\Http\Request;

class listeTemplateController extends Controller
{
    public function index($id){

        $liste = Liste::findOrFail($id);
        return view('listeTemplate.listeTemplate', compact('liste'));
    }
}
