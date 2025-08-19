<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogcontroller extends Controller
{
    //
    public function index(){

        return view('admin.blog.index');
    }

    public function ajout_form(){
        return view('admin.blog.ajouter');
    }
}
