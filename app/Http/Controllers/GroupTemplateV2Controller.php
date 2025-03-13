<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupTemplateV2Controller extends Controller
{

    public function index(){
        return view('groupTemplate.groupTemplateV2');
    }
}
