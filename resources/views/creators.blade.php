@extends('layouts.app', ['title' => 'Creator Operations Demo'])

@section('content')
    <section class="page-grid">
        <div class="section-stack">
            <div class="hero-panel">
                <div class="hero-content">
                    <p class="pill pill-green mb-4">Creator operations</p>
                    <h2 class="section-title">A cleaner onboarding and health view for product conversations</h2>
                    <p class="section-copy mt-4 max-w-3xl">Use this screen to talk through onboarding velocity, health scoring, support prioritisation, and how better visibility helps the team act earlier.</p>
                </div>
            </div>

            <div class="panel p-6 md:p-8">
                <div class="split-row">
                    <div>
                        <p class="eyebrow">Creator health board</p>
                        <h3 class="subsection-title mt-3">Current onboarding status</h3>
                    </div>

                    <div class="code-chip">Live-demo friendly UI diff</div>
                </div>

                <div class="mt-6 data-grid">
                    @foreach ($creators as $creator)
                        <div class="data-row">
                            <div class="split-row">
                                <div>
                                    <p class="meta-label">Creator</p>
                                    <h3 class="mt-2 text-xl font-semibold text-white">{{ $creator['name'] }}</h3>
                                    <p class="mt-2 text-sm text-white/60">Launch target: {{ $creator['launch'] }}</p>
                                </div>

                                <div class="flex flex-col gap-3 md:items-end">
                                    <span class="pill {{ $creator['status'] === 'Healthy' ? 'pill-green' : 'pill-purple' }}">{{ $creator['status'] }}</span>
                                    <p class="text-sm text-white/75">{{ $creator['risk'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="section-stack">
            <div class="panel p-6 md:p-8">
                <p class="eyebrow">Signals worth surfacing</p>
                <h3 class="subsection-title mt-3">What the team should notice quickly</h3>
                <ul class="mt-6 info-list">
                    @foreach ($signals as $signal)
                        <li class="info-item">{{ $signal }}</li>
                    @endforeach
                </ul>

                <div class="spotlight-card spotlight-card-purple mt-6">
                    This page is ideal for a review demo because the change is easy to understand and clearly tied to product and operations outcomes.
                </div>
            </div>

            <div class="soft-card">
                <p class="meta-label">Creator health timeline</p>
                <h4 class="mt-3 text-lg font-semibold text-white">Tell the progress story over time</h4>
                <div class="timeline">
                    <div class="timeline-item"><strong class="text-white">Week 1:</strong> onboarding checklist complete, payment rails confirmed.</div>
                    <div class="timeline-item"><strong class="text-white">Week 2:</strong> first campaign live, support questions down 35%.</div>
                    <div class="timeline-item"><strong class="text-white">Week 3:</strong> health score review highlights retention risk and next action.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
