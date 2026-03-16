@extends('layouts.app', ['title' => 'Engineering Workflow Demo'])

@section('content')
    <section class="page-grid">
        <div class="section-stack">
            <div class="hero-panel">
                <div class="hero-content">
                    <p class="pill pill-purple mb-4">Engineering workflow</p>
                    <h2 class="section-title">How this repo supports review, release, and delivery confidence</h2>
                    <p class="section-copy mt-4 max-w-3xl">This screen helps you connect branch structure, AI-assisted review, human ownership, and release automation into one clean engineering story.</p>
                </div>
            </div>

            <div class="panel p-6 md:p-8">
                <p class="eyebrow">Workflow</p>
                <h3 class="subsection-title mt-3">What good team-enabled delivery looks like</h3>
                <div class="mt-6 space-y-4">
                    @foreach ($workflow as $item)
                        <div class="metric-card text-sm leading-6 text-white/75">{{ $item }}</div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="section-stack">
            <div class="panel p-6 md:p-8">
                <p class="eyebrow">Suggested demo branches</p>
                <h3 class="subsection-title mt-3">Use focused PRs first, then show the combined branch</h3>
                <div class="mt-6 space-y-4">
                    @foreach ($branches as $branch)
                        <div class="branch-card">
                            <p class="meta-label">Branch</p>
                            <p class="mt-2 text-lg font-semibold text-white">{{ $branch['name'] }}</p>
                            <p class="mt-3 text-sm leading-6 text-white/70">{{ $branch['purpose'] }}</p>
                        </div>
                    @endforeach

                    <div class="branch-card">
                        <p class="meta-label">Combined demo branch</p>
                        <p class="mt-2 text-lg font-semibold text-white">demo/all-features</p>
                        <p class="mt-3 text-sm leading-6 text-white/70">Use this branch to show how the smaller focused changes roll up into one polished demo environment.</p>
                    </div>
                </div>
            </div>

            <div class="soft-card">
                <p class="meta-label">Demo message</p>
                <div class="timeline">
                    <div class="timeline-item"><strong class="text-white">PR-level view:</strong> each branch keeps review scope clear and discussion focused.</div>
                    <div class="timeline-item"><strong class="text-white">Merge-level view:</strong> `demo/all-features` shows how product, AI, and release work come together.</div>
                    <div class="timeline-item"><strong class="text-white">Team story:</strong> automation accelerates delivery, but engineers still own quality and release decisions.</div>
                </div>
            </div>
        </div>
    </section>
@endsection
