<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Job Board {{ isset($title) ? '- ' . $title : '' }}</title>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Job Board"
                    class="nav-logo" />
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
                    <div class="nav-user">
                        <button class="profile-toggle" aria-label="User menu" aria-expanded="false">
                            <div class="profile-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="profile-name">{{ Auth::user()->name }}</span>
                            <svg class="profile-arrow" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4.5 6l3.5 3.5L11.5 6z"/>
                            </svg>
                        </button>
                        <ul class="profile-dropdown hidden">
                            <li><a href="/dashboard" class="dropdown-item">Dashboard</a></li>
                            <li><a href="/blog" class="dropdown-item">My Blogs</a></li>
                            <li><a href="/settings" class="dropdown-item">Settings</a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout-btn">Logout</button>
                                </form>
                            </li>
                        </ul>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.querySelector('.profile-toggle');
            const dropdown = document.querySelector('.profile-dropdown');
            
            if (toggle && dropdown) {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const expanded = toggle.getAttribute('aria-expanded') === 'true';
                    toggle.setAttribute('aria-expanded', !expanded);
                    dropdown.classList.toggle('hidden');
                });
                
                document.addEventListener('click', function() {
                    toggle.setAttribute('aria-expanded', 'false');
                    dropdown.classList.add('hidden');
                });
            }
        });
    </script>
</body>

</html>
