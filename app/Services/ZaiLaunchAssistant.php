<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class ZaiLaunchAssistant
{
    public function isConfigured(): bool
    {
        return filled(config('services.zai.api_key'));
    }

    /**
     * @param  array<string, string>  $input
     */
    public function generate(array $input): string
    {
        $response = Http::acceptJson()
            ->asJson()
            ->withToken((string) config('services.zai.api_key'))
            ->baseUrl(rtrim((string) config('services.zai.base_url'), '/'))
            ->timeout(30)
            ->post('/chat/completions', [
                'model' => config('services.zai.model', 'glm-5'),
                'temperature' => 0.7,
                'stream' => false,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a launch strategist helping fitness and nutrition creators launch on MacroActive. Write concise, practical launch plans with clear priorities, onboarding steps, content angles, and retention ideas.',
                    ],
                    [
                        'role' => 'user',
                        'content' => sprintf(
                            "Creator name: %s\nNiche: %s\nAudience: %s\nOffer model: %s\nLaunch goal: %s\n\nCreate a concise launch assistant response with these sections:\n1. Launch positioning\n2. First 7 days plan\n3. Content ideas\n4. Onboarding risks to watch\n5. Retention play to test",
                            $input['creator_name'],
                            $input['niche'],
                            $input['audience'],
                            $input['offer_model'],
                            $input['launch_goal'],
                        ),
                    ],
                ],
            ])
            ->throw()
            ->json();

        $content = data_get($response, 'choices.0.message.content');

        if (! is_string($content) || $content === '') {
            throw new RuntimeException('z.ai returned an unexpected response payload.');
        }

        return $content;
    }
}
