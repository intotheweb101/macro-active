@extends('layouts.app', ['title' => 'Creator Launch Assistant'])

@section('content')
    <section class="page-grid">
        <div class="section-stack">
            <div class="hero-panel">
                <div class="hero-content">
                    <p class="pill pill-green mb-4">AI demo feature</p>
                    <h2 class="section-title">Creator Launch Assistant</h2>
                    <p class="section-copy mt-4 max-w-3xl">This feature is deliberately practical and on-brand. It turns a creator brief into a launch plan you can talk through live: positioning, first-week actions, onboarding risks, and retention plays.</p>
                </div>
            </div>

            @if (! empty($configurationMessage))
                <div class="rounded-3xl border border-amber-400/20 bg-amber-400/10 p-4 text-sm leading-6 text-amber-100">
                    {{ $configurationMessage }}
                    <div class="mt-2 text-amber-100/80">Expected config: <code class="rounded bg-black/20 px-2 py-1">ZAI_API_KEY</code>, <code class="rounded bg-black/20 px-2 py-1">ZAI_MODEL</code>, <code class="rounded bg-black/20 px-2 py-1">ZAI_BASE_URL</code>.</div>
                </div>
            @endif

            <div class="panel p-6 md:p-8">
                <div class="split-row">
                    <div>
                        <p class="eyebrow">Launch brief</p>
                        <h3 class="subsection-title mt-3">Generate a creator launch plan</h3>
                    </div>

                    <div class="code-chip">{{ $isConfigured ? 'Live API ready' : 'Setup mode' }}</div>
                </div>

                <form method="POST" action="{{ route('launch-assistant.generate') }}" class="mt-6 space-y-4">
                    @csrf

                    <div class="form-grid">
                        <div>
                            <label for="creator_name" class="field-label">Creator name</label>
                            <input id="creator_name" name="creator_name" type="text" value="{{ $formData['creator_name'] }}" class="field-input" />
                        </div>

                        <div>
                            <label for="niche" class="field-label">Niche</label>
                            <input id="niche" name="niche" type="text" value="{{ $formData['niche'] }}" class="field-input" />
                        </div>
                    </div>

                    <div>
                        <label for="audience" class="field-label">Audience</label>
                        <textarea id="audience" name="audience" rows="4" class="field-input field-input-tall">{{ $formData['audience'] }}</textarea>
                    </div>

                    <div>
                        <label for="offer_model" class="field-label">Offer model</label>
                        <input id="offer_model" name="offer_model" type="text" value="{{ $formData['offer_model'] }}" class="field-input" />
                    </div>

                    <div>
                        <label for="launch_goal" class="field-label">Launch goal</label>
                        <textarea id="launch_goal" name="launch_goal" rows="4" class="field-input field-input-tall">{{ $formData['launch_goal'] }}</textarea>
                    </div>

                    @if ($errors->any())
                        <div class="rounded-3xl border border-red-400/20 bg-red-400/10 p-4 text-sm leading-6 text-red-100">
                            <ul class="space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="action-button">
                        Generate launch plan
                    </button>
                </form>
            </div>
        </div>

        <div class="section-stack">
            <div class="panel p-6 md:p-8">
                <p class="eyebrow">Why this works</p>
                <h3 class="subsection-title mt-3">A strong demo feature for product and engineering discussion</h3>
                <ul class="mt-6 info-list">
                    <li class="info-item">It is on-brand for MacroActive: creator launch, onboarding, and retention.</li>
                    <li class="info-item">It is easy to understand in a live walkthrough.</li>
                    <li class="info-item">It shows a real AI integration without pretending AI replaces the team.</li>
                    <li class="info-item">It gives you a clean diff for code review and PR demo purposes.</li>
                </ul>

                <div class="spotlight-card spotlight-card-purple mt-6">
                    <strong class="text-white">z.ai integration notes:</strong>
                    <div class="mt-2">Base URL: <code class="rounded bg-black/20 px-2 py-1">https://api.z.ai/api/paas/v4</code></div>
                    <div class="mt-2">Model default: <code class="rounded bg-black/20 px-2 py-1">glm-5</code></div>
                    <div class="mt-2">Auth: Bearer token via <code class="rounded bg-black/20 px-2 py-1">ZAI_API_KEY</code></div>
                </div>
            </div>

            <div class="soft-card">
                <p class="meta-label">Generated output</p>
                <h4 class="mt-3 text-lg font-semibold text-white">Launch plan response</h4>

                @if ($generatedPlan)
                    <pre class="mt-4 whitespace-pre-wrap text-sm leading-6 text-white/80">{{ $generatedPlan }}</pre>
                @else
                    <p class="mt-4 text-sm leading-6 text-white/60">Submit the form to generate a creator launch plan. If the API key is not configured yet, this panel stays in setup mode so the page still demos cleanly.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
