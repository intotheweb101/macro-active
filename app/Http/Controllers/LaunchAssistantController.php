<?php

namespace App\Http\Controllers;

use App\Services\ZaiLaunchAssistant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LaunchAssistantController extends Controller
{
    public function show(ZaiLaunchAssistant $assistant): View
    {
        $isConfigured = $assistant->isConfigured();

        return view('launch-assistant', [
            'isConfigured' => $isConfigured,
            'generatedPlan' => null,
            'formData' => $this->defaultFormData(),
            'configurationMessage' => $isConfigured
                ? null
                : 'Add ZAI_API_KEY to your .env file to enable live launch plan generation.',
        ]);
    }

    public function generate(Request $request, ZaiLaunchAssistant $assistant): View
    {
        $validated = $request->validate([
            'creator_name' => ['required', 'string', 'max:120'],
            'niche' => ['required', 'string', 'max:120'],
            'audience' => ['required', 'string', 'max:180'],
            'offer_model' => ['required', 'string', 'max:120'],
            'launch_goal' => ['required', 'string', 'max:240'],
        ]);

        $isConfigured = $assistant->isConfigured();

        return view('launch-assistant', [
            'isConfigured' => $isConfigured,
            'generatedPlan' => $isConfigured
                ? $assistant->generate($validated)
                : null,
            'formData' => $validated,
            'configurationMessage' => $isConfigured
                ? null
                : 'Add ZAI_API_KEY to your .env file to enable live launch plan generation.',
        ]);
    }

    /**
     * @return array<string, string>
     */
    private function defaultFormData(): array
    {
        return [
            'creator_name' => 'Macro Method',
            'niche' => 'Nutrition coaching',
            'audience' => 'Busy professionals wanting simple macro-based plans',
            'offer_model' => 'Monthly coaching subscription with premium meal plan upsell',
            'launch_goal' => 'Launch fast with a clear onboarding sequence and a strong first 30-day retention plan',
        ];
    }
}
