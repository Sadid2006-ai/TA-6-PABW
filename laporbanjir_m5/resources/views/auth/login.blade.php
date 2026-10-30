@extends('layouts.app')

@section('title', 'Login Petugas')

@section('content')
<div class="auth-wrap">
    <div class="auth-aside">
        <h1>Portal Petugas<br>LaporBanjir</h1>
        <p>Masuk untuk memantau dan mengelola laporan banjir dari warga Kabupaten Bandung secara real-time.</p>
        <ul>
            <li>✓ Pantau laporan masuk dalam satu dasbor</li>
            <li>✓ Klasifikasi status otomatis: Waspada, Siaga, Awas</li>
            <li>✓ Akses aman hanya untuk petugas terdaftar</li>
        </ul>
    </div>

    <div class="auth-main">
        <div class="auth-box">
            <h2>Masuk ke akun Anda</h2>
            <p class="sub">Gunakan email dan password petugas.</p>

            @if (session('success'))
                <x-alert type="success">{{ session('success') }}</x-alert>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@bpbd-bandung.go.id" autofocus>
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••">
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <label class="check"><input type="checkbox" name="remember"> Ingat saya</label>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <p class="auth-foot">Belum punya akun? <a href="{{ route('register') }}">Daftar sebagai petugas</a></p>
        </div>
    </div>
</div>
@endsection