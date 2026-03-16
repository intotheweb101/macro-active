@extends('layouts.app', ['title' => 'MacroActive Demo Overview'])

@section('content')
    <section class="page-grid">
        <div class="section-stack">
            <div class="hero-panel">
                <div class="hero-content">
                    <p class="pill pill-purple mb-4">Demo overview</p>
                    <h2 class="section-title">A Laravel workspace designed for local dev, review demos, and delivery conversations</h2>
                    <p class="section-copy mt-4 max-w-3xl">This project is intentionally small but realistic: it gives you a clean way to demo local setup, product-aligned UI, AI-assisted features, and the branch-to-release workflow that supports the team.</p>

                    <div class="hero-grid">
                        @foreach ($stats as $stat)
                            <div class="stat-card">
                                <p class="stat-label">{{ $stat['label'] }}</p>
                                <p class="stat-value">{{ $stat['value'] }}</p>
                                <p class="stat-context">{{ $stat['context'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="panel p-6 md:p-8">
                <p class="eyebrow">Why it works</p>
                <h3 class="subsection-title mt-3">Show the delivery story, not just isolated screens</h3>
                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    <div class="metric-card">
                        <p class="meta-label">Local setup</p>
                        <p class="mt-3 text-lg font-semibold text-white">Consistent dev environment</p>
                        <p class="mt-3 text-sm leading-6 text-white/70">Use DDEV and Laravel conventions to show how a new engineer can get productive quickly.</p>
                    </div>

                    <div class="metric-card">
                        <p class="meta-label">Review flow</p>
                        <p class="mt-3 text-lg font-semibold text-white">Focused PR-ready changes</p>
                        <p class="mt-3 text-sm leading-6 text-white/70">Smaller branches make it easy to demo Copilot review, human judgement, and clean merge paths.</p>
                    </div>

                    <div class="metric-card">
                        <p class="meta-label">Release confidence</p>
                        <p class="mt-3 text-lg font-semibold text-white">Automation supports the team</p>
                        <p class="mt-3 text-sm leading-6 text-white/70">The repo has enough CI/CD structure to talk through build safety, previews, and release readiness.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-stack">
            <div class="panel p-6 md:p-8">
                <p class="eyebrow">What this repo is for</p>
                <h3 class="subsection-title mt-3">A clean walkthrough you can drive live</h3>
                <ul class="mt-6 info-list">
                    @foreach ($highlights as $highlight)
                        <li class="info-item">{{ $highlight }}</li>
                    @endforeach
                </ul>

                <div class="spotlight-card mt-6">
                    Use this app to talk through local setup, branch-based collaboration, Copilot review diffs, and how release automation supports the team.
                </div>
            </div>

            <div class="soft-card">
                <p class="meta-label">Suggested walkthrough</p>
                <div class="timeline">
                    <div class="timeline-item"><strong class="text-white">Start on Overview</strong> to frame the repo as a practical delivery demo, not a toy app.</div>
                    <div class="timeline-item"><strong class="text-white">Move to Creator Ops</strong> to show product thinking, onboarding visibility, and health signals.</div>
                    <div class="timeline-item"><strong class="text-white">Open Launch Assistant</strong> to show a real AI integration with clear product relevance.</div>
                    <div class="timeline-item"><strong class="text-white">Finish on Engineering</strong> to connect branches, review flow, and release automation.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
