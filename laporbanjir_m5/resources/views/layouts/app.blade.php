<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') | LaporBanjir BPBD Kabupaten Bandung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/laporbanjir.css') }}">
</head>
<body>

<header class="navbar">
    <div class="container">
        <a href="{{ route('laporan.create') }}" class="brand">
            <svg viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="8" fill="#0b5fff"/>
                <path d="M16 6c3.5 5 6.5 8.2 6.5 12a6.5 6.5 0 0 1-13 0C9.5 14.200 12.500 11 16 6Z" fill="#fff"/>
            </svg>
            <div>LaporBanjir<small>BPBD Kab. Bandung</small></div>
        </a>

        <nav class="nav-links">
            <a href="{{ route('laporan.create') }}" class="{{ request()->routeIs('laporan.create') ? 'active' : '' }}">Lapor Banjir</a>

            @auth
                <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">Daftar Laporan</a>
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil Petugas</a>

                <div class="nav-user">
                    <div class="avatar-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="link">Logout</button>
                    </form>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
            @endguest
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <span>© {{ date('Y') }} Badan Penanggulangan Bencana Daerah Kabupaten Bandung</span>
        <span>Sistem Pelaporan Banjir Warga</span>
    </div>
</footer>

</body>
</html>