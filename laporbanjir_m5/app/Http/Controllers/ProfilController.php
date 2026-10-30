<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profil', compact('user'));
    }
}