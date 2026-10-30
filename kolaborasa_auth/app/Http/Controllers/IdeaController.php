<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(Request $request)
    {
        $ideas = Idea::with(['user', 'category'])
            ->when($request->q, fn ($q, $s) => $q->where('judul', 'like', "%{$s}%"))
            ->when($request->kategori, fn ($q, $k) => $q->where('category_id', $k))
            ->latest()
            ->get();

        return view('ideas.index', [
            'ideas' => $ideas,
            'categories' => Category::orderBy('nama')->get(),
        ]);
    }

    public function show(Idea $idea)
    {
        $idea->load(['user', 'category']);

        return view('ideas.show', compact('idea'));
    }

    public function create()
    {
        return view('ideas.create', ['categories' => Category::orderBy('nama')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'min:5', 'max:150'],
            'category_id' => ['required', 'exists:categories,id'],
            'deskripsi' => ['required', 'string', 'min:20'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'judul.required' => 'Judul ide wajib diisi.',
            'judul.min' => 'Judul minimal 5 karakter.',
            'category_id.required' => 'Pilih kategori ide.',
            'category_id.exists' => 'Kategori tidak valid.',
            'deskripsi.required' => 'Deskripsi ide wajib diisi.',
            'deskripsi.min' => 'Deskripsi minimal 20 karakter.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ide', 'public');
        }

        $idea = $request->user()->ideas()->create($data);

        return redirect()->route('ideas.show', $idea)->with('success', 'Ide berhasil diunggah!');
    }
}