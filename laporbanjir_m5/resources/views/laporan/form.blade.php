@extends('layouts.app')

@section('title', 'Lapor Banjir')

@section('content')
<section class="hero">
    <div class="container">
        <span class="eyebrow">Layanan Warga</span>
        <h1>Laporkan banjir di sekitar Anda, petugas kami siap merespons.</h1>
        <p>Isi formulir berikut tanpa perlu login. Setiap laporan masuk langsung ke dasbor petugas BPBD Kabupaten Bandung.</p>
    </div>
</section>

<section class="pull-up">
    <div class="container grid-2">
        <div class="card">
            <h2>Formulir Pelaporan</h2>
            <p class="sub">Mohon isi data dengan benar agar penanganan lebih cepat.</p>

            @if (session('success'))
                <x-alert type="success">{{ session('success') }}</x-alert>
            @endif

            <form action="{{ route('laporan.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="nama_pelapor">Nama Pelapor</label>
                    <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" placeholder="Nama lengkap">
                    @error('nama_pelapor') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="row-2">
                    <div class="field">
                        <label for="kecamatan">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan">
                            <option value="">Pilih kecamatan</option>
                            @foreach ($kecamatan as $k)
                                <option value="{{ $k }}" @selected(old('kecamatan') === $k)>{{ $k }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="tinggi_air">Tinggi Air (cm)</label>
                        <input type="number" id="tinggi_air" name="tinggi_air" value="{{ old('tinggi_air') }}" placeholder="Contoh: 60">
                        @error('tinggi_air') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="alamat">Alamat Lokasi</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Jalan, RT/RW, desa">
                    @error('alamat') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="field">
                    <label for="deskripsi">Keterangan Tambahan <span style="color:var(--muted);font-weight:400">(opsional)</span></label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Kondisi sekitar, jumlah rumah terdampak, dll.">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Kirim Laporan</button>
            </form>
        </div>

        <aside class="card info-card">
            <h3>Klasifikasi Status</h3>
            <ul class="info-list">
                <li><span class="dot" style="background:#f59e0b"></span><div><b>Waspada</b>Tinggi air di bawah 50 cm</div></li>
                <li><span class="dot" style="background:#ea580c"></span><div><b>Siaga</b>Tinggi air 50 – 99 cm</div></li>
                <li><span class="dot" style="background:#dc2626"></span><div><b>Awas</b>Tinggi air 100 cm atau lebih</div></li>
            </ul>
        </aside>
    </div>
</section>
@endsection