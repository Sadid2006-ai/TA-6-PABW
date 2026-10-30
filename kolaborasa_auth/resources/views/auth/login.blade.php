@extends('layouts.guest')
@section('title', 'Masuk')

@section('content')
<div class="auth-card">
    <h2>Masuk</h2>
    <p class="muted">Selamat datang kembali di Kolaborasa.</p>

    @if ($errors->has('email') && !$errors->has('password') && old('email'))
        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" novalidate>
        @csrf

        <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="nama@email.com">
            @error('email') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
            @error('password') <small class="error">{{ $message }}</small> @enderror
        </div>

        <label class="check">
            <input type="checkbox" name="remember"> Ingat saya
        </label>

        <button type="submit" class="btn btn-yellow btn-block">Masuk</button>
        <button type="button" class="btn btn-outline btn-block" disabled title="Belum tersedia">Masuk dengan Google</button>
    </form>

    <p class="auth-foot">Belum punya akun? <a href="{{ route('register') }}">Buat akun</a></p>
</div>
@endsection