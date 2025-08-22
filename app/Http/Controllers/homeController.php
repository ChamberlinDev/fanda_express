<?php

namespace App\Http\Controllers;

use App\Models\etablissement_mod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //
    public function show($id)
    {
        $etab = etablissement_mod::findOrFail($id);
        return view('admin.etablissements.show', compact('etab'));
    }

    public function edit($id)
    {
        $etab = etablissement_mod::findOrFail($id);
        return view('admin.etablissements.modif', compact('etab'));
    }
}
