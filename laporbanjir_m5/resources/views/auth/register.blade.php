@extends('layouts.app')

@section('title', 'Register Petugas')

@section('content')
<div class="auth-wrap">
    <div class="auth-aside">
        <h1>Bergabung sebagai<br>Petugas BPBD</h1>
        <p>Buat akun untuk mengakses dasbor pengelolaan laporan banjir Kabupaten Bandung.</p>
        <ul>
            <li>✓ Pendaftaran cepat dan sederhana</li>
            <li>✓ Password disimpan terenkripsi (hash)</li>
            <li>✓ Data warga hanya dapat dilihat petugas</li>
        </ul>
    </div>

    <div class="auth-main">
        <div class="auth-box">
            <h2>Buat akun petugas</h2>
            <p class="sub">Lengkapi data berikut untuk mendaftar.</p>

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama lengkap" autofocus>
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@bpbd-bandung.go.id">
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="row-2">
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Min. 8 karakter">
                        @error('password') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label for="password_confirmation">Konfirmasi</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </form>

            <p class="auth-foot">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
    </div>
</div>
@endsection