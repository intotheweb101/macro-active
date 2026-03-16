@extends('layouts.app', ['title' => 'Engineering Workflow Demo'])

@section('content')
    <section class="grid gap-6 lg:grid-cols-[1fr_1fr]">
        <div class="panel p-6 md:p-8">
            <p class="pill pill-purple mb-4">Engineering workflow</p>
            <h2 class="section-title">How this repo supports review + release demos</h2>
            <div class="mt-6 space-y-4">
                @foreach ($workflow as $item)
                    <div class="metric-card text-sm leading-6 text-white/75">{{ $item }}</div>
                @endforeach
            </div>
        </div>

        <div class="panel p-6 md:p-8">
            <h3 class="text-xl font-semibold text-white">Suggested demo branches</h3>
            <div class="mt-5 space-y-4">
                @foreach ($branches as $branch)
                    <div class="metric-card">
                        <p class="text-sm text-white/60">Branch</p>
                        <p class="mt-2 text-lg font-semibold text-white">{{ $branch['name'] }}</p>
                        <p class="mt-2 text-sm leading-6 text-white/70">{{ $branch['purpose'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
