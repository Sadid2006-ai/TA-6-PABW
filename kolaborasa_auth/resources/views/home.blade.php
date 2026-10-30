@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
<section class="banner">
    <span class="badge badge-yellow">Inovasi Terbaru</span>
    <h1>Halo, {{ auth()->user()->name }}!</h1>
    <p>Temukan dan bagikan ide untuk membuat kota kita semakin cerdas.</p>

    <form action="{{ route('ideas.index') }}" method="GET" class="search-bar">
        <input type="text" name="q" placeholder="Cari ide...">
        <button class="btn btn-yellow">Cari</button>
    </form>
</section>

<section class="stats">
    <div class="stat"><strong>{{ $totalIde }}</strong><span>Total Ide</span></div>
    <div class="stat"><strong>{{ $categories->count() }}</strong><span>Kategori</span></div>
    <div class="stat"><strong>{{ auth()->user()->ideas()->count() }}</strong><span>Ide Saya</span></div>
</section>

<section>
    <h2 class="section-title">Kategori</h2>
    <div class="chips">
        @foreach ($categories as $c)
            <a class="chip" href="{{ route('ideas.index', ['kategori' => $c->id]) }}">{{ $c->nama }} ({{ $c->ideas_count }})</a>
        @endforeach
    </div>
</section>

<section>
    <h2 class="section-title">Ide Terbaru</h2>
    <div class="carousel">
        @foreach ($latest as $idea)
            @include('partials.idea-card', ['idea' => $idea])
        @endforeach
    </div>
</section>
@endsection