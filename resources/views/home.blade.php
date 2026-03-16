@extends('layouts.app', ['title' => 'MacroActive Demo Overview'])

@section('content')
    <section class="grid gap-6 lg:grid-cols-[1.35fr_0.9fr]">
        <div class="panel p-6 md:p-8">
            <p class="pill pill-purple mb-4">Demo overview</p>
            <h2 class="section-title">A Laravel workspace designed for local dev, review demos, and pipeline conversations</h2>
            <p class="section-copy mt-4">This project is intentionally small but realistic: it includes DDEV config, a Laravel structure, sample pages for creator operations and engineering workflow, and repository-level docs for branches, commits, and release automation.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach ($stats as $stat)
                    <div class="metric-card">
                        <p class="text-sm text-white/60">{{ $stat['label'] }}</p>
                        <p class="mt-3 text-3xl font-semibold text-white">{{ $stat['value'] }}</p>
                        <p class="mt-2 text-sm leading-6 text-white/60">{{ $stat['context'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="panel p-6 md:p-8">
            <h3 class="text-xl font-semibold text-white">What this repo is for</h3>
            <ul class="mt-4 space-y-3 text-sm leading-6 text-white/70">
                @foreach ($highlights as $highlight)
                    <li>• {{ $highlight }}</li>
                @endforeach
            </ul>
            <div class="mt-8 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4 text-sm leading-6 text-emerald-100">
                Use this app to talk through local setup, branch-based collaboration, Copilot review diffs, and how release automation supports the team.
            </div>
        </div>
    </section>
@endsection
