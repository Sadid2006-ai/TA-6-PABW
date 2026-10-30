<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idea;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'totalIde' => Idea::count(),
            'categories' => Category::withCount('ideas')->get(),
            'latest' => Idea::with(['user', 'category'])->latest()->take(8)->get(),
        ]);
    }
}