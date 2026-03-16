@extends('layouts.app', ['title' => 'Creator Operations Demo'])

@section('content')
    <section class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="panel p-6 md:p-8">
            <p class="pill pill-green mb-4">Creator operations</p>
            <h2 class="section-title">Sample onboarding and health view</h2>
            <p class="section-copy mt-4">This page gives you something concrete to demo when talking about onboarding velocity, health scoring, support escalation, and the handoff between automation and people.</p>
            <div class="mt-8 space-y-4">
                @foreach ($creators as $creator)
                    <div class="metric-card flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-white">{{ $creator['name'] }}</h3>
                            <p class="text-sm text-white/60">Launch target: {{ $creator['launch'] }}</p>
                        </div>
                        <div class="flex flex-col gap-2 text-sm text-white/80 md:items-end">
                            <span class="pill {{ $creator['status'] === 'Healthy' ? 'pill-green' : 'pill-purple' }}">{{ $creator['status'] }}</span>
                            <span>{{ $creator['risk'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="panel p-6 md:p-8">
            <h3 class="text-xl font-semibold text-white">Signals worth surfacing</h3>
            <ul class="mt-4 space-y-3 text-sm leading-6 text-white/70">
                @foreach ($signals as $signal)
                    <li>• {{ $signal }}</li>
                @endforeach
            </ul>
            <div class="mt-8 rounded-2xl border border-violet-400/20 bg-violet-400/10 p-4 text-sm leading-6 text-violet-100">
                This is a good page to use in a review demo because it is UI-focused, easy to understand, and shows how product + ops requirements become code changes.
            </div>
        </div>
    </section>
@endsection
