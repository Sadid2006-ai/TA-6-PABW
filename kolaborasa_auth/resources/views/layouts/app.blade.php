<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kolaborasa') — Kolaborasa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kolaborasa.css') }}">
</head>
<body class="bg-city">
    <header class="navbar">
        <a class="brand" href="{{ route('home') }}">Kolabora<span>sa</span></a>
        <nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('ideas.index') }}" class="{{ request()->routeIs('ideas.index', 'ideas.show') ? 'active' : '' }}">Ide</a>
            <a href="{{ route('ideas.create') }}" class="{{ request()->routeIs('ideas.create') ? 'active' : '' }}">Unggah Ide</a>
            <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a>
        </nav>
        <div class="nav-user">
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-yellow btn-sm">Keluar</button>
            </form>
        </div>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="footer">© {{ date('Y') }} Kolaborasa — Wadah ide warga untuk kota pintar</footer>
</body>
</html>