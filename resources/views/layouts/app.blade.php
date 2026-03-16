<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'MacroActive Demo' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="shell">
            <div class="mx-auto max-w-7xl space-y-8">
                <header class="panel flex flex-col gap-5 px-6 py-5 md:flex-row md:items-center md:justify-between md:px-8">
                    <div>
                        <p class="pill pill-green mb-3">Laravel + DDEV demo workspace</p>
                        <h1 class="text-3xl font-semibold tracking-tight text-white md:text-4xl">MacroActive developer partnership demo</h1>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-white/70 md:text-base">A small Laravel app built to demo local workflow, reviewable changes, and release automation in a way that complements developers and the wider team.</p>
                    </div>
                    <nav class="flex flex-wrap gap-2">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Overview</a>
                        <a href="{{ route('creators') }}" class="nav-link {{ request()->routeIs('creators') ? 'nav-link-active' : '' }}">Creator ops</a>
                        <a href="{{ route('launch-assistant') }}" class="nav-link {{ request()->routeIs('launch-assistant*') ? 'nav-link-active' : '' }}">Launch assistant</a>
                        <a href="{{ route('engineering') }}" class="nav-link {{ request()->routeIs('engineering') ? 'nav-link-active' : '' }}">Engineering</a>
                    </nav>
                </header>

                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
