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
            <div class="mx-auto max-w-7xl space-y-6">
                <header class="panel overflow-hidden px-6 py-5 md:px-8">
                    <div class="flex flex-col gap-6 xl:flex-row xl:items-end xl:justify-between">
                        <div class="max-w-4xl">
                            <p class="pill pill-green mb-3">Laravel + DDEV demo workspace</p>
                            <h1 class="text-3xl font-semibold tracking-tight text-white md:text-4xl">MacroActive developer partnership demo</h1>
                            <p class="mt-3 max-w-3xl text-sm leading-6 text-white/70 md:text-base">A polished demo app for walking through product thinking, creator operations, AI-assisted workflows, and release confidence without losing the human team story.</p>
                        </div>

                        <div class="flex flex-wrap gap-3 text-sm text-white/60">
                            <span class="code-chip">DDEV local workflow</span>
                            <span class="code-chip">Review-friendly branches</span>
                            <span class="code-chip">Launch assistant demo</span>
                        </div>
                    </div>

                    <nav class="mt-6 flex flex-wrap gap-2">
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
