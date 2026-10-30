@extends('layouts.app')
@section('title', 'Unggah Ide')

@section('content')
<div class="form-card">
    <h1>Unggah Ide</h1>

    <form method="POST" action="{{ route('ideas.store') }}" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="field">
            <label for="judul">Judul Ide</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}" class="@error('judul') is-invalid @enderror">
            @error('judul') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id" class="@error('category_id') is-invalid @enderror">
                <option value="">Pilih kategori</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @selected(old('category_id') == $c->id)>{{ $c->nama }}</option>
                @endforeach
            </select>
            @error('category_id') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="gambar">Gambar (opsional)</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" class="@error('gambar') is-invalid @enderror">
            @error('gambar') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="deskripsi">Deskripsi Ide</label>
            <textarea id="deskripsi" name="deskripsi" rows="6" class="@error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <small class="error">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-yellow">Unggah</button>
    </form>
</div>
@endsection