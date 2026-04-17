<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bekasi Care | PSC 119')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-body">
    <div class="page-shell">
        <header class="topbar">
            <div class="topbar__inner">
                <a href="/" class="brand-mark">
                    <span class="brand-mark__badge">119</span>
                    <span>
                        <strong>Bekasi Care</strong>
                        <small>Respons Darurat Kabupaten Bekasi</small>
                    </span>
                </a>

                <nav class="topnav" aria-label="Navigasi utama">
                    <a href="/pengaduan" class="{{ request()->is('/', 'pengaduan') ? 'is-active' : '' }}">Pengaduan</a>
                    <a href="/profil" class="{{ request()->is('profil') ? 'is-active' : '' }}">Profil</a>
                    <a href="/admin" class="{{ request()->is('admin*') ? 'is-active' : '' }}">Dashboard</a>
                    @auth
                        <a href="/logout">Logout</a>
                    @else
                        <a href="/login" class="{{ request()->is('login', 'register') ? 'is-active' : '' }}">Login</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="site-footer__inner">
                <div>
                    <strong>Bekasi Care PSC 119</strong>
                    <p>Pusat koordinasi pelaporan dan penanganan darurat yang dirancang agar warga bisa mengirim informasi dengan cepat dan jelas.</p>
                </div>
                <div class="site-footer__meta">
                    <span>Layanan siaga 24 jam</span>
                    <span>Kabupaten Bekasi</span>
                    <span>Form pelaporan digital</span>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
