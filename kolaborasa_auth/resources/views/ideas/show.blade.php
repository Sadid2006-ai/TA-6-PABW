@extends('layouts.app')
@section('title', $idea->judul)

@section('content')
<article class="detail">
    <a href="{{ route('ideas.index') }}" class="back">← Kembali</a>
    <span class="badge">{{ $idea->category->nama }}</span>
    <span class="badge badge-yellow">{{ $idea->status }}</span>
    <h1>{{ $idea->judul }}</h1>
    <small class="muted">oleh {{ $idea->user->name }} · {{ $idea->created_at->translatedFormat('d F Y') }}</small>

    @if ($idea->gambar_url)
        <img src="{{ $idea->gambar_url }}" alt="{{ $idea->judul }}" class="detail-img">
    @else
        <div class="detail-img placeholder"></div>
    @endif

    <p class="detail-text">{!! nl2br(e($idea->deskripsi)) !!}</p>
</article>
@endsection