@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<section class="hero compact">
    <div class="container">
        <span class="eyebrow">Akun Saya</span>
        <h1>Profil Petugas</h1>
        <p>Informasi akun petugas yang sedang login.</p>
    </div>
</section>

<section class="pull-up">
    <div class="container" style="max-width:760px">
        <div class="card">
            <div class="profile-head">
                <div class="avatar-lg">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <div>
                    <h2>{{ $user->name }}</h2>
                    <span>Petugas BPBD Kabupaten Bandung</span>
                </div>
            </div>

            <dl>
                <div class="detail"><dt>Nama</dt><dd>{{ $user->name }}</dd></div>
                <div class="detail"><dt>Email</dt><dd>{{ $user->email }}</dd></div>
                <div class="detail"><dt>Akun dibuat pada</dt><dd>{{ $user->created_at->translatedFormat('d F Y, H:i') }} WIB</dd></div>
            </dl>
        </div>
    </div>
</section>
@endsection