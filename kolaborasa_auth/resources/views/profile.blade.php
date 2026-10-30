@extends('layouts.app')
@section('title', 'Profil')

@section('content')
<section class="profile-head">
    <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
    <div>
        <h1>{{ $user->name }}</h1>
        <p class="muted">{{ $user->email }} · Lahir {{ $user->tanggal_lahir->translatedFormat('d F Y') }}</p>
    </div>
    <div class="stat"><strong>{{ $ideas->count() }}</strong><span>Ide</span></div>
</section>

<h2 class="section-title">Ide Saya</h2>
<div class="grid">
    @forelse ($ideas as $idea)
        @include('partials.idea-card', ['idea' => $idea])
    @empty
        <p class="muted">Kamu belum mengunggah ide. <a href="{{ route('ideas.create') }}">Unggah sekarang</a>.</p>
    @endforelse
</div>
@endsection