@extends('layouts.guest')
@section('title', 'Selamat Datang')

@section('content')
    <div class="hero-landing">
        <h1>Bagikan idemu,<br><span class="text-yellow">bangun kotamu.</span></h1>
        <p>Kolaborasa adalah wadah warga untuk menyimpan dan membagikan ide inovasi demi kota yang lebih cerdas.</p>
        <a href="{{ route('login') }}" class="btn btn-yellow btn-lg">Mulai</a>
        <a href="{{ route('register') }}" class="btn btn-outline btn-lg">Buat Akun</a>
    </div>
@endsection