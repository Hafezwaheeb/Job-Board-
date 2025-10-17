<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Job Board {{ isset($title) ? '- ' . $title : '' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Job Board" class="nav-logo" />
                <span class="brand-name">Job Board</span>
            </a>

            <div class="nav-links">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="/blog" class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">Blog</a>
                <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
            </div>

            <div class="nav-actions">
                @auth
                    <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
                    <div class="nav-user">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
                        </form>
                    </div>
                @else
                    <a href="/login" class="btn btn-secondary btn-sm">Login</a>
                    <a href="/signup" class="btn btn-primary btn-sm">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    @if (isset($title))
        <header class="page-header">
            <div class="container">
                <h1 class="page-title">{{ $title }}</h1>
            </div>
        </header>
    @endif

    <main class="main-content">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <x-footer />
</body>

</html>