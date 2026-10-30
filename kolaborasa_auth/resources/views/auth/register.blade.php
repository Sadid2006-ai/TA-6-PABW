@extends('layouts.guest')
@section('title', 'Buat Akun')

@section('content')
<div class="auth-card">
    <h2>Buat Akun</h2>
    <p class="muted">Daftar untuk mulai membagikan idemu.</p>

    <form method="POST" action="{{ route('register.store') }}" novalidate>
        @csrf

        <div class="field">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Nama lengkap">
            @error('name') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="nama@email.com">
            @error('email') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="@error('tanggal_lahir') is-invalid @enderror">
            @error('tanggal_lahir') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Minimal 8 karakter">
            @error('password') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
        </div>

        <button type="submit" class="btn btn-yellow btn-block">Daftar</button>
    </form>

    <p class="auth-foot">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
</div>
@endsection