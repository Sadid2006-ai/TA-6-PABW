<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        return view('profile', [
            'user' => $user,
            'ideas' => $user->ideas()->with(['user', 'category'])->latest()->get(),
        ]);
    }
}