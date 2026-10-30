@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
<section class="hero compact">
    <div class="container">
        <span class="eyebrow">Dasbor Petugas</span>
        <h1>Daftar Laporan Banjir</h1>
        <p>Selamat datang, {{ Auth::user()->name }}. Berikut laporan yang masuk dari warga.</p>
    </div>
</section>

<section class="pull-up">
    <div class="container">
        <div class="stats">
            <div class="stat"><span>Total Laporan</span><strong>{{ $laporan->count() }}</strong></div>
            <div class="stat"><span>Status Awas</span><strong>{{ $laporan->where('status', 'Awas')->count() }}</strong></div>
            <div class="stat"><span>Rata-rata Tinggi Air</span><strong>{{ round($laporan->avg('tinggi_air') ?? 0) }} cm</strong></div>
        </div>

        <div class="card">
            <div class="table-head">
                <h2 style="margin:0">Laporan Masuk</h2>
            </div>

            @if (session('success'))
                <x-alert type="success">{{ session('success') }}</x-alert>
            @endif

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Tinggi Air</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $item)
                            @include('partials.laporan-row', ['item' => $item, 'no' => $loop->iteration])
                        @empty
                            <tr><td colspan="7" class="empty">Belum ada laporan yang masuk.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection