@extends('layouts.app')
@section('title', 'Daftar Ide')

@section('content')
<div class="page-head">
    <h1>Daftar Ide</h1>
    <a href="{{ route('ideas.create') }}" class="btn btn-yellow">+ Tambah Ide</a>
</div>

<form method="GET" action="{{ route('ideas.index') }}" class="filter-bar">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul ide...">
    <select name="kategori">
        <option value="">Semua kategori</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected(request('kategori') == $c->id)>{{ $c->nama }}</option>
        @endforeach
    </select>
    <button class="btn btn-yellow">Terapkan</button>
</form>

<div class="grid">
    @forelse ($ideas as $idea)
        @include('partials.idea-card', ['idea' => $idea])
    @empty
        <p class="muted">Belum ada ide yang cocok.</p>
    @endforelse
</div>
@endsection