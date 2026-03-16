@extends('layouts.app', ['title' => 'Creator Launch Assistant'])

@section('content')
    <section class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
        <div class="panel p-6 md:p-8">
            <p class="pill pill-green mb-4">AI demo feature</p>
            <h2 class="section-title">Creator Launch Assistant</h2>
            <p class="section-copy mt-4">This is an on-brand demo feature powered by z.ai. It turns a creator brief into a launch plan you can talk through live: positioning, first-week actions, onboarding risks, and retention plays.</p>

            @if (! empty($configurationMessage))
                <div class="mt-6 rounded-2xl border border-amber-400/20 bg-amber-400/10 p-4 text-sm leading-6 text-amber-100">
                    {{ $configurationMessage }}
                    <div class="mt-2 text-amber-100/80">Expected config: <code class="rounded bg-black/20 px-2 py-1">ZAI_API_KEY</code>, <code class="rounded bg-black/20 px-2 py-1">ZAI_MODEL</code>, <code class="rounded bg-black/20 px-2 py-1">ZAI_BASE_URL</code>.</div>
                </div>
            @endif

            <form method="POST" action="{{ route('launch-assistant.generate') }}" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label for="creator_name" class="mb-2 block text-sm font-medium text-white/80">Creator name</label>
                    <input id="creator_name" name="creator_name" type="text" value="{{ $formData['creator_name'] }}" class="w-full rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none ring-0 placeholder:text-white/30" />
                </div>

                <div>
                    <label for="niche" class="mb-2 block text-sm font-medium text-white/80">Niche</label>
                    <input id="niche" name="niche" type="text" value="{{ $formData['niche'] }}" class="w-full rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none ring-0 placeholder:text-white/30" />
                </div>

                <div>
                    <label for="audience" class="mb-2 block text-sm font-medium text-white/80">Audience</label>
                    <textarea id="audience" name="audience" rows="3" class="w-full rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none ring-0 placeholder:text-white/30">{{ $formData['audience'] }}</textarea>
                </div>

                <div>
                    <label for="offer_model" class="mb-2 block text-sm font-medium text-white/80">Offer model</label>
                    <input id="offer_model" name="offer_model" type="text" value="{{ $formData['offer_model'] }}" class="w-full rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none ring-0 placeholder:text-white/30" />
                </div>

                <div>
                    <label for="launch_goal" class="mb-2 block text-sm font-medium text-white/80">Launch goal</label>
                    <textarea id="launch_goal" name="launch_goal" rows="3" class="w-full rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none ring-0 placeholder:text-white/30">{{ $formData['launch_goal'] }}</textarea>
                </div>

                @if ($errors->any())
                    <div class="rounded-2xl border border-red-400/20 bg-red-400/10 p-4 text-sm leading-6 text-red-100">
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="rounded-full bg-emerald-400 px-5 py-3 text-sm font-semibold text-black transition hover:bg-emerald-300">
                    Generate launch plan
                </button>
            </form>
        </div>

        <div class="panel p-6 md:p-8">
            <h3 class="text-xl font-semibold text-white">Why this works for the demo</h3>
            <ul class="mt-4 space-y-3 text-sm leading-6 text-white/70">
                <li>• It is on-brand for MacroActive: creator launch, onboarding, and retention.</li>
                <li>• It is easy to understand in a live walkthrough.</li>
                <li>• It shows a real AI integration without pretending AI replaces the team.</li>
                <li>• It gives you a clean diff for code review and PR demo purposes.</li>
            </ul>

            <div class="mt-8 rounded-2xl border border-violet-400/20 bg-violet-400/10 p-4 text-sm leading-6 text-violet-100">
                <strong class="text-white">z.ai integration notes:</strong>
                <div class="mt-2">Base URL: <code class="rounded bg-black/20 px-2 py-1">https://api.z.ai/api/paas/v4</code></div>
                <div class="mt-2">Model default: <code class="rounded bg-black/20 px-2 py-1">glm-5</code></div>
                <div class="mt-2">Auth: Bearer token via <code class="rounded bg-black/20 px-2 py-1">ZAI_API_KEY</code></div>
            </div>

            <div class="mt-8 rounded-2xl border border-white/10 bg-black/20 p-5">
                <h4 class="text-sm font-semibold uppercase tracking-wide text-white/70">Generated output</h4>

                @if ($generatedPlan)
                    <pre class="mt-4 whitespace-pre-wrap text-sm leading-6 text-white/80">{{ $generatedPlan }}</pre>
                @else
                    <p class="mt-4 text-sm leading-6 text-white/60">Submit the form to generate a creator launch plan. If the API key is not configured yet, this panel stays in setup mode so the page still demos cleanly.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
