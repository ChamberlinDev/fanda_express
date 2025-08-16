<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Etablissement extends Controller
{
    //
    public function Ajout_form (){
        return view('admin.etablissements.ajouter');
    }

    public function index(){
        return view('admin.etablissements.index');
    }
}
